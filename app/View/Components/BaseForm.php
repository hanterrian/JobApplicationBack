<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Class BaseForm
 * @package App\View\Components
 */
class BaseForm extends Component
{
    /**
     * @var string
     */
    public $action;

    /**
     * @var string
     */
    public $method;

    /**
     * BaseForm constructor.
     *
     * @param string $action
     * @param string $method
     */
    public function __construct($action, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function render()
    {
        return view('components.base-form');
    }
}
