<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class TblentrcpController extends Controller
{
    public function create($data, $trncnn)
    {

        if ($data["prdentcln"] == 1) {

            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);
            $newFecha = $fecha;

            for ($i = 1; $i <= $interval->m + 1; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 1 month'));


                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 2) {

            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];
            $newFecha = $fecha;

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);

            $quincenas = floor($interval->days/15) + 1;

            for ($i = 1; $i <= $quincenas; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 15 days'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 3) {

            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];
            $newFecha = $fecha;

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);

            $semanas = floor($interval->days/7) + 1;
            for ($i = 1; $i <= $semanas; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 1 week'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 4) {
            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];
            $newFecha = $fecha;

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);

            for ($i = 1; $i <= $interval->d; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 1 day'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 5) {
            $newUuid = Uuid::uuid4();

            $data["uuid"] = $newUuid;
            $result = \Tblentrcp::crtentrcp($data, $trncnn);

            if(!$result){
                TransactionHandler::rollback($trncnn);
                return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
            }
        }


        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Guardado correctamente');
    }

    public function update($data, $trncnn)
    {
        $today = date("Y-m-d H:i:s");

        $result = \Tblentrcp::dltupdcln($data["idnentcln"], $today, $trncnn);

        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
        }

        if ($data["prdentcln"] == 1) {

            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);
            $newFecha = $fecha;

            for ($i = 1; $i <= $interval->m + 1; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 1 month'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 2) {

            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];
            $newFecha = $fecha;

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);

            $quincenas = floor($interval->days/15) + 1;

            for ($i = 1; $i <= $quincenas; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 15 days'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 3) {

            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];
            $newFecha = $fecha;

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);

            $semanas = floor($interval->days/7) + 1;
            for ($i = 1; $i <= $semanas; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 1 week'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 4) {
            $fecha = $data["fchinccln"];
            $fechaFinal = $data["fchfnlcln"];
            $newFecha = $fecha;

            $date1 = new DateTime($fecha);
            $date2 = new DateTime($fechaFinal);

            $interval = $date1->diff($date2);

            for ($i = 1; $i <= $interval->d; $i++) {
                $newFecha = date('Y-m-d H:i:s', strtotime($newFecha. ' + 1 day'));

                $newUuid = Uuid::uuid4();

                $data["uuid"] = $newUuid;
                $data["fchinccln"] = $newFecha;

                $result = \Tblentrcp::crtentrcp($data, $trncnn);

                if(!$result){
                    TransactionHandler::rollback($trncnn);
                    return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
                }
            }
        } else if ($data["prdentcln"] == 5) {
            $newUuid = Uuid::uuid4();

            $data["uuid"] = $newUuid;
            $result = \Tblentrcp::crtentrcp($data, $trncnn);

            if(!$result){
                TransactionHandler::rollback($trncnn);
                return ReturnHandler::rtrerrjsn('Ocurrio un error inesperado');
            }
        }


        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Guardado correctamente');
    }

    public function evaluate(Request $request)
    { // 1.- Validacion del request
        $rules = [
            'Uuid' => 'required|uuid|size:36',
            'Tipentrcp' => 'required',
            'Kgsentrcp' => 'required',
            'Cntcjsrcp' => 'required',
            'Rtnentcln' => 'required|min:0|max:5',
        ];

        $msgs = [
            'Uuid' => 'required|uuid|size:36',
            'Tipentrcp.required' => 'Validacion fallada en Tipentrcp.required',
            'Kgsentrcp.required' => 'Validacion fallada en Kgsentrcp.required',
            'Cntcjsrcp.required' => 'Validacion fallada en Cntcjsrcp.required',
            'Rtnentcln.required' => 'Validacion fallada en Rtnentcln.required',
            'Rtnentcln.min' => 'Validacion fallada en Rtnentcln.min',
            'Rtnentcln.max' => 'Validacion fallada en Rtnentcln.max',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        // 2.- Peticion a variables
        $udxentcln = request('Uuid');

        // 3.- Iniciar Transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio
        $entrcp = \Tblentrcp::fnuentrcp($udxentcln, $trncnn);

        if(!$entrcp instanceof \Tblentrcp){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('$entcln false');
        }

        $data = [
            'idnentcln' => $entrcp->getIdnentcln(),
            'idnentemp' => $entrcp->getIdnentemp(),
            'idnentorg' => $entrcp->getIdnentorg(),
            'uuid' => $udxentcln,
            'tipentrcp' => request('Tipentrcp'),
            'kgsentrcp' => request('Kgsentrcp'),
            'cntcjsrcp' => request('Cntcjsrcp'),
            'rtnentcln' => request('Rtnentcln'),
            'vldentcln' => true,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $result = \Tblentrcp::updentcln($data, $trncnn);

        // 6.- Commit & return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return ReturnHandler::rtrerrjsn('Ocurrió un error inesperado');
        }

        TransactionHandler::commit($trncnn);
        return ReturnHandler::rtrsccjsn('Evaluado correctamente');
    }

    public function loadlist(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return null;
        }

        $idnentprs = $tipentprs->getIdnentprs();

        $idnentorg = \Tblentorg::fnoentprs($idnentprs)->getIdnentorg();

        $rutinas = \Tblentrcp::fndentorg($idnentorg);
        $rutinas = $rutinas->toArray();

        if (empty($rutinas)) {
            $rutinas = null;
        }

        return json_encode([
            'success' => true,
            'data' => $rutinas,
        ]);
    }

    public function loadlistemp(Request $request)
    {
        $id = $request->get("Id");

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            return null;
        }

        $idnentprs = $tipentprs->getIdnentprs();

        $idnentemp = \Tblentemp::fnoentprs($idnentprs)->getIdnentemp();

        $rutinas = \Tblentrcp::fndentemp($idnentemp);
        $rutinas = $rutinas->toArray();

        if (empty($rutinas)) {
            $rutinas = null;
        }

        return json_encode([
            'success' => true,
            'data' => $rutinas,
        ]);
    }

}
