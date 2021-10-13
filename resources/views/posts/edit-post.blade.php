<x-app>
<form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="title"
            >
                Titulo
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="title"
                   id="title"
                   value="{{ $user->title }}"
                   required
            >
            @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                   for="description"
            >
                Descripcion
            </label>

            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="description"
                   id="description"
                   value="{{ $user->description }}"
                   required
            >

            @error('description')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="file"
                >
                    Imagen
                </label>

            <div class="flex">
                <input class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="file"
                    id="file"
                    accept="image/*"   
                >

                <img src="/uploads/{{$user->file}}"
                    alt = "your image"
                    width="40"
                >
            
            </div>

                @error('file')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

        <div class="mb-6">
            <button type="submit"
                   class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-4"
            >
                Submit
            </button>

            <a href="{{ $user->path() }}" class="hover:underline">Cancel</a>
        </div>
</form>
</x-app>