<?php

namespace App\Http\Controllers;

use App\Library\IPAPI;
use App\Library\sHelper;
use App\Models\Group;
use App\Models\Hobby;
use App\Models\Post;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $wall = [
            'new_post_group_id' => 0
        ];

        return view('home', compact('user', 'wall'));
    }

    public function viewProfile(Request $request)
    {
        User::where('name', 'like', '%'.$name.'%')->orWhere('username', 'like', '%'.$name.'%')->orderBy('name', 'ASC')->get();

        return view('home', compact('user'));
    }

    public function searchUser(Request $request)
    {

        $name = $request->input('query');
        if (empty($name)) 
            return redirect('/');

        $result = User::where('name', 'like', '%'.$name.'%')->orWhere('username', 'like', '%'.$name.'%')->orderBy('name', 'ASC')->get();

        return view('search', compact('result'));
    }

    public function welcome()
    {
        $top_users =  User::latest()
                            ->limit(8)  
                            ->get();

        $top_posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.*', 'users.profile_path')
            ->limit(9)
            ->get();


        return view('welcome', compact('top_users', 'top_posts'));
    }

    public function contact_us()
    {
        return view('contact_us');
    }

     public function about()
    {
        return view('about');
    }

    public function intern_diary()
    {
        // $posts = DB::table('posts')
        //     ->join('users', 'posts.user_id', '=', 'users.id')
        //     ->select('posts.*', 'users.*')
        //     // ->limit(9)
        //     ->get();

        // $posts = Post::Join('users', 'users.id', '=', 'posts.user_id')->paginate(6);

        // dd($posts);

        $posts = Post::orderBy('created_at', 'DESC')->paginate(6);

        // dd($posts[0]->user->username);

        return view('intern-diary', compact('posts'));
    }

    public function login_register()
    {
        return view('layouts.guest');
    }

    public function search(Request $request){

        $s = $request->input('s');
        if (empty($s)) return redirect('/');

        $user = Auth::user();

        $posts = Post::leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->where(function($query) use ($user) {

                $query->where('users.private', 0)->orWhere(function($query) use ($user){
                    $query->whereExists(function ($query) use($user){
                        $query->select(DB::raw(1))
                            ->from('user_following')
                            ->whereRaw('user_following.following_user_id = users.id and user_following.follower_user_id = '.$user->id);
                    });
                })->orWhere(function($query) use ($user){
                    $query->where('users.private', 1)->where('users.id', $user->id);
                });

            })->where('posts.content', 'like', '%'.$s.'%')->where('posts.group_id', 0)
            ->groupBy('posts.id')->select('posts.*')->orderBy('posts.id', 'DESC')->get();

        $comment_count = 2;

        $users = User::where('name', 'like', '%'.$s.'%')->orWhere('username', 'like', '%'.$s.'%')->orderBy('name', 'ASC')->get();

        return view('search', compact('users', 'posts', 'user', 'comment_count'));
    }
}
