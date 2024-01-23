<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Config;

class Shortlink extends Model
{
    protected $fillable = [
        'redirect_url', //a url submetida para ser encurtada
        'url_code', //o código para gerar a url de redirecionamento
    ];

    protected static function boot()
    {
        parent::boot();


        static::creating(function ($model) {

            //cria um hash único para ser usado como url_code
            do {
                $randomString = Str::random( env('SHORT_URL_CODE_LENGTH'));
            } while (Shortlink::where('url_code', $randomString)->exists());

            $model->url_code = $randomString;
        });
    }
}
