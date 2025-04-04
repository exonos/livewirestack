<div>
    <!-- STANDARD LABEL -->
    @if($label)
        <label class="block text-sm mb-1 font-medium text-gray-900 dark:text-white" for="{{ $id }}">
            {{ $label }}
        </label>
    @endif
    <div {{$attributes->class([
                'flex bg-gray-50 items-center dark:border-gray-700 border rounded-md my-2 border-gray-200 w-full focus-within:ring-1 focus-within:ring-blue-500 focus-within:border-blue-500 overflow-hidden dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white',
                'border-dashed' => $attributes->has('readonly'),
                'bg-danger-50 border-danger-500 text-danger-900 placeholder-danger-400 focus:ring-danger-500 focus:border-danger-500 dark:text-danger-500 dark:placeholder-danger-500 dark:border-danger-500' => $errors->has($modelName()),
            ])}}>
        <input
                x-data="{ value: null, input: null}"
                x-ref="input"
                x-init="input = window.intlTelInput($refs.input, {
                showSelectedDialCode: true,
                initialCountry: 'mx',
                autoInsertDialCode: true,
                containerClass: 'w-full',
                countrySearch: false,
                useFullscreenPopup: true,
                geoIpLookup: function(callback) {
                  fetch('https://ipapi.co/json')
                     .then(function(res) { return res.json(); })
                     .then(function(data) { callback(data.country_code); })
                     .catch(function() { callback(); });
                  },
                  utilsScript: '/intl-tel-input/build/js/utils.js',
                });
                $refs.input.addEventListener('change', () => {
                if(input.isValidNumber()){
                    @this.set('{{$modelName}}', $refs.input.value.replace(/\s/g, ''));
                    @this.set('country', input.getSelectedCountryData());
                   }
                });
               "
                placeholder="{{$placeholder}}"
                class="{{$getWidth()}} border-none outline-none dark:text-white border-transparent bg-transparent text-gray-900 block w-full focus:outline-none focus:ring-0 group-hover:border-gray-400"
                type="tel"
        />
    </div>
    <!-- ERROR -->
    @error($modelName())
    <p class="mt-1 text-sm text-danger-600 dark:text-danger-500">{{ $message }}</p>
    @enderror

    <!-- HINT -->
    @if($hint)
        <p class="block mt-1 text-gray-500 text-xs">
            {{ $hint }}
        </p>
    @endif
</div>

@push('livewirestack-scripts')
    <link rel="stylesheet" href="/intl-tel-input/build/css/intlTelInput.css">
    <script src="/intl-tel-input/build/js/intlTelInput.min.js"></script>
@endpush


