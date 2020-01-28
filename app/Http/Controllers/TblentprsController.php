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

    public function guard()
    {
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
            'Nombre.required' => 'Por favor, escriba su nombre',
            'Nombre.string' => 'Por favor, escriba un nombre valido',
            'Nombre.max' => 'Por favor, escriba un nombre valido',
            'PrimerApellido.required' => 'Validacion fallada en PrimerApellido.required',
            'PrimerApellido.string' => 'Por favor, escriba un apellido paterno valido',
            'PrimerApellido.max' => 'Por favor, escriba un apellido paterno valido',
            'SegundoApellido.required' => 'Por favor, escriba un apellido materno',
            'SegundoApellido.string' => 'Por favor, escriba un apellido materno valido',
            'SegundoApellido.max' => 'Por favor, escriba un apellido materno valido',
            'Curp.required' => 'Por favor, escriba un CURP',
            'Curp.string' => 'Por favor, escriba un CURP valido',
            'Curp.max' => 'Por favor, escriba un CURP valido',
            'Rfc.required' => 'Por favor, escriba un RFC',
            'Rfc.string' => 'Por favor, escriba un RFC valido',
            'Rfc.max' => 'Por favor, escriba un RFC valido',
            'CorreoLaboral.required' => 'Por favor, escriba un correo laboral',
            'CorreoLaboral.string' => 'Por favor, escriba un correo laboral valido',
            'CorreoLaboral.max' => 'Por favor, escriba un correo laboral valido',
            'CorreoPersonal.required' => 'Por favor, escriba un correo personal',
            'CorreoPersonal.string' => 'Por favor, escriba un correo personal valido',
            'CorreoPersonal.max' => 'Por favor, escriba un correo personal valido',
            'Nacionalidad.required' => 'Por favor, elija una nacionalidad',
            'Nacionalidad.string' => 'Por favor, elija una nacionalidad valida',
            'Nacionalidad.max' => 'Por favor, elija una nacionalidad valida',
            'Pais.required' => 'Por favor, elija un país',
            'Pais.string' => 'Por favor, elija un país valido',
            'Pais.max' => 'Por favor, elija un país valido',
            'EntidadFed.required' => 'Por favor, elija una entidad federativa',
            'EntidadFed.string' => 'Por favor, elija una entidad federativa valido',
            'EntidadFed.max' => 'Por favor, elija una entidad federativa valido',
            'Municipio.required' => 'Por favor, escriba un municipio',
            'Municipio.string' => 'Por favor, escriba un municipio valido',
            'Municipio.max' => 'Por favor, escriba un municipio valido',
            'Localidad.required' => 'Por favor, escriba una localidad',
            'Localidad.string' => 'Por favor, escriba una localidad valida',
            'Localidad.max' => 'Por favor, escriba una localidad valida',
            'Domicilio.required' => 'Por favor, escriba un domicilio',
            'Domicilio.string' => 'Por favor, escriba un domicilio valida',
            'Domicilio.max' => 'Por favor, escriba un domicilio valida',
            'Codigo.required' => 'Por favor, escriba un codigo postal',
            'Codigo.string' => 'Por favor, escriba un codigo postal valido',
            'TelFijo.required' => 'Por favor, escriba un telefono fijo',
            'TelFijo.string' => 'Por favor, escriba un telefono fijo valido',
            'TelMovil.required' => 'Por favor, escriba un telefono personal',
            'TelMovil.string' => 'Por favor, escriba un telefono personal valido',
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
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrio un error con el almacenamiento de datos');
        }

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
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
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
            'Foto' => 'required',
        ];

        $msgs = [
            'Uuid.required' => 'Ocurrio un error inesperado',
            'Uuid.uuid' => 'Ocurrio un error inesperado',
            'Uuid.size' => 'Ocurrio un error inesperado',
            'Nombre.required' => 'Por favor, escriba el nombre del representante',
            'Nombre.string' => 'Por favor, escriba el nombre del representante correctamente',
            'Nombre.max' => 'Por favor, escriba el nombre del representante correctamente',
            'PrimerApellido.required' => 'Por favor, escriba el primer apellido del representante',
            'PrimerApellido.string' => 'Por favor, escriba el primer apellido del representante correctamente',
            'PrimerApellido.max' => 'Por favor, escriba el primer apellido del representante correctamente',
            'SegundoApellido.required' => 'Por favor, escriba el segundo apellido del representante',
            'SegundoApellido.string' => 'Por favor, escriba el segundo apellido del representante correctamente',
            'SegundoApellido.max' => 'Por favor, escriba el segundo apellido del representante correctamente',
            'Curp.required' => 'Por favor, escriba el CURP del representante',
            'Curp.string' => 'Por favor, escriba el CURP del representante correctamente',
            'Curp.max' => 'Por favor, escriba el CURP del representante correctamente',
            'Rfc.required' => 'Por favor, escriba el RFC del representante',
            'Rfc.string' => 'Por favor, escriba el RFC del representante correctamente',
            'Rfc.max' => 'Por favor, escriba el RFC del representante correctamente',
            'CorreoLaboral.required' => 'Por favor, escriba el correo laboral del representante',
            'CorreoLaboral.string' => 'Por favor, escriba el correo laboral del representante correctamente',
            'CorreoLaboral.max' => 'Por favor, escriba el correo laboral del representante correctamente',
            'CorreoPersonal.required' => 'Por favor, escriba el correo personal del representante',
            'CorreoPersonal.string' => 'Por favor, escriba el correo personal del representante correctamente',
            'CorreoPersonal.max' => 'Por favor, escriba el correo personal del representante correctamente',
            'Nacionalidad.required' => 'Por favor, elija la nacionalidad del representante',
            'Nacionalidad.string' => 'Por favor, elija la nacionalidad del representante correctamente',
            'Nacionalidad.max' => 'Por favor, elija la nacionalidad del representante correctamente',
            'Pais.required' => 'Por favor, elija el país del representante',
            'Pais.string' => 'Por favor, elija el país del representante correctamente',
            'Pais.max' => 'Por favor, elija el país del representante correctamente',
            'EntidadFed.required' => 'Por favor, elija la entidad federativa del representante',
            'EntidadFed.string' => 'Por favor, elija la entidad federativa del representante correctamente',
            'EntidadFed.max' => 'Por favor, elija la entidad federativa del representante correctamente',
            'Municipio.required' => 'Por favor, escriba el municipio del representante',
            'Municipio.string' => 'Por favor, escriba el municipio del representante correctamente',
            'Municipio.max' => 'Por favor, escriba el municipio del representante correctamente',
            'Localidad.required' => 'Por favor, escriba la localidad del representante correctamente',
            'Localidad.string' => 'Por favor, escriba la localidad del representante correctamente correctamente',
            'Localidad.max' => 'Por favor, escriba la localidad del representante correctamente correctamente',
            'Domicilio.required' => 'Por favor, escriba el domicilio del representante',
            'Domicilio.string' => 'Por favor, escriba el domicilio del representante correctamente',
            'Domicilio.max' => 'Por favor, escriba el domicilio del representante correctamente',
            'Codigo.required' => 'Por favor, escriba el codigo postal del representante',
            'Codigo.string' => 'Por favor, escriba el codigo postal del representante correctamente',
            'Codigo.max' => 'Por favor, escriba el codigo postal del representante correctamente',
            'TelFijo.required' => 'Por favor, escriba el telefono fijo del representante',
            'TelFijo.string' => 'Por favor, escriba el telefono fijo del representante correctamente',
            'TelFijo.max' => 'Por favor, escriba el telefono fijo del representante correctamente',
            'TelMovil.required' => 'Por favor, escriba el telefono movil del representante',
            'TelMovil.string' => 'Por favor, escriba el telefono movil del representante correctamente',
            'TelMovil.max' => 'Por favor, escriba el telefono movil del representante correctamente',
            'Foto.required' => 'Por favor, suba una foto del representante',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables
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
            'created_at' => $timestamp,
            'updated_at' => $timestamp,
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

    public function profile(Request $request){
        Log::debug($request);
    }



}
