<?php

use Illuminate\Support\Str;

$id = Str::random();
?>

<div class="d-flex">
    <button id="like-{{ $id }}" class="btn ml-auto" @if(!auth()->check()) disabled @endif>
        &#x1F90D; <span class="count"></span>
    </button>
</div>

<script>

    function updateLikesCount(el) {
        axios.post( '{{ route('posts.likes.count', $post) }}' ).then(function (res) {
            let count = res.data['count'];
            let span = el.querySelector('span');
            span.innerHTML = count;
        });
    }

    function checkIsLiked(el) {
        axios.post( '{{ route('posts.likes.is_liked', $post) }}' ).then(function (res) {
            let is_liked = res.data['is_liked'];

            if (is_liked) {
                el.classList.remove('btn-secondary');
                el.classList.add('btn-danger');
            } else {
                el.classList.add('btn-secondary');
                el.classList.remove('btn-danger');
            }
        });
    }

    let likeBtn = document.getElementById('like-{{ $id }}');

    window.onload = function() {
        updateLikesCount(likeBtn);
        checkIsLiked(likeBtn);
    };

    likeBtn.addEventListener('click', function () {

        axios.post( '{{ route('posts.like', $post) }}' ).then(function (response) {
            let data = response.data;

            if (data.status === 200) {
                updateLikesCount(likeBtn);
                checkIsLiked(likeBtn);
            }

        });

    });

</script>
