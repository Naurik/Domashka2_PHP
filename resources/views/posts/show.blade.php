@extends('layouts.app')

@section('content')

    @if (auth()->check())

        @component('posts._partials.actions', [ 'post' => $post ])@endcomponent

    @endif

    @component('posts._partials.post_block', ['post' => $post])

        @component('posts._partials.like_button', ['post' => $post])@endcomponent

    @endcomponent

    @if (auth()->check())

        @component('posts._partials.comment_form', [ 'post' => $post ])@endcomponent

    @endif

    @component('posts._partials.comments_block', [ 'post' => $post ])@endcomponent


@endsection
