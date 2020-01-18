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

    public function index()
    {
        $id = Auth::user()->id;

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return view('auth.login');
        }

        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $ofertas = \Tblentdnc::fndentdnc();
            $ofertas = $ofertas->toArray();

            return view('app.Tblentemp.oferta')
                ->with("ofertas", $ofertas);
        } elseif ($tipentprs == 2) {

            $ofertas = \Tblentdnc::fndempdnc();
            $ofertas = $ofertas->toArray();

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

        $id = Auth::user()->id;

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
			'Uuid' => 'required|uuid|size:36',
			'Descripcion' => 'required|max:255',
			'TipoAlimento' => 'required|max:255',
			'Kilogramos' => 'required|numeric|min:0|max:9',
			'CantCajas' => 'required|integer|min:0|max:9',
			'TiempoRestante' => 'required|integer|min:0|max:9',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid' => 'required|uuid|size:36',
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
			'Creado.required' => 'Validacion fallada en Creado.required',
			'Creado.date_format' => 'Validacion fallada en Creado.date_format',
			'Creado.nullable' => 'Validacion fallada en Creado.nullable',
			'Actualizado.required' => 'Validacion fallada en Actualizado.required',
			'Actualizado.date_format' => 'Validacion fallada en Actualizado.date_format',
			'Actualizado.nullable' => 'Validacion fallada en Actualizado.nullable',

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
			'dscentdnc' => request('Descripcion'),
			'tipentdnc' => request('TipoAlimento'),
			'kgsentdnc' => request('Kilogramos'),
			'cntcjsdnc' => request('CantCajas'),
			'tmprstdnc' => request('TiempoRestante'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
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
		];

        $msgs = [ // TODO *Customizable*
            'Uuid.required' => 'Validacion fallada en Descripcion.required',
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

        $uidentemp = $entdnc->getIdnentemp();
        $entemp = \Tblentemp::fnoentemp($uidentemp, $trncnn);
        if(!$entemp instanceof \Tblentemp){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entdnc false');
        }

        TransactionHandler::commit($trncnn);


        $nomentemp = $entemp->getNamentemp();
        $ententemp = $entemp->getEntentemp();
        $mncentemp = $entemp->getMncentemp();
        $lclentemp = $entemp->getLclentemp();

        return json_encode($return =  array(
            'success' => true,
            'nombre' => $nomentemp,
            'entidad' => $ententemp,
            'municipio' => $mncentemp,
            'localidad' => $lclentemp,
        ));
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
			'updated_at' => $timestamp,
        ];

        $result = \Tblentdnc::rqsentdnc($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Se ha notificado a la empresa, por favor este atento a su calendario y correo');

    }

// Views

    // Show table(D)
    public function table(Request $request)
    {

    }

    // Display one(D)
    public function edit(Request $request)
    {

    }



    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}