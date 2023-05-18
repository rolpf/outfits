<div class="post">
    <div class="flex items-center">
        <a href=""><img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full"></a>
       <div class="flex flex-col">
        <p class="px-2 font-semibold">{{ $post->user->name }}</p>
        <p class="px-2 font-light text-xs">Posted on {{ $post->created_at }}</p>
       </div>
    </div>
    <p class="my-2">{{ $post->content }}</p>
    <div class="flex justify-center">
        @isset($post->outfit_id)
            @if ($post->outfit_id)
            <?php $outfit = App\Models\Outfit::find($post->outfit_id); ?>
                @if ($outfit)
                    <img class="max-w-xs my-4"src="{{ $outfit->thumbnail }}" alt="{{ $outfit->name }}">
                @endif
            @endif
        @endisset
    </div>
</div>