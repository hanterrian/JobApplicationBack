<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use phpseclib\Crypt\Random;

/**
 * Class SubmitField
 * @package App\View\Components\Form
 */
class SubmitField extends Component
{
    public $label;

    public $id;

    /**
     * SubmitField constructor.
     *
     * @param $label
     */
    public function __construct($label)
    {
        $this->label = $label;
        $this->id = 'submit_' . rand(1000, 9999);
    }

    public function render()
    {
        return view('components.form.submit-field');
    }
}
