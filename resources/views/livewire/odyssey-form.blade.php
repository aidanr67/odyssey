 <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:flex-col sm:justify-center sm:items-center dark:bg-gray-900 selection:bg-indigo-500 selection:text-white">
    <div class="text-center">
        <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Homer's Odyssey</h1>
        <p class="dark:text-white">{{ $page }}</p>
        <button
            wire:click="updatePage"
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">New Page</button>
    </div>
</div>
