<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\Advertisement\AdvertisementCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        // use this package in filter https://github.com/Tucker-Eric/EloquentFilter
        $advertisements = Advertisement::filter($request->all())->paginateFilter();
        return $this->returnJSON(new AdvertisementCollection($advertisements));
    }
}
