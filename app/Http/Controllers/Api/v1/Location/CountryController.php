<?php

namespace App\Http\Controllers\Api\v1\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\CountryListRequest;
use App\Http\Resources\CountryCollection;
use App\Models\Country;
use Illuminate\Http\Request;

/**
 * Class CountryController
 *
 * @group Location
 *
 * @package App\Http\Controllers\Api\v1\Location
 */
class CountryController extends Controller
{
    /**
     * @param CountryListRequest $request
     *
     * @return CountryCollection
     */
    public function index(CountryListRequest $request)
    {
        /** @var Country[] $models */
        $models = Country::where(['published' => true])
            ->orderBy('sort')
            ->get();

        return new CountryCollection($models);
    }
}
