<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>




    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <form class="mb-4 flex justify-end items-center">
        <label for="search" class="sr-only">Search</label>
        <input
            type="text"
            id="search"
            name="search"
            class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:focus:border-gray-400"
            placeholder="Search..."
        />
        <button type="submit" class="ml-2 px-6 py-2 font-medium text-white bg-indigo-500 dark:bg-indigo-700 rounded-md hover:bg-indigo-600 dark:hover:bg-indigo-800 focus:outline-none focus:bg-indigo-600 dark:focus:bg-indigo-800">
            Search
        </button>
    </form>



        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                SL
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                AuthorID
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-700 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">1</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex-shrink-0">
                                    <img src="https://i.pinimg.com/236x/d9/f0/c9/d9f0c959c093dc1bf714f39570418f48.jpg" alt="Image Alt Text" class="h-12 w-12 rounded-full">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap">Admin</td>
                            <td class="px-6 py-4 whitespace-nowrap">12345</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <!-- <a href="#" class="text-red-600 hover:text-red-900 ml-2">Delete</a> -->
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        <!-- Another example row with a line -->
                        <tr>
                            <td class="border-t border-gray-200" colspan="6"></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex-shrink-0">
                                    <img src="https://i.pinimg.com/236x/d9/f0/c9/d9f0c959c093dc1bf714f39570418f48.jpg" alt="Image Alt Text 2" class="h-12 w-12 rounded-full">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">Jane Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap">User</td>
                            <td class="px-6 py-4 whitespace-nowrap">67890</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <!-- <a href="#" class="text-red-600 hover:text-red-900 ml-2">Delete</a> -->
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



    
</x-app-layout>