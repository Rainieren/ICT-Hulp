<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Post;
use App\Reply;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('nl');
        $tijd = Carbon::today();
        $posts = Post::count();
        $users = User::count();
        $replies = Reply::count();
        $channels = Channel::count();

        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('posts', 'users', 'replies', 'tijd', 'latestUsers', 'channels'));

    }

    public function showBerichten() {
        Carbon::setLocale('nl');
        $tijd = Carbon::today();
        $allPosts = Post::all();
        $channels = Channel::all();

        return view('admin.berichten', compact('tijd', 'allPosts', 'channels'));
    }



    public function editPost($id, Channel $channels)
    {
        $tijd = Carbon::today();
        $channels = Channel::all();
        $post = Post::find($id);


        return view('admin.editBericht', compact('post', 'tijd', 'channels'));
    }

    public function updatePost(Request $request, $id)
    {

        $post = Post::find($id);
        $post->channel_id = $request->channel_id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->slug = str_slug($request->title);

        $post->save();

        return back()->with('flash', 'Het bericht is bewerkt!');
    }

    public function deletePost(Post $post)
    {
        $post->replies()->delete();

        $post->delete();

        return back()->with('flash', 'Bericht is succesvol verwijderd');
    }

    public function makeChannel(Request $request, Channel $channel) { //Request een kanaal en haalt alle kanalen op
        $channel->channel_name = $request->channel_name; // De invgevulde channel-name wordt opgeslagen
        $channel->slug = str_slug($request->channel_name); // Hier wordt ook een slug van gemaakt
        $channel->save(); //Dit wordt opgeslagen

        return back()->with('flash', 'Het kanaal is aangemaakt'); //Met een flash message met confirmatie
    }

    public function showGebruikers() {
        Carbon::setLocale('nl'); // Zet de locale tijd op nederlands met carbon
        $tijd = Carbon::today(); // Haalt de tijd van je PC op met carbon
        $users = User::all(); //Haalt alle users omhoog

        return view('admin.gebruikers', compact('tijd', 'users')); //Geeft de vieeuw terug met alle bovenstaande attributen
    }

    public function showReplies() {
        Carbon::setLocale('nl');
        $tijd = Carbon::today();
        $replies = Reply::all();
        $posts = Post::all();


        return view('admin.replies', compact('tijd', 'replies', 'posts'));
    }

    public function editGebruikers($id)
    {
        $tijd = Carbon::today();
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.editUser', compact('user', 'tijd', 'roles'));
    }

    public function makeUser(Request $request)
    {
        $user = User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'username' => request('username'),
            'email' => request('email'),
            'date_of_birth' => request('date_of_birth'),
            'password' => bcrypt('password'),
            'confirmation_token' => str_random(25)
        ]);

        return back();
    }

    public function updateUser(Request $request, $id)
    {
        Carbon::setLocale('nl');
        $user = User::find($id);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $role = Role::where('role_name', '=', $request->input('role_name'))->first();
        $user->role_id = $role->id;
        $user->password = $request->password;
        $user->save();

        return back()->with('flash', $user->firstname . '`s gegevens zijn bewerkt!');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        $user->posts()->delete();
        $user->replies()->delete();

        $user->delete();

        return back()->with('flash', $user->firstname . '`s account is verwijderd.');
    }

    public function showChannels()
    {
        $tijd = Carbon::now();
        $channels = Channel::all();

        return view('admin.kanalen', compact('tijd', 'channels'));
    }

    public function deleteChannel($id)
    {
        $channel = Channel::find($id);
        $channel->posts()->delete();
        $channel->delete();

        return back()->with('flash', 'Kanaal succesvol verwijderd');
    }

    public function showSettings()
    {

        $tijd = Carbon::now();
        return view('admin.settings', compact('tijd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
