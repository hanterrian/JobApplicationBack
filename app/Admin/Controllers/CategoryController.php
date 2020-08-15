<?php

namespace App\Admin\Controllers;

use App\Admin\Grid\Displayers\TranslateButtonActions;
use App\Admin\TranslateForm;
use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Arr;

/**
 * Class CategoryController
 * @package App\Admin\Controllers
 */
class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent'))->display(function ($title, $column) {
            /** @var Category $category */
            $category = $this;

            return $category->parent->title ?? null;
        });
        $grid->column('title', __('Title'));
        $grid->column('sort', __('Sort'));
        $grid->column('published', __('Published'))->switch();
        $grid->column('created_at', __('Created at'))->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d H:i:s');

        $grid->filter(function (Grid\Filter $filter) {
            $filter->like('translation.title', __('Title'));
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent'));
        $show->field('title', __('Title'));
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
        $form = new TranslateForm(new Category());

        $form->text('title', __('Label'))->required();
        $form->select('parent_id', __('Parent'))->options(function ($id, Form\Field\Select $field) {
            /** @var Category $category */
            $category = $this;

            return Category::notCategory($category->id)->get()->keyBy('id')->map(function (Category $model) {
                return $model->title;
            })->toArray();
        });
        $form->number('sort', __('Sort'))->required()->default(0);
        $form->switch('published', __('Published'))->default(1);

        return $form;
    }
}
