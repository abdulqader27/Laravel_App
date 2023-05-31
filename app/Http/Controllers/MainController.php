<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reaction;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function GoCreatePost()
    {
        return view('WrittingPost');
    }

    public function  RecordPost(Request $request)
    {
      $post =  Post::create([
            'title' => $request->title ,
            'body' => $request->body ,
            'user_id' => auth()->user()->id ,
            'Publisher' => auth()->user()->name
        ]);
        $Publisher = User::where('id' , $post->user_id)->first();
        $Publisher_Photo = $Publisher->ProfilePhoto;
        $desc = $Publisher->name . "has published a post" . "[$post->title]";
        $users = User::where('id' , '!=' , auth()->user()->id)->get();
        $not2 =Notification::send($users , new PostNotification($post->id , $post->Publisher ,$Publisher_Photo , $desc));
        return redirect()->route('dashboard');



    }

    public function GoDashboard()
    {

        $posts = Post::all();
        return view('dashboard' , compact('posts'));
    }
    public function GoComments($id)
    {
        $post = Post::find($id);
        return view('seeComments' , compact('post'));

    }

    public function RecordComment(Request $request , $id)
    {
        Comment::create([
            'Comment' => $request->comment ,
            'Commenter' => auth()->user()->name ,
            'post_id' => $id ,
            'user_id' => auth()->user()->id
        ]);
        $user = User::where('id' , auth()->user()->id)->first();
        $desc = "$user->name" . " wrote a comment on your post";
        $ToPublisher = Post::where('id' , $id)->pluck('Publisher');
        $ToCos = User::where('name' , $ToPublisher)->first();
        if($ToCos->name != auth()->user()->name)
        {
          $not = Notification::send($ToCos , new PostNotification($id , $user->name, $user->ProfilePhoto , $desc));
        }
        return redirect("/Comments/$id");
    }

    public function SetMoreData(Request $request)
    {
        $date = "$request->year/$request->month/$request->day";

        User::where('id' , auth()->user()->id)->update([
            'Country' => $request->country ,
            'Birthday' => $date ,
            'work' => $request->work ,
            'Gender' => $request->Gender ,
            'City' => $request->City ,
            'Wisdom' => $request->Wisdom
        ]);

        return redirect()->route('profile.edit');
    }

    public function ReflectProfile($name)
    {
        $TheUser = User::where('name' , $name)->first();
        return view('ReflectProfile' , compact('TheUser'));
    }
    public function GoNotifications()
    {
        $user = User::find(auth()->user()->id);
        return view('SeeingNotifications' , compact('user'));
    }

    public function markAsRead($not_id)
    {
       // $notification = DB::table('notifications')->where('notifiable_id' , auth()->user()->id)->where('data->post_id' , $id)->get();
       // DB::table('notifications')->where('id' , $notification_id)->update(['read_at' => now()]);
       // return redirect("/Comments/$id");
       DB::table('notifications')->where('id' , $not_id)->update(['read_at' => now()]);
       $not = DB::table('notifications')->where('id' , $not_id)->first();
       $post_id = json_decode($not->data)->post_id;
       return redirect("/Comments/$post_id");



    }
    public function ChangePhoto(Request $request)
    {

        $img_name = $request->ProfilePhoto;
        $path =  Storage::disk('public')->put('/users' ,$img_name);
        User::where('id' , auth()->user()->id)->update(['ProfilePhoto' => $path]);
        return redirect()->back();
    }
    public function deleteNotifications()
    {
        DB::table('notifications')->where('notifiable_id' , auth()->user()->id)->delete();
        return redirect()->back();
    }

    public function RecordLike($id)
    {
        $reacter = Reaction::where('post_id' , $id)->where('ReactedBy' , auth()->user()->name)->first();
        if($reacter == null)
        {
            Reaction::create([
                'ReactionType' => 'Like' ,
                  'ReactedBy' => auth()->user()->name ,
                  'post_id' => $id
              ]);
              $user = User::where('id' , auth()->user()->id)->first();
              $desc = "$user->name" . " reacted with your post";
              $ToPublisher = Post::where('id' , $id)->pluck('Publisher');
              $ToCos = User::where('name' , $ToPublisher)->first();
              if($ToCos->name != auth()->user()->name)
              {
                $not = Notification::send($ToCos , new PostNotification($id , $user->name , $user->ProfilePhoto , $desc));
              }
             return redirect()->back();

        }else
        {
            Reaction::find($reacter->id)->delete();
            return redirect()->back();
        }




    }

}
