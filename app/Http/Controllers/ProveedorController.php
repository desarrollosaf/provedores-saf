<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\ProveedorRequest;
use App\Models\Asentamientos;
use App\Models\DatosGenerales;
use App\Models\Entidades;
use App\Models\Municipios;
use Illuminate\Http\Request;

class ProveedorController extends BaseController
{
    protected $datosGenerales = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DatosGenerales $datosGenerales)
    {
        $this->middleware('auth:api');
        $this->datosGenerales = $datosGenerales;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
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
    public function store(ProveedorRequest $request)
    {
        $datosGenerales = DatosGenerales::create([
            "user_id" => $request->id,
            "nombre_organizacion" => $request->nombre_organizacion,
            "rfc" => $request->rfc,
            "sitio_web" => $request->sitio_web,
            "razon_social" => $request->razon_social,
        ]);
//        $datosGenerales->domicilio()->create([
//            "calle" => $request->calle,
//            "numero_exterior" => $request->numero_exterior,
//            "numero_interior" => $request->numero_interior,
//            "codigo_postal" => $request->codigo_postal,
//            "estado" => $request->estado,
//            "municipio" => $request->municipio,
//            "localidad" => $request->localidad,
//        ]);
        $datosGenerales->domicilio()->create($request["domicilio"]);
        $datosGenerales->contacto()->create($request["contacto"]);
        return response()->json(["data" => ["message" => "success", "data" => $request->all()]], 200);
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
        $data = $this->datosGenerales->where("user_id", $id)->with("domicilio")->with("contacto")->first();
        return $this->sendResponse($data, "success");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request, $id)
    {
        $datosGenerales = DatosGenerales::where("user_id", $id)->first();
        $datosGenerales->update([
            "user_id" => $request->id,
            "nombre_organizacion" => $request->nombre_organizacion,
            "rfc" => $request->rfc,
            "sitio_web" => $request->sitio_web,
            "razon_social" => $request->razon_social,
        ]);
        $datosGenerales->domicilio->update($request["domicilio"]);
        $datosGenerales->contacto->update($request["contacto"]);
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

    public function getAsentamientos($param)
    {
        $asentamientos = Asentamientos::where("codigo_postal", $param)->get();
        $municipio = Municipios::where("id", $asentamientos[0]->municipio_id)->first();
        $entidad = Entidades::where("id", $municipio->entidad_id)->first();
        $data = [
            "asentamientos" => $asentamientos,
            "municipios" => $municipio,
            "entidad" => $entidad
        ];
        return $this->sendResponse($data, "success");

    }
}
