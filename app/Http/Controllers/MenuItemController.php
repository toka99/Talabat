<?php

namespace App\Http\Controllers;

use App\Models\Model\MenuItem;
use App\Models\Model\MenuCategory;
use App\Models\Model\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Menu\MenuItemResource;
use App\Http\Requests\MenuItemRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Exception;


class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Restaurant $restaurant ,MenuCategory $menucategory )
    {
        return MenuItemResource::collection($menucategory->menuitems);
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
    public function store(MenuItemRequest $request,Restaurant $restaurant,MenuCategory $menucategory)
    {    

        $menuitem = new MenuItem($request->all());
        $menuitem->vendor_id = auth()->user()->id;
        $menuitem->restaurant_id = $restaurant->id;

        if ($menuitem->vendor_id !== $restaurant->vendor_id) {
            
            throw new Exception("You are not Restaurant Owner!",1);
        }

        else{
            
        $menucategory->menuitems()->save($menuitem);
        // $restaurant->menuitems()->save($menuitem);
        return response([
            'data'=> new MenuItemResource($menuitem)
        ],Response::HTTP_CREATED);

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(MenuItemRequest $request, Restaurant $restaurant,MenuCategory $menucategory, MenuItem $menuitem)
    {
        $this->MenuItemVendorCheck($menuitem);
        $menuitem->update($request->all());
        return response([
            'data'=> new MenuItemResource($menuitem)
        ],Response::HTTP_CREATED);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant , MenuCategory $menucategory , MenuItem $menuitem)
    {
        $this->MenuItemVendorCheck($menuitem);
        $menuitem->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function MenuItemVendorCheck($menuitem) {
 
        if (Auth::id() !== $menuitem->vendor_id) {
            
            throw new Exception("You are not Restaurant Owner!",1);
        }
    }
}
