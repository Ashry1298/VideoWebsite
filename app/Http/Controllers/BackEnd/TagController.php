<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Tags\StoreValidation;
use App\Models\Tag;

class TagController extends BackEndController
{
    // public function __construct(User $model)
    // {
    //     parent::__construct($model);
    // }
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
    public function store(StoreValidation $request)
    {
        $data = $request->all();
        Tag::create($data);
        return redirect()->route('tags.index');
    }
    public function update(StoreValidation $request, $id)
    {
        $category = Tag::findorfail($id);
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('tags.index');
    }
}
