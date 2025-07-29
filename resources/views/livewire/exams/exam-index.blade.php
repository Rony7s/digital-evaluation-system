<div class="relative mb-6 w-full">
    <h1 class="text-2xl font-bold">{{ __('Exams') }}</h1>
    <p class="text-lg text-gray-600 mb-6">{{ __('Manage your Exams') }}</p>
    <hr class="mb-4 border-gray-300" />

    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('exam.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>
            {{ __('Create new Exam') }}
        </a>

        <input
            type="text"
            wire:model.debounce.500ms="search"
            placeholder="{{ __('Search Exams') }}"
            class="border border-gray-300 rounded px-3 py-2 w-full max-w-xs"
            id="searchInput"
        />
    </div>

    <table class="mt-4 w-full border-collapse" id="questionsTable">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Exam Code</th>
                <th class="border px-4 py-2">Exam Name</th>
                {{-- <th class="border px-4 py-2">Teacher Email</th> --}}
                <th class="border px-4 py-2">Teacher Password</th>
                <th class="border px-4 py-2">Student Password</th>
                <th class="border px-4 py-2">Exam Start</th>
                <th class="border px-4 py-2">Duration</th>
                <th class="border px-4 py-2">Questions IDs</th>
                <th class="border px-4 py-2">Comment</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $index => $exam)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $exam->examCode }}</td>
                    <td class="border px-4 py-2">{{ $exam->examName }}</td>
                    {{-- <td class="border px-4 py-2">{{ $exam->teacherEmail }}</td> --}}
                    <td class="border px-4 py-2">{{ $exam->teacherPass }}</td>
                    <td class="border px-4 py-2">{{ $exam->studentPass }}</td>
                    <td class="border px-4 py-2">{{ $exam->examStart->format('Y-m-d H:i') }}</td>
                    <td class="border px-4 py-2">{{ $exam->duration }}</td>
                    <td class="border px-4 py-2">
                        @if (is_array($exam->questionsIds))
                            @foreach($exam->questionsIds as $qid)
                                <span>{{ $qid }},</span>
                            @endforeach
                        @else
                            <span class="text-gray-400 text-sm italic">No questions</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $exam->comment ?? '-' }}</td>
                    <td class="border px-4 py-2">
                        <button
                            wire:click="deleteExam({{ $exam->id }})"
                            class="text-red-600 hover:underline"
                            onclick="return confirm('Are you sure you want to delete this exam?')"
                        >Delete</button>
                        <a href="{{ route('exam.edit', $exam->id) }}" class="text-blue-600 hover:underline">{{ __('Edit') }}</a>
                        <a href="{{ route('exam.result', $exam->id) }}" class="text-blue-600 hover:underline">{{ __('Result') }}</a>

                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#questionsTable tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
