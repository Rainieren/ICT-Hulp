<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Reply;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Zttp\Zttp;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    /**
     * Display a listing of the resource.
     *
     * @param Channel $channel
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel)
    {
        Carbon::setLocale('nl');

        if ($channel->exists) {
            $posts = $channel->posts()->latest()->get();
        } else {
            $posts = Post::all();
        }


        
        return view('posts.questions', compact('posts'));
    }

    public function showQuestions() {
        return view('posts.allQuestions');
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

//        $response = Zttp::asFormParams()->post('https://www.google.com/recaptcha/api/siteverify', [
//            'secret' => config('services.recaptcha.secret'),
//            'response' => $request->input('g-recaptcha-response'),
//            'remoteip' => $_SERVER['REMOTE_ADDR']
//        ]);
//
//        if (! $response->json()['success']) {
//            throw new \Exception('Recaptcha gefaald');
//        }

        $post = Post::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'text' => request('text'),
            'slug' => request('title')
        ]);

        return redirect($post->path())->with('flash', 'Uw bericht is geplaatst!');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($channelId, Post $post)
    {
        Carbon::setLocale('nl');
//        if (auth()->check()) {
//            auth()->user()->read($post);
//        }

//       return view('posts.show', compact('post'));
        return view('posts.show', [
            'post' => $post,
            'replies' => $post->replies()->paginate(12)

        ]);

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
    public function destroy($channelId, Post $post)
    {
        $post->replies()->delete();
        $post->delete();

        if( request()->wantsJson()) {
            return response([], 204);
        }

        return redirect('/');

    }
}
