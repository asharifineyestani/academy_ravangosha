<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BalanceController extends UserController
{

    public function config()
    {
        $this->crud->setModel(\App\Models\User::class);
        $this->crud->setEntity('balance');
    }


    public function setupCreate()
    {

        $this->crud->setField([
            'name' => "show",
            'type' => 'show',
            'attribute' => 'balance',
            'label' => 'موجودی فعلی',
        ]);


        $this->crud->setField([
            'name' => "amount",
            'type' => 'text',
            'validation' => 'integer'
        ]);

    }


    public function setupEdit()
    {
        $this->setupCreate();
    }

    public function update(Request $request, $id)
    {


        $this->crud->setRow($id);
        $this->setupEdit();


        $this->validate($request, array_merge($this->crud->getValidations()));

        $input = $this->crud->getFormInputs($request);


        $this->crud->row->update($input);

        $amount = (int)$input['amount'];


        if ($amount > 0)
            $this->crud->row->deposit($input['amount'], ["افزایش دستی کیف پول توسط ادمین"]);
        elseif ($amount < 0)
            $this->crud->row->withDraw($input['amount'] * -1, ["برداشت دستی کیف پول توسط ادمین"]);

        return redirect()->back()->with('success', trans('message.updated'));
    }

}
