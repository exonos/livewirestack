<?php

namespace Exonos\Livewirestack\Foundation;

class ConfirmationModal extends Modal
{
    public mixed $callbackComponent;

    public array $prompt = [];

    public mixed $confirmPhrase = null;

    public mixed $confirmPhraseInput = null;

    public array $tableHeaders;

    public array $tableData;

    public mixed $theme;

    public array $metaData;

    public array $modalCloseArguments = [];

    public function mount($callbackComponent, array $prompt = [], array $tableHeaders = [], array $tableData = [], $confirmPhrase = null, $theme = 'warning', $metaData = [], $modalCloseArguments = [])
    {
        $this->callbackComponent = $callbackComponent;

        $this->prompt = array_merge([
            'title' => 'Are you absolutely sure?',
            'message' => 'Are you sure you want to execute this action?',
            'confirm' => 'Confirm',
            'cancel' => 'Cancel'
        ], $prompt);

        $this->confirmPhrase = $confirmPhrase;
        $this->tableHeaders = empty($tableHeaders) ? ['Resource', 'Count'] : $tableHeaders;
        $this->tableData = $tableData;
        $this->theme = $theme;
        $this->metaData = $metaData;
        $this->modalCloseArguments = $modalCloseArguments;
    }

    public function getMessages()
    {
        return [
            'confirmPhraseInput.in' => "Please enter $this->confirmPhrase to continue.",
        ];
    }

    public function getRules()
    {
        return [
            'confirmPhraseInput' => ['required_with:confirmPhrase', 'in:'.$this->confirmPhrase],
        ];
    }

    public function confirm()
    {
        $this->validate();

        $this->dispatch('actionConfirmed')->to($this->callbackComponent);

        call_user_func_array([$this, 'close'], $this->modalCloseArguments);
    }

    public function render()
    {
        return view('livewirestack::livewire.confirmation');
    }
}
