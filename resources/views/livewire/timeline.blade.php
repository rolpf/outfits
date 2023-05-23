<div class=" pb-24" x-data>
    <div class="lg:mx-48">
        @foreach($posts as $post)
            @include('components.post')
        @endforeach
    </div>

    @if($posts->hasMorePages())
        <div x-intersect:enter="$wire.loadMore"></div>
        <div class="w-full flex items-center justify-center mx-auto" >
            <x-loading wire:loading wire:target="loadMore" class="w-6 aspect-square border-2 border-t-2"/>
        </div>
    @endif
</div>
