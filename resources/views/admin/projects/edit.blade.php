@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <h1>New project</h1>
    </div>
    <div class="container">
      <form action="{{ route('admin.projects.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Project title" value="{{ old('title', $project->title) }}">
        </div>

        <div class="mb-3">
          <label for="type_id" class="form-label">Type</label>
          <select class="form-control" name="type_id" id="type_id">
            <option value="">-- Select type --</option>
            @foreach($types as $type) 
              <option @selected( $type->id == old('type_id', $project->type_id) ) value="{{ $type->id }}"> {{ $type->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group mb-3">
          <h2>Select technologies:</h2>
          <div class="d-flex gap-2">
            @foreach ($technologies as $technology)

              <div class="form-check">
                <input @checked( in_array($technology->id, old('technologies',$project->technologies->pluck('id')->all() )) ) name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}" id="technology-{{$technology->id}}">
                <label class="form-check-label" for="technology-{{$technology->id}}">
                  {{ $technology->name }}
                </label>
              </div>
                
            @endforeach
          </div>
          
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug:</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Project slug" value="{{ old('slug', $project->slug) }}">
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea class="form-control" name="description" placeholder="Project description" id="description" rows="5">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="project_link" class="form-label">Project link:</label>
            <input class="form-control" name="project_link" placeholder="Project link" id="project_link" >{{ old('project_link', $project->project_link) }}</input>
        </div>

        <button class="btn btn-primary">Save</button>
      </form>

      @if ($errors->any())
          <div class="alert alert-danger mt-3">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
    </div>
  </section>
@endsection