<?php

namespace App\Helpers;

use App\Models\City;
use App\Models\Country;
use App\Models\Region;

class LocationHelper
{
    /**
     * @return array
     */
    public static function getCountryList(): array
    {
        return Country::all()->keyBy('id')->map(function (Country $model) { return $model->title; })->toArray();
    }

    /**
     * @return array
     */
    public static function getRegionList(): array
    {
        return Region::all()->keyBy('id')->map(function (Region $model) { return $model->title; })->toArray();
    }

    /**
     * @return array
     */
    public static function getCityList(): array
    {
        return City::all()->keyBy('id')->map(function (City $model) { return $model->title; })->toArray();
    }
}
