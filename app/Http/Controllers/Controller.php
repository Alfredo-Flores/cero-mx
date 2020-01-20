<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Manager;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var JWTAuth
     */
    protected $jwt;

    /**
     * @var Manager
     */
    protected $manager;

    /**
     * Controller constructor.
     *
     * @param JWTAuth $jwt
     * @param Manager $manager
     */
    public function __construct(JWTAuth $jwt, Manager $manager)
    {
        $this->jwt = $jwt;
        $this->manager = $manager;
    }
}
