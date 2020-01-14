<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Propel\Runtime\Connection\ConnectionInterface;
use Ramsey\Uuid\Uuid;

class TblentorgController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('app.Tblentorg.main');
    }

    // store (C)
    public function create(Request $request, ConnectionInterface &$trncnn)
    {
        // 1.- Validacion del request TODO *Modificar*
        $rules = [
			'OrganizacionSegmentoMercado' => 'required|max:255',
			'OrganizacionBenefSemana' => 'required|max:255',
			'OrganizacionNombre' => 'required|max:255',
			'OrganizacionLogo' => 'required',
			'OrganizacionRfc' => 'required|max:255',
			'OrganizacionDomicilio' => 'required|max:255',
			'OrganizacionLocalidad' => 'required|max:255',
			'OrganizacionMunicipio' => 'required|max:255',
			'OrganizacionEntidad' => 'required|max:255',
			'OrganizacionPais' => 'required|max:255',
			'OrganizacionCodigo' => 'required|max:255',
			'OrganizacionTelOficina' => 'required|max:255',
			'OrganizacionCorreoOficina' => 'required|max:255',
			'OrganizacionPlanAnual' => 'required',
			'OrganizacionActaConstitutiva' => 'required',
			'OrganizacionConstanciaDonataria' => 'required',
		];

        $msgs = [
			'OrganizacionSegmentoMercado.required' => 'Validacion fallada en SegmentoMercado.required',
			'OrganizacionSegmentoMercado.string' => 'Validacion fallada en SegmentoMercado.string',
			'OrganizacionSegmentoMercado.max' => 'Validacion fallada en SegmentoMercado.max',
			'OrganizacionBenefSemana.required' => 'Validacion fallada en BenefSemana.required',
			'OrganizacionBenefSemana.string' => 'Validacion fallada en BenefSemana.string',
			'OrganizacionBenefSemana.max' => 'Validacion fallada en BenefSemana.max',
			'OrganizacionNombre.required' => 'Validacion fallada en Nombre.required',
			'OrganizacionNombre.string' => 'Validacion fallada en Nombre.string',
			'OrganizacionNombre.max' => 'Validacion fallada en Nombre.max',
			'OrganizacionLogo.required' => 'Validacion fallada en Logo.required',
			'OrganizacionLogo.string' => 'Validacion fallada en Logo.string',
			'OrganizacionLogo.max' => 'Validacion fallada en Logo.max',
			'OrganizacionRfc.required' => 'Validacion fallada en Rfc.required',
			'OrganizacionRfc.string' => 'Validacion fallada en Rfc.string',
			'OrganizacionRfc.max' => 'Validacion fallada en Rfc.max',
			'OrganizacionDomicilio.required' => 'Validacion fallada en Domicilio.required',
			'OrganizacionDomicilio.string' => 'Validacion fallada en Domicilio.string',
			'OrganizacionDomicilio.max' => 'Validacion fallada en Domicilio.max',
			'OrganizacionLocalidad.required' => 'Validacion fallada en Localidad.required',
			'OrganizacionLocalidad.string' => 'Validacion fallada en Localidad.string',
			'OrganizacionLocalidad.max' => 'Validacion fallada en Localidad.max',
			'OrganizacionMunicipio.required' => 'Validacion fallada en Municipio.required',
			'OrganizacionMunicipio.string' => 'Validacion fallada en Municipio.string',
			'OrganizacionMunicipio.max' => 'Validacion fallada en Municipio.max',
			'OrganizacionEntidad.required' => 'Validacion fallada en Entidad.required',
			'OrganizacionEntidad.string' => 'Validacion fallada en Entidad.string',
			'OrganizacionEntidad.max' => 'Validacion fallada en Entidad.max',
			'OrganizacionPais.required' => 'Validacion fallada en Pais.required',
			'OrganizacionPais.string' => 'Validacion fallada en Pais.string',
			'OrganizacionPais.max' => 'Validacion fallada en Pais.max',
			'OrganizacionCodigo.required' => 'Validacion fallada en CodigoPostal.required',
			'OrganizacionCodigo.string' => 'Validacion fallada en CodigoPostal.string',
			'OrganizacionCodigo.max' => 'Validacion fallada en CodigoPostal.max',
			'OrganizacionTelOficina.required' => 'Validacion fallada en TelOficina.required',
			'OrganizacionTelOficina.string' => 'Validacion fallada en TelOficina.string',
			'OrganizacionTelOficina.max' => 'Validacion fallada en TelOficina.max',
			'OrganizacionCorreoOficina.required' => 'Validacion fallada en CorreoOficina.required',
			'OrganizacionCorreoOficina.string' => 'Validacion fallada en CorreoOficina.string',
			'OrganizacionCorreoOficina.max' => 'Validacion fallada en CorreoOficina.max',
			'OrganizacionPlanAnual.required' => 'Validacion fallada en PlanAnual.required',
			'OrganizacionPlanAnual.string' => 'Validacion fallada en PlanAnual.string',
			'OrganizacionPlanAnual.max' => 'Validacion fallada en PlanAnual.max',
			'OrganizacionActaConstitutiva.required' => 'Validacion fallada en ActaConstitutiva.required',
			'OrganizacionActaConstitutiva.string' => 'Validacion fallada en ActaConstitutiva.string',
			'OrganizacionActaConstitutiva.max' => 'Validacion fallada en ActaConstitutiva.max',
			'OrganizacionConstanciaDonataria.required' => 'Validacion fallada en ConstanciaDonataria.required',
			'OrganizacionConstanciaDonataria.string' => 'Validacion fallada en ConstanciaDonataria.string',
			'OrganizacionConstanciaDonataria.max' => 'Validacion fallada en ConstanciaDonataria.max',
		];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $data = [
            'uuid' => trim(Uuid::uuid3(Uuid::NAMESPACE_DNS, $request->get('OrganizacionRfc'))),
			'sgmentorg' => request('OrganizacionSegmentoMercado'),
			'bnfentorg' => request('OrganizacionBenefSemana'),
			'nmbentorg' => request('OrganizacionNombre'),
			'logentorg' => request('OrganizacionLogo'),
			'rfcentorg' => request('OrganizacionRfc'),
			'dmcentorg' => request('OrganizacionDomicilio'),
			'lclentorg' => request('OrganizacionLocalidad'),
			'mncentorg' => request('OrganizacionMunicipio'),
			'etdentorg' => request('OrganizacionEntidad'),
			'pasentorg' => request('OrganizacionPais'),
			'cdgpstorg' => request('OrganizacionCodigo'),
			'tlffcnorg' => request('OrganizacionTelOficina'),
			'emlfcnorg' => request('OrganizacionCorreoOficina'),
			'plntrborg' => request('OrganizacionPlanAnual'),
			'actcnsorg' => request('OrganizacionActaConstitutiva'),
			'cnsdntorg' => request('OrganizacionConstanciaDonataria'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Tblentorg::crtentorg($data, $trncnn);

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
        $entorg = \Tblentorg::fnuentorg($uuid, $trncnn);
        if(!$entorg instanceof \Tblentorg){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entorg false');
        }

        $result = \Tblentorg::rmventorg($entorg->getIdnentorg(), $trncnn);

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
			'SegmentoMercado' => 'required|max:255',
			'BenefSemana' => 'required|max:255',
			'Nombre' => 'required|max:255',
			'Logo' => 'required|max:255',
			'Rfc' => 'required|max:255',
			'Domicilio' => 'required|max:255',
			'Localidad' => 'required|max:255',
			'Municipio' => 'required|max:255',
			'Entidad' => 'required|max:255',
			'Pais' => 'required|max:255',
			'CodigoPostal' => 'required|max:255',
			'TelOficina' => 'required|max:255',
			'CorreoOficina' => 'required|max:255',
			'PlanAnual' => 'required|max:255',
			'ActaConstitutiva' => 'required|max:255',
			'ConstanciaDonataria' => 'required|max:255',
			'Creado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
			'Actualizado' => 'nullable|date_format:"Y-m-d\TH:i:sO"',
		];

        $msgs = [ // TODO *Customizable*
			'Uuid' => 'required|uuid|size:36',
			'SegmentoMercado.required' => 'Validacion fallada en SegmentoMercado.required',
			'SegmentoMercado.string' => 'Validacion fallada en SegmentoMercado.string',
			'SegmentoMercado.max' => 'Validacion fallada en SegmentoMercado.max',
			'BenefSemana.required' => 'Validacion fallada en BenefSemana.required',
			'BenefSemana.string' => 'Validacion fallada en BenefSemana.string',
			'BenefSemana.max' => 'Validacion fallada en BenefSemana.max',
			'Nombre.required' => 'Validacion fallada en Nombre.required',
			'Nombre.string' => 'Validacion fallada en Nombre.string',
			'Nombre.max' => 'Validacion fallada en Nombre.max',
			'Logo.required' => 'Validacion fallada en Logo.required',
			'Logo.string' => 'Validacion fallada en Logo.string',
			'Logo.max' => 'Validacion fallada en Logo.max',
			'Rfc.required' => 'Validacion fallada en Rfc.required',
			'Rfc.string' => 'Validacion fallada en Rfc.string',
			'Rfc.max' => 'Validacion fallada en Rfc.max',
			'Domicilio.required' => 'Validacion fallada en Domicilio.required',
			'Domicilio.string' => 'Validacion fallada en Domicilio.string',
			'Domicilio.max' => 'Validacion fallada en Domicilio.max',
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
			'CodigoPostal.required' => 'Validacion fallada en CodigoPostal.required',
			'CodigoPostal.string' => 'Validacion fallada en CodigoPostal.string',
			'CodigoPostal.max' => 'Validacion fallada en CodigoPostal.max',
			'TelOficina.required' => 'Validacion fallada en TelOficina.required',
			'TelOficina.string' => 'Validacion fallada en TelOficina.string',
			'TelOficina.max' => 'Validacion fallada en TelOficina.max',
			'CorreoOficina.required' => 'Validacion fallada en CorreoOficina.required',
			'CorreoOficina.string' => 'Validacion fallada en CorreoOficina.string',
			'CorreoOficina.max' => 'Validacion fallada en CorreoOficina.max',
			'PlanAnual.required' => 'Validacion fallada en PlanAnual.required',
			'PlanAnual.string' => 'Validacion fallada en PlanAnual.string',
			'PlanAnual.max' => 'Validacion fallada en PlanAnual.max',
			'ActaConstitutiva.required' => 'Validacion fallada en ActaConstitutiva.required',
			'ActaConstitutiva.string' => 'Validacion fallada en ActaConstitutiva.string',
			'ActaConstitutiva.max' => 'Validacion fallada en ActaConstitutiva.max',
			'ConstanciaDonataria.required' => 'Validacion fallada en ConstanciaDonataria.required',
			'ConstanciaDonataria.string' => 'Validacion fallada en ConstanciaDonataria.string',
			'ConstanciaDonataria.max' => 'Validacion fallada en ConstanciaDonataria.max',
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
        $udxentorg = request('Uuid');
		$timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entorg = \Tblentorg::fnuentorg($udxentorg, $trncnn);
        if(!$entorg instanceof \Tblentorg){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entorg false');
        }

        $data = [
			'idnentorg' => $entorg->getIdnentorg(),
			'uuid' => $entorg->getUuid(),
			'sgmentorg' => request('SegmentoMercado'),
			'bnfentorg' => request('BenefSemana'),
			'nmbentorg' => request('Nombre'),
			'logentorg' => request('Logo'),
			'rfcentorg' => request('Rfc'),
			'dmcentorg' => request('Domicilio'),
			'lclentorg' => request('Localidad'),
			'mncentorg' => request('Municipio'),
			'etdentorg' => request('Entidad'),
			'pasentorg' => request('Pais'),
			'cdgpstorg' => request('CodigoPostal'),
			'tlffcnorg' => request('TelOficina'),
			'emlfcnorg' => request('CorreoOficina'),
			'plntrborg' => request('PlanAnual'),
			'actcnsorg' => request('ActaConstitutiva'),
			'cnsdntorg' => request('ConstanciaDonataria'),
			'created_at' => request('Creado'),
			'updated_at' => request('Actualizado'),
        ];

        $result = \Tblentorg::updentorg($data, $trncnn);

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
