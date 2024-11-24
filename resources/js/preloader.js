document.addEventListener('DOMContentLoaded', function () {


    // Asegurarse de que Alpine.js esté cargado
    const alpineInstance = document.querySelector('[x-data]');
    if (!alpineInstance) {
        console.error("Alpine.js no encontrado. Revisa la configuración.");
        return;
    }

    // Eventos para mostrar y ocultar el preloader
    window.addEventListener('start-loading', () => {
        console.log("Iniciando carga...");
        alpineInstance.__x.set('isLoading', true);  // Establece isLoading en true
    });

    window.addEventListener('stop-loading', () => {
        console.log("Deteniendo carga...");
        alpineInstance.__x.set('isLoading', false);  // Establece isLoading en false
    });
});

// Función para simular navegación y activar el preloader
function simulateNavigation(url) {
    window.dispatchEvent(new Event('start-loading'));  // Muestra el preloader

    setTimeout(() => {
        // Cambia el contenido principal de la página
        document.querySelector('main > .container').innerHTML = `
            <h1 class="text-center text-2xl font-bold">Cargando ${url}...</h1>`;
        
        // Detiene el preloader después de un retardo simulado
        window.dispatchEvent(new Event('stop-loading'));
    }, 2500);  // Cambié el retardo a 2.5 segundos
}
