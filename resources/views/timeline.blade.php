<x-app-layout>
        <x-container>
        <h1 class="lg:mx-64 text-3xl font-semibold">{{ __('Timeline') }}</h1>

        @livewire ('timeline', ['postPool' => 'timeline'])

    </x-container>
</x-app-layout>