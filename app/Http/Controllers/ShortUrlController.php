<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShortUrlController extends Controller
{

    public function test()
    {

        return Inertia::render('Test', [
            'title' => 'title',
        ]);
    }
}
