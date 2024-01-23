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
        'short_url', //url encurtada
    ];

    protected static function boot()
    {
        parent::boot();


        static::creating(function ($model) {
            //cria um hash para ser utilizado na url
            //checa antes se não teve nenhuma url criada com esse hash
            do {
                $randomString = Str::random( env('SHORT_URL_CODE_LENGTH'));
                $shortUrl = route('redirect',['urlCode'=>$randomString]);

            } while (Shortlink::where('short_url', $shortUrl)->exists());

            $model->short_url = $shortUrl;
        });
    }
}
