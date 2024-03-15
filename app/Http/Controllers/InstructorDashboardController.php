<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Student\DashboardController;
use Auth;

class InstructorDashboardController extends DashboardController
{

    public function courses()
    {
        return view('dashboard.instructor.courses');
    }

}
