<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{

    public function index(){
        $data['data'] = SubCategory::orderby('created_at', 'desc')->paginate(20);
        $categories = Categories::all();
        // return $categories;
        return view('admin.subcategory.list', $data, compact('categories'));
    }




    public function manage($id = null) {
        
        if ($data['subcategory'] = SubCategory::find($id)) {
          $data['category'] = Categories::get();
          // return $data;
          return view('admin.subcategory.manage', $data);
        }
        return RedirectHelper::routeWarning('subcategory.list', '<strong>Sorry!!!</strong> User not found');
      }




    public function create($id = null){
        return view('admin.subcategory.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong>Sub Category successfully';
        $rules = [
            'category_id' => 'required|string',
            'subcategory_name' => 'required|string',
            'subcategory_slug' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\SubCategory::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\SubCategory::$statusArrays)],
        ];

        if ($request->has('id')) {
            $subcategory = SubCategory::find($request->id);
            $message = $message . ' updated';
          } else {
            $subcategory = new SubCategory();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $subcategory->category_id = $request->category_id;
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->subcategory_slug = $request->subcategory_slug;
            $subcategory->status = $request->status;

            if ($subcategory->save()) {
                return RedirectHelper::routeSuccess('subcategory.list', $message);
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
          $user = SubCategory::find($id);
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
      $user = SubCategory::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
