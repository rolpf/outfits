<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Clothes') }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ __('Manage your clothes') }}</p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route('account.clothes.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('New cloth') }}</a>
        </div>
    </div>
    <input class="my-4 py-2 px-4 w-full rounded-lg" wire:model="search" placeholder="{{ __('Search') }}">
    <div class="-mx-4 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
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
                @forelse($clothes as $cloth)
                    <tr @class(['bg-white', 'border-b border-gray-200' => !$loop->last]) class="bg-white">
                        <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                            <img class="w-full h-24 aspect-video object-cover" alt="{{ $cloth->name }}" src="{{ $cloth->getImageUrl() }}">
                        </td>
                        <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{ $cloth->name }}</td>
                        <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">
                            <div class="w-full flex justify-center items-center gap-4">
                                <a href="{{ route('account.clothes.edit', $cloth) }}" class="text-indigo-600 hover:text-indigo-900 bg-white rounded px-4 py-1 shadow">{{ __('Edit') }}</a>
                                <button wire:click.prevent="deleteCloth({{ $cloth->id }})" type="submit" class="text-red-600 hover:text-red-900 bg-white rounded px-4 py-1 shadow">{{ __('Delete') }}</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ __('No clothes found.') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="px-6 py-2">
                        {!! $clothes->links() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
