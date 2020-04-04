<div class="card card-body mb-3">
    <p class="text-muted">
        Автор:
        <a href="{{ route('profile.show', $post->user) }}">{{ $post->user->name }}</a>
    </p>
    <h1>{{ $post->title }}</h1>
    <p class="lead">{{ $post->content }}</p>

    {{ $slot }}

</div>
