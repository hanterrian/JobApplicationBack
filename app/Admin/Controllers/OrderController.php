<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Region;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

/**
 * Class OrderController
 * @package App\Admin\Controllers
 */
class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        /** @var array $list */
        $list = User::getItems();

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User'))->select($list);
        $grid->column('type', __('Type'));
        $grid->column('title', __('Title'));
        $grid->column('price', __('Price'));
        $grid->column('currency_id', __('Currency'));
        $grid->column('country_id', __('Country'));
        $grid->column('region_id', __('Region'));
        $grid->column('city_id', __('City'));
        $grid->column('status', __('Status'));
        $grid->column('working_at', __('Working at'))->date();
        $grid->column('closed_at', __('Closed at'))->date();
        $grid->column('created_at', __('Created at'))->date();
        $grid->column('updated_at', __('Updated at'))->date();

        $grid->filter(function (Grid\Filter $filter) {
            $filter->like('title', __('Title'));
            $filter->equal('user_id', __('User'))->select(User::getItems('id', 'name'));
            $filter->equal('country_id', __('Country'))->select(Country::getItems());
            $filter->equal('region_id', __('Region'))->select(Region::getItems());
            $filter->equal('city_id', __('Region'))->select(City::getItems());
            $filter->equal('status', __('Published'))->select(Order::getStatuses());
        });

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User'));
        $show->field('selected_user_id', __('Selected user'));
        $show->field('type', __('Type'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('service_provision', __('Service provision'));
        $show->field('price', __('Price'));
        $show->field('currency_id', __('Currency'));
        $show->field('desired_date', __('Desired date'));
        $show->field('desired_time_from', __('Desired time from'));
        $show->field('desired_time_to', __('Desired time to'));
        $show->field('execution_address', __('Execution address'));
        $show->field('country_id', __('Country'));
        $show->field('region_id', __('Region'));
        $show->field('city_id', __('City'));
        $show->field('address', __('Address'));
        $show->field('executor_comment', __('Executor comment'));
        $show->field('customer_comment', __('Customer comment'));
        $show->field('status', __('Status'));
        $show->field('working_at', __('Working at'));
        $show->field('closed_at', __('Closed at'));
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
        $form = new Form(new Order());

        $form->select('user_id', __('User'))->options(User::getItems('id', 'name'))->required();
        $form->select('selected_user_id', __('Selected user'))->options(User::getItems('id', 'name'));
        $form->select('type', __('Type'))->options(Order::getTypes())->required();
        $form->text('title', __('Title'))->required();
        $form->ckeditor('description', __('Description'))->required();
        $form->select('service_provision', __('Service provision'))->options(Order::getServiceProvisions())->required();
        $form->decimal('price', __('Price'))->required();
        $form->select('currency_id', __('Currency'))->options(Currency::getItems())->required();
        $form->date('desired_date', __('Desired date'))->default(date('Y-m-d'))->required();
        $form->time('desired_time_from', __('Desired time from'))->default(date('H:i:s'))->required();
        $form->time('desired_time_to', __('Desired time to'))->default(date('H:i:s'))->required();
        $form->textarea('execution_address', __('Execution address'));
        $form->select('country_id', __('Country'))->options(Country::getItems())->required();
        $form->select('region_id', __('Region'))->options(Region::getItems())->required();
        $form->select('city_id', __('City'))->options(City::getItems())->required();
        $form->textarea('address', __('Address'));
        $form->textarea('executor_comment', __('Executor comment'));
        $form->textarea('customer_comment', __('Customer comment'));
        $form->select('status', __('Status'))->options(Order::getStatuses())->required();
        $form->datetime('working_at', __('Working at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('closed_at', __('Closed at'))->default(date('Y-m-d H:i:s'));
        $form->multipleSelect('categories', __('Categories'))->options(Category::getItems());
        $form->multipleImage('images', __('Images'))
            ->pathColumn('src')
            ->downloadable(false)
            ->removable();

        return $form;
    }
}
