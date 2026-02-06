<?php

/* Template Name: Page Builder */

?>
<?php if (have_rows("flexible_content")):
    while (have_rows("flexible_content")):
        the_row(); ?>
        <?php if (get_row_layout() == 'hero_section'):
            $slider_media = get_sub_field('slider_media');
            $hero_title = get_sub_field('hero_title');
            $hero_description = get_sub_field('hero_description');
            $link = get_sub_field('link');
        ?>

            <section class="hero-section position-relative h-vh overflow-hidden">

                <!-- image -->
                <div class="hero-layer position-absolute top-0 start-0 w-100 h-100"></div>
                <!-- <img class="w-100 h-100 object-cover" src="/public/assets/images/hero-img.png" alt=""> -->
                <div class="hero-slider h-100">

                    <?php if (!empty($slider_media)):
                        foreach ($slider_media as $media):
                            $media_type = $media['media_type'];
                            $image = $media['image'];
                            $video = $media['video'];
                            $youtube = $media['youtube'];
                            $vimeo = $media['vimeo'];

                    ?>
                            <?php if ($media_type == 'image' && !empty($image['url'])): ?>
                                <img class="w-100 h-100 object-cover" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title'] ?>">

                            <?php elseif ($media_type == 'video' && !empty($video)): ?>
                                <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                                    class="w-100 h-100 object-cover" data-object-fit="cover">
                                    <source src="<?php echo $video['url'] ?>" data-wf-ignore="true" />
                                </video>

                            <?php elseif ($media_type == 'youtube'): ?>
                                <!-- youtube -->
                                <iframe class="w-100 h-100" src="<?php echo $youtube; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1" frameborder="0" fullscreen autoplay>
                                </iframe>

                            <?php elseif ($media_type == 'vimeo'): ?>
                                <!-- vimeo -->
                                <iframe width="100%" height="100%" class="w-100 h-100 object-cover" src="<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            <?php endif; ?>
                    <?php endforeach;
                    endif; ?>
                </div>

                <div class="position-absolute left-center bottom-0 dmb-80 w-100">
                    <div class="container">
                        <div class="col-6">
                            <div class="sans-medium font61 space0_61 leading61 text-white dmb-10">
                                <?php if (!empty($hero_title)): ?>
                                    <?php echo esc_html($hero_title); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-7 sans-medium font15 leading24 text-white dmb-30">
                                <?php if (!empty($hero_description)): ?>
                                    <?php echo esc_html($hero_description); ?>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($link)): ?>
                                <div class="">
                                    <a class="btnA bg-06556C-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                                        href="<?php echo $link['url']; ?>" target="<?php echo $link["target"] == "_blank" ? "_blank" : ''; ?>"><?php echo $link['title']; ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </section>

        <?php elseif (get_row_layout() == 'image_card_section'):
            $image_group = get_sub_field('image_group');
        ?>
            <section class="masonory-image-section">
                <div class="container">
                    <div class="row row8">

                        <?php if ($image_group):
                            foreach ($image_group as $group):
                                $image = $group['image'];
                                $title = $group['title'];
                                $description = $group['description'];
                                $link = $group['link'];
                        ?>
                                <div class="col-7 image-card dmb-20">
                                    <div class="position-relative radius10 overflow-hidden h-100">
                                        <?php if (!empty($link)): ?>
                                            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] == "_blank" ? "_blank" : ''; ?>">
                                            <?php endif; ?>
                                            <div class="bg-layer bg-00000040 position-absolute bottom-0 start-0 w-100 h-100"></div>
                                            <img class="w-100 h-100 object-cover" src="<?php echo $image['url']; ?>"
                                                alt="Project Image">
                                            <div class="position-absolute bottom-0 start-0 ms-4 dmb-45">
                                                <div class="card-title sans-semibold font32 leading22 text-white text-capitalize">
                                                    <?php echo $title; ?>
                                                </div>
                                            </div>
                                            <div class="position-absolute hover-wrapper bg-f07a47 start-0 h-100 w-100 transition">
                                                <div class="position-absolute bottom-0 px-5 dpb-50">
                                                    <div class="sans-semibold font29 leading22 text-capitalize text-white dmb-10">
                                                        <?php echo $title; ?>
                                                    </div>
                                                    <div class="col-10 sans-medium font16 leading27 text-white dmb-20">
                                                        <?php echo $description; ?>
                                                    </div>
                                                    <div class="btnA bg-white-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center transition">
                                                        View more
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'project_card'):
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $display_post = get_sub_field('display_post');
            $select_post = get_sub_field('select_post');
        ?>
            <section class="masonory-image-section project-card-section bg-edf4f3">
                <div class="container">
                    <div class="row justify-content-between dmb-50">
                        <div class="col-lg-7">
                            <div class="sans-medium font61 space0_61 leading61 text-06556c">
                                <?php if (!empty($title)): ?>
                                    <?php echo esc_html($title); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="sans-medium font15 leading24 text-000b18">
                                <?php if (!empty($description)): ?>
                                    <?php echo esc_html($description); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row row8">

                        <?php if ($display_post == 'all'):
                            $args = array(
                                'post_type' => 'post',
                                'order' => 'DESC',
                                'orderby' => 'date',
                                'posts_per_page' => -1,
                            );
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()):
                                while ($the_query->have_posts()): $the_query->the_post();
                        ?>
                                    <div class="col-7 image-card dmb-20">
                                        <div class="position-relative radius10 overflow-hidden h-100">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <div class="project-bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                                <img class="w-100 h-100 object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                    alt="Project Image">
                                                <div class="card-title position-absolute bottom-0 start-0 ms-4 dmb-45">
                                                    <div class="sans-semibold font32 leading22 text-white text-capitalize">
                                                        <?php echo get_the_title(); ?>
                                                    </div>
                                                </div>

                                                <div class="position-absolute hover-wrapper bg-f07a47 start-0 h-100 w-100 transition">
                                                    <div class="position-absolute bottom-0 px-5 dpb-50">
                                                        <div class="sans-semibold font29 leading22 text-capitalize text-white dmb-10">
                                                            <?php echo get_the_title(); ?>
                                                        </div>
                                                        <div class="col-10 sans-medium font16 leading27 text-white dmb-20">
                                                            <?php echo get_the_content(); ?>
                                                        </div>
                                                        <div class="btnA bg-white-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center transition">
                                                            View more
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata();

                        elseif ($display_post == 'select' && !empty($select_post)):
                            foreach ($select_post as $posts):
                                $id = $select_news_data->ID;
                                $link = get_permalink($id);
                                $title = get_the_title($id);
                                $content = get_the_content(null, false, $id);
                                $image = get_the_post_thumbnail_url($id);
                                ?>
                                <div class="col-7 image-card dmb-20">
                                    <div class="position-relative radius10 overflow-hidden h-100">
                                        <a href="<?php echo $link; ?>">
                                            <div class="project-bg-layer position-absolute bottom-0 start-0 w-100"></div>
                                            <img class="w-100 h-100 object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="Project Image">
                                            <div class="card-title position-absolute bottom-0 start-0 ms-4 dmb-45">
                                                <div class="sans-semibold font32 leading22 text-white text-capitalize">
                                                    <?php echo $title; ?>
                                                </div>
                                            </div>

                                            <div class="position-absolute hover-wrapper bg-f07a47 start-0 h-100 w-100 transition">
                                                <div class="position-absolute bottom-0 px-5 dpb-50">
                                                    <div class="sans-semibold font29 leading22 text-capitalize text-white dmb-10">
                                                        <?php echo $title; ?>
                                                    </div>
                                                    <div class="col-10 sans-medium font16 leading27 text-white dmb-20">
                                                        <?php echo $content; ?>
                                                    </div>
                                                    <div class="btnA bg-white-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center transition">
                                                        View more
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'sub_hero_section'):
            $media_type = get_sub_field('media_type');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $youtube = get_sub_field('youtube');
            $vimeo = get_sub_field('vimeo');
        ?>

            <section class="sub-hero-section position-relative">
                <div class="sub-bg-layer position-absolute top-0 start-0 w-100 h-100"></div>
                <?php if (!empty($media_type == 'image')): ?>
                    <img class="h-100 w-100 object-cover" src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                <?php endif; ?>
                <div class="position-absolute bottom-0 dmb-75 start-0 w-100">
                    <div class="container">
                        <div class="sans-medium font61 space0_61 leading61 text-white text-capitalize">
                            <?php echo get_the_title(); ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left-right_content_section'):
            $title = get_sub_field('title');
            $content = get_sub_field('content');
        ?>

            <section class="about-content-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <?php if (!empty($title)): ?>
                            <div class="col-lg-6">
                                <div class="sans-medium font35 leading46 text-06556c pe-5">
                                    <?php echo $title; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($content)): ?>
                            <div class="col-lg-5">
                                <div class="sans-medium font15 leading24 text-000b18 dmb-20">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'our_team_section'):
            $title = get_sub_field('title');
            $team_content = get_sub_field('team_content');
            $half_curve = get_sub_field('half_curve');
            $team_card = get_sub_field('team_card');
            $link = get_sub_field('link');
        ?>

            <section class="team-slider-section bg-edf4f3 dpt-90 <?php if ($half_curve == 'yes'): echo 'half-curve'; ?><?php endif; ?>">
                <div class="container">
                    <div class="row dmb-45">
                        <?php if (!empty($title)): ?>
                            <div class="col-lg-6">
                                <div class="sans-medium font48 leading44 space0_96 text-06556c col-6"><?php echo $title; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($team_content == 'slider'): ?>
                            <div class="col-lg-6 d-flex align-items-end justify-content-end">
                                <div class="slick-arrow-wrapper d-flex pe-4">
                                    <button class="slick-arrows prev-arrow d-flex justify-content-center align-items-center rounded-circle transition bg-transparent me-1">
                                        <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/light-arrow.svg" alt="Slick Arrow">
                                    </button>
                                    <button class="slick-arrows next-arrow d-flex justify-content-center align-items-center rounded-circle transition bg-transparent">
                                        <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/light-arrow.svg" alt="Slick Arrow">
                                    </button>
                                </div>
                                <a class="btnA bg-06556C-dark-text-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                                    href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($team_content == 'slider'): ?>
                        <div class="team-slider">
                            <?php foreach ($team_card as $team):
                                $image = $team['image'];
                                $name = $team['name'];
                                $job_title = $team['job_title'];
                            ?>
                                <div class="team-card bg-3db4c0 position-relative radius10 overflow-hidden">
                                    <div class="bg-layer bg-06556c position-absolute bottom-0 w-100"></div>
                                    <div class="team-card-img position-absolute bottom-0 w-100">
                                        <?php if (!empty($image)): ?>
                                            <img src="<?php echo $image['url']; ?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="team-card-title dmt-30 ms-4 position-absolute bg-4bbbc4">
                                        <?php if (!empty($name)): ?>
                                            <div class="sans-medium font29 leading29 text-white text-capitalize"><?php echo $name; ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($job_title)): ?>
                                            <div class="sans-medium font21 leading35 text-white text-capitalize"><?php echo $job_title; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php elseif ($team_content == 'card'): ?>
                        <div class="row row8">
                            <?php foreach ($team_card as $team):
                                $image = $team['image'];
                                $name = $team['name'];
                                $job_title = $team['job_title'];
                            ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 dmb-15">
                                    <div class="team-card bg-3db4c0 position-relative radius10 overflow-hidden">
                                        <div class="bg-layer bg-06556c position-absolute bottom-0 w-100"></div>
                                        <?php if (!empty($image)): ?>
                                            <div class="team-card-img position-absolute bottom-0 w-100">
                                                <img src="<?php echo $image['url']; ?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title']; ?>">
                                            </div>
                                        <?php endif; ?>
                                        <div class="team-card-title dmt-30 ms-4 position-absolute bg-4bbbc4">
                                            <?php if (!empty($name)): ?>
                                                <div class="sans-medium font29 leading29 text-white text-capitalize"><?php echo $name; ?></div>
                                            <?php endif; ?>
                                            <?php if (!empty($job_title)): ?>
                                                <div class="sans-medium font21 leading35 text-white text-capitalize"><?php echo $job_title; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'divider'):
            $divider_color = get_sub_field('divider_color');
        ?>
            <div class="divider" style="background-color: <?php echo $divider_color; ?>"></div>

        <?php elseif (get_row_layout() == 'left_right_accordion_section'):
            $accordion_content = get_sub_field('accordion_content');
            $about_content = get_sub_field('about_content');
        ?>
            <section class="left-accordion-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 services-accordion">
                            <?php if (!empty($accordion_content)):
                                foreach ($accordion_content as $accordion):
                                    $title = $accordion['title'];
                                    $description = $accordion['description'];
                            ?>
                                    <div class="closet-item bg-268a85 radius10 dmb-10">
                                        <div class="closet-header d-flex align-items-center cursor-pointer radius10 justify-content-between dpb-20 ps-5 pe-4 pt-4">
                                            <?php if (!empty($title)): ?>
                                                <div class="sans-medium font29 leading22 text-white"><?php echo $title; ?></div>
                                            <?php endif; ?>
                                            <div class="icon-bg rounded-circle d-flex justify-content-center align-items-center">
                                                <img class="transition" src="<?php echo get_template_directory_uri(); ?>/templates/icons/accordion-plus.svg" alt="Accordion Image">
                                            </div>
                                        </div>
                                        <div class="closet-content px-5 dpb-50">
                                            <div class="sans-normal font14 leading24 text-white col-11 pe-5">
                                                <?php if (!empty($description)): ?>
                                                    <?php echo $description; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                        <?php if (!empty($about_content)):
                            $title = $about_content['title'];
                            $content = $about_content['content'];
                            $image = $about_content['image'];
                        ?>
                            <div class="col-lg-6 ps-2">
                                <div class="col-11 ps-4 ms-auto">
                                    <h2 class="sans-medium font48 leading44 space0_96 text-06556c dmb-15"><?php echo $title; ?></h2>
                                    <?php if (!empty($about_content)): ?>
                                        <p class="sans-medium font25 leading34 text-06556c dmb-70">
                                            <?php echo $content; ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($image)): ?>
                                        <div class="service-img radius10 overflow-hidden">
                                            <img src="<?php echo $image['url']; ?>" class="w-100 h-100 object-cover" alt="<?php echo $image['title']; ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>


                </div>
            </section>


        <?php elseif (get_row_layout() == 'contact_section'):
            $title = get_sub_field('title');
            $address = get_sub_field('address');
            $contact_no = get_sub_field('contact_no');
            $social_media_content = get_sub_field('social_media_content');
        ?>
            <section class="contact-us-section h-vh d-flex align-items-center bg-06556c">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4">
                            <?php if (!empty($title)): ?>
                                <div class="sans-medium font61 leading61 space0_61 text-white dmb-20"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($address)): ?>
                                <div class="col-10">
                                    <div class="col-10 sans-medium font26 leading32 text-white dmb-35">
                                        <?php echo $address; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($contact_no)): ?>
                                <div class="dmb-135">
                                    <a class="sans-medium font26 leading32 text-white text-decoration-none" target="_blank"
                                        href="tel:<?php echo $contact_no; ?>">
                                        <?php echo $contact_no; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="social-media-content d-flex">
                                <?php if (!empty($social_media_content)):
                                    $contact_group = $social_media_content['contact_group'];
                                ?>
                                    <?php if (!empty($contact_group)):
                                        foreach ($contact_group as $img_content):
                                            $image = $img_content['image'];
                                            $url = $img_content['url'];
                                    ?>
                                            <?php if (!empty($url)): ?>
                                                <div class="media-bg d-flex justify-content-center align-items-center rounded-circle me-2">
                                                    <a href="<?php $content['url']; ?>">
                                                        <div class="media-img d-flex justify-content-center align-items-center">
                                                            <?php if (!empty($image)): ?>
                                                                <img class="h-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                    <?php endforeach;
                                    endif; ?>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="col-11 ps-3 ms-auto">
                                <div class="sans-normal font16 leading24 text-edf4f3 dmb-30">
                                    Send us a message
                                </div>
                                <?php echo do_shortcode('[contact-form-7 id="a487ced" title="Contact form 1"]') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'privacy_content'):
            $privacy_group = get_sub_field('privacy_group');
        ?>

            <section class="privacy-policy-section bg-edf4f3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 dmb-15">
                            <ul class="position-sticky list-none mb-0 ps-0 privacy-links" id="privacy-links">
                                <?php if (have_rows('privacy_group')): ?>
                                    <?php $i = 0;
                                    while (have_rows('privacy_group')):
                                        the_row();
                                        $i++;
                                    ?>
                                        <?php $title = get_sub_field('title'); ?>
                                        <li class="position-relative dmb-10">
                                            <a class="sans-normal font16 leading28 text-06556c opacity80 text-decoration-none transition" href="#privacy<?php echo $i; ?>">
                                                <?php echo $title; ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-lg-7 pe-3">
                            <?php if (have_rows('privacy_group')): ?>
                                <?php $i = 0;
                                while (have_rows('privacy_group')):
                                    the_row();
                                    $i++;

                                ?>
                                    <div id="privacy<?php echo $i; ?>" class="policy-content dpt-70">
                                        <?php $title = get_sub_field('title'); ?>
                                        <?php $description = get_sub_field('description'); ?>

                                        <div class="sans-normal font26 leading30 text-06556c dmb-20"><?php echo $title; ?></div>
                                        <?php if (!empty($description)): ?>
                                            <div class="sans-normal font14 leading24 text-06556c opacity80 dmb-15">
                                                <?php echo $description; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                            <?php endwhile;
                            endif; ?>

                        </div>
                    </div>
            </section>

        <?php elseif (get_row_layout() == 'spacing'):
            $background_color = get_sub_field('background_color');
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');
            $desktop_mb = $desktop['margin_bottom'];
            $desktop_mb_main = !empty($desktop['margin_bottom']) ? " dpb-" : "";
            $tablet_mb = $tablet['margin_bottom'];
            $tablet_mb_main = !empty($tablet['margin_bottom']) ? " tpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = !empty($mobile['margin_bottom']) ? " mpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = !empty($mobile['margin_bottom']) ? " mpb-" : "";
        ?>
            <div class="spacing<?php
                                echo $desktop_mb_main;
                                echo $desktop_mb;
                                echo $tablet_mb_main;
                                echo $tablet_mb;
                                echo $mobile_mb_main;
                                echo $mobile_mb;
                                ?>  <?php if ($background_color == 'white') echo 'bg-white';
                                    elseif ($background_color == 'bg-06556c') echo 'bg-06556c';
                                    else echo 'bg-edf4f3';
                                    ?>"></div>
        <?php endif; ?>
<?php
    endwhile;
endif; ?>