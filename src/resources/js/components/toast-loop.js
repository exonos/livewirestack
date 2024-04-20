import {event} from '../helpers';

export default (toast) => ({
    toast: toast,
    show: false,
    expanded: false,
    init() {
        let paused = false;
        let elapsed = 0;
        const time = this.toast.timeout * 10;
        const max = this.toast.timeout * 1000;

        this.$nextTick(() => {
            this.show = true;

            const interval = setInterval(() => {
                if (!this.show) {
                    clearInterval(interval);
                } else if (!paused) {
                    elapsed += time;
                    if (elapsed >= max) {
                        this.hide(true);
                        event('toast:timeout', this.toast, false);
                        clearInterval(interval);
                    }
                }
            }, time);

            const progress = this.$refs.progress;


            this.$refs.toast.addEventListener('mouseover', () => {
                paused = true;
                progress.style.animationPlayState = 'paused';
            });

            this.$refs.toast.addEventListener('mouseout', () => {
                paused = false;
                progress.style.animationPlayState = 'running';
            });
        });
    },
    accept(toast) {
        event('toast:accepted', toast, false);

        if (toast.options.confirm.static === true || toast.options.confirm.method === null) {
            return this.hide();
        }

        Livewire.find(toast.component)
            .call(toast.options.confirm.method, toast.options.confirm.params);

        this.hide();
    },
    reject(toast) {
        event('toast:rejected', toast, false);

        if (toast.options.cancel.static === true || toast.options.cancel.method === null) {
            return this.hide();
        }

        Livewire.find(toast.component)
            .call(toast.options.cancel.method, toast.options.cancel.params);

        this.hide();
    },
    hide(immediately = true) {
        setTimeout(() => {
            this.show = false;
            this.remove(this.toast);
        }, immediately ? 0 : this.toast.timeout * 100);
    },
});
