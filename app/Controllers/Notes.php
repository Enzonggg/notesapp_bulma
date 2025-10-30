<?php

namespace App\Controllers;

use App\Models\NoteModel;
use CodeIgniter\HTTP\RedirectResponse;

class Notes extends BaseController
{
    public function index(): string
    {
        $model = new NoteModel();
        $notes = $model->orderBy('created_at', 'DESC')->findAll();
        return view('notes/index', ['notes' => $notes]);
    }

    public function create(): string
    {
        return view('notes/create');
    }

    public function store(): RedirectResponse
    {
        $model = new NoteModel();

        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        if (! $model->save($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to(site_url('notes'))->with('message', 'Note created successfully.');
    }

    public function edit(int $id): string
    {
        $model = new NoteModel();
        $note  = $model->find($id);
        if (! $note) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Note not found');
        }
        return view('notes/edit', ['note' => $note]);
    }

    public function update(int $id): RedirectResponse
    {
        $model = new NoteModel();
        $data  = [
            'id'      => $id,
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        if (! $model->save($data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to(site_url('notes'))->with('message', 'Note updated successfully.');
    }

    public function delete(int $id): RedirectResponse
    {
        $model = new NoteModel();
        $model->delete($id);
        return redirect()->to(site_url('notes'))->with('message', 'Note deleted.');
    }
}
