<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Tag\TagRequest;
use App\Http\Resources\Tag\TagCollection;
use App\Http\Resources\Tag\TagResource;
use App\Models\Tag;

class TagController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate();
        return $this->returnJSON(new TagCollection($tags));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TagRequest  $tagRequest
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $tagRequest)
    {
       $tag = Tag::create($tagRequest->validated());
       return $this->returnJSON(new TagResource($tag));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return $this->returnJSON(new TagResource($tag));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TagRequest $tagRequest
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $tagRequest, Tag $tag)
    {
        $tag->update($tagRequest->validated());
        return $this->returnJSON(new TagResource($tag));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return $this->returnSuccess();
    }
    
}
