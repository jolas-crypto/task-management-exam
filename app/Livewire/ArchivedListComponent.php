<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ArchivedListComponent extends Component
{
    use WithPagination;
    
    public $tableHeaders = [
        'Title',
        'Description',
        'Status',
        'Priority'
    ];

    public function unArchiveDoneTask($taskId)
    {
        $task = Task::where('id', $taskId)->first();
        $task->update(['archived' => false]);

        $this->resetPage();
    }

    public function render()
    {
        $archivedTaskList = Task::archived()->where('user_id', Auth::id())->paginate(5);

        return view('livewire.archived-list-component', [
            'taskLists' => $archivedTaskList
        ])
        ->layout('layouts.app');
    }
}
