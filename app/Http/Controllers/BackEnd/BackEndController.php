<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class BackEndController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $ModelName = $this->getModelName();
        $PageTitle = $this->pluralModelName();
        $pluralModelName = $this->getClassNameFromModel();
        $pageDesciption = 'Here You Can Add , Edit Or Delete' . $this->pluralModelName();
        $rows = $this->model::paginate(10);
        $routeName = $pluralModelName;
        return view('back-end.' . $this->getClassNameFromModel() . '.index', compact('rows', 'ModelName', 'PageTitle', 'pageDesciption', 'routeName'));
    }

    public function create()
    {
        $PageTitle = 'Create ' . $this->getModelName();
        $pageDesciption = 'Here You Can Create ' . $this->getModelName();
        $pluralModelName = $this->getClassNameFromModel();
        $routeName = $pluralModelName;
        $append = $this->append();
        return view('back-end.' . $this->getClassNameFromModel() . '.create', compact('PageTitle', 'pageDesciption', 'pluralModelName', 'routeName', 'append'))->with($append);
    }

    public function edit($id)
    {
        $PageTitle = 'Edit ' . $this->getModelName();
        $pageDesciption = 'Here You Can Edit ' . $this->getModelName();
        $pluralModelName = $this->getClassNameFromModel();
        $routeName = $pluralModelName;
        $row = $this->model::findorfail($id);
        $append = $this->append();
        return view('back-end.' . $this->getClassNameFromModel() . '.edit', compact('row', 'pluralModelName', 'PageTitle', 'pageDesciption', 'routeName',))->with($append);
    }
    public function getClassNameFromModel()
    {
        return strtolower($this->pluralModelName());
    }
    public function pluralModelName()
    {
        return  ucfirst(Str::plural($this->getModelName()));
    }

    public function getModelName()
    {
        return class_basename($this->model);
    }
    public function destroy($id)
    {
        $this->model::findorfail($id)->delete();
        return back();
    }

    protected function append()
    {
        return [];
    }
}
