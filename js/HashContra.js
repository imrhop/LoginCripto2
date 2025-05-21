async function hashSHA256(str) {
  const buf = await crypto.subtle.digest('SHA-256', new TextEncoder().encode(str));
  return Array.from(new Uint8Array(buf))
    .map(b => b.toString(16).padStart(2, '0'))
    .join('');
}

document.addEventListener('DOMContentLoaded', function() {
document.getElementById('formLogin').addEventListener('submit', async function(event) {
  event.preventDefault();

  const contra = document.getElementById('contrasena').value;
  const hashed = await hashSHA256(contra);
  
  document.getElementById('contrasena_hashed').value = hashed;
  this.submit();
});
});