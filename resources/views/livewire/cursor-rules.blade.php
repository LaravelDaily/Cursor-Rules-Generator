<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex flex-col md:flex-row gap-6">
                <!-- Left side: Parameters -->
                <div class="w-full md:w-1/2">
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4">Parameters</h2>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                PHP Version
                            </label>
                            
                            <div class="mt-2 space-y-2">
                                @foreach($phpVersions as $key => $version)
                                    <div class="flex items-center">
                                        <input 
                                            id="php-version-{{ $key }}" 
                                            wire:model.live="phpVersion" 
                                            type="radio" 
                                            value="{{ $key }}" 
                                            class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                        >
                                        <label for="php-version-{{ $key }}" class="ml-2 block text-sm text-gray-700">
                                            {{ $version }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right side: Textarea -->
                <div class="w-full md:w-1/2">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Generated Rules</h2>
                        <textarea 
                            class="w-full h-64 p-2 border border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            wire:model="rulesText"
                            readonly
                        ></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 