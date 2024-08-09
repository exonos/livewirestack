<?php

namespace Exonos\Livewirestack\Resolvers;

use ReflectionClass;
use ReflectionProperty;
use ReflectionUnionType;

class EnumPropertyResolver extends Resolver
{
    public function handle(): array
    {
        if (PHP_VERSION_ID < 80100) {
            return $this->properties;
        }

        $reflection = new ReflectionClass($this->componentClass);
        $resolveEnumProperties = collect($reflection->getProperties())
            ->filter(function (ReflectionProperty $property) {
                return isset($this->properties[$property->getName()]);
            })
            ->reject(function (ReflectionProperty $property) {
                return $property->getType() instanceof ReflectionUnionType;
            })
            ->filter(function (ReflectionProperty $property) {
                return $property->getType()?->getName() && enum_exists($property->getType()->getName());
            })->mapWithKeys(function (ReflectionProperty $property) {
                return [$property->getName() => $property->getType()->getName()::tryFrom($this->properties[$property->getName()])];
            });

        return collect($this->properties)->merge($resolveEnumProperties)->toArray();
    }
}
