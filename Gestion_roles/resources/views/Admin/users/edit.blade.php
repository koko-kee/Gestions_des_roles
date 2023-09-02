
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12 m-10">

        <div class="max-w-sm mx-auto">
            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
               @csrf
                <div class="mb-4">
                    <label for="name" class="block text-white font-bold">Nom :</label>
                    <input type="text" id="name" name="name" value="{{ old('name') ?? $user->name }}" class="form-input w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-200">
                </div>
    
                <div class="mb-4">
                    <label for="email" class="block text-white font-bold">Adresse e-mail :</label>
                    <input type="email" id="email" name="email" value="{{old('email') ?? $user->email }}" class="form-input w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-200">
                </div>
            
                @foreach ($roles as $role)
                    <div class="mb-4">
                        <label class="inline-flex items-center text-white">
                            <input type="checkbox" name="roles[]"
                                @if ($user->roles->contains('id', $role->id))
                                    checked
                                @endif
                                value="{{ $role->id }}" class="form-checkbox h-5 w-5 text-indigo-600">
                            <span class="ml-2">{{ $role->name }}</span>
                        </label>
                    </div>
                @endforeach
            
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Soumettre</button>
                </div>
            </form>
            
            
        </div>
    </div>
    
</x-app-layout>

