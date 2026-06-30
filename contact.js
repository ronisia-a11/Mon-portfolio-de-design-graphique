document.getElementById("contactForm").addEventListener("submit", function(e) {
  e.preventDefault(); // Empêche l'envoi réel

  // Efface le formulaire
  this.reset();

  // Affiche un petit message
  document.getElementById("message").textContent = "✅ Le formulaire a bien été envoyé !";
});
