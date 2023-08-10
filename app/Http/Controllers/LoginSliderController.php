<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Animal;
use App\Models\Categories;
use App\Models\LoginSlider;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LoginSliderController extends Controller
{
    public function createOrIndex(Request $request)
    { return $request;
        // return view('admin.backgroundImage.create');
        if ($request->isMethod('get')) {
            $data['images'] = LoginSlider::get();
            
            return view('admin.loginSlider.create', $data);
        } elseif ($request->isMethod('post')) {
            $message = 'Successfully Created!';
            $rules['image'] = 'required|file|mimes:png,jpg,jpeg|dimensions:width=880,height=680';
            $rules['status'] = 'required';

            $request->validate($rules);
            try {
                $backgroundImage = new LoginSlider();
                $backgroundImage->status = $request->status;
                $oldImage = $backgroundImage->image;
                if ($request->hasFile('image')) {
                    $logo = CustomHelper::storeImage($request->file('image'), '/background/');
                    if ($logo != false) {
                        $backgroundImage->image = $logo;
                    }
                }

                if ($backgroundImage->save()) {
                    if ($oldImage != null && $logo != null) {
                        CustomHelper::deleteFile($oldImage);
                    }
                    return RedirectHelper::routeSuccess('admin.backgroundImage', $message);
                }
            } catch (QueryException $e) {
                //throw $th;
                RedirectHelper::backWithInputFromException();
            }
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->post('id');
        try {

            $backgroundImage = LoginSlider::find($id);

            if ($backgroundImage->delete()) {
                if ($backgroundImage !== null) {
                    CustomHelper::deleteFile($backgroundImage->image);
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
            $image = LoginSlider::find($id);
            if ($image->update(['status' => $status])) {
                return "success";
            }
        }
    }
}
