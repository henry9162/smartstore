<?php

namespace SmartStore\Http\Controllers;

use Illuminate\Http\Request;

use SmartStore\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $categories = Category::all();

        return view('categories.index')->withCategories($categories);
    }

    
    
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = new Category;

        $category->name = $request->name;

        $category->save();

        return redirect()->route('categories.index', $category->id)->with('info', 'Successfuly created new category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = Category::find($id);

        return view('categories.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
       
        return view('categories.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $category = Category::find($id);

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()->route('categories.index', $category->id)->with('info', 'Successfully Updated category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $category = Category::find($id);

        $category->details()->detach();

        $category->delete();

        return redirect()->back()->with('info', 'Successfully deleted Category');
    }
}
