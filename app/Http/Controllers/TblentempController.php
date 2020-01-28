<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Base\Tblentprs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Propel\Runtime\Connection\ConnectionInterface;
use Ramsey\Uuid\Uuid;

class TblentempController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.Tblentemp.main');
    }

    // store (C)
    public function create(Request $request, ConnectionInterface &$trncnn, Uuid $uuid4, int $idnentprs)
    {
        // 1.- Validacion del request
        $rules = [
			'EmpresaNombre' => 'required|max:255',
			'EmpresaLogo' => 'required',
			'EmpresaDireccion' => 'required|max:255',
			'EmpresaLocalidad' => 'required|max:255',
			'EmpresaMunicipio' => 'required|max:255',
			'EmpresaEntidad' => 'required|max:255',
			'EmpresaPais' => 'required|max:255',
			'EmpresaCodigo' => 'required|integer',
			'EmpresaTributante' => 'required|max:255',
			'EmpresaGiro' => 'required|max:255',
			'EmpresaTelOficina' => 'required|max:255',
			'EmpresaCorreoOficina' => 'required|max:255',
			'EmpresaDescripAli' => 'required|max:255',
			'EmpresaCantDonacion' => 'required|max:255',
			'EmpresaDetallesEntrega' => 'required|max:255'
		];

        $msgs = [
			'EmpresaNombre.required' => 'Validacion fallada en Nombre.required',
			'EmpresaNombre.string' => 'Validacion fallada en Nombre.string',
			'EmpresaNombre.max' => 'Validacion fallada en Nombre.max',
			'EmpresaLogo.required' => 'Validacion fallada en Logo.required',
			'EmpresaLogo.string' => 'Validacion fallada en Logo.string',
			'EmpresaDireccion.required' => 'Validacion fallada en Direccion.required',
			'EmpresaDireccion.string' => 'Validacion fallada en Direccion.string',
			'EmpresaDireccion.max' => 'Validacion fallada en Direccion.max',
			'EmpresaLocalidad.required' => 'Validacion fallada en Localidad.required',
			'EmpresaLocalidad.string' => 'Validacion fallada en Localidad.string',
			'EmpresaLocalidad.max' => 'Validacion fallada en Localidad.max',
			'EmpresaMunicipio.required' => 'Validacion fallada en Municipio.required',
			'EmpresaMunicipio.string' => 'Validacion fallada en Municipio.string',
			'EmpresaMunicipio.max' => 'Validacion fallada en Municipio.max',
			'EmpresaEntidad.required' => 'Validacion fallada en Entidad.required',
			'EmpresaEntidad.string' => 'Validacion fallada en Entidad.string',
			'EmpresaEntidad.max' => 'Validacion fallada en Entidad.max',
			'EmpresaPais.required' => 'Validacion fallada en Pais.required',
			'EmpresaPais.string' => 'Validacion fallada en Pais.string',
			'EmpresaPais.max' => 'Validacion fallada en Pais.max',
			'EmpresaCodigo.required' => 'Validacion fallada en Codigo.required',
			'EmpresaCodigo.integer' => 'Validacion fallada en Codigo.integer',
			'EmpresaCodigo.min' => 'Validacion fallada en Codigo.min',
			'EmpresaCodigo.max' => 'Validacion fallada en Codigo.max 1',
			'EmpresaTributante.required' => 'Validacion fallada en Tributante.required',
			'EmpresaTributante.string' => 'Validacion fallada en Tributante.string',
			'EmpresaTributante.max' => 'Validacion fallada en Tributante.max',
			'EmpresaGiro.required' => 'Validacion fallada en Giro.required',
			'EmpresaGiro.string' => 'Validacion fallada en Giro.string',
			'EmpresaGiro.max' => 'Validacion fallada en Giro.max',
			'EmpresaTelOficina.required' => 'Validacion fallada en TelOficina.required',
			'EmpresaTelOficina.string' => 'Validacion fallada en TelOficina.string',
			'EmpresaTelOficina.max' => 'Validacion fallada en TelOficina.max',
			'EmpresaCorreoOficina.required' => 'Validacion fallada en CorreoOficina.required',
			'EmpresaCorreoOficina.string' => 'Validacion fallada en CorreoOficina.string',
			'EmpresaCorreoOficina.max' => 'Validacion fallada en CorreoOficina.max',
			'EmpresaDescripAli.required' => 'Validacion fallada en DescripAli.required',
			'EmpresaDescripAli.string' => 'Validacion fallada en DescripAli.string',
			'EmpresaDescripAli.max' => 'Validacion fallada en DescripAli.max',
			'EmpresaCantDonacion.required' => 'Validacion fallada en CantDonacion.required',
			'EmpresaCantDonacion.string' => 'Validacion fallada en CantDonacion.string',
			'EmpresaCantDonacion.max' => 'Validacion fallada en CantDonacion.max',
			'EmpresaDetallesEntrega.required' => 'Validacion fallada en DetallesEntrega.required',
			'EmpresaDetallesEntrega.string' => 'Validacion fallada en DetallesEntrega.string',
			'EmpresaDetallesEntrega.max' => 'Validacion fallada en DetallesEntrega.max',
		];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables

        try {
            $logentemp = request('EmpresaLogo');

            $logrutemp = $uuid4 . "/logo/";

            Storage::disk('local')->put($logrutemp, $logentemp);
        } catch (\Exception $e) {
            Log::debug($e);
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
        }

        $data = [
            'uuid' => $uuid4,
            'idnentprs' => $idnentprs,
            'namentemp' => request('EmpresaNombre'),
			'logentemp' => $logrutemp,
			'drcentemp' => request('EmpresaDireccion'),
			'lclentemp' => request('EmpresaLocalidad'),
			'mncentemp' => request('EmpresaMunicipio'),
			'ententemp' => request('EmpresaEntidad'),
			'pasentorg' => request('EmpresaPais'),
			'cdgpstemp' => request('EmpresaCodigo'),
			'cdgtrbemp' => request('EmpresaTributante'),
			'girentemp' => request('EmpresaGiro'),
			'tlfofiemp' => request('EmpresaTelOficina'),
			'emlofiemp' => request('EmpresaCorreoOficina'),
			'desaliemp' => request('EmpresaDescripAli'),
			'candonemp' => request('EmpresaCantDonacion'),
			'temconemp' => request('EmpresaTiempoConsumo'),
			'horentemp' => request('EmpresaHoraEntrega'),
			'detentemo' => request('EmpresaDetallesEntrega'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Tblentemp::crtentemp($data, $trncnn);

        // 6.- Commit y return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
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
        $entemp = \Tblentemp::fnuentemp($uuid, $trncnn);
        if(!$entemp instanceof \Tblentemp){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entemp false');
        }

        $result = \Tblentemp::rmventemp($entemp->getIdnentemp(), $trncnn);

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
			'Nombre' => 'required|max:255',
			'Logo' => 'required|max:255',
			'Direccion' => 'required|max:255',
			'Localidad' => 'required|max:255',
			'Municipio' => 'required|max:255',
			'Entidad' => 'required|max:255',
			'Pais' => 'required|max:255',
			'Codigo' => 'required|integer|min:0|max:9',
			'Tributante' => 'required|max:255',
			'Giro' => 'required|max:255',
			'TelOficina' => 'required|max:255',
			'CorreoOficina' => 'required|max:255',
			'DescripAli' => 'required|max:255',
			'CantDonacion' => 'required|max:255',
			'TiempoConsumo' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'HoraEntrega' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'DetallesEntrega' => 'required|max:255',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid' => 'required|uuid|size:36',
			'Nombre.required' => 'Validacion fallada en Nombre.required',
			'Nombre.string' => 'Validacion fallada en Nombre.string',
			'Nombre.max' => 'Validacion fallada en Nombre.max',
			'Logo.required' => 'Validacion fallada en Logo.required',
			'Logo.string' => 'Validacion fallada en Logo.string',
			'Logo.max' => 'Validacion fallada en Logo.max',
			'Direccion.required' => 'Validacion fallada en Direccion.required',
			'Direccion.string' => 'Validacion fallada en Direccion.string',
			'Direccion.max' => 'Validacion fallada en Direccion.max',
			'Localidad.required' => 'Validacion fallada en Localidad.required',
			'Localidad.string' => 'Validacion fallada en Localidad.string',
			'Localidad.max' => 'Validacion fallada en Localidad.max',
			'Municipio.required' => 'Validacion fallada en Municipio.required',
			'Municipio.string' => 'Validacion fallada en Municipio.string',
			'Municipio.max' => 'Validacion fallada en Municipio.max',
			'Entidad.required' => 'Validacion fallada en Entidad.required',
			'Entidad.string' => 'Validacion fallada en Entidad.string',
			'Entidad.max' => 'Validacion fallada en Entidad.max',
			'Pais.required' => 'Validacion fallada en Pais.required',
			'Pais.string' => 'Validacion fallada en Pais.string',
			'Pais.max' => 'Validacion fallada en Pais.max',
			'Codigo.required' => 'Validacion fallada en Codigo.required',
			'Codigo.integer' => 'Validacion fallada en Codigo.integer',
			'Codigo.min' => 'Validacion fallada en Codigo.min',
			'Codigo.max' => 'Validacion fallada en Codigo.max 2',
			'Tributante.required' => 'Validacion fallada en Tributante.required',
			'Tributante.string' => 'Validacion fallada en Tributante.string',
			'Tributante.max' => 'Validacion fallada en Tributante.max',
			'Giro.required' => 'Validacion fallada en Giro.required',
			'Giro.string' => 'Validacion fallada en Giro.string',
			'Giro.max' => 'Validacion fallada en Giro.max',
			'TelOficina.required' => 'Validacion fallada en TelOficina.required',
			'TelOficina.string' => 'Validacion fallada en TelOficina.string',
			'TelOficina.max' => 'Validacion fallada en TelOficina.max',
			'CorreoOficina.required' => 'Validacion fallada en CorreoOficina.required',
			'CorreoOficina.string' => 'Validacion fallada en CorreoOficina.string',
			'CorreoOficina.max' => 'Validacion fallada en CorreoOficina.max',
			'DescripAli.required' => 'Validacion fallada en DescripAli.required',
			'DescripAli.string' => 'Validacion fallada en DescripAli.string',
			'DescripAli.max' => 'Validacion fallada en DescripAli.max',
			'CantDonacion.required' => 'Validacion fallada en CantDonacion.required',
			'CantDonacion.string' => 'Validacion fallada en CantDonacion.string',
			'CantDonacion.max' => 'Validacion fallada en CantDonacion.max',
			'TiempoConsumo.required' => 'Validacion fallada en TiempoConsumo.required',
			'TiempoConsumo.date_format' => 'Validacion fallada en TiempoConsumo.date_format',
			'TiempoConsumo.nullable' => 'Validacion fallada en TiempoConsumo.nullable',
			'HoraEntrega.required' => 'Validacion fallada en HoraEntrega.required',
			'HoraEntrega.date_format' => 'Validacion fallada en HoraEntrega.date_format',
			'HoraEntrega.nullable' => 'Validacion fallada en HoraEntrega.nullable',
			'DetallesEntrega.required' => 'Validacion fallada en DetallesEntrega.required',
			'DetallesEntrega.string' => 'Validacion fallada en DetallesEntrega.string',
			'DetallesEntrega.max' => 'Validacion fallada en DetallesEntrega.max',
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
        $udxentemp = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entemp = \Tblentemp::fnuentemp($udxentemp, $trncnn);
        if(!$entemp instanceof \Tblentemp){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entemp false');
        }

        $data = [
			'idnentemp' => $entemp->getIdnentemp(),
			'uuid' => $entemp->getUuid(),
			'namentemp' => request('Nombre'),
			'logentemp' => request('Logo'),
			'drcentemp' => request('Direccion'),
			'lclentemp' => request('Localidad'),
			'mncentemp' => request('Municipio'),
			'ententemp' => request('Entidad'),
			'pasentorg' => request('Pais'),
			'cdgpstemp' => request('Codigo'),
			'cdgtrbemp' => request('Tributante'),
			'girentemp' => request('Giro'),
			'tlfofiemp' => request('TelOficina'),
			'emlofiemp' => request('CorreoOficina'),
			'desaliemp' => request('DescripAli'),
			'candonemp' => request('CantDonacion'),
			'temconemp' => request('TiempoConsumo'),
			'horentemp' => request('HoraEntrega'),
			'detentemo' => request('DetallesEntrega'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        $result = \Tblentemp::updentemp($data, $trncnn);

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

    public function profile(Request $request){
        $rules = [
            'Id' => 'required|numeric',
        ];

        $msgs = [
            'Id' => 'required|numeric',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }
        $id = $request->get('Id');


        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entusr = \Users::fnousers($id, $trncnn);
        if(!$entusr instanceof \Users){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entemp false');
        }
        $entprs = \Tblentprs::fnoentprs($id, $trncnn);
        // 6.- Commit & return
        if(!$entprs){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrió un inesperado');
        }
        if($entprs->getTipentprs() == 1){
            $entemp = \Tblentemp::fnoentprs($entprs->getIdnentprs(), $trncnn);
            TransactionHandler::commit($trncnn);
            $rtndat = [
              'Nombre' => $entprs->getNomentprs(),
              'ApellidoP' => $entprs->getPrmaplprs(),
              'ApellidoM' => $entprs->getSgnaplprs(),
              'CorreoP' => $entprs->getEmllbrprs(),
              'CorreoL' => $entprs->getEmllbrprs(),
              'Pais' => $entprs->getPasentprs(),
              'Estado' => $entprs->getEntentprs(),
              'Municipio' => $entprs->getMncentprs(),
              'Domicilio' => $entprs->getDmcentprs(),
              'TelFijo' => $entprs->getTlffijprs(),
              'TelMovil' => $entprs->getTlfmvlprs(),
              'Foto' => $entprs->getFotentprs(),
              'NombreEmp' => $entemp->getNamentemp(),
              'Logo' => $entemp->getLogentemp(),
              'Direccion' => $entemp->getDrcentemp(),
              'LocalidadEmp' => $entemp->getLclentemp(),
              'MunicipioEmp' => $entemp->getMncentemp(),
              'EntidadEmp' => $entemp->getEntentemp(),
              'PaisEmp' => $entemp->getPasentorg(),
              'TelEmp' => $entemp->getTlfofiemp(),
              'Giro' => $entemp->getGirentemp(),
              'CorreoEmp' => $entemp->getEmlofiemp(),
            ];
            return ReturnHandler::rtrsccjsn($rtndat);
        }
        elseif ($entprs->getTipentprs() == 2){
            $entorg = \Tblentorg::fnoentprs($entprs->getIdnentprs(), $trncnn);
            TransactionHandler::commit($trncnn);
            $rtndat = [
                'Nombre' => $entprs->getNomentprs(),
                'ApellidoP' => $entprs->getPrmaplprs(),
                'ApellidoM' => $entprs->getSgnaplprs(),
                'CorreoP' => $entprs->getEmllbrprs(),
                'CorreoL' => $entprs->getEmllbrprs(),
                'Pais' => $entprs->getPasentprs(),
                'Estado' => $entprs->getEntentprs(),
                'Municipio' => $entprs->getMncentprs(),
                'Domicilio' => $entprs->getDmcentprs(),
                'TelFijo' => $entprs->getTlffijprs(),
                'TelMovil' => $entprs->getTlfmvlprs(),
                'Foto' => $entprs->getFotentprs(),
                'NombreEmp' => $entorg->getNmbentorg(),
                'Logo' => $entorg->getLogentorg(),
                'Direccion' => $entorg->getDmcentorg(),
                'LocalidadEmp' => $entorg->getLclentorg(),
                'MunicipioEmp' => $entorg->getMncentorg(),
                'EntidadEmp' => $entorg->getEtdentorg(),
                'PaisEmp' => $entorg->getPasentorg(),
                'TelEmp' => $entorg->getTlffcnorg(),
                'Giro' => $entorg->getSgmentorg(),
                'CorreoEmp' => $entorg->getEmlfcnorg(),

            ];
            return ReturnHandler::rtrsccjsn($rtndat);
        }


    }



}
