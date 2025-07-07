document.addEventListener("DOMContentLoaded", () => {
    const check = document.getElementById("check-alergias");
    const detalle = document.getElementById("detalle_alergias");

    if (check && detalle) {
        check.addEventListener("change", () => {
            detalle.disabled = !check.checked;
            if (!check.checked) {
                detalle.value = "";
            }
        });
    }
});
