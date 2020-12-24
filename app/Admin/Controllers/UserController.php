<?php

namespace App\Admin\Controllers;

use App\Admin\Components\JobAdminController;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\User;
use Encore\Admin\Grid\Filter;
use Illuminate\Database\Eloquent\Builder;

class UserController extends JobAdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Users';

    /**
     * @return User
     */
    public function getModel()
    {
        return new User();
    }

    /**
     * @return \App\Admin\Components\JobGrid
     */
    protected function grid()
    {
        $countries = Country::all()->keyBy('id')->map(function (Country $model) { return $model->title; })->toArray();
        $regions = Region::all()->keyBy('id')->map(function (Region $model) { return $model->title; })->toArray();
        $cities = City::all()->keyBy('id')->map(function (City $model) { return $model->title; })->toArray();

        $this->grid->column('id', __('Id'));
        $this->grid->column('name', __('Name'));
        $this->grid->column('email', __('Email'));
        $this->grid->column('phone', __('Phone'));
        $this->grid->column('country_id', __('Country'))->using($countries);
        $this->grid->column('region_id', __('Region'))->using($regions);
        $this->grid->column('city_id', __('City'))->using($cities);
        $this->grid->column('gender', __('Gender'));
        $this->grid->column('company_type', __('Company type'))->using(User::getCompanyTypes());
        $this->grid->column('last_activity', __('Last activity'))->asDatetime();
        $this->grid->column('is_verified', __('Is verified'))->asBoolean();
        $this->grid->column('email_verified_at', __('Email verified at'))->asDatetime();
        $this->grid->column('created_at', __('Created at'))->asDatetime();

        $this->grid->filter(function (Filter $filter) use ($countries, $regions, $cities) {
            $filter->like('name', 'name');
            $filter->like('email', 'email');
            $filter->like('phone', 'phone');
            //
            $filter->equal('country_id')->select($countries);
            $filter->equal('region_id')->select($regions);
            $filter->equal('city_id')->select($cities);
            //
            $filter->equal('gender');
            $filter->equal('company_type')->select(User::getCompanyTypes());
            $filter->equal('is_verified')->select([
                __('No'),
                __('Yes'),
            ]);
        });

        return $this->grid;
    }

    /**
     * @param $id
     *
     * @return \App\Admin\Components\JobShow
     */
    protected function detail($id)
    {
        $this->show->field('id', __('Id'));
        $this->show->field('name', __('Name'));
        $this->show->field('email', __('Email'));
        $this->show->field('email_verified_at', __('Email verified at'));
        $this->show->field('password', __('Password'));
        $this->show->field('remember_token', __('Remember token'));
        $this->show->field('created_at', __('Created at'));
        $this->show->field('updated_at', __('Updated at'));
        $this->show->field('verification_token', __('Verification token'));
        $this->show->field('verification_token_expire', __('Verification token expire'));
        $this->show->field('phone', __('Phone'));
        $this->show->field('country_id', __('Country id'));
        $this->show->field('region_id', __('Region id'));
        $this->show->field('city_id', __('City id'));
        $this->show->field('last_name', __('Last name'));
        $this->show->field('patronymic', __('Patronymic'));
        $this->show->field('description', __('Description'));
        $this->show->field('gender', __('Gender'));
        $this->show->field('photo', __('Photo'));
        $this->show->field('date_of_birth', __('Date of birth'));
        $this->show->field('company_type', __('Company type'));
        $this->show->field('company_name', __('Company name'));
        $this->show->field('company_site', __('Company site'));
        $this->show->field('last_activity', __('Last activity'));
        $this->show->field('is_verified', __('Is verified'));

        return $this->show;
    }

    /**
     * @return \App\Admin\Components\JobForm
     */
    protected function form()
    {
        $this->form->text('name', __('Name'));
        $this->form->email('email', __('Email'));
        $this->form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $this->form->password('password', __('Password'));
        $this->form->text('remember_token', __('Remember token'));
        $this->form->text('verification_token', __('Verification token'));
        $this->form->number('verification_token_expire', __('Verification token expire'));
        $this->form->mobile('phone', __('Phone'));
        $this->form->number('country_id', __('Country id'));
        $this->form->number('region_id', __('Region id'));
        $this->form->number('city_id', __('City id'));
        $this->form->text('last_name', __('Last name'));
        $this->form->text('patronymic', __('Patronymic'));
        $this->form->textarea('description', __('Description'));
        $this->form->number('gender', __('Gender'));
        $this->form->text('photo', __('Photo'));
        $this->form->date('date_of_birth', __('Date of birth'))->default(date('Y-m-d'));
        $this->form->text('company_type', __('Company type'));
        $this->form->text('company_name', __('Company name'));
        $this->form->text('company_site', __('Company site'));
        $this->form->datetime('last_activity', __('Last activity'))->default(date('Y-m-d H:i:s'));
        $this->form->switch('is_verified', __('Is verified'))->default(1);

        return $this->form;
    }
}
