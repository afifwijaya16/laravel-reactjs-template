<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
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
        $category = Category::orderBy('id','desc')->get();
        return response()->json([
            'success' => true,
            'message' => 'Category List',
            'data'    => $category
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
        $formData = $request->all();
        $validator = Validator::make($formData, [
            'name' => 'required',
        ], [
            'name.required' => 'Masukan nama kategori',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->getMessageBag()->first(),
                'errors' => $validator->getMessageBag(),
            ]);
        }

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return response()->json([
            'success' => true,
            'message' => 'category Stored',
            'data'    => $category
        ]);

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
        
        if ($category!=null) {
            return response()->json([
                'success' => true,
                'message' => 'Category Details',
                'data'    => $category
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not Found',
                'data' => null,
            ]);
        }

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
        $formData = $request->all();
        $validator = Validator::make($formData, [
            'name' => 'required',
        ], [
            'name.required' => 'Masukan nama kategori',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->getMessageBag()->first(),
                'errors' => $validator->getMessageBag(),
            ]);
        }

        $category = Category::find($id);
        if ($category!=null) {
            $category_data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ];

            $category->update($category_data);
            return response()->json([
                'success' => true,
                'message' => 'Category Updated',
                'data'    => $category
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not Found',
                'data' => null,
            ]);
        }
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
        if ($category!=null) {
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Category Delete',
                'data'    => $category
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not Found',
                'data' => null,
            ]);
        }
    }
}
