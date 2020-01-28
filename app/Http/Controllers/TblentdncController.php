<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
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
                $diferencia = date("d", strtotime($oferta["Tmprstdnc"] )) - date("d");

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
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Descripcion' => 'required|max:255',
			'TipoAlimento' => 'required|max:255',
			'Kilogramos' => 'required|numeric',
			'CantCajas' => 'required|integer',
			'TiempoRestante' => 'required',
		];

        $msgs = [ // TODO *Customizable*
			'Descripcion.required' => 'Validacion fallada en Descripcion.required',
			'Descripcion.string' => 'Validacion fallada en Descripcion.string',
			'Descripcion.max' => 'Validacion fallada en Descripcion.max',
			'TipoAlimento.required' => 'Validacion fallada en TipoAlimento.required',
			'TipoAlimento.string' => 'Validacion fallada en TipoAlimento.string',
			'TipoAlimento.max' => 'Validacion fallada en TipoAlimento.max',
			'Kilogramos.required' => 'Validacion fallada en Kilogramos.required',
			'Kilogramos.numeric' => 'Validacion fallada en Kilogramos.numeric',
			'Kilogramos.min' => 'Validacion fallada en Kilogramos.min',
			'Kilogramos.max' => 'Validacion fallada en Kilogramos.max',
			'CantCajas.required' => 'Validacion fallada en CantCajas.required',
			'CantCajas.integer' => 'Validacion fallada en CantCajas.integer',
			'CantCajas.min' => 'Validacion fallada en CantCajas.min',
			'CantCajas.max' => 'Validacion fallada en CantCajas.max',
			'TiempoRestante.required' => 'Validacion fallada en TiempoRestante.required',
			'TiempoRestante.integer' => 'Validacion fallada en TiempoRestante.integer',
			'TiempoRestante.min' => 'Validacion fallada en TiempoRestante.min',
			'TiempoRestante.max' => 'Validacion fallada en TiempoRestante.max',
		];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        $id = $request->get("Id");

        $entprs = \Tblentprs::fnoentusr($id);

        if (!$entprs) {
            return ReturnHandler::rtrerrjsn('Vuelva a iniciar sesión por favor');
        }

        $entemp = \Tblentemp::fnoentprs($entprs->getIdnentprs());

        if (!$entemp) {
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
        }

        $uuid4 = Uuid::uuid4();
        $idnentemp = $entemp->getIdnentemp();
        // 2.- Peticion a variables TODO *Modificar*
        $data = [
			'uuid' => $uuid4,
			'idnentemp' => $idnentemp,
			'dscentdnc' => request('Descripcion'),
			'tipentdnc' => request('TipoAlimento'),
			'kgsentdnc' => request('Kilogramos'),
			'cntcjsdnc' => request('CantCajas'),
			'tmprstdnc' => request('TiempoRestante'),
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
            'Uuid.required' => 'Objeto no válido',
            'Uuid.uuid' => 'Objeto no válido',
            'Uuid.size' => 'Objeto no válido',
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
            return ReturnHandler::rtrerrjsn('Ocurrió un inesperado');
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
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
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
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Actualizado correctamente');
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
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
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
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
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
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
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
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Se ha rechazado la organización');

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
                $future = strtotime($oferta["Tmprstdnc"]);
                $today = strtotime(date("Y-m-d 06:00:00"));

                $diferencia = $future - $today;

                $days = floor($diferencia / (60*60*24));

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
                $future = strtotime($oferta["Tmprstdnc"]);
                $today = strtotime(date("Y-m-d 06:00:00"));

                $diferencia = $future - $today;

                $days = floor($diferencia / (60*60*24));

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


            Log::debug($ofertas);

            foreach($ofertas as $key => $oferta)
            {
                $diferencia = date("d", strtotime($oferta["Tmprstdnc"] )) - date("d");

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



    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
