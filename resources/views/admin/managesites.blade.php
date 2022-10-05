<x-adminlayout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Sites
            </h1>
        </header>

        <table class="w-1/2 table-auto rounded-sm" style="margin: auto">
            <tbody>
                @foreach($sites as $site)
                    <tr class="border-gray-300">
                        <td class="px-4 py-4 border-t border-gray-300 text-md">
                            <strong>{{$site->site_ref}}:</strong> {{$site->site_location}}
                        </td>
                        <td class="px-4 py-4 border-t border-gray-300 text-md text-right">
                            <a href="/sites/{{$site->id}}/edit" class="text-blue-400 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="px-4 py-4 border-t border-gray-300 text-md text-right">
                            <form method="POST" action="/slides/{{$site->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                            <!-- ToDo: Add deletion confirmation -->
                        </td>
                    </tr>


                @endforeach


            </tbody>
        </table>
    </x-card>
</x-adminlayout>
