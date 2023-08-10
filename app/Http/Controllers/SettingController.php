<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Setting;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $data['data'] = Setting::where('user_id', auth()->id())->orderby('created_at', 'desc')->get();
        return view('admin.setting.list', $data);
      }
    
      public function create() {
        return view('admin.setting.create');
      }
    
      
      public function manage($id = null)
      {
        if ($data['setting'] = Setting::find($id)) {
            // return $data;
          return view('admin.setting.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('setting.manage', '<strong>Sorry!!!</strong> Slider not found');
      }
    
      /**
       * @param Request $request
       * @return \Illuminate\Http\RedirectResponse
       */
      public function store(Request $request) {
        $message = '<strong>Congratulations!!!</strong> Setting successfully ';
        try {
          $oldImage = '';
          if ($request->hasFile('image')) {
            $logo = CustomHelper::storeImage($request->file('image'), '/site/');
            if ($logo != false) {
              $image = $logo;
            }
          }
          if ($request->has('value')) {
            $image = $request->value;
          }
    
    
          Setting::updateOrCreate(
            [
              'user_id' => auth()->id(),
              'key' => $request->key
            ]
            , [
            'value' => $image ?? ''
          ]);
          return RedirectHelper::routeSuccessWithParams('setting.list', $message);
        } catch (QueryException $e) {
          return RedirectHelper::backWithInputFromException();
        }
    
      }
}
