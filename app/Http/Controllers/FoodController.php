<?php

namespace App\Http\Controllers;
use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Categories;
use App\Models\Food;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FoodController extends Controller
{

    function index(){
        $data['foods'] = Food::orderby('created_at', 'desc')->get()->all();
        return view('admin.food.list',$data);
    }

    function createOrStore (Request $request){
        // form view
        if($request->isMethod('GET')){
            $datas['categories'] = Categories::get()->all();
            $datas['subCategories'] = SubCategory::get()->all();
            $datas['pickupPoints'] = PickupPoint::get()->all();
            // return $datas;
            return view('admin.food.create', $datas);
        }

        // store and update
        $message = '<strong>Congratulations!!!</strong> Food successfully';
        $rules = [

            'category_id' => 'nullable|string',
            'sub_category_id' => 'nullable|string',
            'pickup_point_id' => 'nullable|string',
            'name' => 'nullable|string',
            'purchase_price' => 'nullable|string',
            'selling_price' => 'nullable|string',
            'discount_price' => 'nullable|string',
            'quantity' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\Food::$statusArray)]
        ];

        if ($request->has('id')) {
            // for update
            $food = Food::find($request->id);
            $message = $message . ' updated';
        } else {
            // for store
            $food = new Food();
            $message = $message . ' created';
        }
        $request->validate($rules);

        try {
            $food->category_id = $request->category_id;
            $food->sub_category_id = $request->sub_category_id;
            $food->pickup_point_id = $request->pickup_point_id;
            $food->name = $request->name;
            $food->purchase_price = $request->purchase_price;
            $food->selling_price = $request->selling_price;
            $food->discount_price = $request->discount_price;
            $food->quantity = $request->quantity;
            $food->description = $request->description;
            $food->status = $request->status;


            $oldImage = $food->img;

            if ($request->hasFile('img')) {
                $logo = CustomHelper::storeImage($request->file('img'), '/food/');
                if ($logo != false) {
                    $food->img = $logo;
                }
            }
            // return $food;
            if ($food->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }

                return RedirectHelper::routeSuccessWithParams('food.list', $message);
            }
            return RedirectHelper::backWithInput();

        } catch (QueryException $e) {
            return $e;
            return RedirectHelper::backWithInputFromException();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->post('id');
        try {
            $food = Food::find($id);
            $oldImage = $food->img;
            if ($food->delete()) {
                if ($oldImage !== null) {
                    CustomHelper::deleteFile($oldImage);
                }
                return 'success';
            }
        } catch (\Exception $e) {
        }
    }

    public function ajaxUpdateStatus(Request $request)
    {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('status');
            $status = strtolower($postStatus);
            $food = Food::find($id);
            if ($food->update(['status' => $status])) {
                return "success";
            }
        }
    }
}
