<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AllCategory(){
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('category'));
    }
    // End Method

    public function AddCategory(){
        return view('admin.backend.category.add_category');
    }
     // End Method 
}
