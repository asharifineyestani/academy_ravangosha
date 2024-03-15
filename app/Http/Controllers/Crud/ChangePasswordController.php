<?php

namespace App\Http\Controllers\Crud;

use Afracode\CRUD\App\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ChangePasswordController extends CrudController
{

    public function config()
    {
        $this->crud->setModel(User::class);
        $this->crud->setEntity('change-password');
        $this->crud->query = $this->crud->query;
    }

    public function index()
    {
        return $this->create();
    }

    public function setupCreate()
    {


        $this->crud->setField(
            [
                'name' => 'old_password',
                'validation' => 'required',
                'type' => 'password'
            ]
        );

        $this->crud->setField(
            [
                'name' => 'new_password',
                'validation' => 'required',
                'type' => 'password'
            ]
        );


        $this->crud->setField(
            [
                'name' => 'password_confirmation',
                'validation' => 'required|same:new_password',
                'type' => 'password'
            ]
        );


    }


    public function store(Request $request)
    {
        $rules = [
            'old_password' => ['required', 'min:4', function ($attribute, $value, $fail) {
                if (!\Hash::check($value, \Auth::user()->password)) {
                    return $fail(__('پسورد فعلی اشتباه است'));
                }
            }],
            'new_password' => 'required|min:4|same:password_confirmation|different:old_password',
            'password_confirmation' => 'required|min:4',
        ];


        $validator = \Validator::make($request->only(['old_password', 'new_password', 'password_confirmation']), $rules);

        if ($validator->fails()) {
            return \Redirect::back()->withErrors($validator);
        }


        $fields['password'] = bcrypt($request->get('new_password'));

        \Auth::user()->update($fields);

        return back()->with('success', trans('message.updated'));
    }
}
