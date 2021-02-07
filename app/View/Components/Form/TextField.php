<?php

namespace App\View\Components\Form;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

/**
 * Class TextField
 * @package App\View\Components\Form
 */
class TextField extends Component
{
    public $name;

    public $label;

    public $value;

    public $id;

    /**
     * TextField constructor.
     *
     * @param string $name
     * @param string $label
     * @param string $value
     */
    public function __construct($name, $label, $value = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value ?? Request::old($name);
        $this->id = $name . '_' . rand(1000, 9999);
    }

    public function render()
    {
        return view('components.form.text-field');
    }
}
