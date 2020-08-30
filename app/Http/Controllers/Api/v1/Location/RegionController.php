<?php

namespace App\Http\Controllers\Api\v1\Location;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Location\RegionListRequest;
use App\Http\Resources\RegionCollection;
use App\Models\Region;
use Illuminate\Http\Request;

/**
 * Class RegionController
 * @package App\Http\Controllers\Api\v1\Location
 */
class RegionController extends Controller
{
    /**
     * @param RegionListRequest $request
     *
     * @return RegionCollection
     */
    public function index(RegionListRequest $request)
    {
        /** @var Region[] $models */
        $models = Region::where([
            'country_id' => $request->country_id,
            'published' => true
        ])
            ->orderBy('sort')
            ->get();

        return new RegionCollection($models);
    }
}
