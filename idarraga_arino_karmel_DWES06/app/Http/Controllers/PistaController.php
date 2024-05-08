<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use Illuminate\Http\Request;
use App\Models\CodigosRespuesta;
use App\Models\Response;
use Illuminate\Support\Facades\DB;

class PistaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function getAll(){
        $pistas = Pista::all();
        if (!empty($pistas)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $pistas);
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado pistas");
            echo json_encode ($response);
        }        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

     /**
     * Display the specified resource.
     */
    public function getPistaById($id){
        //echo ('El código seleccionado es: '.$id);
        //Montar query para recuperar una sola pista
        $pista =DB::table('pistas')->where('id_pista',$id);    
        if ($pista->exists()){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $pista->get() );
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se ha encontrado pista con id ". $id);
            echo json_encode ($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pista $pista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pista $pista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pista $pista)
    {
        //
    }
}
