<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{

    // public function index(){
    //     $data['data'] = Review::orderby('created_at', 'desc')->paginate(20);
    //     // return $categories;
    //     return view('admin.review.list', $data);
    // }
    // public function manage($id = null) {
    //     if ($data['review'] = Review::find($id)) {
    //       return view('admin.review.manage', $data);
    //     }
    //     return RedirectHelper::routeWarning('review.list', '<strong>Sorry!!!</strong> Pickup Point not found');
    //   }

    public function view(){
        return view('site.index');
    }

    public function create(){
        return view('site.product_details');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Pickup Point successfully';
        $rules = [
            'user_id' => 'nullable',
            'animal_id' => 'nullable',
            'food_id' => 'nullable',
            'email' => 'nullable|string',
            'comment' => 'nullable|string',
            'rating' => 'nullable',
            // 'status' = ['required|string', Rule::in(\App\Models\Review::$statusArrays)],
        ];

        if ($request->has('id')) {
            $review = Review::find($request->id);
            $message = $message . ' updated';
          } else {
            $review = new Review();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $review->user_id=auth()->id();
            $check = DB::table('reviews')->where('user_id', auth()->id())->where('animal_id', $request->animal_id)->first();
            if($check){
                return response()->json(['message' => 'Faild!!! Already Submited', 'title' => 'error', 'error' => true]);
            }


            $review->animal_id = $request->animal_id;
            $review->food_id = $request->food_id;
            $review->email = $request->email;
            $review->comment = $request->comment;
            $review->rating = $request->rating;

            if($review->save()){
                return response()->json(['message' => 'Review Successfuly Submited', 'title' => 'Data Saved']);
            }


          }catch(QueryException $e){
            return $e;
            return RedirectHelper::backWithInputFromException();

          }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
          $user = Review::find($id);
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
      $user = Review::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
