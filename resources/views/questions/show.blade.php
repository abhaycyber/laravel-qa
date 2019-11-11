@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row mt-4">
        <div class="col-md-12">

            <div class="card">

                <div class="card-title">

                    <div class="d-flex align-itmes-center">

                        <h2></h2>
                        <div class="ml-auto"><a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a></div>

                    </div>

                </div>

                <div class="card-body">
                    <div class="card_title">

                        <h2>{{ $question->title }}</h2>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="media">
        <div class="d-fex flex-colum vote-controls">

            <a title="This question is useful" class="vote-up">

                <i class="fas fa-caret-up fa-3x"></i>

            </a>

            <span class="votes-count">1230</span>

            <a title="This question is not useful" class="vote-down off">

                <i class="fas fa-caret-down fa-3x"></i>

            </a>

            <a title="click to mark as favorite question (Click again to undo)" class="favorite mt-2 {{ Auth::guest() ? 'off' : ($question->is_favorited ? 'favorited' : '' )}}" onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question->id }}').submit()">

                <i class="fas fa-star fa-2x"></i>

                <span class="favorites-count">{{ $question->favorites_count }}</span>

            </a>

            <form id="favorite-question-{{ $question->id }}" action="/questions/{{ $question->id }}/favorites" method="POST" style="display:none;">

@csrf

@if($question->is_favorited)
    @method('DELETE')
@endif

</form>




        </div>
    </div>

@include('answers._index', [
    
    'answers' => $question->answers, 
    'answersCount' => $question->answers_count


])

@include('answers._create')




</div>
@endsection