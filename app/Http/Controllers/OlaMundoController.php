<?php

namespace App\Http\Controllers;

use App\Models\OlaMundo;
use Illuminate\Http\Request;

class OlaMundoController extends Controller
{
    function helloWorld() {
        $helloWorld = OlaMundo::helloWorld();
        return response()->json(['message' => $helloWorld], 200);
    }
}
