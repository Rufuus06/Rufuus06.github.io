// OCULTA EL NAVBAR EN MOVILES
document.addEventListener('click', function (e) {
    // Verificar si el clic no ocurrió dentro del menú desplegable ni del botón que lo abre
    var navbarCollapse = document.querySelector('.navbar-collapse');
    var navbarToggler = document.querySelector('.navbar-toggler');

    if (!navbarCollapse.contains(e.target) && !navbarToggler.contains(e.target)) {
        // Cerrar el menú desplegable
        var navbarCollapse = document.querySelector('.navbar-collapse');

        var bsCollapse = new bootstrap.Collapse(navbarCollapse, {
            toggle: false,
            show: true, //useless
            hide: false //useless
          });
    
        bsCollapse.hide();
    }
});