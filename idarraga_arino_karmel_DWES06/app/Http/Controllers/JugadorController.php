<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CodigosRespuesta;
use App\Models\Response;
use Illuminate\Support\Facades\Http;

class JugadorController extends Controller
{
    private $URLServicio = "http://localhost:8080/api";

     /**
     * Display a listing of the resource.
     */
    public function getAll(){
        $jugadores = Http::get($this->URLServicio.'/jugadores');
        if (!empty($jugadores)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $jugadores->json());
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado jugadores");
            echo json_encode ($response);
        }  
    }

    
     /**
     * Display a listing of the resource.
     */
    public function getByNivel($nivel){
        $jugadores = Http::get($this->URLServicio.'/jugadores/nivel/'.$nivel);
        if (!empty($jugadores)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $jugadores->json());
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado jugadores");
            echo json_encode ($response);
        }  
    }

    public function addJugador(Request $request){
        $jugador = Http::post($this->URLServicio.'/jugadores/alta', json_decode($request->getContent()));
        if (!empty($jugador)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $jugador->json());
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado pistas");
            echo json_encode ($response);
        }
    }

}