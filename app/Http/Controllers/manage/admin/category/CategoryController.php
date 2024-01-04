<?php

namespace App\Http\Controllers\manage\admin\category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        
        return view('manage.admin.category.index', compact('category'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryCount = Category::count();
        return view('manage.admin.category.create', compact('categoryCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25|string',
            'name' => 'required|max:25|string',
        ],[
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul terlalu panjang!',
        ]);

        $category = new Category();
        $category->name = strtolower($request->name);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect('/panel/category')->with('success', 'Data berhasil dibuat!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $category->delete();
        return redirect('/panel/category')->with('success', 'Data berhasil dihapus!');
    }
}
