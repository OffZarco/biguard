function toggleFaq(id) {
    // Sélectionner toutes les réponses et tous les boutons de questions
    var allAnswers = document.querySelectorAll('.faq-answer');
    var allQuestions = document.querySelectorAll('.faq-question');

    // Fermer toutes les réponses et retirer la classe 'active' des boutons de questions
    for (var i = 0; i < allAnswers.length; i++) {
        if (allAnswers[i].id !== id) {
            allAnswers[i].style.display = 'none';
            allQuestions[i].classList.remove('active');
        }
    }

    // Trouver l'élément de réponse spécifique à basculer
    var answer = document.getElementById(id);
    var question = answer.previousElementSibling; // Le bouton de question correspondant

    // Basculer l'affichage de cette réponse
    if (answer.style.display === "block") {
        answer.style.display = "none";
        question.classList.remove('active');
    } else {
        answer.style.display = "block";
        question.classList.add('active');
    }
}
