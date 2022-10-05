<x-adminlayout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Slides
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                    <tr class="border-gray-300">
                        <td class="px-4 pt-4 border-t border-gray-300 text-md">
                            <a href=""> Foo </a>
                        </td>
                        <td class="px-4 pt-4 border-t border-gray-300 text-md text-right">
                            <a href="" class="text-blue-400 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-6 border-b border-gray-300 text-md">
                            Bar
                        </td>

                        <!-- ToDo: Add deletion confirmation -->
                        <td class="px-4 py-6 border-b border-gray-300 text-md text-right">
                            <form method="POST" action="">

                                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>




            </tbody>
        </table>
    </x-card>
</x-adminlayout>
