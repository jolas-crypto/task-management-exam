@section('title')
    Task Management | Task Assignments 
@endsection


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (session()->has('message'))
                    <div className="rounded-md bg-green-50 p-4">
                        <div className="flex">
                            <div className="ml-3">
                                <div className="mt-2 text-sm text-green-700">
                                    <p>{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <button wire:click="filterByAssigned('assigned')" class="button-assigned">Assigned</button>
                        <button wire:click="filterByAssigned('assigned_to')" class="button-inprogress">Assigned To</button>
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
                                    @foreach ($assignedList as $assignList)
                                        <tr wire:key="{{ $assignList->id }}">
                                            <td class="table-tbody">{{ $assignList->title }}</td>
                                            <td class="table-tbody">{{ $assignList->description }}</td>
                                            <td class="table-tbody">{{ $assignList->status }}</td>
                                            <td class="table-tbody">{{ $assignList->priority }}</td>
                                            @if ($statusFilter == 'assigned')
                                                <td>
                                                    <select 
                                                    name="assigned_{{ $assignList->id }}"
                                                    id="user_{{ $assignList->id }}"
                                                    class="select-input"
                                                    wire:model="selectedUserId.{{ $assignList->id }}"
                                                    >
                                                        <option value="">--Select an Option--</option>
                                                        @foreach ($activeUsers as $activeUser)
                                                            <option value="{{ $activeUser->id }}">{{ $activeUser->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button wire:click="assignedTask({{ $assignList->id }})" class="button-update">Update</button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="table-pagination">
                        {{ $assignedList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
