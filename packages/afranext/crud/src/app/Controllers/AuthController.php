<?php

namespace Afranext\Crud\app\Controllers;

use App\Http\Controllers\Controller;
use function view;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view(crudView('auth.login'));
    }
}
