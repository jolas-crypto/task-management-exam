<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskSaveForm extends Form
{
    #[Validate('required')]
    public string $title = '';

    #[Validate('required')]
    public string $description = '';

    public $status = '';

    public $priority = '';

    public $due_date = '';

    public $pre_requisite = '';

    public $archived = '';

    #[Validate('nullable|file|mimes:pdf,docx|max:2048')]
    public $file_path;

    public function store()
    {
        $this->validate();

        // Handle file upload if the file is provided
        $pathFile = null;
        if ($this->file_path) {
            $filePath = now()->format('Y/m/d');
            $filePath = 'fileUpload/' . $filePath;

            $pathFile = $this->file_path->store($filePath);
        }

        Task::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'file_path' => $pathFile,
        ]);
    }
}
