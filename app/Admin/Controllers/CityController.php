<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\TranslateButtonActions;
use App\Admin\TranslateForm;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class CityController
 * @package App\Admin\Controllers
 */
class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'City';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new City());

        $grid->column('id', __('Id'));
        $grid->column('country_id', __('Country'))->display(function ($title, $column) {
            /** @var Region $category */
            $category = $this;

            return $category->country->title ?? null;
        });
        $grid->column('region_id', __('Region'))->display(function ($title, $column) {
            /** @var Region $category */
            $category = $this;

            return $category->region->title ?? null;
        });
        $grid->column('title', __('Title'));
        $grid->column('sort', __('Sort'));
        $grid->column('published', __('Published'))->switch();

        $grid->column('created_at', __('Created at'))->date();
        $grid->column('updated_at', __('Updated at'))->date();

        $grid->filter(function (Grid\Filter $filter) {
            $filter->like('translation.title', __('Title'));
            $filter->equal('country_id', __('Country'))->select(Country::getItems());
            $filter->equal('region_id', __('Region'))->select(Region::getItems());
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
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('country_id', __('Country'));
        $show->field('region_id', __('Region'));
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
        $form = new TranslateForm(new City());

        $form->select('country_id', __('Country'))->options(Country::getItems())->required();
        $form->select('region_id', __('Region'))->options(Region::getItems())->required();
        $form->text('title', __('Title'))->required();
        $form->number('sort', __('Sort'))->default(0);
        $form->switch('published', __('Published'))->default(1);

        return $form;
    }
}
