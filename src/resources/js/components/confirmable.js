export default () => ({
    open: false,
    callback: null,
    arguments: [],
    config: { title: 'Are you sure?', message: '' },

    setConfirm(event) {
        this.config = event.detail || { title: 'Are you sure?', message: '' };
        this.callback = event.detail.callback;
        this.arguments = event.detail.arguments || [];
        this.open = true;
    },

    yesConfirm() {
        this.open = false;
        if (typeof this.callback === 'function') {
            this.callback(...this.arguments);
        }
    },

    closeConfirm() {
        this.open = false;
        this.callback = null;
        this.arguments = [];
    }
});
