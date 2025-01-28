<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class TaskAssignmentComponent extends Component
{
    use WithPagination;

    public $statusFilter = 'assigned';
    public $selectedUserId = [];
    public $assignedTo;

    public function filterByAssigned($assigned)
    {
        $this->statusFilter = $assigned;
    }

    public $tableHeaders = [
        'Title',
        'Description',
        'Status',
        'Priority',
        'Assigned To'
    ];
    
    public function render()
    {
        $query = Task::unArchived();

        // Apply status filter
        if ($this->statusFilter == 'assigned') {
            $query->where('user_id', operator: Auth::id());
        } else {
            $query->where('assigned_to_created_by', Auth::id());
        }

        $users = User::where('status', 1)
        ->where('id', '!=', Auth::id())
        ->get();

        return view('livewire.task-assignment-component', [
            'assignedList' => $query->paginate(5),
            'activeUsers' => $users,
            'assignedTo' => $this->assignedTo
        ])
        ->layout('layouts.app');
    }

    public function assignedTask($taskId)
    {
        $task = Task::where('id', $taskId)->first();
        $task->update([
            'assigned_to' => $this->selectedUserId[$taskId],
            'assigned_to_created_by' => Auth::id()
        ]);

        session()->flash('message', 'Task assigned successfully.');

        $this->resetPage(); 
    }
}
