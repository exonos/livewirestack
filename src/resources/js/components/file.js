import {error, warning} from "../helpers";

/**
 * @param model {Object|String} - The model object or the value
 * @param multiple {Boolean} - If true, the select will be multiple
 */
export default (
    model = null,
    multiple = false
) => ({
    model: model,
    imageUrl: '',
    multiple: multiple,
    isDropping: false,
    isUploading: false,
    progress: 0,
    async init() {
        if (this.model === undefined) {
            return error('The [wire:model] is undefined');
        }
        if (this.multiple && this.model && this.model.constructor !== Array) {
            return warning('The [wire:model] must be an array');
        }

        this.$watch('model', (value, old) => {
            // When the value is null we clear the select. This is necessary due
            // situations where we are binding the same model in live entangle
            if (value === null) {
                this.reset(true);
                return;
            }

            if (this.internal) {
                this.internal = false;
                return;
            }

            if (!value || value === old) {
                return;
            }
        });
    },
    handleFileSelect(event) {
        if (event.target.files.length) {
            this.uploadFiles(event.target.files)
        }
    },
    handleFileDrop(event) {
        if (event.dataTransfer.files.length > 0) {
            this.uploadFiles(event.dataTransfer.files)
        }
    },
    uploadFiles(file) {
        const $this = this;
        $this.isUploading = true
        console.log(this.model)
        this.$wire.uploadCustom(this.model, file, function(success) {
            $this.isUploading = false
            $this.progress = 0
            $this.model = success.target.files
            console.log('success', success)
        }, function (error) {
            console.log('error', error)
        }, function (event) {
            $this.progress = event.detail.progress
            console.log('progress',$this.progress)
        })
    },
    removeUpload(filename) {
        this.removeUpload(this.model, filename)
    },
});
