<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $mainCategories = Category::where('parent_id',null)->get(["name", "id"]);
        return view('welcome', compact('mainCategories'));
    }
    public function fetchSubCategories(Request $request)
    {
        $SubCategories = Category::where("parent_id",'>=',1)->where("parent_id",'<=',3)->get(["name", "id"]);
        return response()->json($SubCategories);
    }
    public function fetchSubSubCategories(Request $request)
    {
        $SubSubCategories = Category::where("parent_id",'>',3)->get(["name", "id"]);
        return response()->json($SubSubCategories);
    }
}
