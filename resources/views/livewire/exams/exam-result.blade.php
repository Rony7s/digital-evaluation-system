<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Exam Results</h1>
    <p class="mb-2">Exam Code: {{ $examCode }}</p>
    <p class="mb-4">Exam Name: {{ $examName }}</p>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Student ID</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Score</th>
                <th class="border px-4 py-2">Total</th>
                <th class="border px-4 py-2">Comment</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $index => $result)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $result['student_id'] }}</td>
                    <td class="border px-4 py-2">{{ $result['student_email'] }}</td>
                    <td class="border px-4 py-2 font-semibold">{{ $result['score'] }}</td>
                    <td class="border px-4 py-2">{{ $result['total'] }}</td>
                    <td class="border px-4 py-2">{{ $result['comment'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">No submissions yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
