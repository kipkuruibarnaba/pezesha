<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MarvelController extends Controller
{
    public function  displaycharacters(){
        $endpoint = "https://gateway.marvel.com:443/v1/public/characters";
        $ts = Carbon::now()->timestamp;
        $apikey= 'b8c7132408cfca5f87609624ce8acdf5';
        $privatekey= '346adcc62ca66d04503a291fb02d9d15c7ca8788';
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
//        dd($datas);
        return view('admin.marvel.list',compact('datas'));
    }
}
