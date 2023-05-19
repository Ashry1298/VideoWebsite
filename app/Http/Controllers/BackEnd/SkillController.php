<?php
namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Skills\StoreValidation;
use App\Models\Skill;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success('Success!', 'Skill Added Successfully');
        return redirect()->route('skills.index');
    }
    public function update(StoreValidation $request, $id)
    {
        $skill = Skill::findorfail($id);
        $data = $request->validated();
        $skill->update($data);
        Alert::success('Success!', 'Skill Updated Successfully');
        return redirect()->route('skills.index');
    }
}
