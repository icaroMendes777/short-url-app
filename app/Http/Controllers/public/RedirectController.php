<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RedirectController extends Controller
{
    public function redirect($urlCode)
    {
        echo $urlCode;
    }
}
