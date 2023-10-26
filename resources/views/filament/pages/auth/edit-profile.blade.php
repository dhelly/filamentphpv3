<div>

    <x-filament-panels::form wire:submit="save">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions(false)"
            alignment="right"
        />
    </x-filament-panels::form>

</div>
