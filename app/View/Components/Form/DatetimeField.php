<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use phpseclib\Crypt\Random;

/**
 * Class DatetimeField
 * @package App\View\Components\Form
 */
class DatetimeField extends Component
{
    public $name;

    public $label;

    public $value;

    public $id;

    /**
     * DatetimeField constructor.
     *
     * @param $name
     * @param $label
     * @param $value
     */
    public function __construct($name, $label, $value)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->id = $name . '_' . rand(1000, 9999);
    }

    public function render()
    {
        return view('components.form.text-field');
    }
}
