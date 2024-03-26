document.getElementById("formulaire").addEventListener("submit", function(event) {
    const instagramInput = document.getElementById("instagram");
    const emailInput = document.getElementById("email");
    let isValid = true;

    // Validation Instagram : vérifie si le champ est vide
    if (!instagramInput.value.trim()) {
        document.getElementById("errorInstagram").textContent = "Le champ Instagram est requis.";
        isValid = false;
    } else {
        document.getElementById("errorInstagram").textContent = ""; // Réinitialiser le message d'erreur
    }

    // Validation Email : vérifie si le champ est vide et valide
    if (!emailInput.value.trim()) {
        document.getElementById("errorEmail").textContent = "Le champ Email est requis.";
        isValid = false;
    } else if (!/^\S+@\S+\.\S+$/.test(emailInput.value)) {
        document.getElementById("errorEmail").textContent = "L'adresse email n'est pas valide.";
        isValid = false;
    } else {
        document.getElementById("errorEmail").textContent = ""; // Réinitialiser le message d'erreur
    }

    if (!isValid) {
        event.preventDefault(); // Empêche la soumission du formulaire si non valide
        return false
    }
});
