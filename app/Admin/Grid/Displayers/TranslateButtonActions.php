<?php

namespace App\Admin\Grid\Displayers;

use Encore\Admin\Grid\Displayers\Actions;

/**
 * Class TranslateButtonActions
 * @package App\Admin\Grid\Displayers
 */
class TranslateButtonActions extends ButtonActions
{
    public $actions = ['edit', 'delete'];

    /**
     * Render edit action.
     *
     * @return string
     */
    protected function renderEdit()
    {
        $title = __('Edit');

        foreach (config('translatable.locales') as $locale) {
            $class = ($this->row->hasTranslation($locale)) ? 'btn-primary' : 'btn-default';

            $items[] = <<<EOT
<a href="{$this->getResource()}/{$this->getRouteKey()}/edit?lang={$locale}" class="{$this->grid->getGridRowName()}-edit btn btn-xs {$class}">
    <i class="fa fa-edit"></i>
    {$title} {$locale}
</a>
EOT;
        }

        return implode("\n", $items);
    }
}
