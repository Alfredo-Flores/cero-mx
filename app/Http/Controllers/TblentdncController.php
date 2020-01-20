<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TblentdncController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.Tblentdnc.main');
    }

    // store (C)
    public function create(Request $request)
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
			'Uuid.required' => 'Validacion fallada en Uuid.required',
			'Uuid.uuid' => 'Uuid no válido',
			'Uuid.size' => 'Uuid no válido',
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
			'Creado.nullable' => 'Validacion fallada en Creado.nullable',
			'Creado.date_format' => 'Validacion fallada en Creado.date_format',
			'Actualizado.nullable' => 'Validacion fallada en Actualizado.nullable',
			'Actualizado.date_format' => 'Validacion fallada en Actualizado.date_format',
		];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $data = [
			'uuid' => request('Uuid'),
			'dscentdnc' => request('Descripcion'),
			'tipentdnc' => request('TipoAlimento'),
			'kgsentdnc' => request('Kilogramos'),
			'cntcjsdnc' => request('CantCajas'),
			'tmprstdnc' => request('TiempoRestante'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
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
