<nav class="fixed bottom-0 z-40 w-full h-16 border-t bg-white shadow block lg:hidden">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto font-medium bg-white">
        <a href="#" class="inline-flex flex-col items-center justify-center px-5">
            <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
            </svg>
        </a>
        {{--
        <a href="#" class="inline-flex flex-col items-center justify-center px-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
            </svg>
            <span class="text-sm">{{ __('Search') }}</span>
        </a>
        --}}
        <div x-data="{showNotifications: false, opened: false}" @notifications-opened.window="opened = true" class="relative inline-flex flex-col items-center justify-center px-5">
            <button class="relative inline-flex flex-col items-center justify-center px-5" @click.prevent="showNotifications = !showNotifications; showNotifications === false ? $dispatch('notifications-opened') : null">
                <div class="relative">
                    <x-heroicon-s-bell class="w-auto mb-1 h-6" />
                    @if(($unreadCount = Auth::user()->unreadNotifications->count()) && $unreadCount > 0 )
                        <div :class="{'hidden': opened}" class="w-5 aspect-square bg-primary rounded-full absolute -top-2 -right-2 flex items-center justify-center text-xs text-white">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</div>
                    @endif
                </div>
            </button>
            <div @click.self="showNotifications = false; $dispatch('notifications-opened')" :class="{'hidden': !showNotifications}" class="fixed w-screen h-screen bg-black/30 -z-20 top-0 left-0 hidden flex items-center justify-center px-4">
                <div class="w-full px-4 h-1/2 overflow-y-hidden bg-white">
                    <livewire:notification-popup />
                </div>
            </div>
        </div>

        <a href="/post/create" class="inline-flex flex-col items-center justify-center px-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
            </svg>
        </a>

        <a href="{{ route('account.clothes.index') }}" class="inline-flex flex-col items-center justify-center px-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z"/>
            </svg>
        </a>

        <button x-data="{open: false}"  href="#" class="inline-flex flex-col items-center justify-center px-5">
            <div @click.prevent="open = !open">
                <svg  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
                </svg>
            </div>

            <div x-show="open" :class="{'bg-black/50': open}" x-transition:enter-start="bg-transparent" x-transition:enter-end="bg-black/50" x-transition:leave-start="bg-black/50" x-transition:leave-end="bg-transparent"  class="fixed top-0 left-0 w-screen h-screen -z-10 pb-16 duration-500">
                <div :class="{'translate-x-full': !open, 'translate-x-0': open}" class="h-full w-2/3 bg-white ml-auto translate-x-full duration-500 py-12 px-8 flex flex-col justify-center gap-8">
                    <a href="{{ route('bio', auth()->user()->id) }}" class="flex items-center gap-4"><x-heroicon-s-user class="w-6 h-auto" />{{ __('Profile') }}</a>
                    <a href="{{ route('profile.show', auth()->user()->id) }}" class="flex items-center gap-4"><x-heroicon-m-cog-8-tooth class="w-6 h-auto" />{{ __('Settings') }}</a>
                    <a href="#" class="flex items-center gap-4"><x-heroicon-o-magnifying-glass class="w-6 h-auto" />{{ __('Search') }}</a>
                    <form method="POST" class="flex items-center gap-4" action="{{ route('logout') }}" x-data>
                        @csrf

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path
                                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                        </svg>

                        <a href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </div>
        </button>
    </div>
</nav>
