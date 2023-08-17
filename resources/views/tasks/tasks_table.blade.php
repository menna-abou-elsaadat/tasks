<x-app-layout>
<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Tasks') }}
</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <!-- table -->
                <div class="max-w-2xl mx-auto">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                        <thead class="bg-gray-100 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                    Task Name
                                                </th>
                                                <th scope="col" class="p-4">
                                                    <span class="">Edit</span>
                                                </th>
                                                <th scope="col" class="p-4">
                                                    <span class="">Delete</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            @foreach($tasks as $task)
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$task->name}}</td>
                                                <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                                    <a href="{{route('tasks.edit',['task'=>$task->id])}}" class="bg-blue-700 hover:bg-blue-700 text-blue font-bold py-2 px-4 border border-blue-700 rounded">Edit</a>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-center whitespace-nowrap">
                                                    <a href="{{ route('tasks.destroy', $task->id) }}" class="bg-red-500 hover:bg-blue-700 text-black font-bold py-2 px-4 border border-blue-700 rounded" data-confirm-delete="true">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>