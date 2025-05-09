    <style>

        .slider-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .slider-wrapper .slider {
            width: 100%;
            height: 350px;
            overflow: hidden;
            /* border: 3px solid #000; */
            border-radius: 10px;
        }

        .slider-wrapper .slider .slider-track {
            display: flex;
            height: inherit;
            transition: transform 0.8s;
        }

        .slider-wrapper .slider .slider-track img {
            min-width: calc(100% + 2px);
            object-fit: fill;
        }

        .slider-wrapper .btn {
            user-select: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 500px) {
            .slider-wrapper .slider {
           width: 100%;
        }
         .slider-wrapper .slider .slider-track img {
            min-width: calc(100% + 2px);
            object-fit: contain;
        }

        }
    </style>


<body>
    <div class='slider-wrapper'>
        {{-- <span class="material-symbols-outlined btn prev">arrow_back_ios</span> --}}
        <div class='slider'>
            <div class='slider-track'>
                <img
                    src='{{ asset('frontend/assets/images/slider-images/CBL-Banner.webp') }}'>
                <img
                    src='{{ asset('frontend/assets/images/slider-images/SurfExcel-PNBanner.webp') }}'>
                <img src='{{ asset('frontend/assets/images/slider-images/PepsiPNbanner.webp') }}'>
                <img
                    src='{{ asset('frontend/assets/images/slider-images/National-Banner.webp') }}'>
            </div>
        </div>
        {{-- <span class="material-symbols-outlined btn next">arrow_forward_ios</span> --}}
    </div>
<br>
<script>
    const track = document.querySelector('.slider-track');
    const images = document.querySelectorAll('.slider-track > img');
    let i = 0;
    let isTransitioning = false;

    // Clone first image and append
    const firstClone = images[0].cloneNode(true);
    track.appendChild(firstClone);

    const slideTo = (index) => {
        track.style.transition = 'transform 0.8s';
        track.style.transform = `translateX(-${images[0].offsetWidth * index}px)`;
    };

    function updateSlide(dir) {
        if (isTransitioning) return;
        isTransitioning = true;

        if (dir === 'next') {
            i++;
            slideTo(i);
        } else if (dir === 'prev') {
            i--;
            if (i < 0) {
                track.style.transition = 'none';
                i = images.length - 1;
                track.style.transform = `translateX(-${images[0].offsetWidth * i}px)`;
                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        i--;
                        slideTo(i);
                    });
                });
                isTransitioning = false;
                return;
            }
            slideTo(i);
        }
    }

    track.addEventListener('transitionend', () => {
        if (i === images.length) {
            // Reset without animation
            track.style.transition = 'none';
            i = 0;
            track.style.transform = `translateX(0px)`;
        }
        isTransitioning = false;
    });

    document.addEventListener('click', (e) => {
        if (e.target.matches('.next')) updateSlide('next');
        if (e.target.matches('.prev')) updateSlide('prev');
    });

    // Auto slide
    setInterval(() => {
        updateSlide('next');
    }, 3000);
</script>

</body>