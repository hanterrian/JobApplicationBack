<?php

namespace App\View\Components\Form;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;
use phpseclib\Crypt\Random;

/**
 * Class CheckboxField
 * @package App\View\Components\Form
 */
class CheckboxField extends Component
{
    public $name;

    public $label;

    public $value;

    public $checked;

    public $id;

    /**
     * CheckboxField constructor.
     *
     * @param $name
     * @param $label
     * @param int $value
     * @param null|bool $checked
     */
    public function __construct($name, $label, $value = 1, $checked = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
        $this->checked = $checked ?? (bool)Request::old($name);
        $this->id = $name . '_' . rand(1000, 9999);
    }

    public function render()
    {
        return view('components.form.checkbox-field');
    }
}
