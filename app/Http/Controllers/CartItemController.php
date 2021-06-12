<?php

namespace App\Http\Controllers;

use App\Models\Model\CartItem; 
use App\Models\Model\Restaurant; 
use App\Models\Model\MenuItem; 
use App\Models\Model\Cart; 
use App\Http\Resources\Cart\CartResource;
use App\Http\Resources\Cart\CartItemResource;
use App\Http\Requests\CartItemRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Exception;

class CartItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant, MenuItem $menuitem, Cart $cart)
    {
        return CartItemResource::collection($cart->cartitems);
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
     
    public function addToCart(Request $request, Restaurant $restaurant, MenuItem $menuitem)
    {
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', '=', $user)->first();

         if (! Cart::where('user_id', '=', $user)->exists()) 
         {
         $cart = new Cart();
         $cart->sub_total = 0; 
         $cart->total_price = 0; 
         $cart->user_id = auth()->user()->id;
         $cart->restaurant_id = $restaurant->id;
         $cart->save();
          }
        
         $cartitem = new CartItem($request->all());
         $cartitem->menu_item_id = $menuitem->id;
         $cartitem->restaurant_id = $restaurant->id;
         if($cart->restaurant_id == $cartitem->restaurant_id)
         {
         $cartitemcheck=CartItem::where('menu_item_id', '=', $cartitem->menu_item_id)->first();

         if( CartItem::where('menu_item_id', '=', $cartitem->menu_item_id)->exists())
         {
            $cartitemcheck->quantity += 1;
            $cartitemcheck->price=$cartitemcheck->quantity * $menuitem->price;
            $cartitemcheck->save();

            $cart->sub_total = $cart->cartitems->sum('price'); 
            $cart->total_price=$cart->sub_total + $restaurant->delivery_fees;
            $cart->save();

            return response([
                'cart-item'=> new CartItemResource($cartitemcheck)  ,
                'cart'     =>   new CartResource($cart)
             ],Response::HTTP_CREATED);
         }
        
         else 
         {
         
         $cartitem->cart_id = $cart->id;
         $cartitem->quantity=1;
         $cartitem->price=$cartitem->quantity * $menuitem->price;
         $cartitem->save();

         $cart->sub_total = $cart->cartitems->sum('price'); 
         $cart->total_price=$cart->sub_total + $restaurant->delivery_fees;
         $cart->save();

         return response([
             'cart-item'=> new CartItemResource($cartitem)  ,
             'cart'     =>   new CartResource($cart)
          ],Response::HTTP_CREATED);
         }
        }
         else{
            return response(['message' => 'You Can not Select from 2 different restaurants at same time empty your cart first'],401);
         }
        
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem)
    {
        //
    }
}
