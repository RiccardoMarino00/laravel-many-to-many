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
          
            {{-- <div  role="group" aria-label="Default button group">
              
            </div> --}}
            <div class="col-6 right-align">
                <a href="{{route('admin.projects.edit', $project)}}">edit</a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</section>

@endsection