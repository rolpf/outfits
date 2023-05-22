<div @notifications-opened.window="$wire.updateAsRead" class="bg-white p-4 divide-y h-full" wire:init="$refresh">
    <h2 class="w-full text-center mb-4 text-3xl">{{ __('Notifications') }}</h2>
    <div class="overflow-y-auto h-full">
        @foreach($notifications as $notification)

            @switch($notification->type)
                @case('App\Notifications\FollowNotification')
                    @php($user = \App\Models\User::find($notification->data['follower_id']))
                    <a @click="$dispatch('notifications-opened')"
                       href="{{ route('bio', $user) }}" @class(["py-4 px-2 flex items-center gap-2 hover:bg-primary/10", "bg-primary/5" => $notification->unread()])>
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-8 h-8 rounded-full">
                        <p class="break-normal flex gap-1"><span
                                class="font-bold">{{ $user->name }}</span>{{  __('followed you') }}</p>
                    </a>
                    @break
            @endswitch

        @endforeach
    </div>

    <span x-intersect:enter.debounce.1000ms="$wire.loadMore"></span>
    <div class="w-full flex items-center justify-center py-4">
        <x-loading wire:loading wire:target="loadMore" class="w-6 aspect-square border-2 border-t-2"/>
    </div>

</div>
