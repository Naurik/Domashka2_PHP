@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-12 col-lg-8">

            @foreach($posts as $post)

                @component('posts._partials.post_block', ['post' => $post])@endcomponent

            @endforeach

        </div>

        <div class="col-12 col-lg-4">

            @foreach($comments->take(2) as $comment)
                @component('posts._partials.comment', ['comment' => $comment, 'post' => true])@endcomponent
            @endforeach

            <div class="card">

                <div class="card-header d-flex align-items-center">
                    Лайки
                    <span class="badge badge-danger ml-auto">{{ $likes->count() }}</span>
                </div>

                <small class="card-body py-2 text-muted">
                    Последние @if($likes->count() < 3) {{ $likes->count() }} @else 3 @endif  лайкнутые поста:
                </small>

                <div class="list-group list-group-flush">
                    @foreach($likes->take(3) as $like)
                        <a href="{{ route('posts.show', $like->post) }}" class="list-group-item list-group-item-action">
                            {{ $like->post->title }}
                        </a>
                    @endforeach
                </div>

            </div>

        </div>

    </div>

@endsection
