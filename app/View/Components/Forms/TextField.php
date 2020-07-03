<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class TextField extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $label;

    /** @var mixed|null */
    public $value = null;

    /**
     * TextField constructor.
     *
     * @param string $name
     * @param string $label
     * @param mixed|null $value
     */
    public function __construct(string $name, string $label, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.text-field', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value,
        ]);
    }
}
