<?php

use Exonos\Livewirestack\Components\Button;
use Exonos\Livewirestack\Components\Checkbox;
use Exonos\Livewirestack\Components\Confirmation;
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
    | Default Theme Variants
    |--------------------------------------------------------------------------
    | Control the default theme for components.
    */
    'theme' => [
        'password' => [
            'size' =>  'md', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'input' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'textarea' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'checkbox' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'select' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'tags' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'number' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'datetime-picker' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'ratio-labels' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'file' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'button' => [
            'size' =>  [
                'default' => 'sm',
                'xs' => 'px-2 h-6 text-xs',
                'sm' => 'px-3 py-[6px] text-xs',
                'md' => 'px-5 py-2.5 text-sm',
                'lg' => 'px-5 py-3 text-base',
                'xl' => 'px-6 py-3.5 text-base',
            ],
            'theme' => 'flat', //options: flat, default, filled
            'variant_classes' => [
                'default' => 'black',
                'primary' => 'text-white bg-primary-700 hover:bg-primary-800 border-transparent dark:bg-primary-600 dark:hover:bg-primary-700',
                'transparent' => 'text-gray-500 bg-transparent',
                'danger' => 'text-white bg-danger-500 hover:bg-danger-700 dark:bg-danger-600 dark:hover:bg-danger-700',
                'info' => 'text-white bg-blue-600 hover:bg-blue-700',
                'black' => 'text-white bg-gray-800 hover:bg-gray-900 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-gray-700',
                'green' => 'text-white bg-green-700 hover:bg-green-800 dark:bg-green-600 dark:hover:bg-green-700',
                'yellow' => 'text-white bg-yellow-500 hover:bg-yellow-600',
                'purple' => 'text-white bg-purple-700 hover:bg-purple-800 dark:bg-purple-600 dark:hover:bg-purple-700',
            ]
        ],
        'phone' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'dropdown' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'toggle' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
        'trix' => [
            'size' =>  'sm', //options: sm, md, lg
            'theme' => 'flat', //options: flat, default, filled
        ],
    ],

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
                    'fullscreen' => 'fullscreen',
                ],
            ],
        ]
    ],


    /*
    |--------------------------------------------------------------------------
    | Component List
    |--------------------------------------------------------------------------
    | you can override the name of components here
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
        'confirmation' => Confirmation::class,
        'sideover' => Sideover::class,
        'trix' => Trix::class,
    ],
];
