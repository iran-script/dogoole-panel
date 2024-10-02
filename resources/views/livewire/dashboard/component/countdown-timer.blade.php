<div>
    <div id="countdown-{{ $id }}">
        {{ gmdate('H:i:s', $remainingTime) }}
    </div>
</div>
<script>
    document.addEventListener('livewire:init', () => {
        let countdownElement = document.getElementById('countdown-{{ $id }}');
        let remainingTime = @json($remainingTime);

        function updateCountdown() {
            if (remainingTime > 0) {
                remainingTime--;
                let hours = Math.floor(remainingTime / 3600);
                let minutes = Math.floor((remainingTime % 3600) / 60);
                let seconds = remainingTime % 60;

                countdownElement.innerText =
                    String(hours).padStart(2, '0') + ':' +
                    String(minutes).padStart(2, '0') + ':' +
                    String(seconds).padStart(2, '0');
            }
        }

        setInterval(updateCountdown, 1000);
    });
</script>
