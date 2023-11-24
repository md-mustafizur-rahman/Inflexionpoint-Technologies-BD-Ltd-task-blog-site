<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Own Posts List') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto p-6">
        <form class="mb-4 flex justify-end items-center">
            <label for="search" class="sr-only">Search</label>
            <input type="text" id="search" name="search" class="bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:focus:border-gray-400" placeholder="Search..." />
            <button type="submit" class="ml-2 px-6 py-2 font-medium text-white bg-indigo-500 dark:bg-indigo-700 rounded-md hover:bg-indigo-600 dark:hover:bg-indigo-800 focus:outline-none focus:bg-indigo-600 dark:focus:bg-indigo-800">
                Search
            </button>
        </form>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                SL
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Image
                            </th>

                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider max-w-xs">
                                PostTitle
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                FEATURED
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($posts as $index => $post)
                        <!-- Add your table rows here -->
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap">{{$index+1}}</td>

                            @if($post->image)
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/blog_images/' . $post->image) }}" alt="Sample Image" class="h-12 w-24 object-cover" />
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="https://via.placeholder.com/100x50" alt="Sample Image" class="h-12 w-24 object-cover" />

                                @endif
                            <td class="px-6 py-4 whitespace-nowrap max-w-xs overflow-ellipsis">
                                {{ Illuminate\Support\Str::limit($post->post_title, 40) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                @if($post->category==0)
                                Tech
                                @elseif($post->category=1)
                                Education
                                @elseif($post->category=2)
                                Business
                                @endif

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">

                                @if($post->feature==0)
                                No
                                @elseif($post->feature==1)
                                Yes
                                @endif

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $post->updated_at->format('Y-m-d') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="#" class="text-blue-500 hover:underline">Edit</a>
                                <span class="text-gray-400 mx-2">|</span>
                                <a href="#" class="text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 30px;"> {{ $posts->links() }}</div>
            </div>
        </div>
    </div>

</x-app-layout>