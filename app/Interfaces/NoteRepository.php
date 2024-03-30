<?php

namespace App\Interfaces;

interface NoteRepository
{
    public function getAllUserNotes($request);

    public function storeNote($data);

    public function updateNote($data);

    public function deleteNoteUsingId($id);
}
