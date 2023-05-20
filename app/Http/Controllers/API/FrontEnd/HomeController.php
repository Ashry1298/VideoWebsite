<?php
namespace App\Http\Controllers\API\FrontEnd;

use App\Models\Tag;
use App\Models\Page;
use App\Models\User;
use App\Models\Skill;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BackEnd\Comments\Update;
use App\Http\Requests\FrontEnd\Users\UpdateValidation;
use App\Http\Requests\BackEnd\Messages\StoreValidation;
use App\Http\Requests\FrontEnd\Comments\StoreValidation as CommentStoreValidation;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {

        $videos = Video::published()->orderby('id', 'desc')->paginate(30);
        if (request()->has('search') && request()->get('search') != '') {
            $videos = $videos->where('name', 'like', request()->get('search'));
        }
        return view('front-end.home', compact('videos'));
    }

    public function skills($id)
    {
        $skill = Skill::findorfail($id);
        $videos = Video::published()->wherehas('skills', function ($query) use ($id) {
            $query->where('skill_id', $id);
        })->orderby('id', 'desc')->get();
        return view('front-end.skill.index', compact('videos', 'skill'));
    }
    public function tags($id)
    {
        $tag = Tag::findOrFail($id);
        $videos = $tag->videos()->published()->orderBy('id', 'desc')->get();
        // Video::whereHas('tags' , function ($query) use ($id){
        //     $query->where('tag_id' , $id);
        // })->orderBy('id' , 'desc')->get();
        return view('front-end.tag.index', compact('videos', 'tag'));
    }
    public function categories($id)
    {
        $cat = Category::findorfail($id);
        //remembe using scope
        $videos = Video::published()->where('category_id', $id)->orderby('id', 'desc')->get();
        if (count($videos) == 0) {
            return redirect()->back();
        }

        return view('front-end.category.index', compact('videos', 'cat'));
    }

    public function video($id)
    {
        $video = Video::published()->with('comments.user', 'category', 'skills', 'tags', 'user')->findorfail($id);
        return view('front-end.video.index', compact('video'));
    }

    public function updateComment($id, Update $request)
    {

        $comment = Comment::findorfail($id);
        if ($comment->user_id != auth()->user()->id || auth()->user()->group == 'admin') {

            $comment->update(
                $request->validated()
            );
        }
        return redirect()->route('front-end.video', $comment->video_id);
    }

    public function storeComment(CommentStoreValidation $request)
    {
        $video = Video::published()->findorfail($request->video_id);
        Comment::create($request->validated() + [
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('front-end.video', $request->video_id);
    }
    public function storeMessage(StoreValidation $request)
    {

        Message::create($request->validated());
        Alert::success('Success!', 'Thanks for sending your message ,we will contact you soon ');
        return redirect()->route('frontend.landing');
    }

    public function welcome()
    {
        $videos = Video::where('published',1)->orderby('id', 'desc')->paginate(9);
        return view('welcome', compact('videos'));
    }


    public function page($id)
    {
        $page = Page::findorfail($id);
        return view('front-end.page.index', compact('page'));
    }

    public function profile($id)
    {

        $user = User::findorfail($id);
        return view('front-end.profile.index', compact('user'));
    }

    public function update(UpdateValidation $request)
    {
        $data = $request->all();
        $user = User::findorfail($request->id);
        $email = User::where('id', '!=', $request->id)->where('email', $request->email)->first();
        if ($email) {
            return redirect()->back()->with('error','Email Already Token');
        }
        if ($request->password != '') {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->back();
    }
}
