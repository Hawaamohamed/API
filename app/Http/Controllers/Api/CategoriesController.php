<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response()->json($categories);
    }
    public function getcategoriesByLang(){
        $categories = Category::get('name_'.app()->getLocale() . ' as name');
        return response()->json($categories);
    }
    public function changeStatus(Request $request){
        $category = Category::find($request->id);
        $category->update(['active'=> $request->active]);
        return response()->json(['response' => 'success', 'message'=>'updated Successfully']);
    }
}
