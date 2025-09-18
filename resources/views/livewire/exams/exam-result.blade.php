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
    
    {{-- ANalyzed Results --}}
    <h1 style="margin:10px;">Summary</h1>
    <table class="table-auto   border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">NO</th>
                <th class="border px-4 py-2">A</th>
                <th class="border px-4 py-2">B</th>
                <th class="border px-4 py-2">C</th>
                <th class="border px-4 py-2">D</th>
                <th class="border px-4 py-2">X</th>
                <th class="border px-4 py-2">R</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($analyzedResults as $index => $result)
                <tr>
                    <td class="border px-4 py-2">{{ $index+1 }}</td>
                    
                      
                    @if ($result['R'] === 'A')
                        <td class="border px-4 py-2 bg-green-200">{{ $result['A'] }}</td>
                    @else
                        <td class="border px-4 py-2">{{ $result['A'] }}</td>
                    @endif
                    @if ($result['R'] === 'B')
                        <td class="border px-4 py-2 bg-green-200">{{ $result['B'] }}</td>
                    @else
                        <td class="border px-4 py-2">{{ $result['B'] }}</td>
                    @endif
                    @if ($result['R'] === 'C')
                        <td class="border px-4 py-2 bg-green-200">{{ $result['C'] }}</td>
                    @else
                        <td class="border px-4 py-2">{{ $result['C'] }}</td>
                    @endif
                    @if ($result['R'] === 'D')
                        <td class="border px-4 py-2 bg-green-200">{{ $result['D'] }}</td>
                    @else
                        <td class="border px-4 py-2">{{ $result['D'] }}</td>
                    @endif
                    <td class="border px-4 py-2">{{ $result['X'] }}</td>
                    <td class="border px-4 py-2">{{ $result['R'] }}</td>
                </tr> 
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">No submissions yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- ANalyzed Results --}}
    <table class="table-auto   border-collapse border border-gray-300">
        <h1 style="margin:10px;">Parsentage</h1>
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">NO</th>
                <th class="border px-4 py-2">A</th>
                <th class="border px-4 py-2">B</th>
                <th class="border px-4 py-2">C</th>
                <th class="border px-4 py-2">D</th>
                <th class="border px-4 py-2">X</th>
                <th class="border px-4 py-2">R</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($analyzedResults as $index => $result)
                <tr>
                    <td class="border px-4 py-2">{{ $index+1 }}</td>
                      
                    @if ($result['R'] === 'A')
                        <td class="border px-4 py-2 bg-green-200">{{ round(($result['A'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @else
                        <td class="border px-4 py-2">{{ round(($result['A'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @endif
                    @if ($result['R'] === 'B')
                        <td class="border px-4 py-2 bg-green-200">{{ round(($result['B'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @else
                        <td class="border px-4 py-2">{{ round(($result['B'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @endif
                    @if ($result['R'] === 'C')
                        <td class="border px-4 py-2 bg-green-200">{{ round(($result['C'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @else
                        <td class="border px-4 py-2">{{ round(($result['C'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @endif
                    @if ($result['R'] === 'D')
                        <td class="border px-4 py-2 bg-green-200">{{ round(($result['D'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @else
                        <td class="border px-4 py-2">{{ round(($result['D'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>
                    @endif
                    <td class="border px-4 py-2">{{  round(($result['X'] / ($result['A']+$result['B']+$result['C']+$result['D']+$result['X'])) * 100, 2) . '%' }}</td>

                    <td class="border px-4 py-2">{{ $result['R'] }}</td>
                </tr> 
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">No submissions yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        <a href="{{ route('exams.index') }}" class="text-blue-500 hover:underline">Back to Exams</a>
    </div>
</div>
