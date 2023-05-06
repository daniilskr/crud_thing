<?php

namespace App\View\Components\Forms\Inputs;

use Carbon\Carbon;
use Closure;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ChoicesSelect extends Component
{
    public bool $noValueSelected;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $label,
        public string $name,
        public string $placeholderLabel,
        public ?string $selectedValue,
        public string $valueColumn,
        public string $labelColumn,
        public Collection $models,
    )
    {
        $this->noValueSelected = blank($selectedValue);
    }

    public function getModelValue(Model $model): mixed
    {
        return $model->getAttribute($this->valueColumn);
    }

    public function getModelLabel(Model $model): string
    {
        return $model->getAttribute($this->labelColumn);
    }

    public function isSelectedModel(Model $model): bool
    {
        // Let's just assume that "blank" is not a valid value for a selectable column
        if (blank($this->selectedValue)) {
            return false;
        }

        return $model->getAttribute($this->valueColumn) == $this->selectedValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.inputs.choices-select');
    }
}
