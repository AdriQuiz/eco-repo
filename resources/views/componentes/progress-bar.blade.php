<div class="circular d-flex justify-content-center align-items-center">
    <div class="inner-pos"></div>
    <div class="outer"></div>
    <div class="numb">0%</div>
    <div class="circle">
        <div class="dot">
            <span></span>
        </div>
        <div class="bar left">
            <div class="progreso"></div>
        </div>
        <div class="bar right">
            <div class="progreso"></div>
        </div>
    </div>
</div>
<script>
    // const numb = document.querySelector(".numb");
    // let counter = 0;
    // setInterval(() => {
    //     if (counter == 100) {
    //         clearInterval();
    //     } else {
    //         counter += 1;
    //         numb.textContent = counter + "%";
    //     }
    // }, 80);

    const progreso = {{ $proyecto->progreso }};
    
    function updateProgress(value) {
            const numb = document.querySelector(".numb");
            const leftProgreso = document.querySelector(".left .progreso");
            const rightProgreso = document.querySelector(".right .progreso");
            const dot = document.querySelector(".dot");

            // Clamp value between 0 and 100
            value = Math.max(0, Math.min(100, value));

            // Update the text content
            numb.textContent = value + "%";

            // Calculate rotation values
            let rotationValue = (value / 100) * 360;
            if (rotationValue <= 180) {
                leftProgreso.style.transform = `rotate(${rotationValue}deg)`;
                rightProgreso.style.transform = 'rotate(0deg)';
                dot.style.transform = `rotate(${rotationValue - 90}deg)`;
            } else {
                leftProgreso.style.transform = 'rotate(180deg)';
                rightProgreso.style.transform = `rotate(${rotationValue - 180}deg)`;
                dot.style.transform = `rotate(${rotationValue - 90}deg)`;
            }
        }

        updateProgress(progreso);
</script>
