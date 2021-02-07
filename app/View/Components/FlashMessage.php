<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

/**
 * Class FlashMessage
 * @package App\View\Components
 */
class FlashMessage extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (Session::has('error')) {
            return "<div class=\"alert alert-danger\">" . Session::get('error') . "</div>";
        }
        if (Session::has('success')) {
            return "<div class=\"alert alert-success\">" . Session::get('success') . "</div>";
        }
        if (Session::has('info')) {
            return "<div class=\"alert alert-info\">" . Session::get('info') . "</div>";
        }
        if (Session::has('warning')) {
            return "<div class=\"alert alert-warning\">" . Session::get('warning') . "</div>";
        }
        return "";
    }
}
