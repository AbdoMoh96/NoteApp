<?php

namespace App\Interfaces;

interface NoteRepository
{
    public function getAllNotes();

    public function filterNoteByName($name);

    public function storeNote($data);

    public function updateNote($data);

    public function deleteNoteUsingId($id);
}
