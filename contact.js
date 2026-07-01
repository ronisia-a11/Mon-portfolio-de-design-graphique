document.getElementById("contactForm").addEventListener("submit", function(e) {
  e.preventDefault(); // Empêche l'envoi réel

  // Récupération des données
  const nom = event.target.nom.value;
  const telephone = event.target.telephone.value;
  const email = event.target.email.value;
  const projet = event.target.projet.value;
  const ville = event.target.ville.value;
  const description = event.target.description.value;

  // Affiche un message de confirmation
  alert("Merci " + nom + "! Votre demande a été envoyée.\n" +
        "Téléphone: " + telephone + "\n" +
        "Email: " + email + "\n" +
        "Projet: " + projet + "\n" +
        "Ville: " + ville + "\n" +
        "Description: " + description);
        
});
