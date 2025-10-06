const initAvatarPreview = () => {
    const inputs = document.querySelectorAll<HTMLInputElement>(
        "[data-avatar-preview-input]"
    );

    inputs.forEach((input) => {
        if (input.dataset.avatarPreviewBound === "true") {
            return;
        }

        const root =
            (input.closest(
                "[data-avatar-preview-root]"
            ) as HTMLElement | null) ?? document.body;
        const targets = Array.from(
            root.querySelectorAll<HTMLImageElement>(
                "[data-avatar-preview-target]"
            )
        );

        if (!targets.length) {
            return;
        }

        const statusElements = Array.from(
            root.querySelectorAll<HTMLElement>("[data-avatar-preview-status]")
        );
        const originals = new Map<HTMLImageElement, string>();

        targets.forEach((target) => {
            const original =
                target.dataset.avatarPreviewOriginal ??
                target.getAttribute("src") ??
                "";
            originals.set(target, original);
        });

        const toggleStatus = (visible: boolean) => {
            statusElements.forEach((el) => {
                el.classList.toggle("hidden", !visible);
            });
        };

        const resetPreview = () => {
            targets.forEach((target) => {
                const original = originals.get(target);
                if (original) {
                    target.src = original;
                }
            });
            toggleStatus(false);
        };

        const nameInput =
            document.querySelector<HTMLInputElement>('input[name="name"]');
        if (nameInput) {
            nameInput.addEventListener("input", () => {
                const name = nameInput.value.trim();
                const file = input.files?.[0];
                if (file) return;

                if (name.length > 0) {
                    const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(
                        name
                    )}`;
                    targets.forEach((target) => {
                        target.src = avatarUrl;
                    });
                    toggleStatus(true);
                } else {
                    resetPreview();
                }
            });
        }

        input.addEventListener("change", () => {
            const file = input.files?.[0];

            if (!file) {
                resetPreview();
                return;
            }

            if (!file.type.startsWith("image/")) {
                resetPreview();
                return;
            }

            const reader = new FileReader();

            reader.onload = (event) => {
                const previewUrl =
                    typeof event.target?.result === "string"
                        ? event.target.result
                        : null;

                if (!previewUrl) {
                    resetPreview();
                    return;
                }

                targets.forEach((target) => {
                    target.src = previewUrl;
                });

                toggleStatus(true);
            };

            reader.readAsDataURL(file);
        });

        const form = input.closest("form");

        if (form) {
            form.addEventListener("reset", () => {
                toggleStatus(false);
                window.requestAnimationFrame(() => resetPreview());
            });
        }

        toggleStatus(false);
        input.dataset.avatarPreviewBound = "true";
    });
};

const register = () => {
    initAvatarPreview();
};

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", register, { once: true });
} else {
    register();
}

export {};
