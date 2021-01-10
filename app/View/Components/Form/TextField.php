<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use phpseclib\Crypt\Random;

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
    public function __construct($name, $label, $value)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->id = Random::string(6);
    }

    public function render()
    {
        return view('components.form.text-field');
    }
}
