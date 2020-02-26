
                <div class="bg-white p-5 rounded-lg shadow" style="heights: 200px;">

                    <h3 
                        class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
                            <a href="{{ $project->path() }}" class="text-black no-underline">{{ $project->title }}</a> 
                    </h3>

                    <div class="text-grey-dark">{{ str_limit($project->description, 250) }}</div>
                
                </div>
