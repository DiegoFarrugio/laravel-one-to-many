@extends('layouts.app')

@section('page-title', $project->tile)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        {{$project->title}}
                    </h1>

                    <p>
                        {{$project->content}}
                    </p>

                </div>
            </div>
        </div>
    </div>

    
@endsection