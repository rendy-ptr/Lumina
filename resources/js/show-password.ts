const togglePassword = document.querySelectorAll<HTMLButtonElement>(
    "[data-password-toggle]"
);

document.addEventListener("DOMContentLoaded", () => {
    togglePassword.forEach((button) => {
        const targetId = button.getAttribute("data-password-toggle");
        if (!targetId) return;

        const input = document.getElementById(
            targetId
        ) as HTMLInputElement | null;
        if (!input) return;

        const showIcon = button.querySelector<HTMLElement>(
            '[data-icon="show"]'
        );
        const hideIcon = button.querySelector<HTMLElement>(
            '[data-icon="hide"]'
        );

        const syncIcons = () => {
            if (!showIcon || !hideIcon) return;
            const isHidden = input.type === "password";
            showIcon.classList.toggle("hidden", isHidden);
            hideIcon.classList.toggle("hidden", !isHidden);
        };

        syncIcons();

        button.addEventListener("click", () => {
            const isHidden = input.type === "password";
            input.type = isHidden ? "text" : "password";
            syncIcons();
        });
    });
});
