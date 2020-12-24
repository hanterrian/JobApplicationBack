<?php

namespace App\Admin\Components;

use Cake\Chronos\Chronos;
use Encore\Admin\Grid\Column;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class JobColumn extends Column
{
    /**
     * @return mixed
     */
    public function asBoolean()
    {
        return $this->select([
            __('No'),
            __('Yes'),
        ]);
    }

    /**
     * @param string $format
     *
     * @return JobColumn
     */
    public function asDatetime(string $format = 'Y-m-d H:i:s')
    {
        return $this->display(function ($value) use ($format) {
            return (new Chronos($value))->format($format);
        });
    }
}
