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
        //get data
        $data = $request->all();
        //validation
        if (!$data["quote"]) {
            return "no quote exists - please include 'quote' param in request";
        }
        // add to quotes array
        $quotes = array_merge(config("quotes"), [$data["quote"]]);
        // return array
        // NOTE THIS WILL NOT PERSIST IN QUOTES CONFIG FILE
        return $quotes;
    }
    
}
