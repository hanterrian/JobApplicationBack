<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\TranslateButtonActions;
use App\Admin\TranslateForm;
use App\Models\Country;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class CountryController
 * @package App\Admin\Controllers
 */
class CountryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Country';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Country());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('sort', __('Sort'));
        $grid->column('published', __('Published'))->switch();

        $grid->column('created_at', __('Created at'))->date();
        $grid->column('updated_at', __('Updated at'))->date();

        $grid->filter(function (Grid\Filter $filter) {
            $filter->like('translation.title', __('Title'));
            $filter->equal('published', __('Published'))->select([
                __('No'),
                __('Yes')
            ]);
        });

        $grid->setActionClass(TranslateButtonActions::class);

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Country::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('sort', __('Sort'));
        $show->field('published', __('Published'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new TranslateForm(new Country());

        $form->text('title', __('Title'))->required();
        $form->number('sort', __('Sort'))->default(0);
        $form->switch('published', __('Published'))->default(1);

        return $form;
    }
}
