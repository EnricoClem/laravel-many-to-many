@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <h1>{{ $project->title }}</h1>
      <p>{{ $project->slug }}</p>

      <p>
        Type:
        {{ $project->type ? $project->type->name : 'No type' }}
      </p>

      <p>Technology:</p>
      <ul class="d-flex gap-2 list-unstyled">
        @foreach($project->technologies as $technology) 
          <li>{{ $technology->name }}</li>
        @endforeach
      </ul>

      @auth
        <form class="delete-form" action="{{ route('admin.projects.destroy',$project) }}" method="POST">
        
          @csrf
          @method('DELETE')

          <button class="btn btn-link link-danger">Delete</button>
        
        </form>
      @endif

    </div>
    <div class="container">
        <p>{{ $project->description }}</p>
        <p>{{ $project->project_link }}</p>
    </div>

    @if($project->type)
    <div class="container">
      <h2>Related projects:</h2>

      @foreach($project->type->projects as $related_project )
        <div>
          <h3><a href="{{ route('admin.projects.show',$related_project) }}">
            {{ $related_project->title }}  
          </a></h3>
        </div>
      @endforeach

    </div>
    @endif
    
  </section>
@endsection