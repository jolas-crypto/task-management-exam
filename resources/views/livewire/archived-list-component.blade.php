@section('title')
    Task Management | Archived List   
@endsection


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Archived List</h1>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('task-list') }}"
                            wire:navigate
                            class="button-add">
                            Back to Task List
                        </a>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="border-b border-gray-200 pb-5 sm:flex sm:items-center sm:justify-between">
                        <div>
                            
                        </div>
                        <div>
                            {{-- <form wire:submit="search">
                                <div class="mt-2 flex rounded-md shadow-sm">
                                    <div class="relative flex flex-grow items-stretch focus-within:z-10">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                        </div>
                                        <input 
                                        type="text" 
                                        name="search" 
                                        id="search" 
                                        class="table-search-input" 
                                        placeholder="Search"
                                        wire:model="query">
                                    </div>
                                    <button 
                                    type="submit" 
                                    class="table-search-button">
                                        Search
                                    </button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
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
                                            @if ($taskList->status == 'done')
                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-0">
                                                    <button wire:click="unArchiveDoneTask({{ $taskList->id }})" class="text-gray-500 hover:text-gray-900">UnArchived</button>
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
