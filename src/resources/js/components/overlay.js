document.addEventListener('alpine:init', () => {
    let overlayComponentDirective = ({ el, directive, component, cleanup }) => {

        let onClick;
        let isClickable = true;
        const regex = /([^,]+)(?:,\s([^;]+))?/;
        const match1 = directive.expression.match(regex);
        const overlayType = directive.value;

        const overlayComponent = match1[1].trim();
        const overlayArguments = match1[2] ? match1[2].trim() : '{}';

        if (overlayComponent === 'close') {
            onClick = e => {
                e.preventDefault();
                e.stopImmediatePropagation();

                if (!isClickable) return;

                isClickable = false;

                Livewire.dispatch(`${overlayType}.close`, Alpine.evaluate(el, overlayArguments));

                setTimeout(() => {
                    isClickable = true;
                }, 1000);
            }
        } else {
            onClick = e => {
                e.preventDefault();
                e.stopImmediatePropagation();

                if (!isClickable) return;

                isClickable = false;

                Livewire.dispatch(`${overlayType}.open`, {
                    component: overlayComponent,
                    arguments: Alpine.evaluate(el, overlayArguments)
                });

                setTimeout(() => {
                    isClickable = true;
                }, 1000);
            }
        }

        el.addEventListener('click', onClick, { capture: true });

        cleanup(() => {
            el.removeEventListener('click', onClick);
        });
    };


    Livewire.directive('modal', overlayComponentDirective);

    Livewire.directive('slide-over', overlayComponentDirective);

    Alpine.store('livewirestackOverlay', {
        history: [],

        trackHistory(id, type, name, parameters) {
            this.history.push({id: id, type: type, name: name, parameters: parameters});
        },

        clearHistory() {
            this.history = [];
        },

        forgetComponent(type, name, parameters) {
            this.history = this.history.filter(function (component) {

                if (component.type !== type) {
                    return true;
                }

                if (component.name !== name) {
                    return true;
                }

                if (parameters !== false && JSON.stringify(component.parameters) !== JSON.stringify(parameters)) {
                    return true;
                }

                return false;
            });
        }
    })
});

window.livewirestackOverlay = (config) => {
    return {
        type: config.type,
        open: false,
        onTop: true,
        activeComponent: false,
        showActiveComponent: false,
        activeComponentWidth: false,
        animationOverlapDuration: config.animationOverlapDuration,
        transitionFromDifferentType: false,
        store: Alpine.store('livewirestackOverlay'),
        listeners: [],
        init() {
            this.registerListeners();
        },
        getActiveComponentName() {
            if (this.$wire.get('components')[this.activeComponent] !== undefined) {
                return this.$wire.get('components')[this.activeComponent]['name'];
            }
        },
        getActiveComponentParameters() {
            if (this.$wire.get('components')[this.activeComponent] !== undefined) {
                return this.$wire.get('components')[this.activeComponent]['parameters'];
            }
        },
        getElementBehavior(key) {
            if (this.$wire.get('components')[this.activeComponent] !== undefined) {
                return this.$wire.get('components')[this.activeComponent]['element-behaviors'][key];
            }
        },
        getElementAttribute(key) {
            if (this.$wire.get('components')[this.activeComponent] !== undefined) {
                return this.$wire.get('components')[this.activeComponent]['element-attributes'][key];
            }
        },
        closeIf(closeBehavior) {
            if (this.getElementBehavior(closeBehavior) && this.onTop === true) {
                Livewire.dispatch(`${this.type}.close`);
            }
        },
        setActiveComponent(id) {
            if (this.activeComponent === id && this.transitionFromDifferentType === false) {
                this.open = true;
                return;
            }

            this.open = true;

            if (this.transitionFromDifferentType === false) {
                this.showActiveComponent = !this.activeComponent;
            }
            if (this.transitionFromDifferentType === true && this.activeComponent === id) {
                this.showActiveComponent = true;
            }
            if (this.transitionFromDifferentType === true && this.activeComponent !== id) {
                this.showActiveComponent = false;
            }

            this.transitionFromDifferentType = false;

            setTimeout(() => {
                this.activeComponent = id;
                this.showActiveComponent = true;
                this.activeComponentWidth = this.getElementAttribute('size');

                this.store.trackHistory(id, this.type, this.getActiveComponentName(), this.getActiveComponentParameters());
            }, (this.activeComponent !== false) ? this.animationOverlapDuration : 0);
        },
        closeActiveComponent() {
            Livewire.dispatch(`${this.type}.closing`, this.activeComponent);

            this.open = false;

            this.store.history.pop();
            let previousOverlayComponent = this.store.history[this.store.history.length - 1];

            if (previousOverlayComponent !== undefined && (previousOverlayComponent?.id !== this.activeComponent)) {
                this.store.history.pop();
                Livewire.dispatch(`${previousOverlayComponent.type}.componentActivated`, {id: previousOverlayComponent.id});
                Livewire.dispatch(`${this.type}.closed`, {options: {reset: false}});
                return;
            }

            setTimeout(() => {
                this.activeComponent = false;
                this.showActiveComponent = false;
                this.activeComponentWidth = false;
            }, (this.activeComponent !== false) ? this.animationOverlapDuration : 0);

            Livewire.dispatch(`${this.type}.closed`);
        },
        registerListeners() {
            this.listeners.push(
                Livewire.on(`${this.type}.close`, (options) => {
                    if ((options?.force ?? false) === true) {
                        this.store.clearHistory();

                        Livewire.dispatch('modal.close');
                        Livewire.dispatch('slide-over.close');
                    }

                    if ((options?.force ?? false) === false) {
                        this.closeActiveComponent();
                    }
                })
            );

            this.listeners.push(
                Livewire.on(`${this.type}.forget`, (component) => {
                    this.store.forgetComponent(this.type, component.name, component.parameters);
                })
            );

            this.listeners.push(
                Livewire.on(`${this.type}.closing`, (component) => {
                    if (this.getElementBehavior('remove-state-on-close') === true) {
                        setTimeout(() => {
                            this.$wire.call('removeComponentFromState', component);
                        }, 500);
                    }
                })
            );

            this.listeners.push(
                Livewire.on(`${this.type}.closed`, (event) => {
                    if ((event?.options?.reset ?? true)) {
                        setTimeout(() => {
                            this.activeComponent = false;
                            this.$wire.resetState();
                        }, 300);
                    }

                    Livewire.dispatch('overlayComponentClosed', this.type);
                })
            );

            this.listeners.push(
                Livewire.on(`${this.type}.componentActivated`, ({id}) => {
                    Livewire.dispatch('overlayComponentActivated', this.type);
                    this.setActiveComponent(id);
                })
            );

            this.listeners.push(
                Livewire.on(`overlayComponentActivated`, (type) => {
                    setTimeout(() => {
                        this.onTop = this.type === type;
                        this.transitionFromDifferentType = this.type !== type;
                    }, (this.activeComponent !== false && this.type !== type) ? this.animationOverlapDuration+150 : 0);
                })
            );

            this.listeners.push(
                Livewire.on(`overlayComponentClosed`, (type) => {
                    if (this.type !== type && this.open && this.transitionFromDifferentType === true && this.store.history.length === 0) {
                        Livewire.dispatch(`${this.type}.close`);
                    }
                    setTimeout(() => {
                        this.onTop = (this.transitionFromDifferentType === false);
                    }, (this.activeComponent !== false) ? this.animationOverlapDuration : 0);
                })
            );
        },
        destroy() {
            this.listeners.forEach((listener) => {
                listener();
            });
        },
    };
};
