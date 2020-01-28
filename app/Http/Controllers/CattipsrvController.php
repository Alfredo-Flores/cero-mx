<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CattipsrvController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.Cattipsrv.main');
    }

    // store (C)
    public function create(Request $request)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Uuid' => 'required|uuid|size:36',
			'Tipo' => 'required|max:255',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid.required' => 'Validacion fallada en Uuid.required',
			'Uuid.uuid' => 'Uuid no válido',
			'Uuid.size' => 'Uuid no válido',
			'Tipo.required' => 'Validacion fallada en Tipo.required',
			'Tipo.string' => 'Validacion fallada en Tipo.string',
			'Tipo.max' => 'Validacion fallada en Tipo.max',
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
			'dsctipsrv' => request('Tipo'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Cattipsrv::crttipsrv($data, $trncnn);

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
        $tipsrv = \Cattipsrv::fnutipsrv($uuid, $trncnn);
        if(!$tipsrv instanceof \Cattipsrv){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$tipsrv false');
        }

        $result = \Cattipsrv::rmvtipsrv($tipsrv->getIdntipsrv(), $trncnn);

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
			'Tipo' => 'required|max:255',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid' => 'required|uuid|size:36',
			'Tipo.required' => 'Validacion fallada en Tipo.required',
			'Tipo.string' => 'Validacion fallada en Tipo.string',
			'Tipo.max' => 'Validacion fallada en Tipo.max',
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
        $udxtipsrv = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $tipsrv = \Cattipsrv::fnutipsrv($udxtipsrv, $trncnn);
        if(!$tipsrv instanceof \Cattipsrv){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$tipsrv false');
        }

        $data = [
			'idntipsrv' => $tipsrv->getIdntipsrv(),
			'uuid' => $tipsrv->getUuid(),
			'dsctipsrv' => request('Tipo'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        $result = \Cattipsrv::updtipsrv($data, $trncnn);

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