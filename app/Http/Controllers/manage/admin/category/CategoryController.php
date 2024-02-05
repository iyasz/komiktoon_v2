<?php

namespace App\Http\Controllers\manage\admin\category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryDetail;
use Illuminate\Support\Facades\Storage;

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
        return view('manage.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|max:25|string|unique:categories,name',
            'photo' => 'required|max:1024|mimes:jpeg,png,jpg|image',
        ],[
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul terlalu panjang!',
            'name.unique' => 'Judul genre sudah ada!',
            
            'photo.required' => 'Photo tidak boleh kosong!',
            'photo.max' => 'Size photo terlalu besar!',
            'photo.mimes' => 'Photo harus jpeg, png, jpg!',
        ]);

        // $sizePhoto = getimagesize($request->photo);

        $category = new Category();
        $category->name = strtolower($request->name);
        $category->photo = $request->photo->store('category', 'public');
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
    public function edit(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if(!$category){
            abort(404);
        }

        return view('manage.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {           
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|max:25|string|unique:categories,name,'.$category->id,
            'photo' => 'nullable|max:1024|mimes:jpeg,png,jpg|image',
        ],[
            'name.required' => 'Judul tidak boleh kosong!',
            'name.max' => 'Judul terlalu panjang!',
            'name.unique' => 'Judul genre sudah ada!',
            
            'photo.max' => 'Size photo terlalu besar!',
            'photo.mimes' => 'Photo harus jpeg, png, jpg!',
        ]);


        if($request->photo){
            $exist = Storage::disk('public')->exists($category->photo);
            if($exist){
                Storage::disk('public')->delete($category->photo);
            }
            $category->photo = $request->photo->store('category', 'public');
        }

        $category->name = strtolower($request->name);
        $category->slug = Str::slug($request->name);
        $category->update();

        return redirect('/panel/category')->with('success', 'Data berhasil diubah!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if(!$category){
            abort(404);
        }

        // remove img 
        $exist = Storage::disk('public')->exists($category->photo);
        if($exist){
            Storage::disk('public')->delete($category->photo); 
        }

        // remove genre detail  
        $categoryDetail = CategoryDetail::where('category_id', $category->id)->get();

        if ($categoryDetail) {
            $categoryDetail->each->delete();
        }        

        $category->delete();
        return redirect('/panel/category')->with('success', 'Data berhasil dihapus!');
    }
}
