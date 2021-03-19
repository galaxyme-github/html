<?php
    $foodtruck_galleries = !empty($foodtruck_details['gallery']) ? json_decode($foodtruck_details['gallery']) : [];
 ?>
<div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php for ($counter = 0; $counter < 6; $counter++): ?>
                <div class="swiper-slide">
                    <?php $gallery_image = isset($foodtruck_galleries[$counter]) ? $foodtruck_galleries[$counter] : "placeholder.png"; ?>
                    <a href="<?php echo base_url('uploads/foodtruck/gallery/'.sanitize($gallery_image)); ?>" class="grid image-link">
                        <img src="<?php echo base_url('uploads/foodtruck/gallery/'.sanitize($gallery_image)); ?>" class="img-fluid" alt="#">
                    </a>
                </div>
            <?php endfor; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</div>
