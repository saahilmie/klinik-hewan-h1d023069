<script>
function updateFields() {
    let status = document.getElementById('status').value;
    let checkOut = document.getElementById('check_out');
    let death = document.getElementById('date_of_death');

    checkOut.disabled = true;
    death.disabled = true;

    if (status === "sembuh") {
        checkOut.disabled = false;
        death.value = "";
    }

    if (status === "mati") {
        death.disabled = false;
        checkOut.value = "";
    }

    if (status === "dirawat") {
        checkOut.value = "";
        death.value = "";
    }
}
document.addEventListener("DOMContentLoaded", updateFields);
</script>
