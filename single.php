<?php
$project_group = get_field('project_group');
$project_content = get_field('project_content');
$project_image_slider = get_field('project_image_slider');
$recent_project_title = get_field('recent_project_title');
$category = get_the_category();
?>
<div class="bg-edf4f3">

<div class="project-sub-hero-section bg-edf4f3">
    <img class="h-100 w-100 object-cover" src=" <?php echo get_the_post_thumbnail_url(); ?>" alt="Hero Image">
</div>

<section class="project-open-content-section bg-edf4f3 tpt-65 tpb-85 dpt-125 dpb-140">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <?php if (!empty($project_group)):
                    $content_group = $project_group['content_group'];
                ?>
                    <?php
                    foreach ($content_group as $group):
                        $title = $group['title'];
                        $content = $group['content'];
                    ?>
                        <div class="dmb-30">
                            <?php if(!empty($title)):?>
                                <div class="sans-normal font24 leading28 res-font20 res-leading24 text-f07a47 fw-semibold dmb-5"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if(!empty($content)):?>
                                <div class="sans-normal font24 leading28 res-font20 res-leading24 text-06556c text-capitalize">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="col-lg-7 ps-lg-5 pe-lg-3 tmt-20">
                <?php if(!empty($project_content)):?>
                    <div class="project-desc-content text-000b18">
                        <?php echo $project_content; ?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<?php if (!empty($project_image_slider)): ?>
        <?php $image_count = count($project_image_slider); ?>
    <section class="project-image-slider-section position-relative bg-edf4f3 dmb-90 overflow-hidden">
        <div class="container">
            <div class="col-9 col-lg-11 mx-auto">
                <div class="project-slider">
                    <?php if (!empty($project_image_slider)) : ?>
                        <?php foreach ($project_image_slider as $slider) :
                            $image = $slider['image'];
                            if (!$image) continue;
                        ?>
                                <a href="<?php echo esc_url($image['url']); ?>"
                                    data-fancybox="project-gallery"
                                    class="h-100">
                                    <img
                                        src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt'] ?? 'Project Image'); ?>"
                                        class="w-100 h-100 object-cover">
                                </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($image_count > 3): ?>
                <div class="slick-wrap position-absolute top-0 start-0 end-0 bottom-0 w-100 h-100 d-flex align-items-center justify-content-between z-3">
                    <button class="slick-arrows prev-arrow d-flex align-items-center justify-content-center rounded-circle border-0 bg-f07a47">
                        <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-arrow.svg" alt="Slick Arrow">
                    </button>
                    <button class="slick-arrows next-arrow d-flex align-items-center justify-content-center rounded-circle border-0 bg-f07a47">
                        <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-arrow.svg" alt="Slick Arrow">
                    </button>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<section class="related-project-slider-section bg-edf4f3 overflow-hidden tpb-60 dpb-100">
        <div class="container">
            <div class="row d-flex tmb-30 dmb-45">
                <div class="col-lg-6 col-8">
                    <?php if(!empty($recent_project_title)):?>
                        <div class="sans-medium font48 leading53 space0_96 res-font30 res-leading32 res-space-0_6 text-06556c p-0">
                            <?php echo $recent_project_title; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6 col-4 d-flex align-items-end justify-content-end">
                    <?php
                    $current_post_id = get_the_ID();
                    $args = array(
                        'post_type' => 'post',
                        'order' => 'ASC',
                        'orderby' => 'date',
                        'posts_per_page' => -1,
                        'post__not_in'   => array($current_post_id),
                    );
                    $the_query = new WP_Query($args);
                    $post_count = $the_query->post_count;
                ?>
                    <?php if ($post_count > 2): ?>
                        <div class="slick-arrow-wrapper d-flex pe-lg-4 pe-0">
                            <button class="slick-arrows prev-arrow d-flex justify-content-center align-items-center rounded-circle bg-transparent transition me-1">
                                <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/light-arrow.svg" alt="Slick Arrow">
                            </button>
                            <button class="slick-arrows next-arrow d-flex justify-content-center align-items-center rounded-circle bg-transparent transition">
                                <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/light-arrow.svg" alt="Slick Arrow">
                            </button>
                        </div>
                    <?php endif; ?>
                    <a class="btnA bg-06556C-dark-text-btn sans-medium font15 leading61 d-none d-lg-inline-flex justify-content-center align-items-center text-decoration-none transition" href="/project/">View All</a>
                </div>
            </div>
                <div class="related-project-slider">
                        <?php
                        $current_post_id = get_the_ID();
                        $args = array(
                            'post_type' => 'post',
                            'order' => 'ASC',
                            'orderby' => 'date',
                            'posts_per_page' => -1,
                            'post__not_in'   => array($current_post_id),
                        );
                        $the_query = new WP_Query($args);

                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                                <div class="position-relative related-project-card radius10 overflow-hidden">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <div class="related-project-img radius10 overflow-hidden">
                                            <div class="card-layer position-absolute w-100 bottom-0"></div>
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="w-100 h-100 object-cover"
                                                alt="Project Image">
                                        </div>
                                        <div class="related-project-title position-absolute bottom-0 start-0 ms-5 dmb-45 sans-semibold font29 leading22 text-white">
                                            <div class="">
                                                <?php echo get_the_title(); ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php endwhile;
                        endif;
                        wp_reset_query(); ?>
                    </div>
    </div>
</section>
</div>
