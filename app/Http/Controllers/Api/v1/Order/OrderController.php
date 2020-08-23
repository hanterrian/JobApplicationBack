<?php

namespace App\Http\Controllers\Api\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrdersCollection;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers\Api\v1\Order
 */
class OrderController extends Controller
{
    /**
     * @return OrdersCollection
     */
    public function index()
    {
        $data = Order::whereStatus(Order::STATUS_OPEN)
            ->with([
                'user',
                'country',
                'region',
                'city',
            ])
            ->paginate();

        return new OrdersCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $request
     * @param Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
