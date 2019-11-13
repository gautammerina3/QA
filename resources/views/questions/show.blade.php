@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                
                                <h1> {{ $question->title }}</h1>
                                <div class="ml-auto">
                                    <a href="{{ route('questions.index')}}" class="btn btn-outline-secondary">Back to all questions</a>
                                </div>
                            </div>
                        </div>

                        <hr>
 
                        <div class="media"> 
                            <div class="d-flex flex-column vote-controls">
                                <a title="This question is useful" class="vote-up">
                                    <i class="far fa-thumbs-up fa-2x"></i>
                                </a>
                                <span class="votes-count">1230</span>
                                <a title="This question is not useful" class="vote-down off">
                                    <i class="far fa-thumbs-down fa-2x"></i> 
                                </a>
                                <a title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                    <i class="fas fa-star fa-2x"></i>
                                    <span class="favorites-count">123</span>
                                </a>
                            </div>
                            <div class="media-body">
                                {!! $question->body !!}
                                <div class="float-right mt-4">
                                    <span class="text-muted"> Questioned  {{ $question->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}" width="40" height="40">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $question->user->url }}">
                                                {{ $question->user->name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h2>{{ $question->answers_count . " " . Str::plural('Answer', $question->answers_count) }}</h2>
                        </div>
                        <hr>
                        @foreach($question->answers as $answer)
                            <div class="media">
                                <div class="d-flex flex-column vote-controls">
                                    <a title="This answer is useful" class="vote-up">
                                        <i class="far fa-thumbs-up fa-lg"></i>
                                    </a>
                                    <span class="votes-count">1230</span>
                                    <a title="This answer is not useful" class="vote-down off">
                                        <i class="far fa-thumbs-down fa-lg"></i> 
                                    </a>
                                    <span class="votes-count fa-sm">10</span>

                                    <a title="Mark this answer as best answer " class="vote-accepted mt-2">
                                        <i class="fas fa-check fa-lg"></i>
                                    </a>

                                </div>
                                <div class="media-body">
                                    {!! $answer->body !!}
                                    <div class="float-right mt-4">
                                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                        <div class="media mt-2">
                                            <a href="{{ $answer->user->url }}" class="pr-2">
                                                <img src="{{ $answer->user->avatar }}" width="40" height="40">
                                            </a>
                                            <div class="media-body mt-1">
                                                <a href="{{ $answer->user->url }}">
                                                    {{ $answer->user->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 