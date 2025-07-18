<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">
        {{ $questionId ? __('Edit Question') : __('Question Create') }}
    </flux:heading>
    <flux:subheading size="lg" class="mb-6">
        {{ $questionId ? __('Update existing question') : __('Add Question here') }}
    </flux:subheading>
    <flux:separator variant="subtle" />

    <!-- Flash message -->
    @if (session()->has('message'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800 border border-green-300">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:p-8">
        <form wire:submit.prevent="submit" class="space-y-6">

            <!-- Question Type -->
            <div>
                <label for="questionType" class="block text-sm font-medium text-gray-700 mb-1">Question Type</label>
                <div class="relative">
                    <select id="questionType" wire:model="questionType"
                        class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
                        focus:ring-2 focus:ring-blue-200 focus:border-blue-500 appearance-none
                        bg-[url('data:image/svg+xml;base64,...')] bg-no-repeat bg-[right_1rem_center] bg-[length:1.5rem]">
                        <option value="">-- Select Type --</option>
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-4 top-3.5 text-gray-400 pointer-events-none"></i>
                </div>
                @error('questionType') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Question Text -->
            <div>
                <label for="questionText" class="block text-sm font-medium text-gray-700 mb-1">Question Text</label>
                <input type="text" id="questionText" wire:model="questionText" placeholder="Enter your question"
                    class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
                    focus:ring-2 focus:ring-blue-200 focus:border-blue-500">
                @error('questionText') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Options -->
            <div class="pt-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Options</label>
                <div class="space-y-3">

                    <div class="option-input flex items-center border border-gray-300 rounded-lg focus-within:border-blue-500">
                        <div class="bg-gray-100 text-gray-500 px-4 py-2.5 rounded-l-lg border-r border-gray-300">A</div>
                        <input type="text" wire:model="options1" placeholder="Option 1" class="w-full py-2.5 px-4 rounded-r-lg focus:outline-none">
                    </div>
                    @error("options1") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <div class="option-input flex items-center border border-gray-300 rounded-lg focus-within:border-blue-500">
                        <div class="bg-gray-100 text-gray-500 px-4 py-2.5 rounded-l-lg border-r border-gray-300">B</div>
                        <input type="text" wire:model="options2" placeholder="Option 2" class="w-full py-2.5 px-4 rounded-r-lg focus:outline-none">
                    </div>
                    @error("options2") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <div class="option-input flex items-center border border-gray-300 rounded-lg focus-within:border-blue-500">
                        <div class="bg-gray-100 text-gray-500 px-4 py-2.5 rounded-l-lg border-r border-gray-300">C</div>
                        <input type="text" wire:model="options3" placeholder="Option 3" class="w-full py-2.5 px-4 rounded-r-lg focus:outline-none">
                    </div>
                    @error("options3") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                    <div class="option-input flex items-center border border-gray-300 rounded-lg focus-within:border-blue-500">
                        <div class="bg-gray-100 text-gray-500 px-4 py-2.5 rounded-l-lg border-r border-gray-300">D</div>
                        <input type="text" wire:model="options4" placeholder="Option 4" class="w-full py-2.5 px-4 rounded-r-lg focus:outline-none">
                    </div>
                    @error("options4") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                </div>
            </div>

            <!-- Right Answer -->
            <div class="pt-2">
                <label class="block text-sm font-medium text-gray-700 mb-3">Right Answer</label>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">

                    <div class="flex items-center">
                        <input type="radio" id="answer1" value="a" wire:model="rightAnswer"
                            class="h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="answer1" class="ml-2 text-gray-700">Option A</label>
                    </div>

                    <div class="flex items-center">
                        <input type="radio" id="answer2" value="b" wire:model="rightAnswer"
                            class="h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="answer2" class="ml-2 text-gray-700">Option B</label>
                    </div>

                    <div class="flex items-center">
                        <input type="radio" id="answer3" value="c" wire:model="rightAnswer"
                            class="h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="answer3" class="ml-2 text-gray-700">Option C</label>
                    </div>

                    <div class="flex items-center">
                        <input type="radio" id="answer4" value="d" wire:model="rightAnswer"
                            class="h-5 w-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <label for="answer4" class="ml-2 text-gray-700">Option D</label>
                    </div>

                </div>
                @error('rightAnswer') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>



            <!-- Comment -->
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Comment (Optional)</label>
                <textarea id="comment" wire:model="comment" rows="3"
                    class="w-full py-2.5 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                    placeholder="Optional explanation or note..."></textarea>
                @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 
                    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
                    transition flex items-center justify-center w-full sm:w-auto">
                    <i class="fas fa-save mr-2"></i>
                    {{ $questionId ? 'Update Question' : 'Add Question' }}
                </button>
            </div>
        </form>
    </div>
</div>
