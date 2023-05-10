<?php
namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Skills\StoreValidation;
use App\Models\Skill;

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
