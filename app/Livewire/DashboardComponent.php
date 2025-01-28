<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $taskTotal;
    public $taskAssignedTotal;
    public $taskCompletedTotal;

    public function mount()
    {
        $this->taskTotal = Task::where('user_id', Auth::id())->count();

        $this->taskAssignedTotal = Task::where('assigned_to', Auth::id())->count();

        $this->taskCompletedTotal = Task::where('user_id', Auth::id())
            ->where('status', 'done')
            ->count();
    }

    public function render()
    {
        return view('livewire.dashboard-component')
        ->layout('layouts.app');
    }
}
