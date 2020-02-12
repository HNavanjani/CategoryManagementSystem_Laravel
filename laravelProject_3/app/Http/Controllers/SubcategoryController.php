<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id']);
        return view('subcategories.create',compact('categories'));
        
        //load view form
        //return view('subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate data
         $request->validate([
            'description'=>'required',
            'sequence'=> 'required|integer',
            'category_id'=>'required',
          ]);
        //add data
        $input = $request->all();
        if(Subcategory::create($input)){
            true; //redirect
        }
        else{
            false;
        }

        return redirect('/subcategories')->with('success', 'Subcategory has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all(['id']);
        //return view('subcategories.create',compact('categories'));

        $subcategory = subCategory::find($id);

        return view('subcategories.edit', compact('subcategory','categories'));
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
        

        //validate data
       $request->validate([
        'description'=>'required',
        'sequence'=> 'required|integer',
        'category_id'=>'required',
      ]);
        //add data
        $subcategory = Subcategory::find($id);

        $subcategory->description = $request->get('description');
        $subcategory->sequence = $request->get('sequence');
        $subcategory->category_id = $request->get('category_id');
        $subcategory->save();

        return redirect('/subcategories')->with('success', 'Subcategory has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect('/subcategories')->with('success', 'Subcategory has been deleted Successfully');
    }
}
