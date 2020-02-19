<?php

namespace App\Http\Controllers;

use App\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppings = Shopping::all();
        return response()->json($shoppings,200);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'amount' => 'required|min:1',
            'products_id' => 'required',
            'users_id' => 'required',
        ]);

        if($validator->fails()){
            $errors = $validator->errors();

            return response()->json($errors, 400);
        }

        $shopping = Shopping::create($request->all());

        return response()->json($shopping);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        return response()->json($shopping,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopping $shopping)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'amount' => 'required|min:1',
            'products_id' => 'required',
            'users_id' => 'required' . $shopping->id
        ]);

        if($validator->fails()){
            $errors = $validator->errors();

            return response()->json($errors, 400);
        }

        $shopping = update($request->all());

        return response()->json($shopping);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        $deleted = $shopping->delete();

        return response()->json('Registro removido!', 200);
    }
}
