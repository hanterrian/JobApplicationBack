<?php

namespace App\Http\Controllers\Api\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\OrdersCollection;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Api\v1\Order
 */
class CategoryController extends Controller
{
    /**
     * @return CategoryCollection
     */
    public function index()
    {
        $data = Category::where([
            'published' => true,
            'parent_id' => null,
        ])->with([
            'children',
            'translation',
        ])->get();

        return new CategoryCollection($data);
    }
}
