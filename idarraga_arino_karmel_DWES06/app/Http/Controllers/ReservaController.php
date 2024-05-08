<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\CodigosRespuesta;
use App\Models\Response;
use DateTime;
use Exception;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\json;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getAll(){
        $reservas = Reserva::all();
        if (!empty($reservas)){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
            $response = new Response(CodigosRespuesta::HTTP_OK, $reservas );
            echo json_encode ($response);
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NO_CONTENT));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se han encontrado reservas");
            echo json_encode ($response);
        }        
    }

    public function addReserva (Request $request){
        try{
            $reserva = new Reserva();
            $reserva->id_pista = $request->id_pista;
            $reserva->fecha_reserva = $request->fecha;
            $reserva->hora_inicio = $request->hora_inicio;
            $reserva->hora_fin = $request->hora_fin;
            $reserva->id_socio = $request->cliente;
            $reserva->estado = 'pendiente';
            $reserva->save();

            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_CREATED));
            $response = new Response(CodigosRespuesta::HTTP_CREATED, $reserva);
            echo json_encode ($response);


        }catch (Exception $e){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_CONFLICT));
            $response = new Response(CodigosRespuesta::HTTP_CONFLICT, 'Error al guardar la reserva '. $e);
            echo json_encode ($response);
        }
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
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function confirmarReserva (Request $request, $id){
        $reservaBBDD = DB::table('reservas')->where('id_reserva',$id);
        
        if ($reservaBBDD->exists()){
            $reserva = $reservaBBDD->get()->first();
            if ($reserva->estado=="pendiente"){  
                $date = new DateTime();
                $fecha = $date->format('Y-m-d H:i:s');
                $datos =[
                    'jugador2_nombre'=>$request->all()['jugador2']['nombre'],
                    'jugador2_edad'=>$request->all()['jugador2']['edad'],
                    'jugador2_nivel'=>$request->all()['jugador2']['nivel'],
                    'jugador3_nombre'=>$request->all()['jugador3']['nombre'],
                    'jugador3_edad'=>$request->all()['jugador3']['edad'],
                    'jugador3_nivel'=>$request->all()['jugador3']['nivel'],
                    'jugador4_nombre'=>$request->all()['jugador4']['nombre'],
                    'jugador4_edad'=>$request->all()['jugador4']['edad'],
                    'jugador4_nivel'=>$request->all()['jugador4']['nivel'],
                    'estado'=>'confirmada',
                    'fecha_confirmacion'=> $fecha
                ];    
                /* if (!empty($request->jugador2)) {
                    $reserva->jugador2_nombre = $request->all()['jugador2']['nombre'];
                    $reserva->jugador2_edad = $request->all()['jugador2']['edad'];
                    $reserva->jugador2_nivel = $request->all()['jugador2']['nivel'];
                }
                if (!empty($request->jugador3)) {
                    $reserva->jugador3_nombre = $request->all()['jugador3']['nombre'];
                    $reserva->jugador3_edad = $request->all()['jugador3']['edad'];
                    $reserva->jugador3_nivel = $request->all()['jugador3']['nivel'];
                }
                if (!empty($request->jugador4)) {
                    $reserva->jugador4_nombre = $request->all()['jugador4']['nombre'];
                    $reserva->jugador4_edad = $request->all()['jugador4']['edad'];
                    $reserva->jugador4_nivel = $request->all()['jugador4']['nivel'];
                } 
                $reserva->estado ='confirmada';
                $reserva->fecha_confirmacion = new Date(); */
                Reserva::where('id_reserva', $id)->update($datos);
                
                $reserva = DB::table('reservas')->where('id_reserva',$id)->get()->first();
                header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
                $response = new Response(CodigosRespuesta::HTTP_ACCEPTED, $reserva);
                echo json_encode ($response);
            }else{
                header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_NOT_ACCEPTABLE));
                $response = new Response(CodigosRespuesta::HTTP_NOT_ACCEPTABLE, "La reserva con id ". $id . " ya esta confirmada por lo que no se puede confirmar");
                echo json_encode ($response);
            }
        }else{
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se ha encontrado ninguna reserva con id ". $id);
            echo json_encode ($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteReserva($id){
        try{
            $reserva = DB::table('reservas')->where('id_reserva',$id);
            if ($reserva->exists()){
                $reserva->delete();
                header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_OK));
                $response = new Response(CodigosRespuesta::HTTP_OK,"Se ha eliminado de la lista la reserva con id ". $id);
                echo json_encode ($response);
            }else{
                header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
                $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "No se ha encontrado ninguna reserva con id ". $id);
                echo json_encode ($response);
            }
            
        }catch (Exception $e){
            header(CodigosRespuesta::httpHeaderFor(CodigosRespuesta::HTTP_ACCEPTED));
            $response = new Response(CodigosRespuesta::HTTP_NO_CONTENT, "Se ha producido un error al intentar borrar la reserva con id ". $id. 'El error es: '.$e );
            echo json_encode ($response);

        }  
    }
}
