<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update user role') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('updateRole')}}">
                        @csrf

                        <div class="mb-4">
                            <label for="id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID</label>
                            <input type="text" name="id" id="id" class="mt-1 p-2 border rounded-md w-full" readonly style="background-color: #f2f2f2;" value="{{$user->id}}">

                            <x-input-error :messages="$errors->get('id')" class="mt-2" />

                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" readonly style="background-color: #f2f2f2;" value="{{$user->name}}">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 p-2 border rounded-md w-full" readonly style="background-color: #f2f2f2;" value="{{$user->email}}">
                        </div>

                        <div class="mb-4">
                            <label for="roles" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roles</label>
                            <select name="roles" id="roles" class="mt-1 p-2 border rounded-md w-full">
                                @if($user->roles==1)

                                <option selected value="1">Admin</option>
                                <option value="0">User</option>
                                @else
                                <option value="1">Admin</option>
                                <option selected value="0">User</option>

                                @endif

                            </select>
                            <x-input-error :messages="$errors->get('roles')" class="mt-2" />

                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>