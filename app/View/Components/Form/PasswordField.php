<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use phpseclib\Crypt\Random;

/**
 * Class PasswordField
 * @package App\View\Components\Form
 */
class PasswordField extends Component
{
    public $name;

    public $label;

    public $value;

    public $id;

    /**
     * PasswordField constructor.
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
        return view('components.form.password-field');
    }
}
