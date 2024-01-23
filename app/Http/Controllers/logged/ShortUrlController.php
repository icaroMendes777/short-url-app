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
        $shortUrl=null;

        //se um shortlink foi requisitado ele será gerado para display
        if( isset($request['url_code']) && $request['url_code'])
                        $shortUrl = $this->generateShortLink($request['url_code']);

        return Inertia::render('Shortlink', [
            'title'=>'title',
            'saveUrl'=> route('url.save'),
            'shortUrl' => $shortUrl,
            'redirectUrl' => $request['redirect_url'] ?? null
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
                    ['url_code'=> $shortlink['url_code'],
                    'redirect_url'=> $shortlink['redirect_url']]);
    }

    /**
     * utiliza o código único do link e a rota de redirecionamento para montar o shortlink
     */
    private function generateShortLink($urlCode)
    {
        return route('redirect',['urlCode'=>$urlCode]);
    }
}
