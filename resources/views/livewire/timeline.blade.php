<div>

    @foreach($posts as $post)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                @isset($post->outfit_id)
                    @if ($post->outfit_id)
                    <?php $outfit = App\Models\Outfit::find($post->outfit_id); ?>
                        @if ($outfit)
                            <img class="w-64 h-64" src="{{ $outfit->thumbnail }}" alt="{{ $outfit->name }}">
                        @endif
                    @endif
                @endisset
                <p>{{ $post->content }}</p>
                <p>Posted by {{ $post->user->name }}</p>
                <p>Posted on {{ $post->created_at }}</p>
            </div>
        </div>
    @endforeach
    
    @if($posts->hasMorePages())
        <button class="px-4 py-2" wire:click="loadMore">Load more</button>
    @endif

    
</div>