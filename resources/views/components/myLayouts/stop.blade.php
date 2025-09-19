<p id="quiz-timer" class="text-sm text-gray-500">{{ $duration }}:00</p>

<script>
    let timer;
    let time = {{ $duration }} * 60; // duration in seconds
    let countdownEl = document.getElementById("quiz-timer");

    timer = setInterval(() => {
        let min = Math.floor(time / 60);
        let sec = time % 60;

        countdownEl.textContent = min + ":" + (sec < 10 ? "0" + sec : sec);

        time--;

        if (time < 0) {
            clearInterval(timer);
            countdownEl.textContent = "⏰ Time's up!";
            alert("⏰ Time's up! Your quiz time has ended.");
            // Optionally auto-submit quiz form:
            // document.getElementById("quizForm").submit();
        }
    }, 1000);
</script>