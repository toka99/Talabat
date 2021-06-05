<?php

namespace App\Http\Controllers;

use App\Models\Model\MenuCategory;
use Illuminate\Http\Request;
use App\Models\Model\Restaurant;
use App\Models\User;
use App\Http\Resources\Menu\MenuCategoryResource;
use App\Http\Requests\MenuCategoryRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Exception;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        return MenuCategoryResource::collection($restaurant->menucategories);
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
    public function store(MenuCategoryRequest $request,Restaurant $restaurant)
    {    

        $menucategory = new MenuCategory($request->all());
        $menucategory->vendor_id = auth()->user()->id;

        if ($menucategory->vendor_id !== $restaurant->vendor_id) {
            
            throw new Exception("You are not Restaurant Owner!",1);
        }

        else{
        $restaurant->menucategories()->save($menucategory);
        return response([
            'data'=> new MenuCategoryResource($menucategory)
        ],Response::HTTP_CREATED);

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant , MenuCategory $menucategory)
    {
        return new MenuCategoryResource($menucategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuCategory $menuCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function update(MenuCategoryRequest $request, Restaurant $restaurant,MenuCategory $menucategory)
    {
        $this->MenuCategoryVendorCheck($menucategory);
        $menucategory->update($request->all());
        return response([
            'data'=> new MenuCategoryResource($menucategory)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model\MenuCategory  $menuCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant , MenuCategory $menucategory)
    {
        $this->MenuCategoryVendorCheck($menucategory);
        $menucategory->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function MenuCategoryVendorCheck($menucategory) {
 
        if (Auth::id() !== $menucategory->vendor_id) {
            
            throw new Exception("You are not Restaurant Owner!",1);
        }
    }
}
