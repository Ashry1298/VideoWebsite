<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Pages\StoreValidation;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success('Success!', 'Page Added Successfully');
        return redirect()->route('pages.index');
    }
    public function update(StoreValidation $request, $id)
    {
        $page = Page::findorfail($id);
        $data = $request->validated();
        $page->update($data);
        Alert::success('Success!', 'Page Updated Successfully');
        return redirect()->route('pages.index');
    }
}
