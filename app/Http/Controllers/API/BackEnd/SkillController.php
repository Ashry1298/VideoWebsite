<?php
namespace App\Http\Controllers\API\BackEnd;


use App\Http\Resources\Api\Backend\SkillsResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\BackEnd\Skills\StoreValidation;
use App\Http\Controllers\API\BackEnd\BackEndController;

class SkillController extends BackEndController
{
      // public function __construct(User $model)
    // {
    //     parent::__construct($model);
    // }
    public function __construct(Skill $model)
    {
        $this->model = $model;
    }

   public function getRows()
   {
    $rows = $this->model::paginate(5);
    $rows= SkillsResource::collection($rows);
    return $rows;
   }

    public function store(StoreValidation $request)
    {
        $data = $request->all();
        Skill::create($data);
        return response()->json($this->handleCrudResponse($data, 'New Skill Added Successfully'));
    }
    public function update(StoreValidation $request, $id)
    {
        $skill = Skill::findorfail($id);
        $data = $request->validated();
        $skill->update($data);
        return response()->json($this->handleCrudResponse($skill, 'Skill Successfully Updated'));
    }

    public function show($id)
    {
        $skill = Skill::findorfail($id);
        $skill=new SkillsResource($skill);
        return response()->json($this->handleCrudResponse($skill, 'Success'));
    }
}
