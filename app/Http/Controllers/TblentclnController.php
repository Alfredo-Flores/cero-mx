<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use function Psy\debug;

class TblentclnController extends Controller
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
            $tipentprs = \Tblentprs::fnoentusr($id);
            $idnentprs = $tipentprs->getIdnentprs();
            $entemp = \Tblentemp::fnoentprs($idnentprs);

            if (!$entemp) {
                return view('auth.login');
            }

            $idnentemp = $entemp->getIdnentemp();

            $ofertas = \Tblentdnc::fndreqdnc($idnentemp);
            $ofertas = $ofertas->toArray();

            return view('app.Tblentemp.calendario')
                ->with("ofertas", $ofertas);;
        } elseif ($tipentprs == 2) {


            return view('app.Tblentorg.calendario');
        } else {
            return view('auth.login');
        }
    }

    // store (C)
    public function create(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
            'UuidOferta' => 'required',
            'Idnentusr' => 'required|integer',
            'Idnentorg' => 'required|integer',
            'Periodicidad' => 'required|integer|min:0|max:9',
            'FechaInicio' => 'date_format:"Y-m-d H:i:s"',
            'FechaFinal' => 'date_format:"Y-m-d H:i:s"',
        ];

        $msgs = [
            'UuidOferta.required' => 'Ocurrio un error inesperado',
            'Idnentusr.required' => 'Ocurrio un error inesperado',
            'Idnentusr.integer' => 'Ocurrio un error inesperado',
            'Idnentorg.required' => 'Ocurrio un error inesperado',
            'Idnentorg.integer' => 'Ocurrio un error inesperado',

            'Periodicidad.required' => 'Por favor, elija la periodicidad de la rutina',
            'Periodicidad.integer' => 'Por favor, elija la periodicidad de la rutina correctamente',
            'FechaInicio.date_format' => 'Por favor, elija la fecha inicial de la rutina correctamente',
            'FechaFinal.date_format' => 'Por favor, elija la fecha final de la rutina correctamente',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }


        $uuid4 = $request->get("UuidOferta");
        $id = $request->get("Idnentusr");

        $entprs = \Tblentprs::fnoentusr($id);

        if (!$entprs) {
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
        }

        $idnentprs = $entprs->getIdnentprs();
        $entemp = \Tblentemp::fnoentprs($idnentprs);
        $idnentemp = $entemp->getIdnentemp();


        // 2.- Peticion a variables
        $data = [
            'uuid' => $uuid4,
            'idnentemp' => $idnentemp,
            'idnentorg' => request('Idnentorg'),
            'prdentcln' => request('Periodicidad'),
            'fchinccln' => request('FechaInicio'),
            'fchfnlcln' => request('FechaFinal'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Tblentcln::crtentcln($data, $trncnn);

        // 6.- Commit y return
        if (!$result) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
        }

        $data["idnentcln"] = $result->getIdnentcln();

        return app(TblentrcpController::class)->create($data, $trncnn);
    }

    // destroy (R)
    public function destroy(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
            'Uuid' => 'required|uuid|size:36',
            'UuidOferta' => 'required|uuid|size:36',
        ];

        $msgs = [ // TODO *Customizable*
            'Uuid.required' => 'Objeto no v??lido',
            'Uuid.uuid' => 'Objeto no v??lido',
            'Uuid.size' => 'Objeto no v??lido',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Request a variables
        $uuid = request('Uuid');
        $uuiddnc = request('UuidOferta');

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entcln = \Tblentcln::fnuentcln($uuid, $trncnn);
        if (!$entcln instanceof \Tblentcln) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entcln false');
        }

        $entdnc = \Tblentdnc::fnuentdnc($uuiddnc, $trncnn);
        if (!$entcln instanceof \Tblentcln) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entcln false');
        }

        $idnentcln = $entcln->getIdnentcln();
        $today = date("Y-m-d H:i:s");

        $resultrcp = \Tblentrcp::dltupdcln($idnentcln, $today, $trncnn);
        $result = \Tblentcln::rmventcln($idnentcln, $trncnn);
        $resultdnc = \Tblentdnc::rmventdnc($entdnc->getIdentdnc(), $trncnn);

        // 6.- Commit & return
        if (!$result || !$resultdnc || !$resultrcp) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Eliminado correctamente');
    }

    // update (U)
    public function update(Request $request)
    {
        // 1.- Validacion del request
        $rules = [
            'Uuid' => 'required|uuid|size:36',
            'Periodicidad' => 'required|integer|min:0|max:9',
            'FechaInicio' => 'nullable|date_format:"Y-m-d H:i:s"',
            'FechaFinal' => 'nullable|date_format:"Y-m-d H:i:s"',
        ];

        $msgs = [
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
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if (!empty($validator)) {
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables TODO *Modificar*
        $udxentcln = request('Uuid');
        $timestamp = date(DATE_ISO8601);

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entcln = \Tblentcln::fnuentcln($udxentcln, $trncnn);

        if (!$entcln instanceof \Tblentcln) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entcln false');
        }


        $data = [
            'idnentcln' => $entcln->getIdnentcln(),
            'idnentemp' => $entcln->getIdnentemp(),
            'idnentorg' => $entcln->getIdnentorg(),
            'uuid' => $udxentcln,
            'prdentcln' => request('Periodicidad'),
            'fchinccln' => request('FechaInicio'),
            'fchfnlcln' => request('FechaFinal'),
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $result = \Tblentcln::updentcln($data, $trncnn);

        // 6.- Commit & return
        if (!$result) {
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurri?? un error inesperado');
        }

        return app(TblentrcpController::class)->update($data, $trncnn);
    }

    public function loadtable(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return null;
        }

        $entprs = $tipentprs;
        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $idnentprs = $entprs->getIdnentprs();

            $idnentorg = \Tblentemp::fnoentprs($idnentprs)->getIdnentemp();

            $eventos = \Tblentcln::fndentemp($idnentorg);
            $eventos = $eventos->toArray();

            $ofertas = \Tblentdnc::fndempcln($idnentorg);
            $ofertas = $ofertas->toArray();

            $json = [];


            foreach ($eventos as $key => $evento) {
                if ($evento["Prdentcln"] == 1) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    for ($i = 1; $i <= $interval->m + 1; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Nmbentorg"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-orange",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 1 month'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 2) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    $quincenas = floor($interval->days / 15) + 1;

                    for ($i = 1; $i <= $quincenas; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Nmbentorg"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-red",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 15 day'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 3) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    $semanas = floor($interval->days / 7) + 1;;
                    for ($i = 1; $i <= $semanas; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Nmbentorg"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-green",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 1 week'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 4) {

                    $fecha = $evento["Fchinccln"];

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    for ($i = 1; $i <= $interval->d + 1; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Nmbentorg"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-rose",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 1 day'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 5) {

                    $fecha = $evento["Fchinccln"];

                    $array = [
                        "id" => $evento["Idnentcln"],
                        "title" => $evento["Nmbentorg"],
                        "start" => $fecha,
                        "allDay" => false,
                        "className" => "event-azure",
                        "extendedProps" => [
                            "uuid" => $evento["Uuid"]
                        ],
                    ];

                    array_push($json, $array);
                }
            }

            if (empty($eventos)) {
                $eventos = null;
            }

            return json_encode([
                'success' => true,
                'data' => $json,
                'ofertas' => $ofertas,
                'eventos' => $eventos
            ]);

        } elseif ($tipentprs == 2) {
            $idnentprs = $entprs->getIdnentprs();

            $idnentorg = \Tblentorg::fnoentprs($idnentprs)->getIdnentorg();

            $eventos = \Tblentcln::fndentorg($idnentorg);
            $eventos = $eventos->toArray();

            $ofertas = \Tblentdnc::fndorgcln($idnentorg);
            $ofertas = $ofertas->toArray();

            $json = [];

            foreach ($eventos as $key => $evento) {
                if ($evento["Prdentcln"] == 1) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $evento["uuidoferta"] = $ofertas[$key]["Uuid"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    for ($i = 1; $i <= $interval->m + 1; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-orange",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 1 month'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 2) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    $quincenas = floor($interval->days / 15) + 1;

                    for ($i = 1; $i <= $quincenas; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-red",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 15 day'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 3) {

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    $semanas = floor($interval->days / 7) + 1;;
                    for ($i = 1; $i <= $semanas; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-green",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 1 week'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 4) {

                    $fecha = $evento["Fchinccln"];

                    $fecha = $evento["Fchinccln"];
                    $fechaFinal = $evento["Fchfnlcln"];

                    $date1 = new DateTime($fecha);
                    $date2 = new DateTime($fechaFinal);

                    $interval = $date1->diff($date2);

                    for ($i = 1; $i <= $interval->d + 1; $i++) {

                        $array = [
                            "id" => $evento["Idnentcln"],
                            "title" => $evento["Namentemp"],
                            "start" => $fecha,
                            "allDay" => false,
                            "className" => "event-rose",
                            "extendedProps" => [
                                "uuid" => $evento["Uuid"]
                            ],
                        ];

                        $fecha = date('Y-m-d H:i:s', strtotime($fecha . ' + 1 day'));

                        array_push($json, $array);
                    }
                } else if ($evento["Prdentcln"] == 5) {

                    $fecha = $evento["Fchinccln"];

                    $array = [
                        "id" => $evento["Idnentcln"],
                        "title" => $evento["Namentemp"],
                        "start" => $fecha,
                        "allDay" => false,
                        "className" => "event-azure",
                        "extendedProps" => [
                            "uuid" => $evento["Uuid"]
                        ],
                    ];

                    array_push($json, $array);
                }
            }

            if (empty($eventos)) {
                $eventos = null;
            }


            return json_encode([
                'success' => true,
                'data' => $json,
                'ofertas' => $ofertas,
                'eventos' => $eventos
            ]);
        } else {
            return null;
        }
    }

    // Display one(D)
    public function edit(Request $request)
    {

    }


    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
