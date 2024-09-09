document.addEventListener('alpine:init', () => {
    Alpine.directive('confirmable', (el, { expression }, { evaluate }) => {
        // Extrae parámetros opcionales de la expresión
        let params = expression.split(',').map(param => param.trim());
        let title = params[0] || 'Are you sure?';
        let message = params[1] || 'Are you sure you want to proceed?';
        let callback = params[2] ? new Function('return ' + params[2])() : () => {};
        let cancel = params[3] ? new Function('return ' + params[3])() : () => {};

        el.addEventListener('click', async () => {
            let result = await new Promise(resolve => {
                window.dispatchEvent(new CustomEvent('confirm', {
                    detail: {
                        title: title,
                        message: message,
                        callback: () => {
                            resolve(true);
                            callback();
                        },
                        cancel: () => {
                            resolve(false);
                            cancel();
                        }
                    }
                }));
            });

            if (result) {
                evaluate();
            }
        });
    });
});