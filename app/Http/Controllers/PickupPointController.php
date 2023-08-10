<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\PickupPoint;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PickupPointController extends Controller
{

    public function index(){
        $data['data'] = PickupPoint::orderby('created_at', 'desc')->paginate(20);
        // return $categories;
        return view('admin.pickuppoint.list', $data);
    }
    public function manage($id = null) {
        if ($data['pickuppoint'] = PickupPoint::find($id)) {
          return view('admin.pickuppoint.manage', $data);
        }
        return RedirectHelper::routeWarning('pickuppoint.list', '<strong>Sorry!!!</strong> Pickup Point not found');
      }

    public function create($id = null){
        return view('admin.pickuppoint.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Pickup Point successfully';
        $rules = [
            'pickup_point_name' => 'required|string',
            'pickup_point_address' => 'required|string',
            'pickup_point_phone' => 'required|string',
            'pickup_point_phone_two' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\PickupPoint::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\PickupPoint::$statusArrays)],
        ];

        if ($request->has('id')) {
            $pickuppoint = PickupPoint::find($request->id);
            $message = $message . ' updated';
          } else {
            $pickuppoint = new PickupPoint();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $pickuppoint->pickup_point_name = $request->pickup_point_name;
            $pickuppoint->pickup_point_address = $request->pickup_point_address;
            $pickuppoint->pickup_point_phone = $request->pickup_point_phone;
            $pickuppoint->pickup_point_phone_two = $request->pickup_point_phone_two;
            $pickuppoint->status = $request->status;

            if ($pickuppoint->save()) {
                return RedirectHelper::routeSuccess('pickuppoint.list', $message);
              }
            return RedirectHelper::backWithInput();

          }catch(QueryException $e){
            // return $e;
            return RedirectHelper::backWithInputFromException();

          }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
          $user = PickupPoint::find($id);
          if ($user->delete()) {
            return 'success';
          }
        } catch (\Exception $e) {
        }
      }


  /**
   * @param Request $request
   * @return string|void
   */
  public function ajaxUpdateStatus(Request $request) {
    if ($request->isMethod("POST")) {
      $id = $request->post('id');
      $postStatus = $request->post('status');
      $status = strtolower($postStatus);
      $user = PickupPoint::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
