<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Join Quiz</h2>

    @if ($error)
        <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
            {{ $error }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="joinQuiz">
        <div class="mb-4">
            <label for="examCode" class="block font-medium">Exam Code</label>
            <input type="text" id="examCode" wire:model="examCode" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="studentPass" class="block font-medium">Student Password</label>
            <input type="password" id="studentPass" wire:model="studentPass" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="studentId" class="block font-medium">Student ID</label>
            <input type="text" id="studentId" wire:model="studentId" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Join</button>
    </form>
</div>