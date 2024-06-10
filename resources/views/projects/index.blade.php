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
                {{-- @foreach ($project->technologies as $technology) --}}
                    <p>{{$project->technolohy ? $project->$technology->name : 'Nessuna tecnologia'}}</p>
                {{-- @endforeach --}}
                {{-- @dump($project->technologies) --}}
                <a href="{{$project->link}}">{{$project->link}}</a>
            </div>
            {{-- <div class=""> 
                    <button class="btn"></button>
                 
                    <button class="btn btn-danger"></button>
            </div> --}}
            {{-- <div class="btn-group bottoni-card col-6 right-align" role="group" aria-label="Default button group">
                <form action="{{route('admin.projects.edit', $project)}}">
                    <button type="button" class="btn btn-outline-warning">Edit</button>
                </form>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                </form>
            </div> --}}
            <div>
                <a href="{{route('admin.projects.edit', $project)}}">edit</a>
                <a href="{{ route('admin.projects.destroy', $project) }}">delete</a>
            </div>
        </div>
    @endforeach
</section>

@endsection