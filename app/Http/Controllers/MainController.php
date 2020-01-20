<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function registerInstitution(Request $request)
    {
        $rules = [
            'TipoDeInstitucion' => 'required|numeric|between:0,3',
        ];

        $messages = [
            'TipoDeInstitucion.required' => 'Ocurrio algun problema inesperado, recarge la pagina codigo 4011',
            'TipoDeInstitucion.numeric' => 'Ocurrio algun problema inesperado, recarge la pagina codigo 4012',
            'TipoDeInstitucion.between' => 'Ocurrio algun problema inesperado, recarge la pagina codigo 4013',
        ];

        $validador = Validator::make($request->toArray(), $rules, $messages)->errors()->all();

        if (!empty($validador)) {
            return array(
                'success' => false,
                'message' => $validador[0]
            );
        }

        $tipo = trim($request->get('TipoDeInstitucion'));

        if ($tipo == 1) {
            $rules = [
                'NombreEmpresa' => 'required',
                'DireccionEmpresa' => 'required',
                'TelefonoEmpresa' => 'required|numeric|min:10',
            ];

            $messages = [
                'NombreEmpresa:required' => 'Ingrese el nombre de la organización internacional',
                'DireccionEmpresa:required' => 'Ingrese la dirección de la organización internacional',
                'TelefonoEmpresa:required' => 'Ingrese el telefono de la organización internacional',
                'TelefonoEmpresa:numeric' => 'Ingrese el telefono con numeros',
                'TelefonoEmpresa:min' => 'Ingrese el telefono con un minimo de 10 digitos',
            ];

            $validador = Validator::make($request->toArray(), $rules, $messages)->errors()->all();

            if (!empty($validador)) {
                return array(
                    'success' => false,
                    'message' => $validador[0]
                );
            }

            // Data
            $username = trim($request->get('NombreRepresentante'));
            $useremail = trim($request->get('Email'));
            $userpassword = trim($request->get('Password'));
            $usertelephone = trim($request->get('TelefonoRepresentante'));

            // Logo
            try {
                $img = $request->file('LogoInstitucion');
                $rouimg = null;

                if ($img != null) {
                    $rouimg = 'archivos/' . Uuid::generate(3, $useremail, Uuid::NS_DNS)->string . '/logo';
                    Storage::disk('local')->put($rouimg, $img);
                }
            } catch (\Exception $e) {
                Log::debug($e);
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            // Insert
            $entusr = \Users::insusers($username, $useremail, $userpassword, $rouimg, $usertelephone, $tipo);

            if (!$entusr) {
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            // Insert
            $iduser = $entusr->getId();
            $bussinessname = trim($request->get('NombreEmpresa'));
            $bussinessdir = trim($request->get('DireccionEmpresa'));
            $bussinesstel = trim($request->get('TelefonoEmpresa'));
            $bussinessrfc = trim($request->get('RfcEmpresa'));

            $entorg = \Tblentbsn::insentbsn($iduser, $bussinessname, $bussinessdir, $bussinesstel, $bussinessrfc);

            if (!$entorg) {
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            // Done
            return array(
                'success' => true,
                'message' => 'Enviaremos un correo con la aprobacion o comunicado de esta cuenta por parte de los administradores'
            );
        } elseif ($tipo == 2) {
            $rules = [
                'NombreOrganizacion' => 'required',
                'DireccionOrganizacion' => 'required',
                'TelefonoOrganizacion' => 'required|numeric|min:10',
                'Cluni' => 'required|file|mimes:pdf',
                'RfcOrganizacion' => 'required',
            ];

            $messages = [
                'NombreOrganizacion.required' => 'Ingrese el nombre de la organización',
                'DireccionOrganizacion.required' => 'Ingrese la dirección de la organización',
                'TelefonoOrganizacion.required' => 'Ingrese el telefono de la organización',
                'TelefonoOrganizacion.numeric' => 'Ingrese el telefono con numeros',
                'TelefonoOrganizacion.min' => 'Ingrese el telefono con un minimo de 10 digitos',
                'Cluni.required' => 'Ingrese el CLUNI de la organización',
                'Cluni.file' => 'Ingrese el CLUNI en formato PDF',
                'Cluni.mimes' => 'Ingrese el CLUNI en formato PDF',
                'RfcOrganizacion.required' => 'Ingrese el RFC de la organizacion',
            ];

            $validador = Validator::make($request->toArray(), $rules, $messages)->errors()->all();

            if (!empty($validador)) {
                return array(
                    'success' => false,
                    'message' => $validador[0]
                );
            }

            // Data
            $username = trim($request->get('NombreRepresentante'));
            $useremail = trim($request->get('Email'));
            $userpassword = trim($request->get('Password'));
            $usertelephone = trim($request->get('TelefonoRepresentante'));
            $rouimg = null;

            // Logo
            try {
                $img = $request->file('LogoInstitucion');

                if ($img != null) {
                    $rouimg = 'archivos/' . Uuid::generate(3, $useremail, Uuid::NS_DNS)->string . '/logo';
                    Storage::disk('local')->put($rouimg, $img);
                }
            } catch (\Exception $e) {
                Log::debug($e);
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            // Insert
            $entusr = \Users::insusers($username, $useremail, $userpassword, $rouimg, $usertelephone, $tipo);

            if (!$entusr) {
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            // Insert
            $iduser = $entusr->getId();
            $namentorg = trim($request->get('NombreOrganizacion'));
            $direntorg = trim($request->get('DireccionOrganizacion'));
            $telentorg = trim($request->get('TelefonoOrganizacion'));
            $rfcentorg = trim($request->get('RfcOrganizacion'));
            $rouclu = null;
            $roucon = null;

            try {
                $cluentorg = $request->file('Cluni');
                $donentorg = $request->file('Constancia');

                $rouclu = 'archivos/' . Uuid::generate(3, $useremail, Uuid::NS_DNS)->string . '/cluni';
                Storage::disk('local')->put($rouclu, $cluentorg);

                if ($donentorg != null) {
                    $roucon = 'archivos/' . Uuid::generate(3, $useremail, Uuid::NS_DNS)->string . '/constancia';
                    Storage::disk('local')->put($roucon, $cluentorg);
                }
            } catch (\Exception $e) {
                Log::debug($e);
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            $entorg = \Tblentorg::insentorg($iduser, $namentorg, $direntorg, $telentorg, $rfcentorg, $rouclu, $roucon);

            if (!$entorg) {
                return array(
                    'success' => false,
                    'message' => 'Ocurrio un error inesperado'
                );
            }

            // Done
            return array(
                'success' => true,
                'message' => 'Organización'
            );
        }  else {
            return array(
                'success' => false,
                'message' => 'Ninguno'
            );
        }
    }

}
