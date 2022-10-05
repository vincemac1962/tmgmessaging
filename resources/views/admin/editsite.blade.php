<x-adminlayout>
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Slide
                </h2>
            </header>

            <form method="POST" action="/admin/site/{{$site->id}}/edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="company_id"
                        class="inline-block text-lg mb-2"
                    >Company ID</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="company_id"
                        value="{{$site->company_id}}"
                    />
                    @error('company_id')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="site_ref" class="inline-block text-lg mb-2"
                    >Site Ref</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="site_ref"
                        placeholder=""
                        value="{{$site->site_ref}}"
                    />
                    @error('site_ref')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="site_location" class="inline-block text-lg mb-2"
                    >Site Location</label
                    >
                    <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="site_location"
                            placeholder=""
                            value="{{$site->site_location}}"
                    />
                    @error('site_location')
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
                        placeholder="Notes for site"

                    >{{$site->notes}}</textarea>
                    @error('notes')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Site
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>

</x-adminlayout>
