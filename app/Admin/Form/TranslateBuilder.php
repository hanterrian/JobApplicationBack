<?php

namespace App\Admin\Form;

use App\Admin\TranslateForm;
use Encore\Admin\Form\Builder;

/**
 * Class TranslateBuilder
 * @package App\Admin\Form
 *
 * @property TranslateForm $form
 */
class TranslateBuilder extends Builder
{
    /**
     * Get Form action.
     *
     * @return string
     */
    public function getAction(): string
    {
        if ($this->action) {
            return $this->action;
        }

        if ($this->isMode(static::MODE_EDIT)) {
            return $this->form->resource() . '/' . $this->id . '?lang=' . $this->form->getLocale();
        }

        if ($this->isMode(static::MODE_CREATE)) {
            return $this->form->resource(-1);
        }

        return '';
    }
}
