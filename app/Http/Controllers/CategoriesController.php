<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Categories;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{

    public function index(){
        $data['data'] = Categories::orderby('created_at', 'desc')->paginate(20);
        return view('admin.category.list', $data);
    }
    public function manage($id = null) {
        if ($data['category'] = Categories::find($id)) {
          return view('admin.category.manage', $data);
        }
        return RedirectHelper::routeWarning('category.list', '<strong>Sorry!!!</strong> User not found');
      }

    public function create($id = null){
        return view('admin.category.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Category successfully';
        $rules = [
            'category_name' => 'required',
            'category_slug' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\Categories::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Categories::$statusArrays)],
        ];

        if ($request->has('id')) {
            $category = Categories::find($request->id);
            $message = $message . ' updated';
          } else {
            $category = new Categories();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{


            $category->category_name = $request->category_name;
            $category->category_slug = $request->category_slug;
            $category->status = $request->status;

            if ($category->save()) {
                return RedirectHelper::routeSuccess('category.list', $message);
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
          $user = Categories::find($id);
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
      $user = Categories::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }


//   get child category
public function getChildCategory($id){
$data = DB::table('child_categories')->where('subcategory_id', $id)->get();
// return $data;
return response()->json($data);
}



}
