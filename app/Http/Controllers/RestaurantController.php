<?php

namespace App\Http\Controllers;

use App\Models\Model\Restaurant;
use Illuminate\Http\Request;
use App\Http\Resources\Restaurant\RestaurantResource;
use App\Http\Requests\RestaurantUpadateRequest;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\Restaurant\RestaurantCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Exception;
// use App\Exceptions\Handler;

class RestaurantController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum')->except('index','show');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RestaurantCollection::collection(Restaurant::all());
        // return RestaurantCollection::collection(Restaurant::paginate(20));
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
    public function store(RestaurantRequest $request)
    {
             $restaurant = new Restaurant;
             $restaurant->vendor_id = auth()->user()->id;
             $restaurant->name = $request->name;
             $restaurant->description = $request->description;
             $restaurant->logo = $request->logo;
             $restaurant->location = $request->location;
             $restaurant->location_latitude = $request->location_latitude;
             $restaurant->location_longitude = $request->location_longitude;
             $restaurant->working_hours = $request->working_hours;
             $restaurant->minimum_order = $request->minimum_order;
             $restaurant->delivery_fees = $request->delivery_fees;
             $restaurant->save();
             return response([
                 'data'=> new RestaurantResource($restaurant)
             ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantUpadateRequest $request, Restaurant $restaurant)
    {
        $this->RestaurantVendorCheck($restaurant);
        // return $request->all();
        $restaurant->update($request->all());
        return response([
            'data'=> new RestaurantResource($restaurant)
        ],Response::HTTP_CREATED);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $this->RestaurantVendorCheck($restaurant);
        $restaurant->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
    

    public function RestaurantVendorCheck($restaurant) {
 
        if (Auth::id() !== $restaurant->vendor_id) {
            
            throw new Exception("Not Restaurant Owner!",1);
        }
    }
}
 