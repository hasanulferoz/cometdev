<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\Category;
// use Illuminate\Support\Str;
use Illuminate\Support\Str;
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

        $data = Category::all();

        return view('admin.post.category.index', [
            'all_data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this-> validate($request, [
            'name' => 'required'
        ]);

        Category::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
            
        ]);

        return redirect()->route('category.index')->with('success', 'Category added successfully');
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
        $edit_data = Category::find($id);

        return [
            'id' => $edit_data->id,
            'name' => $edit_data->name
        ];
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
        // return $request->all();

        $edit_data = $request->edit_id;
        $edit_data = Category::find($edit_data);
        $edit_data->name = $request->name;
        $edit_data->slug = Str::slug($request-> name);
        $edit_data->update() ;
        return redirect()->back()->with('success', 'Category updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Category::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success', 'Category deleted successful');
    }


    

    public function statusUpdateActive($id){
        $status_update = Category::find($id);
        $status_update->status = true;
        $status_update->update();
    }


    public function statusUpdateInActive($id){
        $status_update = Category::find($id);
        $status_update->status = false;
        $status_update->update();
    }
}
