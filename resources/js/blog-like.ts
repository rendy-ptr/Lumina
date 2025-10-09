const csrfToken =
    (document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement | null)?.content ?? '';

const likedClasses = ['bg-rose-500/20', 'text-rose-100', 'border-rose-400/40', 'hover:bg-rose-500/30'];
const unlikedClasses = ['bg-white/5', 'text-white/70', 'border-white/10', 'hover:bg-white/10'];

const applyButtonStyles = (button: HTMLButtonElement, liked: boolean) => {
    const add = liked ? likedClasses : unlikedClasses;
    const remove = liked ? unlikedClasses : likedClasses;

    remove.forEach((className) => button.classList.remove(className));
    add.forEach((className) => {
        if (!button.classList.contains(className)) {
            button.classList.add(className);
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
    if (!csrfToken) {
        return;
    }

    const likeForms = document.querySelectorAll<HTMLFormElement>('.js-like-form');

    likeForms.forEach((form) => {
        const button = form.querySelector<HTMLButtonElement>('.js-like-button');
        if (!button) {
            return;
        }

        const handleSubmit = async (event: Event) => {
            event.preventDefault();

            const likeCountEl = button.querySelector<HTMLElement>('.js-like-count');
            const actionInput = form.querySelector<HTMLInputElement>('input[name="action"]');
            const formData = new FormData(form);

            try {
                button.disabled = true;

                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        Accept: 'application/json',
                    },
                    body: formData,
                    credentials: 'same-origin',
                });

                if (!response.ok) {
                    throw new Error(`Failed to toggle like: ${response.status}`);
                }

                const payload = (await response.json()) as {
                    likes_count?: number;
                    liked?: boolean;
                };

                if (typeof payload.likes_count === 'number' && likeCountEl) {
                    likeCountEl.textContent = payload.likes_count.toString();
                }

                const isLiked = Boolean(payload.liked);
                button.dataset.liked = isLiked ? 'true' : 'false';
                button.setAttribute('aria-pressed', isLiked ? 'true' : 'false');

                const outlineIcon = button.querySelector<SVGElement>('.js-like-icon-outline');
                const solidIcon = button.querySelector<SVGElement>('.js-like-icon-solid');
                outlineIcon?.classList.toggle('hidden', isLiked);
                solidIcon?.classList.toggle('hidden', !isLiked);

                if (actionInput) {
                    actionInput.value = isLiked ? 'unlike' : 'like';
                }

                applyButtonStyles(button, isLiked);
            } catch (_error) {
                form.removeEventListener('submit', handleSubmit);
                form.submit();
            } finally {
                button.disabled = false;
            }
        };

        form.addEventListener('submit', handleSubmit);
    });
});
