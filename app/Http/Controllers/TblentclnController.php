<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TblentclnController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.Tblentcln.main');
    }

    // store (C)
    public function create(Request $request)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Uuid' => 'required|uuid|size:36',
			'Periodicidad' => 'required|integer|min:0|max:9',
			'FechaInicio' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'FechaFinal' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid.required' => 'Validacion fallada en Uuid.required',
			'Uuid.uuid' => 'Uuid no válido',
			'Uuid.size' => 'Uuid no válido',
			'Periodicidad.required' => 'Validacion fallada en Periodicidad.required',
			'Periodicidad.integer' => 'Validacion fallada en Periodicidad.integer',
			'Periodicidad.min' => 'Validacion fallada en Periodicidad.min',
			'Periodicidad.max' => 'Validacion fallada en Periodicidad.max',
			'FechaInicio.nullable' => 'Validacion fallada en FechaInicio.nullable',
			'FechaInicio.date_format' => 'Validacion fallada en FechaInicio.date_format',
			'FechaFinal.nullable' => 'Validacion fallada en FechaFinal.nullable',
			'FechaFinal.date_format' => 'Validacion fallada en FechaFinal.date_format',
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
			'prdentcln' => request('Periodicidad'),
			'fchinccln' => request('FechaInicio'),
			'fchfnlcln' => request('FechaFinal'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Tblentcln::crtentcln($data, $trncnn);

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
        $entcln = \Tblentcln::fnuentcln($uuid, $trncnn);
        if(!$entcln instanceof \Tblentcln){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entcln false');
        }

        $result = \Tblentcln::rmventcln($entcln->getIdnentcln(), $trncnn);

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
			'Periodicidad' => 'required|integer|min:0|max:9',
			'FechaInicio' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'FechaFinal' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid' => 'required|uuid|size:36',
			'Periodicidad.required' => 'Validacion fallada en Periodicidad.required',
			'Periodicidad.integer' => 'Validacion fallada en Periodicidad.integer',
			'Periodicidad.min' => 'Validacion fallada en Periodicidad.min',
			'Periodicidad.max' => 'Validacion fallada en Periodicidad.max',
			'FechaInicio.required' => 'Validacion fallada en FechaInicio.required',
			'FechaInicio.date_format' => 'Validacion fallada en FechaInicio.date_format',
			'FechaInicio.nullable' => 'Validacion fallada en FechaInicio.nullable',
			'FechaFinal.required' => 'Validacion fallada en FechaFinal.required',
			'FechaFinal.date_format' => 'Validacion fallada en FechaFinal.date_format',
			'FechaFinal.nullable' => 'Validacion fallada en FechaFinal.nullable',
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
        $udxentcln = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entcln = \Tblentcln::fnuentcln($udxentcln, $trncnn);
        if(!$entcln instanceof \Tblentcln){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entcln false');
        }

        $data = [
			'idnentcln' => $entcln->getIdnentcln(),
			'uuid' => $entcln->getUuid(),
			'prdentcln' => request('Periodicidad'),
			'fchinccln' => request('FechaInicio'),
			'fchfnlcln' => request('FechaFinal'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        $result = \Tblentcln::updentcln($data, $trncnn);

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