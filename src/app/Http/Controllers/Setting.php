<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Setting extends Controller
{
    public function setPerPageOption()
    {
        session(['per_page' => request('per_page')]);
    }
}
