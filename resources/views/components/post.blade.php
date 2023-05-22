<div class="post">
    <div class="flex items-center">
        <a href="{{ route('bio', $post->user->id) }}"><img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full"></a>
        <a href="{{ route('bio', $post->user->id) }}" class="px-2 font-semibold">{{ $post->user->name }}</a>
        <p class=>Posted on {{ $post->created_at }}</p>
    </div>
    <p class="my-2">{{ $post->content }}</p>
    <div class="">
        @isset($post->outfit_id)
            @if ($post->outfit_id)
            <?php $outfit = App\Models\Outfit::find($post->outfit_id); ?>
                @if ($outfit)
                    <img class="w-64 h-64" src="{{ $outfit->thumbnail }}" alt="{{ $outfit->name }}">
                @endif
            @endif
        @endisset
    </div>
</div>