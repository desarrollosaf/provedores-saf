<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "data" => [
                [
                    "id" => 1,
                    "nombre" => "Pablo Jimenez",
                    "rfc" => "JISP980721",
                    "regimen_fiscal" => "Persona Fisica"
                ],
                [
                    "id" => 2,
                    "nombre" => "Martin Sanchez",
                    "rfc" => "SAGM990721",
                    "regimen_fiscal" => "Persona Fisica"
                ],
                [
                    "id" => 3,
                    "nombre" => "Oscar Eduardo Romero",
                    "rfc" => "ROHO980602",
                    "regimen_fiscal" => "Persona Fisica"
                ],
                [
                    "id" => 4,
                    "nombre" => "Materiales el centro",
                    "rfc" => "MAT201119",
                    "regimen_fiscal" => "Persona Moral"
                ],
            ]
        ];
        return response()->json($data, 200);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
