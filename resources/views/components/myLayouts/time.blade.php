<div id="clock" class="text-center text-3xl text-gray-600 dark:text-gray-300 space-y-4 p-4">
  <div id="time" class="text-7xl font-semibold tracking-wide">--:--:--</div>
  <div id="date">--/--/----</div>
  <div id="day" class="uppercase tracking-wider text-5xl">---</div>
</div>

<script>
  function updateClock() {
    const now = new Date();

    // Format time
    const time = now.toLocaleTimeString('en-GB'); // "HH:mm:ss"
    
    // Format date (DD/MM/YYYY)
    const date = now.toLocaleDateString('en-GB'); // "DD/MM/YYYY"

    // Format day
    const day = now.toLocaleDateString('en-US', { weekday: 'long' });

    // Inject into DOM
    document.getElementById('time').textContent = time;
    document.getElementById('date').textContent = date;
    document.getElementById('day').textContent = day;
  }

  // Initial call and then every second
  updateClock();
  setInterval(updateClock, 1000);
</script>
