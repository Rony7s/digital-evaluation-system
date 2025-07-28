<div class="relative mb-6 w-full">
  <flux:heading size="xl" level="1">{{ __('Create Exam') }}</flux:heading>
  <flux:subheading size="lg" class="mb-6">{{ __('Fill in exam details below') }}</flux:subheading>
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

      <!-- Exam Code -->
      <div>
        <label for="examCode" class="block text-sm font-medium text-gray-700 mb-1">Exam Code</label>
        <input type="text" id="examCode" wire:model.lazy="examCode" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('examCode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Exam Name -->
      <div>
        <label for="examName" class="block text-sm font-medium text-gray-700 mb-1">Exam Name</label>
        <input type="text" id="examName" wire:model.lazy="examName" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('examName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Teacher Password -->
      <div>
        <label for="teacherPass" class="block text-sm font-medium text-gray-700 mb-1">Teacher Password</label>
        <input type="password" id="teacherPass" wire:model.lazy="teacherPass" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('teacherPass') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Student Password -->
      <div>
        <label for="studentPass" class="block text-sm font-medium text-gray-700 mb-1">Student Password</label>
        <input type="password" id="studentPass" wire:model.lazy="studentPass" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('studentPass') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Exam Start -->
      <div>
        <label for="examStart" class="block text-sm font-medium text-gray-700 mb-1">Exam Start Date & Time</label>
        <input type="datetime-local" id="examStart" wire:model.lazy="examStart" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('examStart') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Duration -->
      <div>
        <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Duration (minutes)</label>
        <input type="number" id="duration" min="1" wire:model.lazy="duration" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('duration') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Question IDs -->
      <div>
        <label for="questionsIds" class="block text-sm font-medium text-gray-700 mb-1">Question IDs (comma separated)</label>
        <input type="text" id="questionsIds" wire:model.lazy="questionsIdsString" placeholder="e.g. 1,33,22,34"
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" />
        @error('questionsIds') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Comment -->
      <div>
        <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Comment (optional)</label>
        <textarea id="comment" wire:model.lazy="comment" rows="3" 
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500" 
          placeholder="Optional notes or instructions..."></textarea>
        @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Submit Button -->
      <div>
        <button type="submit"
          class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 
          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
          transition w-full sm:w-auto">
          Create Exam
        </button>
      </div>

    </form>
  </div>
</div>
