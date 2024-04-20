<?php

namespace Exonos\Livewirestack\Traits\Builder;

use Exonos\Livewirestack\Components\Builder\Component;
use Exonos\Livewirestack\Components\Builder\Container;
use Illuminate\Validation\ValidationException;
use Livewire\Exceptions\PropertyNotFoundException;
use ReflectionException;
use ReflectionProperty;

trait HasFormTrait
{
    public bool $disableSubmitBtn = true;

    /**
     * Anule el método get. Si el método principal puede obtener los datos, utilice el método principal.
     * Si el método principal no puede obtenerlo y la propiedad es el valor del campo especificado, se utilizará su propio método.
     *
     * @throws PropertyNotFoundException
     */
    public function __get($property)
    {
        try {
            return parent::__get($property);
        } catch (PropertyNotFoundException $e) {
            if ($property == 'form') {
                return Container::make($this);
            }
            throw $e;
        }
    }

    /**
     * Los eventos de actualización son principalmente para la verificación de llamadas sincrónicas. Esta verificación es principalmente para la verificación de variables transmitidas de forma transparente.
     * Sin embargo, esto equivale a verificar dos veces. Puedes considerar optimizar este aspecto.
     *
     * Aquí también se implementa una lógica de botón personalizada si se pasan todas las verificaciones.，
     * Hará que el valor de la variable $disableSubmitBtn sea falso，
     * De lo contrario, $disableSubmitBtn es verdadero. Esta variable puede controlar si se puede hacer clic en el botón en la parte frontal.
     *
     * @param $name
     * @param $value
     * @return void
     */
    public function updateEvent($name, $value): void
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
            $allRules = $this->rules();
            if ($allRules) {
                try {
                    $this->validateOnly($name);
                } catch (ValidationException $e) {
                    $this->disableSubmitBtn = true;
                    throw $e;
                }

                try {
                    $this->validate();
                } catch (ValidationException $e) {
                    $this->disableSubmitBtn = true;
                    throw $e;
                }
            }

            $this->disableSubmitBtn = false;
        }
    }

    protected function getListeners(): array
    {
        return ['updateEvent' => 'updateEvent'];
    }

    /**
     * Obtener las condiciones de validación del componente, devueltas por el componente construido.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        /**
         * @var Component $component
         */
        foreach ($this->getForm() as $component) {
            if (method_exists($component, 'getRules'))
            {
                $componentRules = $component->getRules();
                foreach ($componentRules as $index => $componentRule) {
                    $rules[str_replace('value', $component->getProperty(), $index)]
                        = $componentRule;
                }
            }

        }

        return $rules;
    }

    /**
     * Se utiliza aquí para verificar y mostrar el mensaje de error del valor inicial durante la inicialización.。
     * Si necesita implementar un método de montaje en su componente en el futuro y necesita inicializarlo para verificar el error, puede copiar este método y luego implementar su propia lógica..
     *
     * @return void
     *
     * @throws ReflectionException
     */
    public function mount(): void
    {
        if ($allRules = $this->rules()) {
            $needValidateRules = [];
            foreach ($allRules as $key => $rule) {
                $rp = new ReflectionProperty(get_class($this), $key);
                if ($rp->isInitialized($this) && $this->$key) {
                    $needValidateRules[$key] = $rule;
                }
            }
            if ($needValidateRules) {
                $this->validate($needValidateRules);
            }
        }
    }

    abstract public function getForm(): array;
}
