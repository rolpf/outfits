<div class="lg:mx-56 py-8">

    <h1 class="lg:mx-64">Timeline</h1>

    @foreach($posts as $post)
        <div class="post">
            <div class="flex items-center">
                <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full">
                <p class="px-2 font-semibold">{{ $post->user->name }}</p>
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
    @endforeach


    @if($posts->hasMorePages())
        <button class="px-4 py-2 lg:mx-56" wire:click="loadMore">Load more</button>
        <div></div>
        <div wire:loading wire:target="loadMore">
            ça charge mdr
        </div>
    @endif
</div>