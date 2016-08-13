<?php

namespace Picturesque\Http\Controllers;

use Picturesque\Post;
use Illuminate\Http\Request;

use Picturesque\Http\Requests;

class PostsController extends Controller
{

    /**
     * Create instance of Post.
     *
     * @var post
     */
    private $post;

    /**
     * PostsController constructor.
     *
     * @param \Picturesque\Post $post
     */
    public function __construct(Post $post)
    {
        $this->middleware('api');

        $this->post = $post;
    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->post->select(
            'id',
            'title',
            'slug',
            'description')
            ->orderBy('updated_at')
            ->paginate(10);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->post->select(
            'id',
            'title',
            'slug',
            'description',
            'text')
            ->findOrFail($id);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->post->select(
            'id',
            'title',
            'slug',
            'description')
            ->findOrFail($id);
    }

    /**
     * Update the specified post in storage.
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
