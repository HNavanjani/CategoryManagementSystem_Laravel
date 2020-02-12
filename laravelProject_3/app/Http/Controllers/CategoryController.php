<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

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
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load view form
        return view('categories.create');
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
          ]);
        //add data
        $input = $request->all();
        //print_r($input);
        if(Category::create($input)){
            true; //redirect
        }
        else{
            false;
        }

        return redirect('/categories')->with('success', 'Category has been added');

        /*
        $category = new Category([
            'description' => $request->get('description'),
            'sequence'=> $request->get('sequence'),
          ]);
          $category->save();
          return redirect('/categories')->with('success', 'Category has been added');
        */
       
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
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
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
      ]);
        //add data
        $category = Category::find($id);

        $category->description = $request->get('description');
        $category->sequence = $request->get('sequence');
        $category->save();

        return redirect('/categories')->with('success', 'Category has been updated');
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
        $category->delete();
        return redirect('/categories')->with('success', 'Category has been deleted Successfully');
    }
}
