<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OlaMundo extends Model
{
    static public function helloWorld() {
        return 'Hello World!';
    }
}
