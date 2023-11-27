<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('updatePost') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div hidden class="mb-4">

                            <input type="text" name="id" class="form-input mt-1 block w-full" value="{{$post->id}}" />
                            <x-input-error :messages="$errors->get('id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label for="post_title" class="block text-gray-700 dark:text-gray-300">Post Title:</label>
                            <input placeholder="Post title" type="text" name="post_title" id="post_title" class="form-input mt-1 block w-full" value="{{$post->post_title}}" />
                            <x-input-error :messages="$errors->get('post_title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="post_description" class="block text-gray-700 dark:text-gray-300">Post Description:</label>
                            <textarea name="post_description" style="min-height: 222px;" id=" post_description" class="form-input mt-1 block w-full">{{$post->post_description}}</textarea>
                            <x-input-error :messages="$errors->get('post_description')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-gray-700 dark:text-gray-300">Category:</label>
                            <select name="category" id="category" class="form-select mt-1 block w-full" required>
                                @if($post->category==0)
                                <option select value="0">Tech</option>
                                <option value="1">Education</option>
                                <option value="2">Business</option>
                                @elseif($post->category==1)
                                <option value="0">Tech</option>
                                <option select value="1">Education</option>
                                <option value="2">Business</option>
                                @elseif($post->category==2)
                                <option value="0">Tech</option>
                                <option value="1">Education</option>
                                <option select value="2">Business</option>

                                @endif
                            </select>

                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="feature" class="block text-gray-700 dark:text-gray-300">Feature:</label>
                            <select name="feature" id="feature" class="form-select mt-1 block w-full" required>

                                @if($post->feature==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                                @elseif($post->feature==0)
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                                @endif
                            </select>

                            <x-input-error :messages="$errors->get('feature')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/blog_images/' . $post->image) }}" alt="Sample Image" class="h-12 w-24 object-cover" />
                            </td>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-300">Image:</label>
                            <input type="file" name="image" id="image" class="form-input mt-1 block w-full" accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>