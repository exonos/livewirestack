<?php

namespace Exonos\Livewirestack\Resolvers;

abstract class Resolver
{
    protected $componentClass;

    protected $properties;

    public function __construct($componentClass, $properties)
    {
        $this->componentClass = $componentClass;
        $this->properties = $properties;
    }

    abstract public function handle();
}
