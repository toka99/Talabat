<?php

namespace App\Http\Controllers;

use App\Models\Model\Rating;
use App\Http\Resources\RatingResource;
use App\Http\Requests\RatingRequest;
use App\Models\Model\Restaurant;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Exception;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        return RatingResource::collection($restaurant->ratings);
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
    public function store(RatingRequest $request,Restaurant $restaurant)
    {    
        $rating = new Rating($request->all());
        $rating->user_id = auth()->user()->id;
        $restaurant->ratings()->save($rating);
        return response([
            'data'=> new RatingResource($rating)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Rating  $rating
     * @return \Illuminate\Http\Response1
     */
    public function update(RatingRequest $request, Restaurant $restaurant,Rating $rating)
    {
        $this->RatingUserCheck($rating);
        $rating->update($request->all());
        return response([
            'data'=> new RatingResource($rating)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant,Rating $rating)
    {
        $this->RatingUserCheck($rating);
        $rating->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }


    
    public function RatingUserCheck($rating) {
 
        if (Auth::id() !== $rating->user_id) {
            
            throw new Exception("You are not Rating Owner!",1);
        }
    }
}
