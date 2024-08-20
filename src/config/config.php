<?php

use Exonos\Livewirestack\Components\Button;
use Exonos\Livewirestack\Components\Checkbox;
use Exonos\Livewirestack\Components\DatetimePicker;
use Exonos\Livewirestack\Components\Dropdown;
use Exonos\Livewirestack\Components\Editor;
use Exonos\Livewirestack\Components\Errors;
use Exonos\Livewirestack\Components\File;
use Exonos\Livewirestack\Components\Input;
use Exonos\Livewirestack\Components\Lottie;
use Exonos\Livewirestack\Components\Modal;
use Exonos\Livewirestack\Components\NotificationBase;
use Exonos\Livewirestack\Components\Number;
use Exonos\Livewirestack\Components\Password;
use Exonos\Livewirestack\Components\Phone;
use Exonos\Livewirestack\Components\RatioLabel;
use Exonos\Livewirestack\Components\Select;
use Exonos\Livewirestack\Components\Sideover;
use Exonos\Livewirestack\Components\Tags;
use Exonos\Livewirestack\Components\Textarea;
use Exonos\Livewirestack\Components\Toggle;
use Exonos\Livewirestack\Components\Tooltip;
use Exonos\Livewirestack\Components\Trix;
use Exonos\Livewirestack\Components\Wizard;
use Exonos\Livewirestack\Components\Popover;

return [

    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    | Control a prefix for the components, default is empty.
    |
    | prefix => ''
    |   <x-button />
    |   <x-card />
    |
    | Renaming all components:
    | prefix => 'ui-'
    |   <x-ui-button />
    |   <x-ui-card />
    |
    | Make sure to clear view cache after renaming
    | php artisan view:clear
    |
    */
    'prefix' => null,


    /*
    |--------------------------------------------------------------------------
    | Livewire components
    |--------------------------------------------------------------------------
    | Control the livewire components.
    |
    */

    'livewire' => [
        'components' => [
            'modal' => [
                'view' => 'livewirestack::livewire.modal',
                'placeholder' => 'livewirestack::placeholder',
                'property-resolvers' => [
                    \Exonos\Livewirestack\Resolvers\EnumPropertyResolver::class,
                ],
                'default-behavior' => [
                    'close-on-escape' => true,
                    'close-on-backdrop-click' => true,
                    'trap-focus' => true,
                    'remove-state-on-close' => false,
                ],
                'default-attributes' => [
                    'size' => 'lg',
                ],
            ],
            'slide-over' => [
                'view' => 'livewirestack::livewire.slideover',
                'placeholder' => 'livewirestack::placeholder',
                'property-resolvers' => [
                    \Exonos\Livewirestack\Resolvers\EnumPropertyResolver::class,
                ],
                'default-behavior' => [
                    'close-on-escape' => true,
                    'close-on-backdrop-click' => true,
                    'trap-focus' => true,
                    'remove-state-on-close' => false,
                ],
                'default-attributes' => [
                    'size' => 'md',
                ],
            ]
        ],
        'presets' => [
            'modal' => [
                'size-map' => [
                    'xs' => 'max-w-xs',
                    'sm' => 'max-w-sm',
                    'md' => 'max-w-md',
                    'lg' => 'max-w-lg',
                    'xl' => 'max-w-xl',
                    '2xl' => 'max-w-2xl',
                    '3xl' => 'max-w-3xl',
                    '4xl' => 'max-w-4xl',
                    '5xl' => 'max-w-5xl',
                    '6xl' => 'max-w-6xl',
                    '7xl' => 'max-w-7xl',
                    'fullscreen' => 'fullscreen',
                ],
            ],
            'slide-over' => [
                'size-map' => [
                    'xs' => 'max-w-xs',
                    'sm' => 'max-w-sm',
                    'md' => 'max-w-md',
                    'lg' => 'max-w-lg',
                    'xl' => 'max-w-xl',
                    '2xl' => 'max-w-2xl',
                    '3xl' => 'max-w-3xl',
                    '4xl' => 'max-w-4xl',
                    '5xl' => 'max-w-5xl',
                    '6xl' => 'max-w-6xl',
                    '7xl' => 'max-w-7xl',
                ],
            ],
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Component List
    |--------------------------------------------------------------------------
    |
    | List of components.
    */
    'components' => [
        'password' => Password::class,
        'input' => Input::class,
        'textarea' => Textarea::class,
        'checkbox' => Checkbox::class,
        'select' => Select::class,
        'tags' => Tags::class,
        'number' => Number::class,
        'datetime-picker' => DatetimePicker::class,
        'ratio-labels' => RatioLabel::class,
        'file' => File::class,
        'button' => Button::class,
        'phone' => Phone::class,
        'modal' => Modal::class,
        'lottie' => Lottie::class,
        'wizard' => Wizard::class,
        'dropdown' => Dropdown::class,
        'errors' => Errors::class,
        'toggle' => Toggle::class,
        'editor' => Editor::class,
        'popover' => Popover::class,
        'tooltip' => Tooltip::class,
        'notification' => NotificationBase::class,
        'sideover' => Sideover::class,
        'trix' => Trix::class,
    ],
];
