@extends('layouts.app')

@section('content')

  <section>
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Projects</h1>

        @auth
          <a href="{{ route('admin.projects.create') }}" title="Go to the creation of new project page">Add new project</a>
        @endif

      </div>
    </div>

    <div class="container">
      <table class="table">

        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Last update</th>
            <th>Link</th>
            <th>Type</th>
            <th colspan="3">Slug</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($projects as $project)
            <tr>

              <td>{{ $project->id }}</td>

              <td>
                @auth 
                  <a href="{{ route('admin.projects.show',$project) }}">
                  {{ $project->title }}
                  </a>
                @else
                  <a href="{{ route('projects.show',$project) }}">
                  {{ $project->title }}
                  </a>
                @endif
              </td>
              
              <td>
                {{ $project->description }}
              </td>

              <td>
                {{ $project->last_update }}
              </td>

              <td>
                {{ $project->project_link }}
              </td>

              <td>
                {{ $project->type ? $project->type->name : '' }}
              </td>

              <td>
                @auth
                    <a href="{{ route('admin.projects.edit',$project) }}">modify</a>
                @endif
              </td>
              
              <td>
                @auth
                    <form class="delete-form" action="{{ route('admin.projects.destroy',$project) }}" method="POST">
                    
                      @csrf
                      @method('DELETE')

                      <button class="btn btn-link link-danger">Delete</button>
                    
                    </form>
                @endif
              </td>

            </tr>
          @endforeach
        </tbody>

      </table>
        
      </div>
    </div>
  </section>
@endsection