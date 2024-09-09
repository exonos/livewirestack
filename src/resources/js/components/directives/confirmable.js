document.addEventListener('alpine:init', () => {
    Alpine.directive('confirmable', (el, { expression }, { evaluate, cleanup }) => {
        let isClickable = true;

        // Parsear la expresión de la directiva
        const parseExpression = (expr) => {
            const regex = /([^,]+)(?:,\s([^,]*))?(?:,\s([^,]*))?(?:,\s([^,]*))?/;
            const match = expr.match(regex);
            return {
                title: match[1]?.trim() || 'Are you sure?',
                message: match[2]?.trim() || 'Do you want to proceed?',
                callback: match[3] ? () => eval(match[3]) : () => {},
                cancel: match[4] ? () => eval(match[4]) : () => {}
            };
        };

        const { title, message, callback, cancel } = parseExpression(expression);

        const onClick = async (e) => {
            e.preventDefault();
            e.stopImmediatePropagation();

            if (!isClickable) return;
            isClickable = false;

            // Crear la promesa para el diálogo de confirmación
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

            // Restaurar el estado de clickeo
            setTimeout(() => {
                isClickable = true;
            }, 1000);
        };

        el.addEventListener('click', onClick, { capture: true });

        cleanup(() => {
            el.removeEventListener('click', onClick);
        });
    });
});
