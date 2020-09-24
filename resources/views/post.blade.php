@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                @if($post->image)
                <img src="{{ $post->get_image }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    @if($post->iframe)
                    <div class="embed-responsive embed-responsive embed-responsive-16by9">
                        {!! $post->iframe !!}
                    </div>
                    @endif
                    <br>
                    <p class="car-text">
                        {{ $post->body }}
                    </p>
                    <p class="text-muted mb-0">
                    <em>
                        <i class="fas fa-user-alt"></i>  {{$post->user->name}}
                        </em>
                        <br>
                        <em>
                        <i class="far fa-calendar-alt"></i> {{$post->created_at->format('d / m / Y')}}
                        </em>
                    </p>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection