<?php
namespace App\Http\Controllers\API\BackEnd;



use App\Models\Tag;
use App\Http\Requests\BackEnd\Tags\StoreValidation;
use App\Http\Controllers\API\BackEnd\BackEndController;
use App\Http\Resources\APi\BackEnd\TagResource;

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

    public function getRows()
    {
     $rows = $this->model::paginate(5);
     $rows= TagResource::collection($rows);
     return $rows;
    }
    public function store(StoreValidation $request)
    {
        $data = $request->all();
        Tag::create($data);
        return response()->json($this->handleCrudResponse($data, 'New Tag Added Successfully'));
    }
    public function update(StoreValidation $request, $id)
    {
        $tag = Tag::findorfail($id);
        $data = $request->validated();
        $tag->update($data);
        return response()->json($this->handleCrudResponse($tag, 'Tag Successfully Updated'));
    }

    public function show($id)
    {
        $tag = Tag::findorfail($id);
        $tag=new TagResource($tag);
        return response()->json($this->handleCrudResponse($tag, 'Success'));
    }
}
