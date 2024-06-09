@extends('layouts.app')

@section('content')

<section>

    <div class="container">
        <a href="{{route('admin.projects.create')}}">Create new project</a>
    </div>

    @foreach ($projects as $project)
        <div class="m-2 border p-2 d-flex text-center">
            <div class="col-6">
                <p>{{$project->title}}</p>
                <p>{{$project->slug}}</p>
                <p>{{$project->content}}</p>
                {{-- @dump($project->type) --}}
                <p>{{$project->type ? $project->type->name : 'Nessun tipo'}}</p>
                {{-- @foreach ($project->technologies as $technology)
                    <p>{{$technology->name ? $technology->name : 'Nessuna tecnologia'}}</p>
                @endforeach --}}
                @dump($project->technology->name)
                <a href="{{$project->link}}">{{$project->link}}</a>
            </div>
            <div class="col-6 right-align"> 
                 <a href="{{route('admin.projects.edit', $project)}}">Edit</a>
                 <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button>Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</section>

@endsection