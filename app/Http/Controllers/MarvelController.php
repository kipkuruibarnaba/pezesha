<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MarvelController extends Controller
{
    public function  displaycharacters(){
        $datas = '';
        $endpoint= env('MARVEL_ENDPOINT');
        $ts = Carbon::now()->timestamp;
        $apikey= env('API_KEY');
        $privatekey= env('PRIVATE_KEY');
        $hash = md5($ts.$privatekey.$apikey);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $endpoint, ['query' => [
            'ts' => $ts,
            'apikey' => $apikey,
            'hash' => $hash
        ]]);
        $statusCode = $response->getStatusCode();
        $contents = ($response->getBody()->getContents());
        $contents = json_decode($contents);
        $datas =$contents->data->results;
        if($contents->code == 200){
            return view('admin.marvel.list',compact('datas')); 
        }
        else {
            return view('admin.marvel.list',compact('datas'));
        }
   
    }
}
