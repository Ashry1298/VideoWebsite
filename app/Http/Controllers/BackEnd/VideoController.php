<?php

namespace App\Http\Controllers\BackEnd;


use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Videos\StoreValidation;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class VideoController extends BackEndController
{
    // public function __construct(User $model)
    // {
    //     parent::__construct($model);
    // }
    public function __construct(Video $model)
    {
        $this->model = $model;
    }
    protected function append()
    {
        $arr = [
            'categories' =>  Category::get(),
            'skills' => Skill::get(),
            'tags'=>Tag::get(),
            'selectedSkills' => [],
            'selectedTags'=>[],
        ];
        if (request()->route()->parameter('video')) {
            $arr['selectedSkills'] = Video::find(request()->route()->parameter('video'))
                ->skills()->get()->pluck('id')->toArray();
            $arr['selectedTags'] = Video::find(request()->route()->parameter('video'))
                ->tags()->get()->pluck('id')->toArray();
        }
        return $arr;
    }
    public function store(StoreValidation $request)
    {

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $video = Video::create($data);
        if ($request->has('skills') && !empty($request->skills)) {

            $video->skills()->sync($data['skills']);
        }
        if ($request->has('tags') && !empty($request->skills)) {

            $video->skills()->sync($data['tags']);
        }
        return redirect()->route('videos.index');
    }
    public function update(StoreValidation $request, Video $video)
    {
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $video->update($data);
        if ($request->has('skills') && !empty($request->skills)) {

            $video->skills()->sync($data['skills']);
        }
        if ($request->has('tags') && !empty($request->skills)) {

            $video->tags()->sync($data['tags']);
        }
        return redirect()->route('videos.index');
    }
}
