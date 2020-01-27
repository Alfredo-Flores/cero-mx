<?php

namespace App\Http\Controllers;

use App\ReturnHandler;
use App\TransactionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ];

        $msgs = [
            'email.required' => 'Ingrese el correo electronico',
            'email.email' => 'Ingrese el correo electronico correctamente',
            'password.required' => 'Ingrese la contraseña',
            'password.min' => 'Ingrese la contraseña con un minimo de 6 caracteres',
        ];

        $validator = Validator::make($request->toArray(), $rules, $msgs)->errors()->all();

        if(!empty($validator)){
            return ReturnHandler::rtrerrjsn($validator[0]);
        }

        $email = trim($request->get('email'));

        $entusr = \Users::fneusers($email);

        if($entusr){
            return response([
                'status' => 'error',
                'message' => 'Este correo ya fue registrado'
            ], 400);
        }

        $data = [
            'uuid' => trim(Uuid::uuid3(Uuid::NAMESPACE_DNS, $request->get('email'))),
            'email' => $email,
            'password' => bcrypt(trim($request->get('password'))),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];


        // 3.- Iniciar transaccion
        $trncnn = TransactionHandler::begin();

        // 4 & 5 .- Variables a objeto & Regla de negocio TODO *Modificar*
        $result = \Users::crtusers($data, $trncnn);

        // 6.- Commit y return
        if(!$result){
            TransactionHandler::rollback($trncnn);
            return response([
                'status' => 'error',
                'message' => 'Ocurrio un error inesperado'
            ], 400);
        }

        if(!$entusr){
            TransactionHandler::commit($trncnn);

            // Login
            $credentials = $request->only('email', 'password');

            if ( ! $token = $this->guard()->attempt($credentials) && !$entusr) {
                return response([
                    'status' => 'error',
                    'message' => 'Ocurrio un error inesperado'
                ], 400);
            }

            return ReturnHandler::rtrsccjsn('Se ha registrado correctamente');

        } else {
            TransactionHandler::rollback($trncnn);
            return response([
                'status' => 'error',
                'message' => 'Ocurrio un error inesperado'
            ], 400);
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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ( ! $token = $this->guard()->attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 400);
        }

        return response([
            'status' => 'success',
            'data' => $this->userdata()
        ])
            ->header('Authorization', $token)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With')
                ->header('Access-Control-Expose-Headers', 'Authorization')
                ->header('Content-Type', 'application/json; charset=utf-8');
    }

    public function userdata()
    {
        try {
            $id = Auth::user()->id;
        } catch (\Exception $e) {
            return null;
        }

        $user = \Users::fnousers($id);

        if (!$user) {
            return null;
        }

        $user = $user->toArray();

        $tipentprs = \Tblentprs::fnoentusr($id);

        if (!$tipentprs) {
            $user["role"] = array("usuario");

            $user = json_encode($user);

            return $user;

            return $user;
        }

        $tipentprs = $tipentprs->getTipentprs();

        if ($tipentprs == 1) {
            $user["role"] = array("empresa");

            $user = json_encode($user);

            return $user;
        } elseif ($tipentprs == 2) {
            $user["role"] = array("organizacion");

            $user = json_encode($user);


            return $user;
        } else {
            $user["role"] = array("usuario");

            $user = json_encode($user);

            return $user;
        }
    }

    public function user(Request $request)
    {
        return response()->json($this->guard()->user());
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
