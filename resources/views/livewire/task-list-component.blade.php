@section('title')
    Task Management | Task List   
@endsection


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <button wire:click="filterByStatus('all')" class="button-all">All</button>
                        <button wire:click="filterByStatus('todo')" class="button-todo">Todo</button>
                        <button wire:click="filterByStatus('in-progress')" class="button-inprogress">In Progress</button>
                        <button wire:click="filterByStatus('done')" class="button-done">Done</button>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('task-create') }}"
                            wire:navigate
                            class="button-add">
                            Add Task
                        </a>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        @foreach ($tableHeaders as $tableHeader)
                                            <th scope="col" class="table-th">{{ $tableHeader }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($taskLists as $taskList)
                                        <tr wire:key="{{ $taskList->id }}">
                                            <td class="table-tbody">{{ $taskList->title }}</td>
                                            <td class="table-tbody">{{ $taskList->description }}</td>
                                            <td class="table-tbody">{{ $taskList->status }}</td>
                                            <td class="table-tbody">{{ $taskList->priority }}</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-0">
                                                <a href="{{ route('task-edit', $taskList->id) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                            @if ($taskList->status == 'done')
                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-0">
                                                    <button wire:click="archiveDoneTask({{ $taskList->id }})" class="text-gray-500 hover:text-gray-900">Archived</button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-pagination">
                        {{ $taskLists->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
