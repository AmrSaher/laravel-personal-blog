<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => ['required', 'string', 'unique:categories,title']
        ]);

        Category::create($credentials);

        return back();
    }
}
