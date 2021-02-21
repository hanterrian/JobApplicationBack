<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use phpseclib\Crypt\Random;

/**
 * Class TextareaField
 * @package App\View\Components\Form
 */
class TextareaField extends Component
{
    public $name;

    public $label;

    public $value;

    public $id;

    /**
     * TextareaField constructor.
     *
     * @param $name
     * @param $label
     * @param $value
     */
    public function __construct($name, $label, $value = null)
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
