<?php

namespace App\Http\Controllers\Api\v1\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\CityListRequest;
use App\Http\Resources\CityCollection;
use App\Models\City;
use Illuminate\Http\Request;

/**
 * Class CityController
 *
 * @group Location
 *
 * @package App\Http\Controllers\Api\v1\Location
 */
class CityController extends Controller
{
    /**
     * Get city list
     *
     * @param CityListRequest $request
     *
     * @return CityCollection
     */
    public function index(CityListRequest $request)
    {
        /** @var City[] $models */
        $models = City::where([
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'published' => true
        ])
            ->orderBy('sort')
            ->get();

        return new CityCollection($models);
    }
}
