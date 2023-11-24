<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="post_title" class="block text-gray-700 dark:text-gray-300">Post Title:</label>
                            <input placeholder="Post title" type="text" name="post_title" id="post_title" class="form-input mt-1 block w-full" required />
                        </div>

                        <div class="mb-4">
                            <label for="post_description" class="block text-gray-700 dark:text-gray-300">Post Description:</label>
                            <textarea name="name" id="post_description" class="form-input mt-1 block w-full" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 dark:text-gray-300">Category:</label>
                            <select name="category" id="category" class="form-select mt-1 block w-full" required>
                                <option value="0">Tech</option>
                                <option value="1">Education</option>
                                <option value="2">Business</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="feature" class="block text-gray-700 dark:text-gray-300">Feature:</label>
                            <select name="feature" id="feature" class="form-select mt-1 block w-full" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-300">Image:</label>
                            <input type="file" name="image" id="image" class="form-input mt-1 block w-full" accept="image/*" required />
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/ui/trumbowyg.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/trumbowyg@2.26.0/dist/trumbowyg.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#post_description').trumbowyg();
        });
    </script>

</x-app-layout>