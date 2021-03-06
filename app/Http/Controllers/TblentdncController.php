<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class TblentdncController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return view('auth.login');
        }

        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $ofertas = \Tblentdnc::fndentdnc();
            $ofertas = $ofertas->toArray();

            foreach($ofertas as $key => $oferta)
            {

                $fecha = $oferta["Tmprstdnc"] ;
                $fechaFinal = date();

                $evento["uuidoferta"] = $ofertas[$key]["Uuid"];

                $date1 = new DateTime($fecha);
                $date2 = new DateTime($fechaFinal);

                Log::debug($date1);
                Log::debug($date2);

                $interval = $date1->diff($date2);

                $diferencia = $interval->d;


                if ($diferencia < 1){
                    unset($ofertas[$key]);
                } else {
                    $ofertas[$key]['Tmprstdnc'] = date("d", strtotime($oferta["Tmprstdnc"] )) - date("d");
                }
            }

            return view('app.Tblentemp.oferta')
                ->with("ofertas", $ofertas);
        } elseif ($tipentprs == 2) {

            $ofertas = \Tblentdnc::fndempdnc();
            $ofertas = $ofertas->toArray();

            foreach($ofertas as $key => $oferta)
            {
                $ofertas[$key]['Tmprstdnc'] = date("d", strtotime($oferta["Tmprstdnc"] )) - date("d");
            }


            return view('app.Tblentorg.oferta')
                ->with("ofertas", $ofertas);;

        } else {
            return view('auth.login');
        }
    }

    // store (C)
    public function create(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
			'Descripcion' => 'required|max:255',
			'TipoAlimento' => 'required|max:255',
			'Kilogramos' => 'required|numeric',
			'CantCajas' => 'required|integer',
			'TiempoRestante' => 'required',
		];

        $msgs = [
			'Descripcion.required' => 'Por favor, escriba la descripci??n de la oferta',
			'Descripcion.string' => 'Por favor, escriba la descripci??n de la oferta correctamente',
			'Descripcion.max' => 'Por favor, escriba la descripci??n de la oferta correctamente',
			'TipoAlimento.required' => 'Por favor, elija el tipo de alimento de la oferta',
			'TipoAlimento.string' => 'Por favor, elija el tipo de alimento de la oferta correctamente',
			'TipoAlimento.max' => 'Por favor, elija el tipo de alimento de la oferta correctamente',
			'Kilogramos.required' => 'Por favor, escriba los kilogramos de la oferta',
			'Kilogramos.numeric' => 'Por favor, escriba los kilogramos de la oferta correctamente',
			'Kilogramos.min' => 'Por favor, escriba los kilogramos de la oferta correctamente',
			'Kilogramos.max' => 'Por favor, escriba los kilogramos de la oferta correctamente',
			'CantCajas.required' => 'Por favor, escriba la cantidad de cajas aproximadas de la oferta que se puedan introducir',
			'CantCajas.integer' => 'Por favor, escriba la cantidad de cajas aproximadas de la oferta que se puedan introducir correctamente',
			'CantCajas.min' => 'Por favor, escriba la cantidad de cajas aproximadas de la oferta que se puedan introducir correctamente',
			'CantCajas.max' => 'Por favor, escriba la cantidad de cajas aproximadas de la oferta que se puedan introducir correctamente',
			'TiempoRestante.required' => 'Por favor, escriba el tiempo restante para consumo humano de la oferta',
			'TiempoRestante.integer' => 'Por favor, escriba el tiempo restante para consumo humano de la oferta correctamente',
			'TiempoRestante.min' => 'Por favor, escriba el tiempo restante para consumo humano de la oferta correctamente',
			'TiempoRestante.max' => 'Por favor, escriba el tiempo restante para consumo humano de la oferta correctamente',
		];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        $id = $request->get("Id");

        $entprs = \Tblentprs::fnoentusr($id);

        if (!$entprs) {
            return ReturnHandler::rtrerrjsn('Vuelva a iniciar sesi??n por favor');
        }

        $entemp = \Tblentemp::fnoentprs($entprs->getIdnentprs());

        if (!$entemp) {
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
        }

        $uuid4 = Uuid::uuid4();
        $idnentemp = $entemp->getIdnentemp();
        $tmprstdnc = date ("Y-m-d H:i:s", strtotime( request('TiempoRestante')));

        // 2.- Peticion a variables TODO *Modificar*
        $data = [
			'uuid' => $uuid4,
			'idnentemp' => $idnentemp,
			'dscentdnc' => request('Descripcion'),
			'tipentdnc' => request('TipoAlimento'),
			'kgsentdnc' => request('Kilogramos'),
			'cntcjsdnc' => request('CantCajas'),
			'tmprstdnc' => $tmprstdnc,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Tblentdnc::crtentdnc($data, $trncnn);

        // 6.- Commit y return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Guardado correctamente');
    }

    // destroy (R)
    public function destroy(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
            'Uuid' => 'required|uuid|size:36',
        ];

        $msgs = [ // TODO *Customizable*
            'Uuid.required' => 'Objeto no v??lido',
            'Uuid.uuid' => 'Objeto no v??lido',
            'Uuid.size' => 'Objeto no v??lido',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Request a variables
        $uuid = request('Uuid');

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entdnc = \Tblentdnc::fnuentdnc($uuid, $trncnn);
        if(!$entdnc instanceof \Tblentdnc){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entdnc false');
        }

        $result = \Tblentdnc::rmventdnc($entdnc->getIdentdnc(), $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Eliminado correctamente');

    }

    // update (U)
    public function update(Request $request)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Uuid' => 'required',
			'Descripcion' => 'required|max:255',
			'TipoAlimento' => 'required|max:255',
			'Kilogramos' => 'required|numeric',
			'CantCajas' => 'required|numeric',
			'TiempoRestante' => 'required',
		];

        $msgs = [
			'Descripcion.required' => 'Validacion fallada en Descripcion.required',
			'Descripcion.string' => 'Validacion fallada en Descripcion.string',
			'Descripcion.max' => 'Validacion fallada en Descripcion.max',
			'TipoAlimento.required' => 'Validacion fallada en TipoAlimento.required',
			'TipoAlimento.string' => 'Validacion fallada en TipoAlimento.string',
			'TipoAlimento.max' => 'Validacion fallada en TipoAlimento.max',
			'Kilogramos.required' => 'Validacion fallada en Kilogramos.required',
			'Kilogramos.numeric' => 'Validacion fallada en Kilogramos.numeric',
			'CantCajas.required' => 'Validacion fallada en CantCajas.required',
			'CantCajas.integer' => 'Validacion fallada en CantCajas.integer',
			'TiempoRestante.required' => 'Validacion fallada en TiempoRestante.required',
			'TiempoRestante.integer' => 'Validacion fallada en TiempoRestante.integer',

        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $udxentdnc = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entdnc = \Tblentdnc::fnuentdnc($udxentdnc, $trncnn);
        if(!$entdnc instanceof \Tblentdnc){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entdnc false');
        }

        $data = [
			'identdnc' => $entdnc->getIdentdnc(),
			'uuid' => $entdnc->getUuid(),
			'idnentemp' => $entdnc->getIdnentemp(),
			'dscentdnc' => request('Descripcion'),
			'tipentdnc' => request('TipoAlimento'),
			'kgsentdnc' => request('Kilogramos'),
			'cntcjsdnc' => request('CantCajas'),
			'tmprstdnc' => request('TiempoRestante'),
			'updated_at' => $timestamp,
        ];

        $result = \Tblentdnc::updentdnc($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Actualizado correctamente');
    }

    public function interest(Request $request)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Uuid' => 'required',
			'Id' => 'required',
		];

        $msgs = [
            'Uuid.required' => 'Validacion fallada en Uuid.required',
            'Id.required' => 'Validacion fallada en Id.required',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $udxentdnc = request('Uuid');
        $id = request('Id');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        $entprs = \Tblentprs::fnoentusr($id);

        if (!$entprs) {
            return null;
        }

        $idnentprs = $entprs->getIdnentprs();

        $idnentorg = \Tblentorg::fnoentprs($idnentprs)->getIdnentorg();

        $data = [
            'uuid' => $udxentdnc,
            'idnentorg' => $idnentorg,
            'rqsentdnc' => true,
            'updated_at' => $timestamp,
        ];

        $result = \Tblentdnc::rqsentdnc($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Actualizado correctamente');
    }

    public function request(Request $request)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Uuid' => 'required',
			'Id' => 'required',
		];

        $msgs = [
            'Uuid.required' => 'Validacion fallada en Uuid.required',
            'Id.required' => 'Validacion fallada en Id.required',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $udxentdnc = request('Uuid');
        $id = request('Id');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        $entprs = \Tblentprs::fnoentusr($id);

        if (!$entprs) {
            return null;
        }

        $idnentprs = $entprs->getIdnentprs();

        $idnentorg = \Tblentorg::fnoentprs($idnentprs)->getIdnentorg();

        $entdnc = \Tblentdnc::fnuentdnc($udxentdnc);

        $data = [
            'uuid' => $udxentdnc,
            'idnentorg' => $idnentorg,
            'rqsentdnc' => true,
            'updated_at' => $timestamp,
        ];

        $result = \Tblentdnc::rqsentdnc($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Actualizado correctamente :D');
    }

    public function finish(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
			'Uuid' => 'required',
		];

        $msgs = [
            'Uuid.required' => 'Validacion fallada en Descripcion.required',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables
        $udxentdnc = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entdnc = \Tblentdnc::fnuentdnc($udxentdnc, $trncnn);
        if(!$entdnc instanceof \Tblentdnc){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        $data = [
			'uuid' => $entdnc->getUuid(),
			'rqsentdnc' => true,
			'clnentdnc' => true,
			'updated_at' => $timestamp,
        ];

        $result = \Tblentdnc::clnentdnc($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Se ha actualizado correctamente');

    }

    public function refuse(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
			'Uuid' => 'required',
		];

        $msgs = [
            'Uuid.required' => 'Validacion fallada en Descripcion.required',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables
        $udxentdnc = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entdnc = \Tblentdnc::fnuentdnc($udxentdnc, $trncnn);

        if(!$entdnc instanceof \Tblentdnc){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        $data = [
			'uuid' => $entdnc->getUuid(),
            'rqsentdnc' => false,
			'updated_at' => $timestamp,
        ];

        $result = \Tblentdnc::rqsentdnc($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Se ha rechazado la organizaci??n');

    }

    public function table(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return null;
        }

        $entprs = $tipentprs;
        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $idnentprs = $entprs->getIdnentprs();

            $idnentemp = \Tblentemp::fnoentprs($idnentprs)->getIdnentemp();

            $ofertas = \Tblentdnc::fndempdnc($idnentemp);
            $ofertas = $ofertas->toArray();

            foreach($ofertas as $key => $oferta)
            {
                $fecha = $oferta["Tmprstdnc"];

                $date1 = new DateTime($fecha);
                $date2 = new DateTime(date("Y-m-d H:i:s"));

                $interval = $date1->diff($date2);

                $days = $interval->d + 1;

                if ($days < 0){
                    unset($ofertas[$key]);
                } else {
                    $ofertas[$key]['Tmprstdnc'] = $days;
                }
            }

            if (empty($ofertas)) {
                $ofertas = null;
            }

            return json_encode([
                'success' => true,
                'data' => $ofertas
            ]);

        } elseif ($tipentprs == 2) {
            $ofertas = \Tblentdnc::fnddncemp();
            $ofertas = $ofertas->toArray();

            foreach($ofertas as $key => $oferta)
            {
                $fecha = $oferta["Tmprstdnc"];

                $date1 = new DateTime($fecha);
                $date2 = new DateTime(date("Y-m-d H:i:s"));

                $interval = $date1->diff($date2);

                $days = $interval->d + 1;

                if ($days < 1){
                    unset($ofertas[$key]);
                } else {
                    $ofertas[$key]['Tmprstdnc'] = $days;
                }
            }

            if (empty($ofertas)) {
                $ofertas = null;
            }

            return json_encode([
                'success' => true,
                'data' => $ofertas
            ]);
        } else {
            return null;
        }
    }

    public function list(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return null;
        }

        $entprs = $tipentprs;
        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $idnentprs = $entprs->getIdnentprs();

            $idnentemp = \Tblentemp::fnoentprs($idnentprs)->getIdnentemp();

            $ofertas = \Tblentdnc::fndempreq($idnentemp);
            $ofertas = $ofertas->toArray();

            if (empty($ofertas)) {
                $ofertas = null;
            }


            return json_encode([
                'success' => true,
                'data' => $ofertas
            ]);

        } elseif ($tipentprs == 2) {
            // hmm
            $ofertas = \Tblentdnc::fnddncemp();
            $ofertas = $ofertas->toArray();

            foreach($ofertas as $key => $oferta)
            {
                $fecha = date();
                $fechaFinal = $oferta["Tmprstdnc"];

                $date1 = new DateTime($fecha);
                $date2 = new DateTime($fechaFinal);

                $interval = $date1->diff($date2);

                $diferencia = $interval->d;

                if ($diferencia < 1){
                    unset($ofertas[$key]);
                } else {
                    $ofertas[$key]['Tmprstdnc'] = $diferencia;
                }
            }

            if (empty($ofertas)) {
                $ofertas = null;
            }

            return json_encode([
                'success' => true,
                'data' => $ofertas
            ]);
        } else {
            return null;
        }
    }

    public function loadhist(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return null;
        }

        $entprs = $tipentprs;
        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $idnentprs = $entprs->getIdnentprs();

            $idnentorg = \Tblentemp::fnoentprs($idnentprs)->getIdnentemp();

            $ofertas = \Tblentdnc::fndempfns($idnentorg);
            $ofertas = $ofertas->toArray();

            if (empty($eventos)) {
                $eventos = null;
            }

            return json_encode([
                'success' => true,
                'data' => $ofertas,
            ]);

        } elseif ($tipentprs == 2) {
            $idnentprs = $entprs->getIdnentprs();

            $idnentorg = \Tblentorg::fnoentprs($idnentprs)->getIdnentorg();

            $eventos = \Tblentcln::fndentorg($idnentorg);
            $eventos = $eventos->toArray();

            $ofertas = \Tblentdnc::fndorgcln($idnentorg);
            $ofertas = $ofertas->toArray();

            $json = [];

            foreach($eventos as $key => $evento)
            {
                if ($evento["Prdentcln"] == 1) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    for ($i = 1; $i <= $interval->m + 1; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-orange",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha. ' + 1 month'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 2) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    $quincenas = floor($interval->days/15) + 1;

                    for ($i = 1; $i <= $quincenas; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-red",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha. ' + 15 day'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 3) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    $semanas = floor($interval->days/7) + 1;
                    ;
                    for ($i = 1; $i <= $semanas; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-green",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha. ' + 1 week'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 4) {

                    $fecha = $evento["Fchinccln"];

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    for ($i = 1; $i <= $interval->d; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-rose",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha. ' + 1 day'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 5) {

                    $fecha = $evento["Fchinccln"];

                    $array = [
                        "id" => $evento["Idnentcln"],
                        "title" => $evento["Namentemp"],
                        "start" => $fecha,
                        "allDay" => false,
                        "className" => "event-azure",
                        "extendedProps" => [
                            "uuid" => $evento["Uuid"]
                        ],
                    ];

                    array_push($json, $array);
                }
            }

            if (empty($eventos)) {
                $eventos = null;
            }



            return json_encode([
                'success' => true,
                'data' => $json,
                'ofertas' => $ofertas,
                'eventos' => $eventos
            ]);
        } else {
            return null;
        }
    }


    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
