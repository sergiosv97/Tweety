<div class="flex p-4 {{ $loop->last ? '' : 'border-b border-b-gray-400'}}"> 
                        <div class="mr-2 flex-shrink-0">
                            <a href="{{$post->user->path()}}">
                                <img
                                src="/uploads/{{ $post->user->avatar }}"
                                alt=""
                                class="rounded-full mr-2"
                                width="50"
                                height="50"
                                >
                            </a>
                        </div>

                        <div>
                            <h5 class="font-bold mb-2">
                                <a href = "{{$post->user->path()}}">
                                    {{ $post->user->name }}
                                </a>
                            </h5>

                            <p class="text-sm mb-3">
                                {{ $post->title }}
                            </p> 

                            <p class="text-sm mb-3">
                                {{ $post->description }}
                            </p>   
				        </div>
</div>

