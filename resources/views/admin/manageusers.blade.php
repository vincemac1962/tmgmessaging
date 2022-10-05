<x-adminlayout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Users
            </h1>
        </header>

        <table class="w-1/2 table-auto rounded-sm" style="margin: auto">
            <tbody>
                @foreach($users as $user)
                    <tr class="border-gray-300">
                        <td class="px-4 py-4 border-t border-gray-300 text-md">
                           {{$user->email}}
                        </td>
                        <td class="px-4 py-4 border-t border-gray-300 text-md text-right">
                            <a href="/admin/user/{{$user->id}}/edit" class="text-blue-400 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <!-- ToDo: Add deletion confirmation -->
                        <td class="px-4 py-4 border-t border-gray-300 text-md text-right">
                            <form method="POST" action="/admin/{{$user->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach


            </tbody>
        </table>
    </x-card>
</x-adminlayout>
