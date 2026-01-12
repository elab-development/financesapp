<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        return CategoryResource::collection(Category::all());
    }


    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'user_id'   =>'required|integer|exists:users,id',
            'name'      =>'required|string|max:255',
            'type'      =>'required|in:inflow,outflow',
            'parent_id' =>'nullable|integer|exists:categories,id',
            'active'    =>'nullable|boolean',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation did not go through.',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data = $validator->validated();
        $category = Category::create($data);
        return response()->json(new CategoryResource($category), 201);
    }

    public function show($id)
    {
        return new CategoryResource(Category::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message' => 'Category could not be found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'   =>'sometimes|integer|exists:users,id',
            'name'      =>'sometimes|string|max:255',
            'type'      =>'sometimes|in:bank,cash,savings,crypto,other',
            'parent_id' =>'nullable|integer|exists:categories,id',
            'active'    =>'nullable|boolean',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Validation did not go through.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $validator->validated();
        $category->update($data);
        return response()->json(new CategoryResource($category), 201);

    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if(!$category){
            return response()->json(['message' => 'Category could not be found.'], 404);
        }
        $category->delete();
        return response()->json(['message' => 'Category is deleted.'], 200);
    }








}
