<div>

    @foreach($posts as $post)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                @isset($post->outfit_id)

                    @if ($post->outfit_id)
                    <?php $outfit = App\Models\Outfit::find($post->outfit_id); ?>
                        @if ($outfit)
                            <img class="w-64 h-64" src="{{ $outfit->thumbnail }}" alt="{{ $outfit->name }}">
                        @endif
                    @endif
                @endisset
                <small>Posted by {{ $post->user->name }}</small>
            </div>
        </div>
    @endforeach
    
    @if($posts->hasMorePages())
        <button wire:click.prevent="loadMore">Load more</button>
    @endif

    
</div>