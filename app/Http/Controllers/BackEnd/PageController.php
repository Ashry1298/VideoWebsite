<?php
namespace App\Http\Controllers\BackEnd;


use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Pages\StoreValidation;

class PageController extends BackEndController
{
    // public function __construct(User $model)
    // {
    //     parent::__construct($model);
    // }
    public function __construct(Page $model)
    {
        $this->model = $model;
    }
    public function store(StoreValidation $request)
    {
   
        $data = $request->all();
        Page::create($data);
        return redirect()->route('pages.index');
    }
    public function update(StoreValidation $request, $id)
    {   
        $category = Page::findorfail($id);
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('pages.index');
    }
}
