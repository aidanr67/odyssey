<div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:flex-col sm:justify-center sm:items-center dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
    <div class="text-center w-1/2">
        <div x-show="$wire.showError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Please highlight some text before attempting to get context.</span>
        </div>
        <div class="m-6">
            <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Homer's Odyssey</h1>
        </div>
        <div class="m-6">
            @if (!$context)
            <span class="flex dark:text-white rounded-lg border border-gray-700 p-4">
                <span x-on:mouseup="captureHighlightedText()" >{{ $page }}</span>
            </span>
            @else
            <span class="flex dark:text-white rounded-lg border border-gray-700 p-4">
                <span>{{ $context }}</span>
            </span>
            @endif
        </div>
        <div class="m-6">
            <span class="whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-sm text-gray-900">
                Page number: {{ $pageNumber }}
            </span>
        </div>
        <div class="m-6">
            <span>
                <button
                    wire:click="updatePage"
                    x-data="{ isLoading: false }"
                    x-on:click="isLoading=true; setTimeout(() => { isLoading = false; }, 1500)"
                    class="inline-block rounded border border-indigo-600 bg-indigo-600 px-16 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 float-left"
                >
                    <span x-show="!isLoading">
                        New Page
                    </span>
                    <span x-show="isLoading" class="flex items-center">
                        <svg class="animate-spin h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3v1.4a6 6 0 1 0 0 11.2 6 6 0 0 0 0-11.2zM4 10a6 6 0 1 1 12 0 6 6 0 0 1-12 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                        Loading...
                    </span>
                </button>
                {{-- feature is disabled for now --}}
                @if(!$context)
                <button
                    wire:click="getContext"
                    x-data="{ isLoading: false }"
                    x-on:click="isLoading=true; setTimeout(() => { isLoading = false; }, 10000)"
                    class="inline-block rounded border border-orange-500 bg-orange-500 px-16 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 float-right"
                >
                    <span x-show="!isLoading">
                        Get Context
                    </span>
                    <span x-show="isLoading" class="flex items-center">
                        <svg class="animate-spin h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 3v1.4a6 6 0 1 0 0 11.2 6 6 0 0 0 0-11.2zM4 10a6 6 0 1 1 12 0 6 6 0 0 1-12 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                        Loading...
                    </span>
                </button>
                @endif
            </span>
        </div>
    </div>
</div>
<script>
    function captureHighlightedText() {
        const highlightedText = window.getSelection().toString()
        Livewire.dispatch('highlighted-text-changed', { highlightedText: highlightedText });
    }
    Livewire.on('no-highlighted-text', () => {
        console.log('no highlighted text!');
        Alpine.store('showError', true);
        Alpine.store('isLoading', false);
    });
</script>
