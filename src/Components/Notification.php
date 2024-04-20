<?php

namespace Exonos\Livewirestack\Components;

use Exonos\Livewirestack\Traits\DispatchInteraction;
use Exonos\Livewirestack\Traits\InteractWithConfirmation;

class Notification extends AbstractInteraction
{
    use DispatchInteraction;
    use InteractWithConfirmation;

    protected array $data = [];
    protected ?bool $expand = null;

    protected ?int $timeout = 3;

    public function error(string $title, ?string $description = null): self
    {
        $this->data = [
            'type' => 'error',
            'title' => $title,
            'description' => $description,
        ];

        return $this;
    }

    public function info(string $title, ?string $description = null): self
    {
        $this->data = [
            'type' => 'info',
            'title' => $title,
            'description' => $description,
        ];

        return $this;
    }

    public function question(string $title, ?string $description = null): self
    {
        $this->data = [
            'type' => 'question',
            'title' => $title,
            'description' => $description,
        ];

        return $this;
    }

    public function success(string $title, ?string $description = null): self
    {
        $this->data = [
            'type' => 'success',
            'title' => $title,
            'description' => $description,
        ];

        return $this;
    }

    public function timeout(int $seconds): self
    {
        $this->timeout = $seconds;

        return $this;
    }

    public function warning(string $title, ?string $description = null): self
    {
        $this->data = [
            'type' => 'warning',
            'title' => $title,
            'description' => $description,
        ];

        return $this;
    }

    protected function additional(): array
    {
        return [
            'expandable' => $this->expand ??  false,
            'timeout' => $this->timeout,
        ];
    }

    protected function event(): string
    {
        return 'toast';
    }


    protected function messages(): array
    {
        return [
            'Confirmar',
            'Cancelar'
        ];
    }
}
