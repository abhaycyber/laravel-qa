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

                Vote up

            </a>

            <span class="votes-count">1230</span>

            <a title="This question is not useful" class="vote-down off">

                Vote down

            </a>

            <a title="click to mark as favorite question (Click again to undo)" class="favorite">

                Favorite

                <span class="favorites-count">123</span>

            </a>

        </div>
    </div>


    <div class="row mt-4">

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">



                    <div class="card_title">

                        <h2>{{ $question->answers_count . " " . str_plural('Answer', $question->answers_count) }}</h2>


                    </div>

                    <hr>


                    @foreach ($question->answers as $answer)

                    <div class="media">

                        <div class="media-body">

                            {!! $answer->body_html !!}

                            <div class="float-right">

                                <span class="text-muted">Answered {{ $answer->created_date }} </span>

                                <div class="media mt-2">

                                    <a href="{{ $answer->user->url }}" class="pr-2">

                                        <img src="{{ $answer->user->avatar }}">

                                    </a>
                                </div>

                                <div class="media-body mt-1"> <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                </div>


                                <div>


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