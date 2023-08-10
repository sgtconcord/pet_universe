<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\SiteReview;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiteReviewController extends Controller
{
    public function index($id = null)
    {
        // $data['sitereview'] = SiteReview::find($id);
        $user_id = auth()->id();
        
        // $data['data'] = SiteReview::where('user_id', 'id')->orderby('created_at', 'desc')->get();
        // $data['data'] = SiteReview::where('id', $user_id)->get();
        $data['data'] = SiteReview::where('user_id', $user_id)->get();
        return view('admin.sitereview.list', $data);
    }


    public function create()
    {


        return view('admin.sitereview.create');
    }

    //manage

    public function manage($id = null)
    {

        if ($data['sitereview'] = SiteReview::find($id)) {

            // return $datas;
            return view('admin.sitereview.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('sitereview.list', '<strong>Sorry!!!</strong> SiteReview not found');
    }


    public function store(Request $request)
    {
            //    dd($request->all());
        $message = '<strong>Congratulations!!!</strong> SiteReview successfully';
        $rules = [
            'user_id' => 'nullable',
            'name' => 'nullable|string|max:100',
            'designation' => 'nullable|string|max:50',
            'comment' => 'nullable|string|max:250',
            'images' => 'nullable|string',
            // 'status' = ['required|string', Rule::in(\App\Models\SiteReview::$statusArrays)],
        ];

        if ($request->has('id')) {
            // return $request;
            $sitereview = SiteReview::find($request->id);
            $message = $message . ' updated';
        } else {

            if (!($sitereview = SiteReview::where('user_id', auth()->id())->first())){
                $sitereview = new SiteReview();
                $sitereview->user_id = auth()->id();
              }

            // $sitereview = new SiteReview();
            $message = $message . ' created';
        }
        $request->validate($rules);

        try {
            $sitereview->user_id=auth()->id();
            $sitereview->name = $request->name;
            $sitereview->designation = $request->designation;
            $sitereview->comment = $request->comment;
            $oldImage = $sitereview->image;
            //            return $sitereview;
            if ($request->hasFile('image')) {
                $logo = CustomHelper::storeImage($request->file('image'), '/sitereview/');
                if ($logo != false) {
                    $sitereview->image = $logo;
                }
            }
            if ($sitereview->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }

                return RedirectHelper::routeSuccessWithParams('sitereview.list', $message);
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
            $user = SiteReview::find($id);
            $oldImage = $user->image;
            if ($user->delete()) {
                if ($oldImage !== null) {
                    CustomHelper::deleteFile($oldImage);
                }
                return 'success';
            }
        } catch (\Exception $e) {
        }
    }


    /**
     * @param Request $request
     * @return string|void
     */
    public function ajaxUpdateStatus(Request $request)
    {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('status');
            $status = strtolower($postStatus);
            $user = SiteReview::find($id);
            if ($user->update(['status' => $status])) {
                return "success";
            }
        }
    }
}
