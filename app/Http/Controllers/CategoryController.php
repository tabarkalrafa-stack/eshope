<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return[
            'stautus'=>'success',
            'message'=>'all categories',
            'data'=>$categories
        ];
    }
    public function store(StoreCategoryRequest $request)
    {
        $categpry=Category::create($request->all());
        return[
            'stautus'=>'success',
            'message'=>' add new category successfuly',
            'data'=>$categpry
        ];

    }
    public function show(Category $category)
    {
        return [
            'status' => 'success',
            'message' => 'Category details',
            'data' => $category
        ];
    }
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return [
            'status' => 'success',
            'message' => 'Category updated successfully',
            'data' => $category
        ];
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return [
            'status' => 'success',
            'message' => 'Category deletedsuccessfully',
            'data' => $category
        ];
    }
}