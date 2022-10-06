<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Http\Resources\PageResource;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Page::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Page::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Model\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        if($request->has('withBook'))
            $page->loadMissing('book');

        if($request->has('withOrigins'))
            $page->loadMissing('origins');

        if($request->has('withDestinations'))
            $page->loadMissing('destinations');

        return new PageResource($page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Model\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $page->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Model\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
    }
}
