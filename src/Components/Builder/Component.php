<?php

namespace Exonos\Livewirestack\Components\Builder;

use Exonos\Livewirestack\Traits\Builder\Validation;
use Illuminate\View\Component as BaseComponent;
use Illuminate\View\ComponentSlot;

abstract class Component extends BaseComponent
{
    use Validation;
    public function __construct(
        public ?string $property = null,
        public ?bool $required = false,
        public string|null|ComponentSlot $corner = null,
        public ?string $id = null,
        public ?string $type = 'text',
        public ?string $placeholder = null,
        public ?string $hint = null,
        public ?string $prefix = null,
        public ?string $width = 'md',
        public string|null|ComponentSlot $append = null,
        public string|null|ComponentSlot $prepend = null,
        public string|null|ComponentSlot $suffix = null,
        public string|null|ComponentSlot $label = null,
        public ?array $data = []
    )
    {
        $this->setName();
        $this->id = is_null($this->id) ? md5(serialize($this)) : $this->id;
        $this->setParams($this->data);
    }

    public function getWidth()
    {
        if ($this->attributes->has('width'))
        {
            $this->width = $this->attributes->whereStartsWith('width')->first();
        }

        return [
            'sm' => 'p-2 text-xs',
            'md' => 'p-2.5 text-sm',
            'lg' => 'p-3 text-md',
        ][$this->width ?? 'md'];
    }



    /**
     * Definicio de los parametros del builder
     * Esta funcion es requerida para que el builder dinamico pueda definir los paramtros
     * para cada propiedad pasado dinamicamente desde el x-dynamic-component
     */
    protected function setParams($data)
    {
        if (!empty($this->attributes))
        {
            foreach($this->attributes as $attribute)
            {
                if ($this->attributes->has($attribute))
                {
                    $this->$attribute  = $attribute;
                }
            }
        }



        foreach ($data as $key => $value)
        {
            $this->$key = $value;
        }
    }

    /**
     * Definicion del nombre que llevara el componente
     * Esta funcion obtiene el nombre definido en la configuracion del paquete para nombrarla y renderizarla donamicamente en el builder
     */
    public function setName()
    {
        return $this->withName(collect(config('livewirestack.components'))->search($this::class));
    }

    /**
     * Constructor manual del componente
     * Esta funcion permite construir el componente desde otros lugares de la aplicacion
     * permitiendo definir la propiedad que ligara al componente, por ejemplo Input::make('email')
     */
    public static function make($property): static
    {
        return new static($property);
    }


    /**
     * Constructor de las reglas de validacion
     * Esta funcion permite construir las reglas de validacion
     */
    public function getProperty(): string
    {
        return $this->property;
    }

    /**
     * Constructor del placeholder
     * Esta funcion permite definir el placeholder
     */
    public function setPlaceholder($placeholder): static
    {
        $this->placeholder = $placeholder;

        return $this;
    }


    /**
     * Constructor del label
     * Permite definir la propiedad Label desde el builder
     */
    public function setlabel($label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Constructor del hint
     * Permite definir la propiedad Hint desde el builder
     */
    public function setHint($hint): static
    {
        $this->hint = $hint;

        return $this;
    }

    /**
     * Get the data that should be supplied to the view.
     *
     * @author Freek Van der Herten
     * @author Brent Roose
     *
     * @return array
     */
    public function props()
    {
        return $this->extractPublicProperties();
    }

    /**
     * Constructor del modelname
     * Permite definir la propiedad a ligar con livewire
     */
    public function modelName(): ?string
    {
        if ($this->attributes->has('wire:model') || $this->attributes->has('wire:model.live'))
        {
            return $this->attributes->whereStartsWith('wire:model')->first() ?? $this->attributes->whereStartsWith('wire:model.live')->first() ;
        }else{
            return $this->attributes->whereStartsWith('name')->first();
        }
    }

    public function entangleable(): ?string
    {
        if ($this->attributes->has('wire:model') || $this->attributes->has('wire:model.live'))
        {
            if ($this->attributes->has('wire:model'))
            {
                return '$wire.entangle("'.$this->modelName().'")';
            }
            if ($this->attributes->has('wire:model.live'))
            {
                return '$wire.entangle("'.$this->modelName().'").live';
            }
        }else{
            return '""';
        }
    }

    public function label(): string|null|ComponentSlot
    {
        return $this->attributes->has('label') ? $this->attributes->whereStartsWith('label')->first() : $this->label;
    }

    public function hint(): string|null|ComponentSlot
    {
        return $this->attributes->has('hint') ? $this->attributes->whereStartsWith('hint')->first() : $this->hint;
    }
}
