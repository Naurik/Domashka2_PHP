<?php

use Illuminate\Support\Str;

$id = Str::random(10);
?>

<div class="mb-3 btn-group btn-group-sm">

    @if (optional(auth()->user())->can('update', $post))
        <a class="btn btn-info" href="{{ route('posts.edit', $post) }}">
            Изменить
        </a>
    @endif

    @if (optional(auth()->user())->can('delete', $post))
        <a class="btn btn-danger" id="{{ $id }}" href="{{ route('posts.destroy', $post) }}" data-target="delete-{{ $id }}">
            Удалить
        </a>
    @endif

</div>

@if (optional(auth()->user())->can('delete', $post))

    <form id="delete-{{ $id }}" action="{{ route('posts.destroy', $post) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>

    <script>
        let link = document.getElementById('{{ $id }}');
        if (link) {
            let id = link.dataset.target;
            link.addEventListener('click', function (event) {
                event.preventDefault();
                let form = document.getElementById(id);
                form.submit();
            });
        }
    </script>

@endif
