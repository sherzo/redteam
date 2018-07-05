<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class ConfigController extends Controller
{
    public function get($type)
    {
    	$config = Config::where('type', $type)->first();

    	return $config->value;
    }

    public function set(Request $request)
    {
    	$config = Config::where('type', $request->type)->first();

    	$config->value = $request->value;

    	$config->save();

    	return $config->value;
    }
}
