<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /* dd('abc');*/
      $category = Category::all();
       return view('category.table', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $rule = [
            'categoryname' => ['required','alpha'],
            ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return redirect('/category')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
             $category = new Category;
            $category->category_name = $request->categoryname;
            $category->save();
            return redirect('/category')->with('message', 'Add record successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::where('id', $category->id)->get();
       return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::where('id', $category->id)->get();
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $rule = [
            'categoryname' => ['required','alpha'],
            ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return redirect('/category')
                    ->withErrors($validator)
                    ->withInput();
        }
        else{
              $category =  Category::find($category->id);
            $category->category_name = $request->categoryname;
            $category->save();
            return redirect('/category')->with('message', 'Updated record successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $delete = Category::where('id',$category->id)->delete();
        if($delete == true){
            $message = "Deleted successfully.";
            return redirect('/category')->with('message', 'Record delete successfully!');
        }    
    }
}
