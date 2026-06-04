const menuButton = document.getElementById("menu-button");
const aside = document.getElementById("aside");
const themeToggle = document.getElementById("theme-toggle");
const root = document.documentElement;

const storedTheme = localStorage.getItem("theme");
const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
const initialTheme = storedTheme || (prefersDark ? "dark" : "light");
root.classList.toggle("dark", initialTheme === "dark");

const updateThemeButton = () => {
    if (!themeToggle) return;
    const isDark = root.classList.contains("dark");
    themeToggle.textContent = isDark ? "☀️ Light" : "🌙 Dark";
};

updateThemeButton();

if (themeToggle) {
    themeToggle.addEventListener("click", () => {
        const isDark = root.classList.toggle("dark");
        localStorage.setItem("theme", isDark ? "dark" : "light");
        updateThemeButton();
    });
}

if (menuButton && aside) {
    menuButton.addEventListener("click", () => {
        aside.classList.toggle("hidden");
    });
}
