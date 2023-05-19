<?php
namespace App\Http\Controllers\API\BackEnd;


use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\BackEnd\Pages\StoreValidation;
use App\Http\Controllers\API\BackEnd\BackEndController;
use App\Http\Resources\APi\BackEnd\PageResource;

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

    public function getRows()
    {
     $rows = $this->model::paginate(5);
     $rows= PageResource::collection($rows);
     return $rows;
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
