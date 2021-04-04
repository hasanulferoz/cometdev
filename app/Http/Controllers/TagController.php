<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::all();
        return view('admin.post.tag.index',[
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        Tag::create([
            'name' => $request -> name,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('tag.index')->with('success', 'Tag added successful');
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
        $edit_data = Tag::find($id);
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

         //return $request->all();

        $edit_data = $request->edit_id;

        $edit_data = Tag::find($edit_data);


        $edit_data->name = $request->name;


        $edit_data->slug = Str::slug($request-> name);
        $edit_data->update() ;
        return redirect()->back()->with('success', 'Tag updated successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = Tag::find($id);
        $delete_data->delete();
        return redirect()->back()->with('success', 'Tag deleted successful');
    }


    public function statusUpdateActive($id){
        $status_update = Tag::find($id);
        $status_update->status = true;
        $status_update->update();
    }


    public function statusUpdateInActive($id){
        $status_update = Tag::find($id);
        $status_update->status = false;
        $status_update->update();
    }
}
