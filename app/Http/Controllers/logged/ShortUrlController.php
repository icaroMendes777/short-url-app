<?php

namespace App\Http\Controllers\logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Shortlink;

class ShortUrlController extends Controller
{

    /**
     * página de criar urls de redirecionamento
     */
    public function makeUrl(Request $request)
    {
        $lastLinks = Shortlink::latest()->take(10)->get();

        return Inertia::render('Shortlink', [
            'shortUrl' => $request['short_url'],
            'redirectUrl' => $request['redirect_url'] ?? null,
            'lastLinks' =>$lastLinks
        ]);
    }

    /**
     * recebe a url enviada pela rota url.make
     * cria um código de redirecionamento
     * e retorna para essa mesma página com o código criado
     */
    public function saveUrl(Request $request)
    {
        //cadastra a url no banco de dados
        //a própria model cria um hash único como identificador do redirecionamento
        //o comprimento desse hash pode ser configurado em .env 'SHORT_URL_CODE_LENGTH'
        $shortlink = Shortlink::create(['redirect_url'=> $request['redirect_url'] ]);

        return redirect()->route('url.make',
                    ['short_url'=> $shortlink['short_url'],
                    'redirect_url'=> $shortlink['redirect_url']]);
    }

}
