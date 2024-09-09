document.addEventListener('alpine:init', () => {
    Alpine.directive('confirmable', (el, { expression }, { evaluate }) => {
        // Extrae parámetros opcionales de la expresión
        let params = expression.split(',').map(param => param.trim());
        let title = params[0] || 'Are you sure?';
        let message = params[1] || 'Are you sure you want to proceed?';
        let callbackStr = params[2] || '() => {}';
        let cancelStr = params[3] || '() => {}';

        let callback = new Function('return ' + callbackStr)();
        let cancel = new Function('return ' + cancelStr)();

        el.addEventListener('click', async () => {
            let result = await new Promise(resolve => {
                window.dispatchEvent(new CustomEvent('confirm', {
                    detail: {
                        title: title,
                        message: message,
                        callback: () => {
                            resolve(true);
                            callback.call(el.__x); // Llama al callback en el contexto de Alpine
                        },
                        cancel: () => {
                            resolve(false);
                            cancel.call(el.__x); // Llama al cancel en el contexto de Alpine
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