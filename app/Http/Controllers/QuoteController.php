<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class QuoteController extends Controller
{
    public function index()
    {
        return config("quotes");
    }
    
    public function show($id)
    {
        return config("quotes.$id");
    }
    
    public function store(Request $request)
    {
        
        $data = $request->all();
    
        $user = JWTAuth::parseToken($request->bearerToken())->authenticate();
        var_dump($user);
        die();
        
        //validation
        if (!$data["quote"]) {
            return "no quote exists - please include 'quote' param in request";
        } else {
            // NOTE QUOTE DATA DOES NOT PERSIST, JUST RETURNS QUOTE.
            return "QUOTE CREATED " . json_encode([11 => $data["quote"]]);
        }
    }
    
}
