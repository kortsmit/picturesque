<?php

namespace Picturesque\Http\Controllers;

use Picturesque\Photo;
use Illuminate\Http\Request;

use Picturesque\Http\Requests;

class PhotosController extends Controller
{
    /**
     * Create instance of Photo.
     *
     * @var photo
     */
    private $photo;

    /**
     * PhotosController constructor.
     *
     * @param \Picturesque\Photo $photo
     */
    public function __construct(Photo $photo)
    {
        $this->middleware('api');

        $this->photo = $photo;
    }

    /**
     * Display a listing of photos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->photo->get();
    }

    /**
     * Show the form for creating a new photo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created photo in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified photo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified photo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified photo in storage.
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
     * Remove the specified photo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
