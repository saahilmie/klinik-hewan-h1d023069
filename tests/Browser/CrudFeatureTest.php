<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CrudFeatureTest extends DuskTestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        // Buat user untuk login
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.com',
            'password' => bcrypt('password123'),
        ]);
    }

    /**
     * Test 1: Login User
     * Menguji bahwa user dapat login dengan email dan password yang benar
     */
    public function testUserCanLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@klinik.com')
                    ->type('password', 'password123')
                    ->press('LOG IN')
                    ->waitForLocation('/dashboard', 10)
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard Klinik Hewan');
        });
    }

    /**
     * Test 2: Create Data
     * Menguji bahwa data baru dapat ditambahkan melalui form create
     */
    public function testUserCanCreateData()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                    ->visit('/pasien')
                    ->clickLink('Tambah Pasien')
                    ->waitForLocation('/pasien/create', 5)
                    ->assertPathIs('/pasien/create')
                    ->type('nama_hewan', 'Bobby')
                    ->select('jenis_hewan', 'Anjing')
                    ->type('umur', '18')
                    ->type('nama_pemilik', 'John Doe')
                    ->type('no_telepon', '081234567890')
                    ->type('tanggal_check_in', '2024-11-14')
                    ->select('status', 'Dirawat')
                    ->type('biaya_perawatan', '200000')
                    ->type('diagnosa', 'Demam tinggi dan tidak mau makan')
                    ->press('Simpan Data')
                    ->waitForLocation('/pasien', 10)
                    ->assertPathIs('/pasien')
                    ->assertSee('Data berhasil ditambahkan')
                    ->assertSee('Bobby');
        });
    }

    /**
     * Test 3: Read Data
     * Menguji bahwa data yang baru ditambahkan muncul di halaman index
     */
    public function testUserCanReadData()
    {
        // Buat data dummy
        Pasien::create([
            'nama_hewan' => 'Milo',
            'jenis_hewan' => 'Kucing',
            'umur' => 12,
            'nama_pemilik' => 'Jane Smith',
            'no_telepon' => '082345678901',
            'diagnosa' => 'Flu kucing',
            'tanggal_check_in' => '2024-11-10',
            'status' => 'Dirawat',
            'biaya_perawatan' => 150000,
        ]);

        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::first())
                    ->visit('/pasien')
                    ->assertSee('Milo')
                    ->assertSee('Kucing')
                    ->assertSee('Jane Smith')
                    ->assertSee('Flu kucing');
        });
    }

    /**
     * Test 4: Update Data
     * Menguji bahwa data dapat diperbarui melalui form edit
     */
    public function testUserCanUpdateData()
    {
        // Buat data dummy
        $pasien = Pasien::create([
            'nama_hewan' => 'Luna',
            'jenis_hewan' => 'Kucing',
            'umur' => 24,
            'nama_pemilik' => 'Michael Johnson',
            'no_telepon' => '083456789012',
            'diagnosa' => 'Luka ringan',
            'tanggal_check_in' => '2024-11-12',
            'status' => 'Dirawat',
            'biaya_perawatan' => 100000,
        ]);

        $this->browse(function (Browser $browser) use ($pasien) {
            $browser->loginAs(User::first())
                    ->visit("/pasien/{$pasien->id}/edit")
                    ->assertSee('Form Edit Pasien')
                    ->type('nama_hewan', 'Luna Updated')
                    ->type('diagnosa', 'Sudah sembuh total')
                    ->press('Update Data')
                    ->waitFor('.bg-emerald-100', 20)
                    ->assertSee('Data berhasil diperbarui');
        });
    }

    /**
     * Test 5: Delete Data
     * Menguji bahwa data dapat dihapus melalui tombol delete
     */
    public function testUserCanDeleteData()
    {
        // Buat data dummy
        $pasien = Pasien::create([
            'nama_hewan' => 'Charlie',
            'jenis_hewan' => 'Hamster',
            'umur' => 6,
            'nama_pemilik' => 'Sarah Williams',
            'no_telepon' => '084567890123',
            'diagnosa' => 'Sakit perut',
            'tanggal_check_in' => '2024-11-13',
            'status' => 'Dirawat',
            'biaya_perawatan' => 75000,
        ]);

        $this->browse(function (Browser $browser) use ($pasien) {
            $browser->loginAs(User::first())
                    ->visit('/pasien')
                    ->assertSee('Charlie')
                    ->press('@delete-'.$pasien->id)
                    ->waitForDialog()
                    ->acceptDialog()
                    ->waitForLocation('/pasien', 10)
                    ->assertPathIs('/pasien')
                    ->assertSee('Data berhasil dihapus')
                    ->assertDontSee('Charlie');
        });
    }
}
