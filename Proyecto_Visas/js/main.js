document.addEventListener('DOMContentLoaded', () => {
    // Sidebar hover effect
    const items = document.querySelectorAll('.sidebar a, .hoverable');
    items.forEach(link => {
        link.addEventListener('mouseover', () => {
            link.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
            link.style.transform = 'translateX(8px)';
        });
        link.addEventListener('mouseout', () => {
            link.style.backgroundColor = 'rgba(255, 255, 255, 0.15)';
            link.style.transform = 'translateX(0)';
        });
    });

    // Calcular suma de cuotas en formularios de pago
    function calcularSumaCuotas() {
        let total = 0;
        document.querySelectorAll('.campo-cuota').forEach(function(input) {
            if (!input.disabled && input.value) total += parseFloat(input.value);
        });
        const totalCuotas = document.getElementById('totalCuotas');
        if (totalCuotas) totalCuotas.value = total.toFixed(2);
    }

    // Habilitar/deshabilitar cuotas según el checkbox
    const usaCuotas = document.getElementById('usa_cuotas');
    function toggleCuotas(checked) {
        document.querySelectorAll('.campo-cuota').forEach(function(input) {
            input.disabled = !checked;
            if (!checked) input.value = '';
        });
        calcularSumaCuotas();
    }
    if (usaCuotas) {
        usaCuotas.addEventListener('change', function() {
            toggleCuotas(this.checked);
        });
        toggleCuotas(usaCuotas.checked);
    }

    // Asignar evento a campos de cuotas si existen
    const cuotas = document.querySelectorAll('.campo-cuota');
    if (cuotas.length > 0) {
        cuotas.forEach(input => {
            input.addEventListener('input', calcularSumaCuotas);
        });
        calcularSumaCuotas(); // Calcular al cargar la página
    }
});