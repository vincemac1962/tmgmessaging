<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Slides
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
            @unless($slides->isEmpty())
                @foreach($slides as $slide)
                    <tr class="border-gray-300">
                        <td class="px-4 pt-4 border-t border-gray-300 text-md">
                            <a href="/listings/{{$slide->id}}"> {{$slide->description}} </a>
                        </td>
                        <td class="px-4 pt-4 border-t border-gray-300 text-md text-right">
                            <a href="/slides/{{$slide->id}}/edit" class="text-blue-400 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-6 border-b border-gray-300 text-md">
                            @php
                                if(now() > $slide->date_off){
                                    echo '<p><strong>Status:&nbsp&nbsp</strong><span class="text-gray-400">Expired</span></p>';
                                } elseif (now() > $slide->date_on && now() < $slide->date_off) {
                                    echo '<p><strong>Status:&nbsp&nbsp</strong><span class="text-green-400">Current</span></p>';
                                } elseif (now() < $slide->date_on) {
                                    echo '<p><strong>Status:&nbsp&nbsp</strong><span class="text-blue-400">Not Due</span></p>';
                                }
                            @endphp
                        </td>

                        <!-- ToDo: Add deletion confirmation -->
                        <td class="px-4 py-6 border-b border-gray-300 text-md text-right">
                            <form method="POST" action="/slides/{{$slide->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
            @endunless

            </tbody>
        </table>
    </x-card>
</x-layout>
