document.addEventListener("DOMContentLoaded", () => {
    const toggleButton =
        document.querySelector<HTMLButtonElement>("#menuToggle");
    const mobileMenu = document.querySelector<HTMLDivElement>("#mobileMenu");

    if (!toggleButton || !mobileMenu) return;

    let isOpen = false;

    const openMenu = () => {
        mobileMenu.classList.remove("opacity-0", "invisible", "-translate-y-4");
        mobileMenu.classList.add("opacity-100", "visible", "translate-y-0");
        isOpen = true;
    };

    const closeMenu = () => {
        mobileMenu.classList.add("opacity-0", "invisible", "-translate-y-4");
        mobileMenu.classList.remove("opacity-100", "visible", "translate-y-0");
        isOpen = false;
    };

    toggleButton.addEventListener("click", () => {
        isOpen ? closeMenu() : openMenu();
    });

    document.addEventListener("click", (e) => {
        if (
            isOpen &&
            mobileMenu &&
            !mobileMenu.contains(e.target as Node) &&
            !toggleButton.contains(e.target as Node)
        ) {
            closeMenu();
        }
    });
});
