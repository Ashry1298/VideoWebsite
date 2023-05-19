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
        return redirect()->route('skills.index');
    }
    public function update(StoreValidation $request, $id)
    {
        $category = Skill::findorfail($id);
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('skills.index');
    }
}
