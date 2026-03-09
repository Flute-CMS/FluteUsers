<?php

namespace Flute\Modules\FluteUsers\Controllers;

use Flute\Core\Support\BaseController;
use Flute\Core\Router\Annotations\Route;

class FluteUsersController extends BaseController
{
    #[Route("/users", name: "users.index", methods: ["GET"])]
    public function index()
    {
        return view('fluteusers::index');
    }
}