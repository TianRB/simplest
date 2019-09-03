<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        return view(Category::$config['viewPrefix'].'.index', ['list' => Category::all()]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(){
        return view(Category::$config['viewPrefix'].'.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){

        // dd($request->all());
        $input = $request->all();
        $m = new Category;

       // Rules


        $validator = Validator::make($input, Category::$storeRules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            if (Category::$config['hasSlug']) { // Si es catalogo
                $m->slug = str_slug($input['name']);
            } elseif (Category::$config['hasImage']) { // Si tiene imagen
                $file = Input::file(Category::$config['imageColumn']);
                $file_name = str_random(16).'.'.$file->getClientOriginalExtension();
                $img_path = Category::$config['imageDirectory'].$file_name;
                $request->image->move(Category::$config['imageDirectory'], $file_name);
                $m->image = $img_path;
            }

            $m->fill($input)->save();
            return redirect()->route(Category::$config['routePrefix'].'.index')
                ->with('message', 'Category creada');
        }
    }

    /**
    * Display the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id){
        return view(Category::$config['viewPrefix'].'.show', ['m' => Category::find($id)]);
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id){
        return view(Category::$config['viewPrefix'].'.edit', ['m' => Category::find($id)]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id){
        // dd($request->all());
        $input = $request->all();
        $m = Category::find($id);

       // Rules
        if (Category::$config['hasSlug']) { // Si es catalogo
            $m->slug = str_slug($input['name']);
            $rules = [
                // 'name' => 'unique:Category|required|max:255',
                'display_name' => 'required|max:255',
                'description' => 'max:800'
            ];
        } else {
            $rules = [];
        }

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $m->update($input);
            $m->save();
            return redirect()->route(Category::$config['routePrefix'].'.index')
                ->with('message', 'Category actualizada');
        }
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id){
        $m = Category::find($id);
        $m->delete();
        return redirect()->route(Category::$config['routePrefix'].'.index')
            ->with('message', 'Category eliminada');
    }
}
