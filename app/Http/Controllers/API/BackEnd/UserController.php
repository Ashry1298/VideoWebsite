<?php
namespace App\Http\Controllers\API\BackEnd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\StoreValidation;
use App\Http\Requests\BackEnd\Users\UpdateValidation;
use App\Http\Controllers\API\BackEnd\BackEndController;

class UserController extends BackEndController
{
    // public function __construct(User $model)
    // {
    //     parent::__construct($model);
    // }
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function store(StoreValidation $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('users.index');
    }
    public function update(UpdateValidation $request, $id)
    {
        $user = User::findorfail($id);
        $data = $request->validated();
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }
}
