 <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:flex-col sm:justify-center sm:items-center dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
    <div class="text-center w-1/2">
        <div class="m-6">
            <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Homer's Odyssey</h1>
        </div>
        <div class="m-6">
            <p class="dark:text-white block h-full rounded-lg border border-gray-700 p-4">{{ $page }}</p>
        </div>
        <div class="m-6">
            <span class="whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-sm text-gray-900">
                Page number: {{ $pageNumber }}
            </span>
        </div>
        <div class="m-6">
            <button
                wire:click="updatePage"
                x-data="{ isLoading: false }"
                x-on:click="isLoading=true; setTimeout(() => { isLoading = false; }, 1500)"
                class="inline-block rounded border border-indigo-600 bg-indigo-600 px-16 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
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
        </div>
    </div>
</div>
