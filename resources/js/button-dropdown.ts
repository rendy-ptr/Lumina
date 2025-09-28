const menuButton = document.getElementById("menu-button") as HTMLButtonElement;
const dropdownMenu = document.getElementById("dropdown-menu") as HTMLDivElement;

if (menuButton && dropdownMenu) {
    menuButton.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        const target = event.target as Node;
        if (!menuButton.contains(target) && !dropdownMenu.contains(target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
}
