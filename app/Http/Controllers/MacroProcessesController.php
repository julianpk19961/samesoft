<?php

namespace App\Http\Controllers;

use App\Models\macro_processes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MacroProcessesController extends Controller
{
    //
    public function index()
    {
        //
        $macroProcesses = macro_processes::all();
        return  view('macroprocesses.show', ['macroProcesses' => $macroProcesses]);
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
        dd($request);
        
        Validator::make($request, [
            'name' => ['required', 'unique:macro_processes'],
        ])->validate();

        $macroProcess = new macro_processes();
        $macroProcess->name = $request->name;
        $macroProcess->description = $request->description;
        $macroProcess->macroprocess_id = $request->macroprocess_id;
        $macroProcess->save();
    }

    public function show(macro_processes $macro_processes)
    {
        //
    }

    public function edit(macro_processes $macro_processes)
    {
        //
    }

    public function update(Request $request, macro_processes $macro_processes)
    {
        //
    }

    public function destroy(macro_processes $macro_processes)
    {
        //
    }
}
