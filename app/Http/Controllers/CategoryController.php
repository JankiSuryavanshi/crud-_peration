<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all()->reverse()->values();;
        // $categories = Category::orderBy('tittle','asc')->take(5)->get();
        // $categories = Category::orderBy('tittle','asc')->first();
        // $categories = Category::orderBy('tittle');
        return view('categories.list',['categories' => $categories]);

    }
    public function create(){
        // $categories = Category::orderBy('tittle','desc')->get();

        return view('categories.New');
    }

    public function store(Request $request){
          //validate
        $request->validate([
          'tittle' => 'required|unique:categories|max:200'
        ]);
        //   dd($request->all());
        $category = new Category;

        $category->tittle = $request->tittle;
        $category->body = $request->body;

        $category->save();

        return redirect('/')->withSuccess('New Category Created');
    }

    public function edit($id){
        // dd($id);
        $category = Category::where('id',$id)->first();
        return view('categories.edit',['category' => $category]);
        // return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $category = Category::where('id',$id)->first();


        $category->tittle = $request->tittle;
        $category->body = $request->body;

        $category->save();

        return redirect('/')->withSuccess('Category deleted');

    }

    public function destroy($id){
        $category = Category::whereId($id)->first();

        $category->delete();

        return redirect('/');

    }
}
