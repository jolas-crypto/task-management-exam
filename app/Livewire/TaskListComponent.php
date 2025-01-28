<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TaskListComponent extends Component
{
    use WithPagination;

    public $tableHeaders = [
        'Title',
        'Description',
        'Status',
        'Priority'
    ];

    public $statusFilter = 'all';

    public function filterByStatus($status)
    {
        $this->statusFilter = $status;
        $this->resetPage(); // Reset pagination to the first page after filtering
    }

    public function archiveDoneTask($taskId)
    {
        $task = Task::where('id', $taskId)->first();
        $task->update(['archived' => true]);

        $this->resetPage();
    }

    public function render()
    {
        $query = Task::unArchived()->where('user_id', Auth::id());

        // Apply status filter
        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        return view('livewire.task-list-component', [
            'taskLists' => $query->paginate(5),
        ])
        ->layout('layouts.app');
    }
}
