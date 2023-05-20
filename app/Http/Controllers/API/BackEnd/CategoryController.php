<?php

namespace App\Http\Controllers\API\BackEnd;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Categories\StoreValidation;
use App\Http\Resources\APi\BackEnd\CategoryResource;

class CategoryController extends BackEndController
{
    // public function __construct(User $model)
    // {
    //     parent::__construct($model);
    // }
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function getRows()
    {
        $rows = $this->model::paginate(5);
        $rows = CategoryResource::collection($rows);
        return $rows;
    }
    public function store(StoreValidation $request)
    {

        $data = $request->all();
        Category::create($data);
        return response()->json($this->handleCrudResponse($data, 'New Category Added Successfully'));
    }
    public function update(StoreValidation $request, $id)
    {
        $category = Category::findorfail($id);
        $data = $request->validated();
        $category->update($data);
        return response()->json($this->handleCrudResponse($category, 'Category Successfully Updated'));
    }

    public function show($id)
    {
        $category = Category::findorfail($id);
        $category=new CategoryResource($category);
        return response()->json($this->handleCrudResponse($category, 'Success'));
    }
}
