<?php

namespace App\Observers;

use App\Models\documents;
use App\Models\logEntry;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;


class documentObserver
{

    /**
     * Handle the documents "retrieved" event.
     */
    public function retrieved(documents $documents): void
    {
        //
    }

    /**
     * Handle the documents "creating" event.
     */
    public function creating(documents $documents): void
    {

        $documents->user_id = auth()->user()->id;
        $ipAdrress = Request::ip();
        $logEngry = new logEntry();
        $logEngry->user_id = auth()->user()->id;
        $logEngry->model = $documents->documentable_type;
        $logEngry->record_id = $documents->documentable_id;
        $logEngry->action = "NEW RECORD";
        $logEngry->UsrDescription = $documents->description ? $documents->description  : '';
        $logEngry->sysDescription = 'Se crea nuevo documento bajo el nombre de: ' . $documents->fileName . ' en la ruta: ' . $documents->content;
        $logEngry->changes = $documents->toJson();
        $logEngry->ip_address = $ipAdrress;
        $logEngry->attachment = $documents->content ? $documents->content : $documents->document_url;
        $logEngry->save();
    }

    /**
     * 
     * Handle the documents "created" event.
     */
    public function created(documents $documents): void
    {
        //
    }
    /**
     * Handle the documents "updating" event.
     */

    public function updating(documents $documents): void
    {
        //
    }

    /**
     * Handle the documents "updated" event.
     */
    public function updated(documents $documents): void
    {
        //
    }

    /**
     * Handle the documents "deleting" event.
     */
    public function deleting(documents $documents): void
    {

        $ipAdrress = Request::ip();

        if ($documents->content) {
            $origenPath = $documents->content;
            $trashedPath = 'public/trashed/' . basename($origenPath);
            Storage::move($origenPath, $trashedPath);
        }


        $logEngry = new logEntry();
        $logEngry->user_id = auth()->user()->id;
        $logEngry->model = $documents->documentable_type;
        $logEngry->record_id = $documents->documentable_id;
        $logEngry->action = "DELETE RECORD";
        $logEngry->UsrDescription = $documents->description ? $documents->description  : '';
        $logEngry->sysDescription = 'Se Eliminará el documento : ' . $documents->fileName . 'su adjunto quedará reubicado en la ruta: ' . $documents->content;
        $logEngry->changes = $documents->toJson();
        $logEngry->ip_address = $ipAdrress;
        $logEngry->attachment = $documents->content ? $trashedPath : $documents->document_url;
        $logEngry->save();
    }

    /**
     * Handle the documents "deleted" event.
     */
    public function deleted(documents $documents): void
    {
        //
    }

    /**
     * Handle the documents "restoring" event.
     */
    public function restoring(documents $documents): void
    {
        //
    }

    /**
     * Handle the documents "restored" event.
     */
    public function restored(documents $documents): void
    {
        //
    }

    /**
     * Handle the documents "force deleted" event.
     */
    public function forceDeleted(documents $documents): void
    {
        //
    }
}
