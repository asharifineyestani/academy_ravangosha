<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConstController
{
    const limitDosntCompletedTask = 5;
    const MESSAGES = [
        'CREATED' => 'رکورد با موفقیت اضافه شد.',
        'UPDATED' => 'رکورد با موفقیت ویرایش شد.',
        'DELETED' => 'رکورد با موفقیت حذف شد.',
    ];
}
