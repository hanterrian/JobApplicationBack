<?php

namespace App\Admin\Grid\Displayers;

use Encore\Admin\Grid\Displayers\Actions;

/**
 * Class ButtonActions
 * @package App\Admin\Grid\Displayers
 */
class ButtonActions extends Actions
{
    /**
     * Render view action.
     *
     * @return string
     */
    protected function renderView()
    {
        $title = __('View');
        return <<<EOT
<a href="{$this->getResource()}/{$this->getRouteKey()}" class="{$this->grid->getGridRowName()}-view btn btn-xs btn-default">
    <i class="fa fa-eye"></i>
    {$title}
</a>
EOT;
    }

    /**
     * Render edit action.
     *
     * @return string
     */
    protected function renderEdit()
    {
        $title = __('Edit');

        return <<<EOT
<a href="{$this->getResource()}/{$this->getRouteKey()}/edit" class="{$this->grid->getGridRowName()}-edit btn btn-xs btn-default">
    <i class="fa fa-edit"></i>
    {$title}
</a>
EOT;
    }

    /**
     * Render delete action.
     *
     * @return string
     */
    protected function renderDelete()
    {
        $this->setupDeleteScript();

        $title = __('Delete');

        return <<<EOT
<a href="javascript:void(0);" data-id="{$this->getKey()}" class="{$this->grid->getGridRowName()}-delete btn btn-xs btn-danger">
    <i class="fa fa-trash"></i>
    {$title}
</a>
EOT;
    }
}
