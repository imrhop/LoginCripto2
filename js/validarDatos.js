var contraReg = /^(?!.*(.)\1)(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;

async function hashSHA256(str) {
  const buf = await crypto.subtle.digest('SHA-256', new TextEncoder().encode(str));
  return Array.from(new Uint8Array(buf))
    .map(b => b.toString(16).padStart(2, '0'))
    .join('');
}
document.addEventListener('DOMContentLoaded', function() {
document.getElementById('formCrearCuenta').addEventListener('submit', async function(event) {
  event.preventDefault();

  const contra = document.getElementById('contrasena').value;
  const confiContra = document.getElementById('confirmar_contrasena').value;

  if (!contraReg.test(contra)) {
    alert("La contraseña ingresada no cumple con: mínimo 8 caracteres, 1 mayúscula, 1 minúscula, 1 número, 1 carácter especial y no deben de tener caracteres iguales consecutivos");
    return;
  }
  if (contra !== confiContra) {
    alert("Las contraseñas no coinciden");
    return;
  }

  const hashed = await hashSHA256(contra);
  
  // Coloca el hash en los inputs ocultos que sí se enviarán
  document.getElementById('contrasena_hashed').value = hashed;
  document.getElementById('confirmar_contrasena_hashed').value = hashed;

  

  this.submit(); // envía el formulario con las contraseñas hasheadas
});
});
