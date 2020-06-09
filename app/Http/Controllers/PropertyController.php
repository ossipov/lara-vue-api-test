<?php

namespace App\Http\Controllers;

use EloquentBuilder;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allowed_fields = [
            'name',
            'bedrooms', 
            'bathrooms',
            'storeys',
            'garages',
            'price'
        ];

        $query = Property::select($allowed_fields);
        $response = EloquentBuilder::to($query, $request->filter)->paginate(10);

        // Emulating slow loading
        sleep(1);

        $params = $request->only(['filter']);
        return $response->appends($params);
    }
}