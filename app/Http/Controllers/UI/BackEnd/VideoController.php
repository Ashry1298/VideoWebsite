<?php

namespace App\Http\Controllers\UI\BackEnd;


use App\Models\Tag;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Str;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\BackEnd\Comments\Update;
use App\Http\Controllers\UI\BackEnd\CommentTrait;
use App\Http\Requests\BackEnd\Videos\StoreValidation;
use App\Http\Controllers\UI\BackEnd\BackEndController;
use App\Http\Requests\BackEnd\Videos\UpdateValidation;


class VideoController extends BackEndController
{
    use CommentTrait;
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
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
        ];
        if (request()->route()->parameter('video')) {
            // $this->getSelectedData('selectedSkills', 'video');
            $arr['selectedSkills'] = Video::find(request()->route()->parameter('video'))
                ->skills()->get()->pluck('id')->toArray();
            $arr['selectedTags'] = Video::find(request()->route()->parameter('video'))
                ->tags()->get()->pluck('id')->toArray();
            $arr['comments'] = Video::find(request()->route()->parameter('video'))
                ->comments()->get();
        }
        return $arr;
    }
    public function store(StoreValidation $request)
    {
        $data = $request->validated();
        $image = $this->UploadImage($request->file('image'), $data['name']);
        $data['image'] = $image;
        $video = Video::create($data + ['user_id' => Auth::user()->id]);
        $this->sync($video, $data);
        Alert::success('Success!', 'Video Added Successfully');
        return redirect()->route('videos.index');
    }
    public function update(UpdateValidation $request, Video $video)
    {
        $data = $request->validated();
        if ($request->file('image')) {
            unlink(public_path('Upload/Images/' . $video->name . '/' . $video->image));
            $data['image'] = $this->updateImage($request->file('image'), $data['name']);
            $video->update($data, ['user_id' => Auth::user()->id]);
        }
        $video->update($data, ['user_id' => Auth::user()->id]);
        $this->sync($video, $data);
        Alert::success('Success!', 'Video Updated Successfully');
        return redirect()->route('videos.index');
    }
    protected function sync($row, $data)
    {
        if (isset($data['tags']) && !empty($data['tags'])) {
            $row->tags()->sync($data['tags']);
        }
        if (isset($data['skills'])  && !empty($data['skills'])) {
            $row->skills()->sync($data['skills']);
        }
    }
    protected function UploadImage($image, $VideoName)
    {
        $ext = $image->getClientOriginalExtension();
        $fileName = time() . str::random(10) . '.' . $ext;
        $image->move(public_path('Upload/Images/' . $VideoName), $fileName);
        return $fileName;
    }

    protected function updateImage($image, $VideoName)
    {
        $ext = $image->getClientOriginalExtension();
        $fileName = time() . str::random(10) . '.' . $ext;
        $image->move(public_path('Upload/Images/' . $VideoName), $fileName);
        return $fileName;
    }
    public function destroy($id)
    {
        $video = $this->model::findorfail($id);
        if ($video->image != null) {
            File::deleteDirectory(public_path('Upload/Images/' . $video->name));
        }
        $video->delete();
        return back();
    }

}
