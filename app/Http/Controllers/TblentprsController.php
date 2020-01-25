<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Auth\User;


class TblentprsController extends Controller
{
    public function __construct()
    {

    }

    public function guard() {
        return Auth::guard('api');
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
            return view('app.Tblentemp.perfil');
        } elseif ($tipentprs == 2) {
            return view('app.Tblentorg.perfil');
        } else {
            return view('auth.login');
        }
    }

    // store (C)
    public function create(Request $request)
    {

        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if ($tipentprs) {
            return ReturnHandler::rtrerrjsn('Ya existe una institución en esta cuenta, es necesairo crear otra cuenta para otra institución');
        }

        // 1.- Validacion del request
        $rules = [
            'Nombre' => 'required|max:255',
            'PrimerApellido' => 'required|max:255',
            'SegundoApellido' => 'required|max:255',
            'Curp' => 'required|max:18',
            'Rfc' => 'required|max:13',
            'CorreoLaboral' => 'required|max:255',
            'CorreoPersonal' => 'required|max:255',
            'Nacionalidad' => 'required|max:255',
            'Pais' => 'required|max:255',
            'EntidadFed' => 'required|max:255',
            'Municipio' => 'required|max:255',
            'Localidad' => 'required|max:255',
            'Domicilio' => 'required|max:255',
            'Codigo' => 'required',
            'TelFijo' => 'required',
            'TelMovil' => 'required',
            'Foto' => 'required'
        ];

        $msgs = [
            'Nombre.required' => 'Validacion fallada en Nombre.required',
            'Nombre.string' => 'Validacion fallada en Nombre.string',
            'Nombre.max' => 'Validacion fallada en Nombre.max',
            'PrimerApellido.required' => 'Validacion fallada en PrimerApellido.required',
            'PrimerApellido.string' => 'Validacion fallada en PrimerApellido.string',
            'PrimerApellido.max' => 'Validacion fallada en PrimerApellido.max',
            'SegundoApellido.required' => 'Validacion fallada en SegundoApellido.required',
            'SegundoApellido.string' => 'Validacion fallada en SegundoApellido.string',
            'SegundoApellido.max' => 'Validacion fallada en SegundoApellido.max',
            'Curp.required' => 'Validacion fallada en Curp.required',
            'Curp.string' => 'Validacion fallada en Curp.string',
            'Curp.max' => 'Validacion fallada en Curp.max',
            'Rfc.required' => 'Validacion fallada en Rfc.required',
            'Rfc.string' => 'Validacion fallada en Rfc.string',
            'Rfc.max' => 'Validacion fallada en Rfc.max',
            'CorreoLaboral.required' => 'Validacion fallada en CorreoLaboral.required',
            'CorreoLaboral.string' => 'Validacion fallada en CorreoLaboral.string',
            'CorreoLaboral.max' => 'Validacion fallada en CorreoLaboral.max',
            'CorreoPersonal.required' => 'Validacion fallada en CorreoPersonal.required',
            'CorreoPersonal.string' => 'Validacion fallada en CorreoPersonal.string',
            'CorreoPersonal.max' => 'Validacion fallada en CorreoPersonal.max',
            'Nacionalidad.required' => 'Validacion fallada en Nacionalidad.required',
            'Nacionalidad.string' => 'Validacion fallada en Nacionalidad.string',
            'Nacionalidad.max' => 'Validacion fallada en Nacionalidad.max',
            'Pais.required' => 'Validacion fallada en Pais.required',
            'Pais.string' => 'Validacion fallada en Pais.string',
            'Pais.max' => 'Validacion fallada en Pais.max',
            'EntidadFed.required' => 'Validacion fallada en EntidadFed.required',
            'EntidadFed.string' => 'Validacion fallada en EntidadFed.string',
            'EntidadFed.max' => 'Validacion fallada en EntidadFed.max',
            'Municipio.required' => 'Validacion fallada en Municipio.required',
            'Municipio.string' => 'Validacion fallada en Municipio.string',
            'Municipio.max' => 'Validacion fallada en Municipio.max',
            'Localidad.required' => 'Validacion fallada en Localidad.required',
            'Localidad.string' => 'Validacion fallada en Localidad.string',
            'Localidad.max' => 'Validacion fallada en Localidad.max',
            'Domicilio.required' => 'Validacion fallada en Domicilio.required',
            'Domicilio.string' => 'Validacion fallada en Domicilio.string',
            'Domicilio.max' => 'Validacion fallada en Domicilio.max',
            'Codigo.required' => 'Validacion fallada en Codigo.required',
            'Codigo.string' => 'Validacion fallada en Codigo.string',
            'TelFijo.required' => 'Validacion fallada en TelFijo.required',
            'TelFijo.string' => 'Validacion fallada en TelFijo.string',
            'TelMovil.required' => 'Validacion fallada en TelMovil.required',
            'TelMovil.string' => 'Validacion fallada en TelMovil.string',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        $entprs = \Tblentprs::fnoentusr($id);

        if ($entprs) {
            return ReturnHandler::rtrerrjsn('Ya existe una institución en esta cuenta, es necesairo crear otra cuenta para otra institución');
        }

        try {
            $uuid4 = Uuid::uuid4();
            $fotentprs = request('Foto');
            $fotrutprs = $uuid4 . "/";

            Storage::disk('local')->put($fotrutprs, $fotentprs);
        } catch (\Exception $e) {
            Log::debug($e);
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrio un error con el almacenamiento de datos');
        }

        Log::debug($id);
        // 2.- Peticion a variables
        $data = [
            'uuid' => $uuid4,
            'idnentusr' => $id,
            'nomentprs' => request('Nombre'),
            'prmaplprs' => request('PrimerApellido'),
            'sgnaplprs' => request('SegundoApellido'),
            'crpentprs' => request('Curp'),
            'rfcentprs' => request('Rfc'),
            'emllbrprs' => request('CorreoLaboral'),
            'emlprsprs' => request('CorreoPersonal'),
            'ncnentprs' => request('Nacionalidad'),
            'pasentprs' => request('Pais'),
            'ententprs' => request('EntidadFed'),
            'mncentprs' => request('Municipio'),
            'lclentprs' => request('Localidad'),
            'dmcentprs' => request('Domicilio'),
            'cdgpstprs' => request('Codigo'),
            'tlffijprs' => request('TelFijo'),
            'tlfmvlprs' => request('TelMovil'),
            'fotentprs' => $fotrutprs,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'tipentprs' => request('TipoInstitucion'),
        ];

        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $result = \Tblentprs::crtentprs($data, $trncnn);

        // 6.- Seguimiento
        if (!$result) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('');
        }

        $idnentprs = $result->getIdnentprs();
        $tipo_institucion = request('TipoInstitucion');

        if ($tipo_institucion == 1) {
            return app(TblentempController::class)->create($request, $trncnn, $uuid4, $idnentprs);
        } elseif ($tipo_institucion == 2) {
            return app(TblentorgController::class)->create($request, $trncnn, $uuid4, $idnentprs);
        } else {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
        }

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

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Request a variables
        $uuid = request('Uuid');

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entprs = \Tblentprs::fnuentprs($uuid, $trncnn);
        if (!$entprs instanceof \Tblentprs) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entprs false');
        }

        $result = \Tblentprs::rmventprs($entprs->getIdnentprs(), $trncnn);

        // 6.- Commit & return
        if (!$result) {
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
            'Nombre' => 'required|max:255',
            'PrimerApellido' => 'required|max:255',
            'SegundoApellido' => 'required|max:255',
            'Curp' => 'required|max:18',
            'Rfc' => 'required|max:13',
            'CorreoLaboral' => 'required|max:255',
            'CorreoPersonal' => 'required|max:255',
            'Nacionalidad' => 'required|max:255',
            'Pais' => 'required|max:255',
            'EntidadFed' => 'required|max:255',
            'Municipio' => 'required|max:255',
            'Localidad' => 'required|max:255',
            'Domicilio' => 'required|max:255',
            'Codigo' => 'required|max:5',
            'TelFijo' => 'required|max:12',
            'TelMovil' => 'required|max:12',
            'Foto' => 'nullable|max:255',
            'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
            'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
        ];

        $msgs = [ // TODO *Customizable*
            'Uuid' => 'required|uuid|size:36',
            'Nombre.required' => 'Validacion fallada en Nombre.required',
            'Nombre.string' => 'Validacion fallada en Nombre.string',
            'Nombre.max' => 'Validacion fallada en Nombre.max',
            'PrimerApellido.required' => 'Validacion fallada en PrimerApellido.required',
            'PrimerApellido.string' => 'Validacion fallada en PrimerApellido.string',
            'PrimerApellido.max' => 'Validacion fallada en PrimerApellido.max',
            'SegundoApellido.required' => 'Validacion fallada en SegundoApellido.required',
            'SegundoApellido.string' => 'Validacion fallada en SegundoApellido.string',
            'SegundoApellido.max' => 'Validacion fallada en SegundoApellido.max',
            'Curp.required' => 'Validacion fallada en Curp.required',
            'Curp.string' => 'Validacion fallada en Curp.string',
            'Curp.max' => 'Validacion fallada en Curp.max',
            'Rfc.required' => 'Validacion fallada en Rfc.required',
            'Rfc.string' => 'Validacion fallada en Rfc.string',
            'Rfc.max' => 'Validacion fallada en Rfc.max',
            'CorreoLaboral.required' => 'Validacion fallada en CorreoLaboral.required',
            'CorreoLaboral.string' => 'Validacion fallada en CorreoLaboral.string',
            'CorreoLaboral.max' => 'Validacion fallada en CorreoLaboral.max',
            'CorreoPersonal.required' => 'Validacion fallada en CorreoPersonal.required',
            'CorreoPersonal.string' => 'Validacion fallada en CorreoPersonal.string',
            'CorreoPersonal.max' => 'Validacion fallada en CorreoPersonal.max',
            'Nacionalidad.required' => 'Validacion fallada en Nacionalidad.required',
            'Nacionalidad.string' => 'Validacion fallada en Nacionalidad.string',
            'Nacionalidad.max' => 'Validacion fallada en Nacionalidad.max',
            'Pais.required' => 'Validacion fallada en Pais.required',
            'Pais.string' => 'Validacion fallada en Pais.string',
            'Pais.max' => 'Validacion fallada en Pais.max',
            'EntidadFed.required' => 'Validacion fallada en EntidadFed.required',
            'EntidadFed.string' => 'Validacion fallada en EntidadFed.string',
            'EntidadFed.max' => 'Validacion fallada en EntidadFed.max',
            'Municipio.required' => 'Validacion fallada en Municipio.required',
            'Municipio.string' => 'Validacion fallada en Municipio.string',
            'Municipio.max' => 'Validacion fallada en Municipio.max',
            'Localidad.required' => 'Validacion fallada en Localidad.required',
            'Localidad.string' => 'Validacion fallada en Localidad.string',
            'Localidad.max' => 'Validacion fallada en Localidad.max',
            'Domicilio.required' => 'Validacion fallada en Domicilio.required',
            'Domicilio.string' => 'Validacion fallada en Domicilio.string',
            'Domicilio.max' => 'Validacion fallada en Domicilio.max',
            'Codigo.required' => 'Validacion fallada en Codigo.required',
            'Codigo.string' => 'Validacion fallada en Codigo.string',
            'Codigo.max' => 'Validacion fallada en Codigo.max 3',
            'TelFijo.required' => 'Validacion fallada en TelFijo.required',
            'TelFijo.string' => 'Validacion fallada en TelFijo.string',
            'TelFijo.max' => 'Validacion fallada en TelFijo.max',
            'TelMovil.required' => 'Validacion fallada en TelMovil.required',
            'TelMovil.string' => 'Validacion fallada en TelMovil.string',
            'TelMovil.max' => 'Validacion fallada en TelMovil.max',
            'Foto.required' => 'Validacion fallada en Foto.required',
            'Foto.string' => 'Validacion fallada en Foto.string',
            'Foto.max' => 'Validacion fallada en Foto.max',
            'Foto.nullable' => 'Validacion fallada en Foto.nullable',
            'Creado.required' => 'Validacion fallada en Creado.required',
            'Creado.date_format' => 'Validacion fallada en Creado.date_format',
            'Creado.nullable' => 'Validacion fallada en Creado.nullable',
            'Actualizado.required' => 'Validacion fallada en Actualizado.required',
            'Actualizado.date_format' => 'Validacion fallada en Actualizado.date_format',
            'Actualizado.nullable' => 'Validacion fallada en Actualizado.nullable',

        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $udxentprs = request('Uuid');
        $timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entprs = \Tblentprs::fnuentprs($udxentprs, $trncnn);
        if (!$entprs instanceof \Tblentprs) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entprs false');
        }

        $data = [
            'idnentprs' => $entprs->getIdnentprs(),
            'uuid' => $entprs->getUuid(),
            'nomentprs' => request('Nombre'),
            'prmaplprs' => request('PrimerApellido'),
            'sgnaplprs' => request('SegundoApellido'),
            'crpentprs' => request('Curp'),
            'rfcentprs' => request('Rfc'),
            'emllbrprs' => request('CorreoLaboral'),
            'emlprsprs' => request('CorreoPersonal'),
            'ncnentprs' => request('Nacionalidad'),
            'pasentprs' => request('Pais'),
            'ententprs' => request('EntidadFed'),
            'mncentprs' => request('Municipio'),
            'lclentprs' => request('Localidad'),
            'dmcentprs' => request('Domicilio'),
            'cdgpstprs' => request('Codigo'),
            'tlffijprs' => request('TelFijo'),
            'tlfmvlprs' => request('TelMovil'),
            'fotentprs' => request('Foto'),
            'created_at' => request('Creado'),
            'updated_at' => request('Actualizado'),
        ];

        $result = \Tblentprs::updentprs($data, $trncnn);

        // 6.- Commit & return
        if (!$result) {
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
