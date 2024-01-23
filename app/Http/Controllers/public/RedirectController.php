<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shortlink;
use Illuminate\Support\Facades\Redirect;


class RedirectController extends Controller
{
    public function redirect(Request $request)
    {
        $redirect = Shortlink::where('short_url', $request->url())->get()->first();

        return Redirect::to($redirect['redirect_url']);
    }
}
