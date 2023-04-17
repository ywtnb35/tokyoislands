let toggleBtn = document.querySelector('.toggle-btn');
let nav = document.querySelector('nav');

if (toggleBtn) {
    toggleBtn.addEventListener('click',function() {
    nav.classList.toggle('open');
    });
}