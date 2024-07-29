const toggleButton = document.getElementById('toggleTheme');
const bodyElement = document.body;

toggleButton.addEventListener('click', () => {
    bodyElement.classList.toggle('dark-mode');
});
