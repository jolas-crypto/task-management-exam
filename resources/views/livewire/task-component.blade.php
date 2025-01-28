@section('title')
    Task Management | Task    
@endsection

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("Create Task List") }}
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('task-list') }}"
                            wire:navigate
                            class="button-add">
                            Back to Task List
                        </a>
                    </div>
                </div>
                <div class="flow-root">
                    <form wire:submit.prevent="save">
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <x-input-text-task
                                        wire:model="taskSaveForm.title"
                                        type="text"
                                        label="Title"
                                        :required="false"
                                        placeholder="Title"
                                        class=""        
                                        />
                                    </div>
                                    <div class="sm:col-span-3">
                                        <x-select
                                        wire:model="taskSaveForm.status"
                                        label="Status"
                                        :items="$status"
                                        placeholder="Status"        
                                        />
                                    </div>
                                    <div class="sm:col-span-3">
                                        <x-select
                                        wire:model="taskSaveForm.priority"
                                        label="Priority"
                                        :items="$priority"
                                        placeholder="Priority"        
                                        />
                                    </div>
                                    <div class="sm:col-span-3">
                                        <x-input-date
                                        wire:model="taskSaveForm.due_date"
                                        type="date"
                                        label="Due Date"
                                        placeholder="Due Date"
                                        class=""
                                        />
                                    </div>
                                    <div class="col-span-full">
                                        <x-textarea
                                        wire:model="taskSaveForm.description"
                                        label="Description"
                                        name="description"
                                        placeholder="Description"       
                                        />
                                    </div>
                                    <div class="col-span-full">
                                        @if ($taskSaveForm->file_path) 
                                            <img src="{{ $taskSaveForm->file_path->temporaryUrl() }}">
                                        @else
                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600 justify-center">
                                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input 
                                                id="file-upload" 
                                                name="file-upload" 
                                                type="file" 
                                                class="sr-only"
                                                wire:model="taskSaveForm.file_path"
                                                >
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-2">
                            <a href="{{ route('task-list') }}" wire:navigate class="button-cancel">Cancel</a>
                            <button type="submit" class="button-save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
