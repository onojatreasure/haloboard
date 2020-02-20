@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3">
        <a href="/projects/create">New Project</a>
    </header>
    
    <div class="flex flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="w-1/3 px-3 pb-6">
                <div class="bg-white p-5 rounded shadow" style="heights: 200px;">
                    <h3 class="font-normal text-xl py-4">{{ $project->title }}</h3>
                    <div class="text-grey-dark">{{ str_limit($project->description, 250) }}</div>
                </div>
            </div>
        @empty
            <div>No project yet</div>
        @endforelse
    </div>



@endsection