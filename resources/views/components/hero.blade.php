<!-- Hero Section -->
<section class="relative h-[600px] overflow-hidden">
    <div class="absolute inset-0">
        <div class="relative w-full h-full">
            <!-- Swiper Container -->
            <div class="swiper-container h-full">
                <div class="swiper-wrapper h-full">
                    <!-- Swiper Slides -->
                    @foreach (['image1.jpg', '2.jpg', 'image3.jpg', '4.jpg', '5.jpg'] as $index => $image)
                        <div class="swiper-slide h-full transition-transform duration-700 ease-in-out">
                            <img src="{{ asset("images/$image") }}" alt="Image {{ $index + 1 }}" class="w-full h-full object-cover opacity-90 hover:opacity-100 transition-opacity duration-500"/>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Dots -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- Inclure le CSS de Swiper -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Inclure le JS de Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            speed: 700,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000, 
                disableOnInteraction: false,
            },
            effect: 'fade', 
        });
    });
</script>
