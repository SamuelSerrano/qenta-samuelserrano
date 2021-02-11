<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://www.balldontlie.io/api/v1/players');
        return $response->json('data');
    }

    
    public function details($id)
    {
        $response = Http::get('https://www.balldontlie.io/api/v1/players/'.$id);
        return $response->json();
    }

    
}
