<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var LengthAwarePaginator|Order[] $paginator */
        $paginator = Order::where([
            'status' => [
                Order::STATUS_OPEN,
                Order::STATUS_IN_PROGRESS
            ]
        ])->paginate();

        return view('home.index', ['paginator' => $paginator]);
    }
}
