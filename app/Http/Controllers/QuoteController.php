<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // GET USER OBJECT
        $user = $request->user();
        // DUMP USER OBJECT
        var_dump($user);
        // THROW ERROF IF IT DOESNT EXIST
        if (!$user) {
            throw new \Exception("USER NOT AUTHENTICATED", 1);
        }
        // GET ALL PARAMS
        $data = $request->all(); 
        //validation
        if (!$data["quote"]) {
            return "no quote exists - please include 'quote' param in request";
        } else {
            // NOTE QUOTE DATA DOES NOT PERSIST, JUST RETURNS QUOTE.
            return "QUOTE CREATED " . json_encode([11 => $data["quote"]]);
        }
    }
    
}
