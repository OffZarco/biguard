window.addEventListener('scroll', function() {
    var parallax = document.querySelector('.intro');
    var scrollPosition = window.scrollY; // Utilisez `scrollY` au lieu de `pageYOffset`

    parallax.style.backgroundPositionY = scrollPosition * -0.35 + 'px';
});
