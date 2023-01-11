<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function index()
    {
        $Category=Category::all();
        return response()->json(['categories'=>$Category]);
        // echo 'sucess message';
        // return $Categorys;
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
        $input=$request->all();
        $validate=Validator::make($input,
        [
            'cname'=> 'required|max:150',
            'slug'=>'required',
            'description'=> 'required',
        ]);
        if($validate->fails()){
            return response()->json(['Message'=>$validate->errors()->first()]);
        }
        Category::create($input);
        return response()->json(['message'=>'Data Insert Sucessfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category=Category::find($id);
        if(is_null($Category)){
            return response()->json(['Message'=>'Category not found!']);
        }
        return response()->json(['Find Data'=>$Category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data=Category::find($id);
        $data->cname = $request->cname;
        $data->slug = $request->slug;
        $data->description = $request->description;
        $data->update();
        return response()->json(['message'=>'updateded',$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category=Category::find($id);
        $Category->delete();
        return response()->json(['message'=>'deleted']);

    }
}
