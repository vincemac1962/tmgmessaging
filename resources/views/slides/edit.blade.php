<x-layout>
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Slide
                </h2>
            </header>

            <form method="POST" action="/slides/{{$slide->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >Description</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        value="{{$slide->description}}"
                    />
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="link" class="inline-block text-lg mb-2"
                    >Link</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="link"
                        placeholder="Url for slide - include https://"
                        value="{{$slide->link}}"
                    />
                    @error('link')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="time_on"
                        class="inline-block text-lg mb-2"
                    >Time On</label
                    >
                    <input
                        type="time"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="time_on"
                        placeholder="Time to start display"
                        value="{{$slide->time_on}}"
                    />
                    @error('time_on')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="date_on" class="inline-block text-lg mb-2"
                    >Date On</label
                    >
                    <input
                        type="date"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="date_on"
                        placeholder="Date to start display"
                        value="{{$slide->date_on}}"
                    />
                    @error('date_on')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="time_off"
                        class="inline-block text-lg mb-2"
                    >Time On</label
                    >
                    <input
                        type="time"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="time_off"
                        placeholder="Time to stop display"
                        value="{{$slide->time_off}}"
                    />
                    @error('time_off')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="date_off" class="inline-block text-lg mb-2"
                    >Date Off</label
                    >
                    <input
                        type="date"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="date_off"
                        placeholder="Date to stop display"
                        value="{{$slide->date_off}}"
                    />
                    @error('date_off')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 flex justify-center">
                    <div class="form-check">
                        <label for="global" class="inline-block text-lg mb-2">
                            Global?
                        </label>
                        <input class="bg-red-100 border-red-300 text-red-500 focus:ring-red-200" type="checkbox" name="global" id="global">
                        @error('global')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label for="specific_sites" class="inline-block text-lg mb-2">
                        Specific Sites
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="specific_sites"
                        placeholder="Enter site codes"
                        value="{{$slide->specific_sites}}"
                    />
                    @error('specific_sites')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>



                <div class="mb-6">
                    <label
                        for="notes"
                        class="inline-block text-lg mb-2"
                    >
                        Notes
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="notes"
                        rows="10"
                        placeholder="Notes for slide"

                    >{{$slide->notes}}</textarea>
                    @error('notes')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Slide
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>

</x-layout>
