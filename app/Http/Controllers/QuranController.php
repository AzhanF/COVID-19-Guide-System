<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function index(){
        $response = Http::get('https://raw.githubusercontent.com/penggguna/QuranJSON/master/quran.json');
        return view('quran.list', [
            'response'=> json_decode($response)
        ]);
    }

    public function indexID($id){
        $response = HTTP::get('https://raw.githubusercontent.com/penggguna/QuranJSON/master/surah/'.$id.'.json');
        return view('quran.view', [
            'response'=> json_decode($response)
        ]);
    }
}
