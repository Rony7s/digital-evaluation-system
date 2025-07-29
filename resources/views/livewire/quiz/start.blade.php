<div class="relative mb-6 w-full">
  <h1 class="text-2xl font-bold">{{ __('Exam Time') }}</h1>
  <p class="text-lg text-gray-600 mb-6">{{ __('This is quiz time') }}</p>

  @if (session()->has('message'))
    <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800 border border-green-300">
      {{ session('message') }}
    </div>
  @endif

  <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 md:p-8 mb-6">
    <div class="space-y-2 mb-4">
      <p><span class="text-xl font-semibold text-gray-700">Exam Code:</span> {{ $examCode }}</p>
      <p><span class="text-xl font-semibold text-gray-700">Student ID:</span> {{ $studentId }}</p>
      <p class="text-sm text-gray-500">{{ $duration }} minutes left</p>
    </div>

    <form wire:submit.prevent="submitQuiz1" class="space-y-8">
      @foreach ($questions as $question)
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 space-y-3">
          <h3 class="font-semibold text-lg text-gray-800">{{ $question->questionText }}</h3>
          <ul class="space-y-2">
            @foreach (['A', 'B', 'C', 'D'] as $option)
              @php $optionKey = 'option' . (array_search($option, ['A','B','C','D']) + 1); @endphp
              <li>
                <label class="inline-flex items-center">
                  <input type="radio"
                         name="answers[{{ $question->id }}]"  {{-- ✅ Important fix --}}
                         wire:model="answers.{{ $question->id }}"
                         value="{{ $option }}"
                         class="mr-2">
                  {{ $question->$optionKey }}
                </label>
              </li>
            @endforeach
          </ul>

          <!-- Clear Button -->
          <button 
            type="button"
            class="text-sm text-red-500 hover:underline mt-2"
            onclick="clearAnswer('{{ $question->id }}')"
          >
            Clear Answer
          </button>

          <!-- Optional Debug Info -->
          {{-- <div class="mt-3 text-sm text-gray-500">
            <p><strong>Answer:</strong> {{ strtoupper($question->answer) }}</p>
            <p><strong>Comment:</strong> {{ $question->comment }}</p>
          </div> --}}
          
        </div>
      @endforeach

      <!-- Comment Section -->
      <div>
        <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Comment (optional)</label>
        <textarea id="comment" wire:model.lazy="comment" rows="3"
          class="w-full py-2.5 px-4 border border-gray-300 rounded-lg 
          focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
          placeholder="Optional notes or instructions..."></textarea>
        @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <!-- Submit -->
      <div>
        <button type="submit"
          class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 
          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 
          transition w-full sm:w-auto">
          Submit Quiz
        </button>
      </div>
    </form>
  </div>
</div>

<!-- ✅ JavaScript for Clear Answer -->
<script>
  function clearAnswer(questionId) {
    const radios = document.getElementsByName(`answers[${questionId}]`);
    radios.forEach(radio => radio.checked = false);

    // Update Livewire model
    window.livewire.find(document.querySelector('[wire\\:id]').getAttribute('wire:id'))
      .set(`answers.${questionId}`, null);
  }
</script>
