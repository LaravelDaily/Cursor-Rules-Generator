<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex flex-col md:flex-row gap-6">
                <!-- Left side: Parameters -->
                <div class="w-full md:w-1/2">
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4">Parameters</h2>
                        
                        <!-- PHP Version -->
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

                        <!-- Laravel Version -->
                        <div class="mb-4">
                            <label for="laravel-version" class="block text-gray-700 text-sm font-bold mb-2">
                                Laravel Version
                            </label>
                            <input 
                                id="laravel-version" 
                                wire:model.live="laravelVersion" 
                                type="text" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                        </div>

                        <!-- Code Styling -->
                        <div class="mb-4">
                            <label for="code-styling" class="block text-gray-700 text-sm font-bold mb-2">
                                Code Styling
                            </label>
                            <input 
                                id="code-styling" 
                                wire:model.live="codeStyling" 
                                type="text" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                        </div>

                        <!-- Action/Service -->
                        <div class="mb-4">
                            <label for="action-service" class="block text-gray-700 text-sm font-bold mb-2">
                                Action/Service
                            </label>
                            <select 
                                id="action-service" 
                                wire:model.live="actionOrService" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value="Action">Action</option>
                                <option value="Service">Service</option>
                            </select>
                        </div>

                        <!-- Testing Framework -->
                        <div class="mb-4">
                            <label for="testing-framework" class="block text-gray-700 text-sm font-bold mb-2">
                                Testing Framework
                            </label>
                            <select 
                                id="testing-framework" 
                                wire:model.live="testingFramework" 
                                class="w-full p-2 border border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                                <option value="Pest">Pest</option>
                                <option value="PHPUnit">PHPUnit</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Right side: Textarea -->
                <div class="w-full md:w-1/2">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Generated Rules</h2>
                        <textarea 
                            class="w-full p-2 border border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm" 
                            rows="35"
                            wire:model="rulesText"
                            readonly
                        ></textarea>
                        
                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-4">
                            <button 
                                type="button" 
                                x-data="{}"
                                x-on:click="navigator.clipboard.writeText($wire.rulesText); $el.innerText = 'Copied!'; setTimeout(() => $el.innerText = 'Copy to Clipboard', 2000)"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                            >
                                Copy to Clipboard
                            </button>
                            
                            <button 
                                type="button"
                                x-data="{}"
                                x-on:click="const blob = new Blob([$wire.rulesText], {type: 'text/plain'}); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = 'laravel.mdc'; a.click(); URL.revokeObjectURL(url);"
                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                            >
                                Download as a laravel.mdc File
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 