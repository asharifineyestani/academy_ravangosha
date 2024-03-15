<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolicitationRequest;
use App\Models\Solicitation;
use Illuminate\Http\Request;

class SolicitationController extends Controller
{
    //
    public function store(SolicitationRequest $request)
    {
        $fields = $request->all();


        Solicitation::create($fields);

        return back()->withMessage(__('message.success'));
    }


}
