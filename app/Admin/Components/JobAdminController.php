<?php

namespace App\Admin\Components;

use Encore\Admin\Controllers\AdminController;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobAdminController
 * @package App\Admin\Components
 */
abstract class JobAdminController extends AdminController
{
    /**
     * @return Model
     */
    abstract public function getModel();

    /**
     * @var JobGrid
     */
    protected $grid;

    /**
     * @var JobShow
     */
    protected $show;

    /**
     * @var JobForm
     */
    protected $form;

    /**
     * @var JobTranslateForm
     */
    protected $translateForm;

    /**
     * JobAdminController constructor.
     */
    public function __construct()
    {
        $this->grid = new JobGrid($this->getModel());
        $this->show = new JobShow($this->getModel());
        $this->form = new JobForm($this->getModel());
        $this->translateForm = new JobTranslateForm($this->getModel());
    }
}
