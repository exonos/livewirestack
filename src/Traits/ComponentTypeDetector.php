<?php

namespace Exonos\Livewirestack\Traits;

use Exonos\Livewirestack\Contracts\BehavesAsSlideOver;
use Illuminate\Support\Arr;
use ReflectionClass;
use UnexpectedValueException;
use Exonos\Livewirestack\Contracts\BehavesAsModal;

trait ComponentTypeDetector
{
    public function config($key, $default = null)
    {
        $type = self::determineComponentType();

        return Arr::get(
            array_merge(
                config("livewirestack.livewire.presets.{$type}", []),
                config("livewirestack.livewire.components.{$type}", [])
            ),
            $key,
            $default,
        );
    }

    private static function determineComponentType(): string
    {
        $interfaces = (new ReflectionClass(static::class))->getInterfaceNames();

        if (in_array(BehavesAsModal::class, $interfaces, true)) {
            return 'modal';
        }

        if (in_array(BehavesAsSlideOver::class, $interfaces, true)) {
            return 'slide-over';
        }

        throw new UnexpectedValueException('Could not determine component type.');
    }
}
