<?php

namespace App\Http\Controllers\Api\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyCollection;
use App\Models\Currency;
use Illuminate\Http\Request;

/**
 * Class CurrencyController
 *
 * @group Order
 *
 * @package App\Http\Controllers\Api\v1\Order
 */
class CurrencyController extends Controller
{
    /**
     * @return CurrencyCollection
     */
    public function index()
    {
        $data = Currency::get();

        return new CurrencyCollection($data);
    }
}
