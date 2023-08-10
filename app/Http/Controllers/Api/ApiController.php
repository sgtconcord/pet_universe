<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function subcategory($category_id) {
        $data['subcategories'] = SubCategory::where("category_id", $category_id)
          ->get(["subcategory_name", "id"]);
    
        return response()->json($data);
      }
}
