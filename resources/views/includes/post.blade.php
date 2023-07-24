<div class="card">
    <div class="card-img-container">
        @if(!empty($post->categories))
            <div class="tags">
                @foreach($post->categories as $category)
                    <span class="tag">{{ $category->title }}</span>
                @endforeach
            </div>
        @endif
        <img src="{{ str_contains($post->image_path, 'posts') ? URL::asset('storage/' . $post->image_path) : $post->image_path }}" class="card-img" alt="post image">
    </div>
    <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        <a href="{{ route('posts.show', ['post' => $post->id]) }}">Know More</a>
    </div>
</div>

<?php

?>
