<div class="border border-blue-800 rounded-lg p-8 py-6 mb-8"> 
    <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
                <form action="">

                     <textarea
                        name="title"
                        class="w-full"
                        placeholder="Inserte titulo aquí"
                        required
                        autofocus
                    ></textarea>

                    <textarea
                        name="description"
                        class="w-full"
                        placeholder="Escribe un nuevo blog aquí"
                        required
                        autofocus
                    ></textarea>
                
                    <hr class="my-4">

                    <footer class="flex justify-between items-center">
                        <img
                            src="/uploads/{{auth()->user()->avatar}}"
                            alt="your avatar"
                            class="rounded-full mr-2"
                            width="50"
                            width="50"
                        >

                    <div class="flex">
                        <input class="border border-gray-250 p-1 w-full"
                            type="file"
                            name="file"
                            id="file"
                            accept="image/*"   
                        >
                    </div>

                    <button 
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10">
                        Publicar blog
                    </button>

                    </footer>  
                </form>  
    </form>
                @error('title')
                   <p class="text-red-500 text-sm mt-2">{{$message}} </p> 
                @enderror   
            </div>    