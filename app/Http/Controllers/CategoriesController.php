<?php

namespace Picturesque\Http\Controllers;

use Picturesque\Category;
use Picturesque\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Create instance of Category.
     *
     * @var post
     */
    private $category;

    /**
     * PostsController constructor.
     *
     * @param \Picturesque\Category $category
     */
    public function __construct(Category $category)
    {
        $this->middleware('api');

        $this->category = $category;
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->category->select(
            'id',
            'name',
            'slug')
            ->orderBy('updated_at')
            ->paginate(10);
    }

    /**
     * Show the form for creating a new category.
     *
     * @param \Picturesque\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $request)
    {
        return $this->category->create([
            'name'  => $request->get('title'),
            'slug'  => $request->get('slug'),
            'color' => $request->get('color'),
        ]);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param \Picturesque\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

    }

    /**
     * Display the specified category.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->category->select(
            'id',
            'name',
            'slug')
            ->findOrFail($id);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->category->select(
            'id',
            'title',
            'slug')
            ->findOrFail($id);
    }

    /**
     * Update the specified category in storage.
     *
     * @param \Picturesque\Http\Requests\CategoryRequest $request
     * @param  int                                       $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->find($id);
        $category->title = $request->get('name');
        $category->slug = $request->get('slug');
        $category->save();

        return $category;
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->find($id)->delete();

        return 'Deleted category:' . $id;
    }
}
