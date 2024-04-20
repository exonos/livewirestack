<?php

namespace Exonos\Livewirestack\Traits\Builder;

trait Validation
{
    protected array $rules = [];
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * El valor es requerido.
     *
     * @return $this
     */
    public function required(): static
    {
        $this->rules[$this->property][] = 'required';

        return $this;
    }

    /**
     * El valor ingresado debe ser verdadero (on).
     *
     * @return $this
     */
    public function accept(): static
    {
        $this->rules[$this->property][] = 'accepted';

        return $this;
    }

    /**
     * Debe ser una URL.
     *
     * @return $this
     */
    public function activeUrl(): static
    {
        $this->rules[$this->property][] = 'active_url';

        return $this;
    }

    /**
     * Formato de Correo Electrónico.
     *
     * @param  string  $validator
     * @return $this
     */
    public function email(string $validator = 'rfc'): static
    {
        $this->rules[$this->property][] = 'email:'.$validator;

        return $this;
    }

    /**
     * Deben ser letras.
     *
     * @return $this
     */
    public function alpha(): static
    {
        $this->rules[$this->property][] = 'alpha';

        return $this;
    }

    public function alphaDash(): static
    {
        $this->rules[$this->property][] = 'alpha_dash';

        return $this;
    }

    /**
     * Existen diferentes soluciones para limitar el tamaño, las cadenas, los números y las letras.
     *
     * @param  int  $size
     * @return $this
     */
    public function size(int $size): static
    {
        $this->rules[$this->property][] = 'size:'.$size;

        return $this;
    }

    /**
     * Esta funcion define las reglas de validacion principalmente para compensar el problema de la encapsulación incompleta,
     * por ejemplo, las que no se usan comúnmente no se encapsularán, puedes complementarlas mediante este método.
     *
     * @param  array  $rules
     * @return $this
     */
    public function rules(array $rules = []): static
    {
        $this->rules[$this->property] = array_merge($this->rules[$this->property] ?? [], $rules);

        return $this;
    }
}
