// Código principal de la aplicación
document.addEventListener("DOMContentLoaded", function () {
  mensajetemporal();
  menuBurger();
  darkMode();
  confirmarDelete();
  modal();
});

//MENÚ HAMBURGUESA
function menuBurger() {
  const containerIcons = document.getElementById("container__icons");
  const ulLinks = document.getElementById("ul__links");
  const listIcon = document.getElementById("list__icon");
  const closeIcon = document.getElementById("close__icon");
  // Verifica que todos los elementos existen antes de añadir los event listeners
  if (containerIcons && ulLinks && listIcon && closeIcon) {
    containerIcons.addEventListener("click", function () {
      ulLinks.classList.toggle("ul__links--show");
      listIcon.classList.toggle("icon--hidden");
      closeIcon.classList.toggle("icon--show");
    });
  } else {
    console.warn("Uno o más elementos no se encontraron en el DOM.");
  }
}

// AÑADIR EL MODO OSCURO PARA DESCANSO DE LA VISTA
function darkMode() {
  // Verifica si el modo oscuro está habilitado en localStorage
  const currentMode = localStorage.getItem("dark-mode");
  if (currentMode === "enabled") {
    document.body.classList.add("dark-mode");
  }

  // Selecciona todos los elementos con la clase "toggle-dark-mode"
  const toggleButtons = document.querySelectorAll(".toggle-dark-mode");

  // Añade el evento de clic para alternar el modo oscuro a cada botón
  toggleButtons.forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault(); // Previene el comportamiento predeterminado de los enlaces
      document.body.classList.toggle("dark-mode");

      // Guarda la preferencia del usuario en localStorage
      if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("dark-mode", "enabled");
      } else {
        localStorage.setItem("dark-mode", "disabled");
      }
    });
  });
}

function mensajetemporal() {
  const alertas = document.querySelectorAll(".alerta");

  // Itera sobre todas las alertas
  alertas.forEach(function (alerta) {
    setTimeout(function () {
      // Reducir la opacidad a 0 para el efecto de desvanecimiento
      alerta.style.opacity = 0;
      // Después de que la opacidad haya cambiado (500ms), ocultamos la alerta completamente
      setTimeout(function () {
        alerta.style.display = "none"; // Ocultamos la alerta completamente
      }, 1500);
    }, 3000);
  });
}

//Mensaje de alerta para eliminar
function confirmarDelete() {
  document.querySelectorAll(".eliminar-E").forEach(function (enlace) {
    enlace.addEventListener("click", function (e) {
      e.preventDefault();
      Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No hay vuelta atrás!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33", // Color rojo para el botón de confirmar
        cancelButtonColor: "#004370", // Color azul para el botón de cancelar
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
        allowOutsideClick: false, // No permitir cerrar la alerta haciendo clic fuera
      }).then((result) => {
        if (result.isConfirmed) {
          //mostrar mensaje de éxito
          Swal.fire({
            title: "Eliminado",
            text: "Se eliminó con éxito",
            icon: "success",
            allowOutsideClick: false,
          }).then(() => {
            window.location.href = enlace.href;
          });
        }
      });
    });
  });
}
//Ventana modal para cambiar datos de usuario
function modal() {
  var modal = document.getElementById("myModal");
  // Obtener el botón que abre el modal
  var btn = document.getElementById("openModalBtn");
  // Obtener el elemento <span> que cierra el modal
  var span = document.getElementsByClassName("close")[0];
  // Cuando el usuario hace clic en el botón, abre el modal
  btn.onclick = function () {
    modal.style.display = "block";
  };
  // Cuando el usuario hace clic en <span> (x), cierra el modal
  span.onclick = function () {
    modal.style.display = "none";
  };

}
