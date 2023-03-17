<?php

namespace App\Http\Controllers;

use App\Models\PeopleData;
use Illuminate\Http\Request;

class PeopleDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $table = new PeopleData();
        $table->name = $request->name;
        $table->name = $request->last_name;
        $table->document = $request->document;
        $table->document_city = $request->document_city;
        $table->document_type_id = $request->document_type_id;
        $table->regime_id = $request->regime_id;
        $table->city = $request->city;
        $table->legal_representation_id = $request->legal_representation_id;
        $table->comments = $request->comments;
        $table->born_date = $request->born_date;
        $table->active = $request->active;
        $table->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PeopleData $peopleData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeopleData $peopleData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeopleData $peopleData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeopleData $peopleData)
    {
        //
    }
}
