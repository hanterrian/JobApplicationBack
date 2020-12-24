<?php

namespace App\Admin\Components;

use Encore\Admin\Grid;
use Encore\Admin\Grid\Column;
use Illuminate\Support\Str;

/**
 * Class JobGrid
 * @package App\Admin\Components
 */
class JobGrid extends Grid
{
    /**
     * @param string $name
     * @param string $label
     *
     * @return JobGrid|bool|Column|JobColumn
     */
    public function column($name, $label = '')
    {
        if (Str::contains($name, '.')) {
            return $this->addRelationColumn($name, $label);
        }

        if (Str::contains($name, '->')) {
            return $this->addJsonColumn($name, $label);
        }

        return $this->__call($name, array_filter([$label]));
    }

    public function addColumn($column = '', $label = '')
    {
        $column = new JobColumn($column, $label);
        $column->setGrid($this);

        return tap($column, function ($value) {
            $this->columns->push($value);
        });
    }
}
