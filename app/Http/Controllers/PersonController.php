<?php

namespace App\Http\Controllers;

use App\Models\Person;

class PersonController extends Controller
{
    /**
     * Retornando todas as pessoas.
     *
     * @return string JSON
     */
    public function index()
    {
        return response()->json(
            Person::all()
        );
    }
  
    /**
     * Retornando uma pessoa em especifíco.
     *
     * @return string JSON
     */
    public function show(Person $id)
    {
        return response()->json(
            $id
        );
    }
}
