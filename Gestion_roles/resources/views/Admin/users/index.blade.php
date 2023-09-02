
@section('title','Liste des utilisateur')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 m-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-semibold mb-6">@yield('title')</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">#</th>
                                <th class="border border-gray-300 px-4 py-2">Nom</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Roles</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th><!-- Nouvelle colonne -->
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($users as $item)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{$item->id}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$item->name}}</td>
                                <td class="border border-gray-300 px-4 py-2">{{$item->email}}</td>
                                <td class="border border-gray-300 px-4 py-2">@foreach ($item->roles as $role) {{$role->name}}, @endforeach</td>
                                <td class=" border border-gray-300  px-4 py-2 ">
                                    <a href="{{route('admin.users.edit',['user' => $item->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Éditer</a>
                                    @can('delete-user', $item )
                                     <a  href="{{route('admin.users.destroy',['user' => $item->id])}}" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
                                    @endcan
                                </td>
                            </tr>
                           @empty
                               
                           @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>







    