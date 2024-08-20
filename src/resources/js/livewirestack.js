import select from './components/select';
import fileUpload from './components/file';
import tags from './components/tags';
import toastBase from './components/toast-base.js';
import toastLoop from './components/toast-loop.js';
import mask from '@alpinejs/mask'
import number from './components/number';
import './components/overlay';
import pincode from './components/pincode.js';
import { create } from '@lottiefiles/lottie-interactivity';
import lottie from 'lottie-web'
import './globals/globals';
import './components/rich-text';
import AlpineFloatingUI from "./alpine/FloatingUI/index";

document.addEventListener('alpine:init', () => {
    window.Alpine.data('ui_select', select);
    window.Alpine.data('ui_tags', tags);
    window.Alpine.data('ui_number', number);
    window.Alpine.data('ui_file', fileUpload);
    window.Alpine.data('toast_base', toastBase);
    window.Alpine.data('toast_loop', toastLoop);
    window.Alpine.data('ui_pincode', pincode);
    window.Alpine.data('lottie', lottie);
    window.Alpine.data('create', create);
    window.Alpine.data('create', create);
    window.Alpine.plugin(AlpineFloatingUI);
    window.lottie = lottie;
    window.create = create;
    window.Alpine.plugin(mask);
});
