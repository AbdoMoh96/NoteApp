<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Notes\DestroyNotes;
use App\Http\Requests\Notes\StoreNotes;
use App\Http\Requests\Notes\UpdateNotes;
use App\Interfaces\NoteRepository;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct(private readonly NoteRepository $noteRepository){}


    public function index(Request $request){
        $notes = $this->noteRepository->getAllUserNotes($request);
        return response()->json($notes, 200);
    }


    public function store(StoreNotes $request){
        $note = $this->noteRepository->storeNote($request->all());
        return response()->json([
            "message" => "note {$note->title} created successfully!!",
        ], 200);
    }


    public function update(UpdateNotes $request){
        $note = $this->noteRepository->updateNote($request->all());
        return response()->json([
            "message" => "note updated successfully!!",
        ], 200);
    }


    public function destroy(DestroyNotes $request){
        $note = $this->noteRepository->deleteNoteUsingId($request->input('id'));
        return response()->json([
            "message" => "note {$note->title} deleted successfully!!",
        ], 200);
    }

}
