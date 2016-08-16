<?php

namespace Picturesque\Http\Controllers;

use Picturesque\Http\Requests\PostRequest;
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
            ->orderBy('updated_at', 'desc')
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified post.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param \Picturesque\Http\Requests\PostRequest $request
     * @param  int                                   $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = $this->post->find($id);
        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->description = $request->get('title');
        $post->text = $request->get('text');
        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();

        return 'Deleted post:' . $id;
    }
}
