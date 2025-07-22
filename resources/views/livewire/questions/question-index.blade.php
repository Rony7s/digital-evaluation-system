<div class="relative mb-6 w-full">
    <h1 class="text-2xl font-bold">{{ __('Questions') }}</h1>
    <p class="text-lg text-gray-600 mb-6">{{ __('Manage your Questions Bank') }}</p>
    <hr class="mb-4 border-gray-300" />

    <div class="flex items-center justify-between">
        <a href="{{ route('questions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>
            {{ __('Add Question') }}
        </a>

        <input
            type="text"
            wire:model.debounce.500ms="search"
            placeholder="{{ __('Search Questions') }}"
            class="border border-gray-300 rounded px-3 py-2 w-full max-w-xs"
            id="searchInput"
        />
    </div>

    <table class="mt-4 w-full border-collapse" id="questionsTable">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">{{ __('No') }}</th>
                <th class="border px-4 py-2">{{ __('Question Type') }}</th>
                <th class="border px-4 py-2">{{ __('Question Text') }}</th>
                <th class="border px-4 py-2">{{ __('Question Comment') }}</th>
                <th class="border px-4 py-2">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr>
                <td class="border px-4 py-2">{{ $question->id }}</td>
                <td class="border px-4 py-2">{{ $question->questionType }}</td>
                <td class="border px-4 py-2">{{ $question->questionText }}</td>
                <td class="border px-4 py-2">{{ $question->comment ?? '-' }}</td>
                    <td class="border px-4 py-2">

                        <a href="{{ route('questions.edit', $question->id) }}" class="text-blue-600 hover:underline">
                            {{ __('Edit') }}
                        </a>
                        <button wire:click="deleteQuestion({{ $question->id }})" wire:confirm="Are you sure Delete it?" class="text-red-600 hover:underline ml-2">
                            {{ __('Delete') }}
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
</div>

<script>
  document.getElementById('searchInput').addEventListener('input', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#questionsTable tbody tr');

    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      if(text.includes(filter)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>