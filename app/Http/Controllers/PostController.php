<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show'] ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'cover_image'=> 'image|nullable|max:1999',
        ]);

        //handle the file upload
        if ($request->hasFile('cover_image')){
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/upload_images',$fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpeg';
        }

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = Post::findOrFail($post);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $post = Post::findOrFail($post);
         if(auth()->user()->id !== $post->user_id){
             return redirect('/posts')->with('error','Unauthorized Page');
         }

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title'=> 'required',
            'body'=> 'required',
            'cover_image'=> 'image|nullable|max:1999',
        ]);

        //handle the file upload
        if ($request->hasFile('cover_image')){
            //get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/upload_images',$fileNameToStore);

        }

        $post = Post::find($post)->first();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')){
            //delete previous image
            Storage::delete('public/upload_images/'.$post->cover_image);
            //store new image in directory
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect("/posts/$post->id")->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($post)->first();
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized Page');
        }

        if ($post->cover_image != 'noimage.jpeg'){
            Storage::delete('public/upload_images/'.$post->cover_image);
        }

        $post->delete();

        return redirect("/posts")->with('success','post deleted successfully');
    }
}
