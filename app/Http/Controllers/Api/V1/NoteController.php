<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Interfaces\NoteRepository;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct(private readonly NoteRepository $noteRepository){}


    public function index(){
        $notes = $this->noteRepository->getAllUserNotes();
        return response()->json($notes, 200);
    }
}
