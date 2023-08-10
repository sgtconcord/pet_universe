<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class SliderController extends Controller
{
    public function index($id = null)
    {
        $data['slider'] = Slider::find($id);
        $data['data'] = Slider::orderby('created_at', 'desc')->get();
        return view('admin.slider.list', $data);
    }


    public function create()
    {


        return view('admin.slider.create');
    }

    //manage

    public function manage($id = null)
    {

        if ($data['slider'] = Slider::find($id)) {

            // return $datas;
            return view('admin.slider.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('slider.list', '<strong>Sorry!!!</strong> Slider not found');
    }


    public function store(Request $request)
    {
            //    dd($request->all());
        $message = '<strong>Congratulations!!!</strong> Slider successfully';
        $rules = [
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'images' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\Slider::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Slider::$statusArrays)],
        ];

        if ($request->has('id')) {
            // return $request;
            $slider = Slider::find($request->id);
            $message = $message . ' updated';
        } else {
            $slider = new Slider();
            $message = $message . ' created';
        }
        $request->validate($rules);

        try {
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->description = $request->description;
            $slider->slug = $request->slug;
            $slider->description = $request->description;
            $slider->status = $request->status;


            $oldImage = $slider->image;
            //            return $slider;
            if ($request->hasFile('image')) {
                $logo = CustomHelper::storeImage($request->file('image'), '/slider/');
                if ($logo != false) {
                    $slider->image = $logo;
                }
            }
            if ($slider->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }

                return RedirectHelper::routeSuccessWithParams('slider.list', $message);
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
            $user = Slider::find($id);
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
            $user = Slider::find($id);
            if ($user->update(['status' => $status])) {
                return "success";
            }
        }
    }
}
