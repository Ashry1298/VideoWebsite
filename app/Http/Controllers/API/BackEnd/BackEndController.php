<?php

namespace App\Http\Controllers\API\BackEnd;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Api\BackEnd\ApiResource;

class BackEndController extends Controller
{
    use HandleResponse;
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
        $rows=$this->getRows();
        $routeName = $pluralModelName;
        $data = [
            'rows' => $rows,
            'ModelName' => $ModelName,
            'PageTitle' => $PageTitle,
            'pageDesciption' => $pageDesciption,
            'routeName' => $routeName,
        ];

        return response()->json($this->handleCrudResponse($rows, 'Success', true, 200));
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
    public function getRows()
    {
        return [];
    }
}
