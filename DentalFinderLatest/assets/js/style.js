// Sidebar Toggle
const sideBar = document.querySelector(".toggle-btn");

sideBar.addEventListener("click", function () {
    const sidebar = document.querySelector("#sidebar");
    sidebar.classList.toggle("expand");

    // Ensure dark mode styles apply when toggling sidebar
    if (settingsPage.classList.contains('dark-mode')) {
        sidebar.classList.add('dark-mode');
    } else {
        sidebar.classList.remove('dark-mode');
    }
});

// Dark Mode Toggle
const darkModeToggle = document.getElementById('darkModeToggle');
const settingsPage = document.querySelector('.settings-page');
const sidebar = document.querySelector('#sidebar');

// Initialize Dark Mode based on saved preference
function initializeDarkMode() {
    if (localStorage.getItem('dark-mode') === 'enabled') {
        enableDarkMode();
        darkModeToggle.checked = true;
    }
}
initializeDarkMode();

// Toggle Dark Mode
darkModeToggle.addEventListener('change', () => {
    if (darkModeToggle.checked) {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});

// Enable Dark Mode
function enableDarkMode() {
    settingsPage.classList.add('dark-mode');
    sidebar.classList.add('dark-mode'); // Update sidebar
    localStorage.setItem('dark-mode', 'enabled');
}

// Disable Dark Mode
function disableDarkMode() {
    settingsPage.classList.remove('dark-mode');
    sidebar.classList.remove('dark-mode'); // Reset sidebar
    localStorage.setItem('dark-mode', 'disabled');
}
