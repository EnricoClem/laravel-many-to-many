@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <h1>My Projects</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{ $project->title }}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">{{ $project->last_update }}</h6>
                          <p class="card-text">{{ $project->description }}</p>
                          <a href="#" class="card-link">Delete</a>
                        </div>
                      </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
