<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\TranslateButtonActions;
use App\Admin\TranslateForm;
use App\Models\Country;
use App\Models\Region;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RegionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Region';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Region());

        $grid->column('id', __('Id'));
        $grid->column('country_id', __('Country'))->display(function ($title, $column) {
            /** @var Region $category */
            $category = $this;

            return $category->country->title ?? null;
        });
        $grid->column('title', __('Title'));
        $grid->column('sort', __('Sort'));
        $grid->column('published', __('Published'))->switch();

        $grid->column('created_at', __('Created at'))->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d H:i:s');

        $grid->filter(function (Grid\Filter $filter) {
            $filter->like('translation.title', __('Title'));
            $filter->equal('country_id', __('Country'))->select(Country::getItems());
            $filter->equal('published', __('Published'))->select([
                0 => __('No'),
                1 => __('Yes')
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
        $show = new Show(Region::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('country_id', __('Country'));
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
        $form = new TranslateForm(new Region());

        $form->select('country_id', __('Country'))->options(Country::getItems())->required();
        $form->text('title', __('Title'))->required();
        $form->number('sort', __('Sort'))->default(0);
        $form->switch('published', __('Published'))->default(1);

        return $form;
    }
}
