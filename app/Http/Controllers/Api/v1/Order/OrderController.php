<?php

namespace App\Http\Controllers\Api\v1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\OrderPostRequest;
use App\Http\Requests\Api\Order\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Order;
use App\Models\OrderImage;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class OrderController
 *
 * @group Order
 *
 * @package App\Http\Controllers\Api\v1\Order
 */
class OrderController extends Controller
{
    /**
     * Get list orders
     *
     * @return OrderCollection
     */
    public function index()
    {
        $data = Order::where([
            'status' => Order::STATUS_OPEN,
            'deleted_at' => null,
        ])->with([
            'user',
            'country',
            'region',
            'city',
        ])->paginate();

        return new OrderCollection($data);
    }

    /**
     * Create new order
     *
     * @authenticated
     *
     * @param OrderRequest $request
     *
     * @return OrderResource
     */
    public function store(OrderRequest $request)
    {
        /** @var UploadedFile[] $images */
        $images = $request->images;

        $images = $this->uploadImages($images);
        $categories = $this->parseCategories($request->categories);

        $order = Order::create(array_merge($request->all(), [
            'user_id' => Auth::id(),
            'status' => Order::STATUS_NEW,
        ]));

        $order->currency()->associate(Currency::find($request->get('currency')));

        $order->country()->associate(Country::find($request->get('country')))->save();
        $order->region()->associate(Region::find($request->get('region')))->save();
        $order->city()->associate(City::find($request->get('city')))->save();

        $order->images()->saveMany($images);
        $order->categories()->attach($categories);

        return new OrderResource($order);
    }

    /**
     * Show order
     *
     * @param Order $order
     *
     * @return OrderResource
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update order
     *
     * @authenticated
     *
     * @param OrderRequest $request
     * @param Order $order
     *
     * @return OrderResource
     */
    public function update(OrderRequest $request, Order $order)
    {
        /** @var UploadedFile[] $images */
        $images = $request->images;

        $images = $this->uploadImages($images);
        $categories = $this->parseCategories($request->categories);

        $order->update(array_merge($request->all(), [
            'user_id' => Auth::id(),
            'status' => Order::STATUS_NEW,
        ]));

        $order->currency()->associate(Currency::find($request->get('currency')));

        $order->country()->associate(Country::find($request->get('country')))->save();
        $order->region()->associate(Region::find($request->get('region')))->save();
        $order->city()->associate(City::find($request->get('city')))->save();

        $order->images()->saveMany($images);
        $order->categories()->attach($categories);

        return new OrderResource($order);
    }

    /**
     * Delete order
     *
     * @authenticated
     *
     * @param Order $order
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'Record delete'
        ]);
    }

    /**
     * Add executor to order
     *
     * @authenticated
     *
     * @param OrderPostRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addExecutor(OrderPostRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var Order $order */
        $order = Order::whereId($request->order)->first();

        if ($order->responding()->get()->contains($user)) {
            return response()->json([
                'message' => 'User already attached'
            ], 422);
        }

        if ($order->user_id == $user->id) {
            return response()->json([
                'message' => 'Can\'t connect owner'
            ], 422);
        }

        $order->responding()->attach($user);

        return response()->json([
            'message' => 'User add to executor'
        ]);
    }

    /**
     * Remove executor from order
     *
     * @authenticated
     *
     * @param OrderPostRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeExecutor(OrderPostRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var Order $order */
        $order = Order::whereId($request->order)->first();

        if (!$order->responding()->get()->contains($user)) {
            return response()->json([
                'message' => 'User not attached'
            ], 422);
        }

        if ($order->user_id == $user->id) {
            return response()->json([
                'message' => 'Can\'t connect owner'
            ], 422);
        }

        $order->responding()->detach($user);

        return response()->json([
            'message' => 'User remove from executor'
        ]);
    }

    /**
     * Select executor to order
     *
     * @authenticated
     *
     * @param OrderPostRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function selectExecutor(OrderPostRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var Order $order */
        $order = Order::whereId($request->order)->first();

        if (!$order->responding()->get()->contains($user)) {
            return response()->json([
                'message' => 'User not attached'
            ], 422);
        }

        if ($order->user_id == $user->id) {
            return response()->json([
                'message' => 'Can\'t connect owner'
            ], 422);
        }

        $order->selectedUser()->associate($user);

        return response()->json([
            'message' => 'User select as executor'
        ]);
    }

    /**
     * Add viewer to order
     *
     * @authenticated
     *
     * @param OrderPostRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addViewer(OrderPostRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();
        /** @var Order $order */
        $order = Order::whereId($request->order)->first();

        if ($order->views()->get()->contains($user)) {
            return response()->json([
                'message' => 'User already attached'
            ], 422);
        }

        if ($order->user_id == $user->id) {
            return response()->json([
                'message' => 'Can\'t connect owner'
            ], 422);
        }

        $order->views()->attach($user);

        return response()->json([
            'message' => 'User add to viewers'
        ]);
    }

    /**
     * @param UploadedFile[] $images
     *
     * @return OrderImage[]
     */
    private function uploadImages(array $images): array
    {
        foreach ($images as $key => $image) {
            $filepath = date("Y/m/d");
            $filename = Auth::id() . "_order_{$key}." . $image->extension();

            $path = Storage::disk('order')->putFileAs($filepath, $image, $filename);

            if ($path) {
                $orderImage = new OrderImage();
                $orderImage->src = $path;
                $orderImage->sort = $key;

                $images[$key] = $orderImage;
            }
        }

        return $images;
    }

    /**
     * @param array $categories
     *
     * @return Category[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function parseCategories(array $categories)
    {
        return Category::where(['id' => $categories])->get();
    }
}
