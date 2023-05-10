<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Categories\StoreValidation;

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
    public function store(StoreValidation $request)
    {

        $data = $request->all();
        Category::create($data);
        return redirect()->route('categories.index');
    }
    public function update(StoreValidation $request, $id)
    {
        $category = Category::findorfail($id);
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index');
    }
}