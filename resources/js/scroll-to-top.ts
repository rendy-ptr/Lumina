const scrollToTopButton =
    document.querySelector<HTMLButtonElement>("#scrollToTop");

document.addEventListener("scroll", () => {
    if (!scrollToTopButton) return;

    if (window.scrollY > 300) {
        scrollToTopButton.classList.remove("opacity-0", "invisible");
    } else {
        scrollToTopButton.classList.add("opacity-0", "invisible");
    }
});

scrollToTopButton?.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});
