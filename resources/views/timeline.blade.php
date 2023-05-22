<x-app-layout>
    <x-container>
        <h1 class="text-3xl font-semibold text-center mt-8">{{ __('Timeline') }}</h1>

        @livewire ('timeline', ['postPool' => 'timeline'])

    </x-container>
</x-app-layout>
