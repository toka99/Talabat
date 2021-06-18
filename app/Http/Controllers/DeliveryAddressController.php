<?php

namespace App\Http\Controllers;

use App\Models\Model\DeliveryAddress;
use App\Http\Resources\DeliveryAddress\DeliveryAddressResource;
use App\Http\Requests\DeliveryAddressRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Exception;


class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= auth()->user();
        return DeliveryAddressResource::collection($user->deliveryaddresses);
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
    public function store(DeliveryAddressRequest $request)
    {
        $deliveryaddress = new DeliveryAddress($request->all());
        $deliveryaddress->user_id = auth()->user()->id;
        $user= auth()->user();
        $user->deliveryaddresses()->save($deliveryaddress);
        return response([
            'data'=> new DeliveryAddressResource($deliveryaddress)
        ],Response::HTTP_CREATED);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryAddress $deliveryAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryAddress $deliveryAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryAddress $deliveryaddress)
    {
        $this->DeliveryAddressOwnerCheck($deliveryaddress);
        $deliveryaddress->update($request->all());
        return response([
            'data'=> new DeliveryAddressResource($deliveryaddress)
        ],Response::HTTP_CREATED);

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\DeliveryAddress  $deliveryAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryAddress $deliveryaddress)
    {
        $this->DeliveryAddressOwnerCheck($deliveryaddress);
        $deliveryaddress->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }


    public function DeliveryAddressOwnerCheck($deliveryaddress) {
 
        if (Auth::id() !== $deliveryaddress->user_id) {
            
            throw new Exception("It is not your address!",1);
        }
    }
}
