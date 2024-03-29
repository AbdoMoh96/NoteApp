<?php

namespace App\Interfaces;

interface NoteRepository
{
    public function getAllUserNotes();

    public function filterNoteByTitle($title);

    public function storeNote($data);

    public function updateNote($data);

    public function deleteNoteUsingId($id);
}
