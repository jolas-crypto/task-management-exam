<?php

use App\Livewire\ArchivedListComponent;
use App\Livewire\DashboardComponent;
use App\Livewire\TaskAssignment;
use App\Livewire\TaskAssignmentComponent;
use App\Livewire\TaskComponent;
use App\Livewire\TaskListComponent;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', DashboardComponent::class)->middleware('auth')->name('dashboard');
Route::get('task-list', TaskListComponent::class)->middleware('auth')->name('task-list');
Route::get('task', TaskComponent::class)->middleware('auth')->name('task-create');
Route::get('task-edit/{id}', TaskComponent::class)->middleware('auth')->name('task-edit');
Route::get('archived', ArchivedListComponent::class)->middleware('auth')->name('archived-list');
Route::get('task-assigned-list', TaskAssignmentComponent::class)->middleware('auth')->name('task-assigned-list');


require __DIR__.'/auth.php';
