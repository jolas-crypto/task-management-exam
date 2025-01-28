<?php

namespace App\Livewire;

use App\Livewire\Forms\TaskSaveForm;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TaskComponent extends Component
{
    use WithFileUploads;

    public TaskSaveForm $taskSaveForm;

    public $taskId;

    public $taskListData;

    public $status = [
        '' => '--Select an Option--',
        'todo' => 'Todo',
        'in-progress' => 'In-Progress',
        'done' => 'Done'
    ];

    public $priority = [
        '' => '--Select an Option--',
        'high' => 'High',
        'medium' => 'Medium',
        'low' => 'Low'
    ];

    public function mount($id = null)
    {
        $this->taskListData = Task::where('id', $id)->first();

        $this->taskId = $id;

        if ($this->taskListData) {
            $this->taskSaveForm->title = $this->taskListData->title;
            $this->taskSaveForm->description = $this->taskListData->description;
            $this->taskSaveForm->status = $this->taskListData->status;
            $this->taskSaveForm->priority = $this->taskListData->priority;
            $this->taskSaveForm->due_date = $this->taskListData->due_date;
        }
    }

    public function save()
    {
        if ($this->taskId) {
            $itemTask = Task::where('id', $this->taskId)->first();

            $this->validate();

            $itemTask->update([
                'title' => $this->taskSaveForm->title,
                'description' => $this->taskSaveForm->description,
                'status' => $this->taskSaveForm->status,
                'priority' => $this->taskSaveForm->priority,
                'due_date' => $this->taskSaveForm->due_date,
            ]);
        } else {
            $this->taskSaveForm->store();
        }

        session()->flash('status', 'Successfully Saved.');

        return redirect()->to('/task-list');
    }

    public function render()
    {
        return view('livewire.task-component')
        ->layout('layouts.app');
    }
}
