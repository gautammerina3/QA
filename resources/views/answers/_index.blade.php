@if($answersCount > 0)

<div class="row mt-4" v-cloak>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " " . Str::plural('Answer', $question->answers_count) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                        <a title="This answer is useful" 
                                    class="vote-up {{ Auth::guest() ? 'off' : '' }}"
                                    onClick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();"
                                    >
                                    <i class="far fa-thumbs-up fa-2x"></i>
                                </a>
                                <form id="up-vote-answer-{{ $answer->id }}" action="/answers/{{ $answer->id }}/vote" method="post" style="display:none;">
                                    @csrf
                                    <input type="hidden" name="vote" value="1">
                                </form>
                                <span class="votes-count">{{$answer->votes_count}}</span>
                                <a title="This question is not useful" 
                                    class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                                    onClick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();"
                                    >
                                    <i class="far fa-thumbs-down fa-2x"></i> 
                                </a>
                                <form id="down-vote-answer-{{ $answer->id }}" action="/answers/{{ $answer->id }}/vote" method="post" style="display:none;">
                                    @csrf
                                    <input type="hidden" name="vote" value="-1">
                                </form>
                                <!-- @include('shared._favorite')
                                @include('shared._vote') -->

                        </div>
                        <div class="media-body">
                            {!! $answer->body !!}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @can('update', $answer)
                                            <a href="{{ route('questions.answers.edit', [$question->id, $answer->id] )}}" class="btn btn-sm btn-outline-info">Edit</a>
                                        @endcan

                                        @can('delete', $answer)
                                            <form class="form-delete" action="{{ route('questions.answers.destroy', [$question->id, $answer->id])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <div class="col-4">


                                </div>
                                <div class="col-4">
                                    @include('shared._author', [
                                        'model' => $answer,
                                        'label' => 'answered'    
                                    ])
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

@endif