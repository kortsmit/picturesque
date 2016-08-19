<?php

namespace Picturesque\Http\Controllers;

use Picturesque\Category;
use Illuminate\Http\Request;
use Picturesque\Http\Requests;

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
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryRequest $request)
    {

    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified category in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
