<div class="lg:mx-56 py-8">

    <h1 class="lg:mx-64 text-3xl font-semibold">Timeline</h1>

    @foreach($posts as $post)
        @include('components.post')
    @endforeach


    @if($posts->hasMorePages())
        <button class="px-4 py-2 lg:mx-56" wire:click="loadMore">Load more</button>
        <div></div>
        <div wire:loading wire:target="loadMore">
            ça charge mdr
        </div>
    @endif
</div>