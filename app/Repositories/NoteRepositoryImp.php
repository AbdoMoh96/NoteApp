<?php

namespace App\Repositories;
use App\Models\Note;
use App\Interfaces\NoteRepository;
use Illuminate\Support\Facades\Auth;

class NoteRepositoryImp implements NoteRepository
{

    public function getAllUserNotes()
    {
        return Auth::user()->notes()->get();
    }

    public function filterNoteByTitle($title)
    {
        return Note::where('title', 'like', "%{$title}%")->get();
    }

    public function storeNote($data)
    {
        return Note::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => Auth::user()->id
         ]);
    }

    public function updateNote($data)
    {
        $note = Note::where('id', $data['id'])->first();
        return $note->update([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
    }

    public function deleteNoteUsingId($id)
    {
        $note = Note::where('id', $id)->first();
        $note->delete();
        return $note;
    }
}
