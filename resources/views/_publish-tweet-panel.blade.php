<div class="border border-blue-400 rounded-lg p-8 py-6 mb-8"> 
    <form method="POST" action="/tweets">
            @csrf
                <form action="">
                    <textarea
                        name="body"
                        class="w-full"
                        placeholder="What's up doc?"
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
                    Publish
                </button>

                </footer>  
                </form>  

                @error('body')
                   <p class="text-red-500 text-sm mt-2">{{$message}} </p> 
                @enderror   
            </div>    