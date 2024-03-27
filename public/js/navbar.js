const btnContainer = document.getElementById("link");
const btns = btnContainer.getElementsByClassName("btn");

for (let i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    let current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

// Behavior effect
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
      });
  });
});

// Scroll background

window.addEventListener("scroll", function() {
  let navbar = document.querySelector('.navbar');
  if (window.scrollY > 100) {
      navbar.classList.add('scrolled');
  } else {
      navbar.classList.remove('scrolled');
  }
});

document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.navbar .hamburger');
  const navLinks = document.querySelector('.nav-links');

  hamburger.addEventListener('click', () => {
      navLinks.classList.toggle('active');
  });
});