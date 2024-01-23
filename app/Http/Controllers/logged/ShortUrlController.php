<?php

namespace App\Http\Controllers\logged;

use App\Http\Controllers\Controller;
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
