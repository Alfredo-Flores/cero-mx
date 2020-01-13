<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.Users.main');
    }

    // store (C)
    public function create(Request $request)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'Uuid' => 'required|uuid|size:36',
			'Correo' => 'required|max:255',
			'Contraseña' => 'required|max:255',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid.required' => 'Validacion fallada en Uuid.required',
			'Uuid.uuid' => 'Uuid no válido',
			'Uuid.size' => 'Uuid no válido',
			'Correo.required' => 'Validacion fallada en Correo.required',
			'Correo.string' => 'Validacion fallada en Correo.string',
			'Correo.max' => 'Validacion fallada en Correo.max',
			'Contraseña.required' => 'Validacion fallada en Contraseña.required',
			'Contraseña.string' => 'Validacion fallada en Contraseña.string',
			'Contraseña.max' => 'Validacion fallada en Contraseña.max',
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
			'email' => request('Correo'),
			'password' => request('Contraseña'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Users::crtusers($data, $trncnn);

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
        $users = \Users::fnuusers($uuid, $trncnn);
        if(!$users instanceof \Users){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$users false');
        }

        $result = \Users::rmvusers($users->getId(), $trncnn);

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
			'Correo' => 'required|max:255',
			'Contraseña' => 'required|max:255',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid' => 'required|uuid|size:36',
			'Correo.required' => 'Validacion fallada en Correo.required',
			'Correo.string' => 'Validacion fallada en Correo.string',
			'Correo.max' => 'Validacion fallada en Correo.max',
			'Contraseña.required' => 'Validacion fallada en Contraseña.required',
			'Contraseña.string' => 'Validacion fallada en Contraseña.string',
			'Contraseña.max' => 'Validacion fallada en Contraseña.max',
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
        $udxusers = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $users = \Users::fnuusers($udxusers, $trncnn);
        if(!$users instanceof \Users){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$users false');
        }

        $data = [
			'id' => $users->getId(),
			'uuid' => $users->getUuid(),
			'email' => request('Correo'),
			'password' => request('Contraseña'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        $result = \Users::updusers($data, $trncnn);

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