<?php

namespace Exonos\Livewirestack\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Mechanisms\ComponentRegistry;
use Exonos\Livewirestack\Traits\ComponentTypeDetector;

abstract class Component extends \Livewire\Component
{
    use ComponentTypeDetector;

    public function close($withForce = false, mixed $andEmit = [], mixed $andDispatch = [], mixed $andForget = []): void
    {
        $this->dispatchForget($andForget);
        $this->dispatchCloseEvents(Arr::wrap($andEmit));
        $this->dispatchCloseEvents(Arr::wrap($andDispatch));
        $this->dispatch(self::determineComponentType().'.close', force: $withForce);
    }

    /**
     * @deprecated
     */
    private function emitForget($components)
    {
        $this->dispatchForget($components);
    }

    private function dispatchForget($components)
    {
        $components = collect(Arr::wrap($components));

        $components->map(function ($component, $parameters) {
            if (is_array($component)) {
                $c = $parameters;
                $p = $component;
            } else {
                $c = $component;
                $p = is_array($parameters) ? $parameters : [];
            }

            $componentName = app(ComponentRegistry::class)->getName($c);

            $this->dispatch($c::determineComponentType().'.forget', name: $componentName, parameters: blank($p) ? false : $p);
        });
    }

    /**
     * @deprecated
     */
    private function emitCloseEvents($events): void
    {
        $this->dispatchCloseEvents($events);
    }

    private function dispatchCloseEvents($events): void
    {
        foreach ($events as $component => $event) {
            if (is_string($event)) {
                $this->dispatch($event);
            }

            if (is_string($component) && is_array($event)) {

                if (Str::of($component)->startsWith(config('livewire.class_namespace'))) {
                    [$event, $params] = $event;
                    $componentName = app(ComponentRegistry::class)->getName($component);
                    $this->dispatch($event, ...$params ?? [])->to($componentName);
                } else {
                    $params = $event;
                    $event = $component;

                    $this->dispatch($event, ...$params ?? []);
                }
            }
        }
    }

    protected function getEventsAndHandlers()
    {
        return collect($this->getListeners())
            ->mapWithKeys(function ($value, $key) {
                $key = is_numeric($key) ? $value : $key;

                return [$key => $value];
            })->toArray();
    }

    public static function behavior(): array
    {
        return [];
    }

    public static function attributes(): array
    {
        return [];
    }

    public static function config($key)
    {
        $type = self::determineComponentType();
        $default = config('livewirestack.default');

        return config("livewirestack.presets.{$default}.{$type}.{$key}");
    }
}
