import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('cart', () => {
        return {
            errors: false,
            async add(id) {
                try {
                    const addCart = await window.fetch('cart/' + id, {
                        method  : 'POST',
                        cache   : 'no-cache',
                        headers: {
                            "X-Requested-With": "XMLHttpRequest",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });

                    if (addCart.ok) {
                        this.errors = false;

                        const addCartResponse = await addCart.json();

                        let cartUpdated = new CustomEvent("cartUpdated", {
                            detail: {
                                totalQuantity: addCartResponse.totalQuantity,
                            },
                        });
                        window.dispatchEvent(cartUpdated);
                    } else {
                        throw new Error(response.message)
                    }
                } catch(err) {
                    this.errors = err;
                }
            }
        };
    });

    Alpine.data('minicart', () => {
        return {
            totalQuantity: 0,
            update() {
                window.addEventListener('cartUpdated', (e) => {
                    this.totalQuantity = e.detail.totalQuantity;
                });
            }
        };
    });
});

Alpine.start();
