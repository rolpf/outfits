<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Outfits') }}
        </h2>
    </x-slot>

    <x-container class="py-16">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Outfits') }}</h1>
                    <p class="mt-2 text-sm text-gray-700">{{ __('Manage your outfits') }}</p>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a href="{{ route('account.outfits.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('New outfit') }}</a>
                </div>
            </div>
            <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ __('Image') }}</th>
                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">{{ __('Name') }}</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 lg:px-24">
                                {{ __('Actions') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($outfits as $outfit)
                            <tr @class(['bg-white', 'border-b border-gray-200' => !$loop->last]) class="bg-white">
                                <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <img class="w-full h-24 aspect-video object-cover" alt="{{ $outfit->name }}" src="{{ $outfit->getImageUrl() }}">
                                </td>
                                <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $outfit->name }}</td>
                                <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
                                    <div class="w-full flex justify-center items-center gap-4">
                                        <a href="{{ route('account.outfits.edit', $outfit) }}" class="text-indigo-600 hover:text-indigo-900 bg-white rounded px-4 py-1 shadow">{{ __('Edit') }}</a>
                                        <form action="{{ route('account.outfits.destroy', $outfit) }}" method="POST" class="inline-block ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-white rounded px-4 py-1 shadow">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ __('No outfits found.') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="px-6 py-2">
                                {!! $outfits->links() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </x-container>
</x-app-layout>
