<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin') }}" class="text-blue-500 hover:text-blue-700 inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-black" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <x-jet-button wire:click="create">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    <!-- The data table -->

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Title") }}</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Link") }}</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Content") }}</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Action") }}</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @if ($data->count())
        @foreach ($data as $item)
        <tr>
            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                {{ $item->title }}
                {!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>':''!!}
                {!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404 Page]</span>':''!!}
            </td>
            <td class="px-6 py-4 text-sm whitespace-no-wrap">
                <a
                    class="text-indigo-600 hover:text-indigo-900"
                    target="_blank"
                    href="{{ URL::to('/pages/'.$item->slug)}}"
                >
                    {{ $item->slug }}
                </a>
            </td>
            <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! \Illuminate\Support\Str::limit($item->content->toPlainText(), 50, '...') !!}</td>
            <td class="px-6 py-4 text-right flex justify-center gap-2">
                <x-jet-button wire:click="editPage({{ $item->id }})">
                    {{ __('Update') }}
                </x-jet-button>
                <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">{{ __("No Results Found") }}</td>
        </tr>
        @endif
        </tbody>
    </table>

    {{ $data->links() }}

    <!--    Delete confirmation modal-->
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this page?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Page') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


