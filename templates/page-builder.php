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
                <div class="hero-layer position-absolute top-0 start-0 w-100 h-100 bg-black"></div>
                <div class="hero-slider h-100">
                    <?php if (!empty($slider_media)):
                        foreach ($slider_media as $media):
                            $media_type = $media['media_type'];
                            $image = $media['image'];
                            $video = $media['video'];
                            $youtube = $media['youtube'];
                            $vimeo = $media['vimeo'];
                            $title = $media['title'];
                            $description = $media['description'];
                            $link = $media['link'];
                    ?>
                        <div class="h-100 position-relative">
                            <?php if(!empty($media_type) && $media_type == 'image' && !empty($image)): ?>
                                <img class="w-100 h-100 object-cover" src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['title'] ?>">

                            <?php elseif(!empty($media_type) && $media_type == 'video' && !empty($video)): ?>
                                <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                                    class="w-100 h-100 object-cover" data-object-fit="cover">
                                    <source src="<?php echo $video['url'] ?>" data-wf-ignore="true" />
                                </video>

                            <?php elseif(!empty($media_type) && $media_type == 'youtube' && !empty($youtube)): ?>
                                <iframe class="w-100 h-100 object-cover"
                                    src="https://www.youtube.com/embed/<?php echo $youtube; ?>?playlist=<?php echo $youtube; ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                    allow="autoplay; fullscreen">
                                </iframe>

                            <?php elseif(!empty($media_type) && $media_type == 'vimeo' && !empty($vimeo)): ?>
                                <iframe class="w-100 h-100 object-cover"
                                    src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                                    allow="autoplay" allowfullscreen>
                                </iframe>
                            <?php endif; ?>
                               <div class="position-absolute start-0 bottom-0 tpb-280 dpb-80 w-100">
                                    <div class="container">
                                        <div class="col-lg-6 col-12">
                                            <?php if (!empty($title)): ?>
                                                <div class="sans-medium font61 space0_61 leading61 res-font35 res-leading40 res-space-0_35 text-white dmb-10">
                                                    <?php echo $title; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($description)): ?>
                                                <div class="col-lg-7 px-lg-0 pe-3 sans-medium font15 leading24 text-white dmb-30 tmb-20">
                                                    <?php echo $description; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($link['url']) && !empty($link['title'])): ?>
                                                <div class="">
                                                    <a class="btnA bg-06556C-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                                                        href="<?php echo $link['url']; ?>" target="<?php echo $link["target"] == "_blank" ? "_blank" : ''; ?>"><?php echo $link['title']; ?></a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach;
                    endif; ?>
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
                            <?php if(!empty($image)):?>
                                <div class="image-card tmb-10 dmb-20">
                                    <div class="position-relative radius10 overflow-hidden h-100">
                                        <?php if (!empty($link)): ?>
                                            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target'] == "_blank" ? "_blank" : ''; ?>">
                                                <div class="bg-layer bg-00000040 position-absolute bottom-0 start-0 w-100 h-100"></div>
                                                <img class="w-100 h-100 object-cover" src="<?php echo $image['sizes']['medium']; ?>"
                                                        alt="Project Image">
                                                <div class="position-absolute bottom-0 start-0 ms-4 dmb-45 tmb-20">
                                                    <?php if(!empty($title)):?>
                                                        <div class="card-title sans-semibold font32 leading22 res-font26  text-white text-capitalize tmb-15">
                                                            <?php echo $title; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="btnA bg-f07a47-white-text-btn  sans-medium font15 leading61 d-inline-flex d-lg-none justify-content-center align-items-center transition">
                                                            View more
                                                    </div>
                                                </div>
                                                <div class="position-absolute hover-wrapper bg-f07a47 start-0 h-100 w-100 transition">
                                                    <div class="position-absolute bottom-0 px-5 dpb-50">
                                                        <?php if(!empty($title)):?>
                                                            <div class="sans-semibold font29 leading22 text-capitalize text-white dmb-10">
                                                                <?php echo $title; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if(!empty($description)):?>
                                                            <div class="col-10 sans-medium font16 leading27 text-white dmb-20">
                                                                <?php echo $description; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="btnA bg-white-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center transition">
                                                            View more
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif;?>
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
            <section class="project-card-section bg-edf4f3 tpt-70">
                <div class="container container2">
                    <div class="row justify-content-between dmb-50 tmb-35">
                        <div class="col-lg-7 col-12">
                            <div class="sans-normal font61 space0_61 leading61 res-font36 res-space-0_72 text-06556c tmb-15">
                                <?php if (!empty($title)): ?>
                                    <?php echo $title; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5 ">
                            <div class="sans-normal font15 leading24 text-000b18">
                                <?php if (!empty($description)): ?>
                                    <?php echo $description; ?>
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
                                    <div class="image-card tmb-10 dmb-20">
                                        <div class="position-relative radius10 overflow-hidden h-100">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <div class="project-bg-layer position-absolute bottom-0 start-0 w-100 h-100"></div>
                                                <img class="w-100 h-100 object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                    alt="Project Image">
                                                <div class="card-title position-absolute bottom-0 start-0 ms-4 dmb-45 tmb-20">
                                                    <div class="sans-semibold font32 leading22 text-white text-capitalize tmb-15">
                                                        <?php echo get_the_title(); ?>
                                                    </div>
                                                     <div class="btnA bg-f07a47-white-text-btn  sans-medium font15 leading61 d-inline-flex d-md-none justify-content-center align-items-center transition">
                                                            View more
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
                                $image = get_the_post_thumbnail_url($id, 'medium');
                                ?>
                                <div class="image-card tmb-10 dmb-20">
                                    <div class="position-relative radius10 overflow-hidden h-100">
                                        <a href="<?php echo $link; ?>">
                                            <div class="project-bg-layer position-absolute bottom-0 start-0 w-100 h-100"></div>
                                            <img class="w-100 h-100 object-cover" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                alt="Project Image">
                                            <div class="card-title position-absolute bottom-0 start-0 ms-4 dmb-45">
                                                <div class="sans-semibold font32 leading22 text-white text-capitalize">
                                                    <?php echo $title; ?>
                                                </div>
                                                 <div class="btnA bg-f07a47-white-text-btn  sans-medium font15 leading61 d-inline-flex d-md-none justify-content-center align-items-center transition">
                                                            View more
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
            $hero_media_type = get_sub_field('hero_media_type');
            $image = get_sub_field('image');
            $video = get_sub_field('video');
            $youtube = get_sub_field('youtube');
            $vimeo = get_sub_field('vimeo');
        ?>
            <section class="sub-hero-section position-relative">
                <div class="sub-bg-layer position-absolute top-0 start-0 w-100 h-100"></div>
                <?php if(!empty($hero_media_type) && $hero_media_type == 'image' && !empty($image)): ?>
                    <img class="w-100 h-100 object-cover" src="<?php echo $image['sizes']['fullscreen']; ?>" alt="<?php echo $image['title'] ?>">
                <?php elseif(!empty($hero_media_type) && $hero_media_type == 'video' && !empty($video)): ?>
                    <video loop autoplay muted="true" playsinline data-wf-ignore="true" preload="none"
                        class="w-100 h-100 object-cover" data-object-fit="cover">
                        <source src="<?php echo $video['url'] ?>" data-wf-ignore="true" />
                    </video>
                <?php elseif(!empty($hero_media_type) && $hero_media_type == 'youtube' && !empty($youtube)): ?>
                    <iframe class="w-100 h-100 object-cover"
                        src="https://www.youtube.com/embed/<?php echo $youtube; ?>?playlist=<?php echo $youtube; ?>&autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                        allow="autoplay; fullscreen">
                    </iframe>
                <?php elseif(!empty($hero_media_type) && $hero_media_type == 'vimeo' && !empty($vimeo)): ?>
                    <iframe class="w-100 h-100 object-cover"
                        src="https://player.vimeo.com/video/<?php echo $vimeo; ?>?autoplay=1&loop=1&background=1&controls=0&rel=0&mute=1"
                        allow="autoplay" allowfullscreen>
                    </iframe>
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
                <div class="container container2">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-12">
                            <?php if (!empty($title)): ?>
                                <div class="sans-medium font35 leading46 res-font26 res-leading36 text-06556c pe-lg-5    tmb-30">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-5 ">
                            <?php if (!empty($content)): ?>
                                <div class="sans-normal font15 leading24 text-000b18 dmb-20 tmb-0">
                                    <?php echo $content; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'our_team_section'):
            $title = get_sub_field('title');
            $team_content = get_sub_field('team_content');
            $half_curve = get_sub_field('half_curve');
            $team_card = get_sub_field('team_card');
            $link = get_sub_field('link');

            $team_count = !empty($team_card) ? count($team_card) : 0;
        ?>

            <section class="team-slider-section bg-edf4f3 <?php echo ($half_curve == 'yes') ? 'half-curve tpt-70 dpt-90' : ''; ?>">
                <div class="container container2">
                    <div class="dpt-115"></div>
                    <div class="d-flex align-items-center dmb-30">
                        <?php if (!empty($title)): ?>
                            <div class="col-6 ">
                                <div class="sans-medium font48 leading44 space0_96 res-font36 res-space-0_72 text-06556c col-lg-6"><?php echo $title; ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if ($team_content == 'slider'): ?>
                            <div class="col-6 d-flex align-items-end justify-content-end">
                                <?php if ($team_count > 4): ?>
                                    <div class="slick-arrow-wrapper d-flex pe-lg-4">
                                        <button class="slick-arrows prev-arrow d-flex justify-content-center align-items-center rounded-circle transition bg-transparent ms-1 ms-lg-0 me-lg-1">
                                            <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/light-arrow.svg" alt="Slick Arrow">
                                        </button>
                                        <button class="slick-arrows next-arrow d-flex justify-content-center align-items-center rounded-circle transition bg-transparent ms-1 ms-lg-0">
                                            <img class="arrow-bg" src="<?php echo get_template_directory_uri(); ?>/templates/icons/light-arrow.svg" alt="Slick Arrow">
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($link['url']) && !empty($link['title'])): ?>
                                    <a class="btnA bg-06556C-dark-text-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center   d-lg-flex d-none text-decoration-none transition"
                                    href="<?php echo $link['url']; ?>" target="<?php echo $link["target"] == "_blank" ? "_blank" : ''; ?>"><?php echo $link['title']; ?></a>
                                <?php endif; ?>
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
                                <?php if (!empty($image)): ?>
                                    <div class="team-card bg-3db4c0 position-relative radius10 overflow-hidden">
                                        <div class="bg-layer bg-06556c position-absolute bottom-0 w-100"></div>
                                        <div class="team-card-img position-absolute bottom-0 w-100">
                                            <img src="<?php echo $image['sizes']['medium']; ?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title']; ?>">
                                        </div>
                                        <div class="team-card-title dmt-30 ms-4 position-absolute bg-4bbbc4">
                                            <?php if (!empty($name)): ?>
                                                <div class="sans-medium font29 leading29 res-font22   text-white text-capitalize"><?php echo $name; ?></div>
                                            <?php endif; ?>
                                            <?php if (!empty($job_title)): ?>
                                                <div class="sans-medium font21 leading35 res-font15 text-white text-capitalize"><?php echo $job_title; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="d-flex justify-content-center tmt-45">
                             <?php if (!empty($link['url']) && !empty($link['title'])): ?>
                                    <a class="btnA bg-06556C-dark-text-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center  d-lg-none d-flex text-decoration-none transition"
                                    href="<?php echo $link['url']; ?>" target="<?php echo $link["target"] == "_blank" ? "_blank" : ''; ?>"><?php echo $link['title']; ?></a>
                                <?php endif; ?>
                        </div>
                       

                    <?php elseif ($team_content == 'card'): ?>
                        <div class="row row8 res-row4">
                            <?php foreach ($team_card as $team):
                                $image = $team['image'];
                                $name = $team['name'];
                                $job_title = $team['job_title'];
                            ?>
                                <?php if (!empty($image)): ?>
                                    <div class="col-lg-3 col-md-4 col-6 team-cards tmb-10 dmb-15">
                                        <div class="team-card bg-3db4c0 position-relative  radius10 res-radius5 overflow-hidden">
                                            <div class="bg-layer bg-06556c position-absolute bottom-0 w-100"></div>
                                            <div class="team-card-img position-absolute bottom-0 w-100">
                                                <img src="<?php echo $image['sizes']['medium']; ?>" class="h-100 w-100 object-cover" alt="<?php echo $image['title']; ?>">
                                            </div>
                                            <div class="team-card-title dmt-30 tmt-15 ms-lg-4 ms-3 position-absolute bg-4bbbc4">
                                                <?php if (!empty($name)): ?>
                                                    <div class="sans-medium font29 leading29 res-font22  text-white text-capitalize"><?php echo $name; ?></div>
                                                <?php endif; ?>
                                                <?php if (!empty($job_title)): ?>
                                                    <div class="sans-medium font21 leading35 res-font15  text-white text-capitalize"><?php echo $job_title; ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                <div class="container container2">
                    <div class="row flex-lg-row flex-column flex-column-reverse justify-content-between ">
                        <div class="col-lg-6 services-accordion">
                            <?php if (!empty($accordion_content)):
                                foreach ($accordion_content as $accordion):
                                    $title = $accordion['title'];
                                    $description = $accordion['description'];
                            ?>
                                    <?php if (!empty($title)): ?>
                                        <div class="closet-item bg-268a85 radius10 dmb-10">
                                            <div class="closet-header d-flex align-items-center cursor-pointer radius10 justify-content-between dpt-25 tpb-25 dpb-20 px-4 ps-lg-5">
                                                    <div class="sans-medium font29 leading22 res-font24 res-leading22 text-white"><?php echo $title; ?></div>
                                                <div class="icon-bg rounded-circle d-flex justify-content-center align-items-center">
                                                    <img class="transition" src="<?php echo get_template_directory_uri(); ?>/templates/icons/accordion-plus.svg" alt="Accordion Image">
                                                </div>
                                            </div>
                                            <div class="closet-content ps-4 px-lg-5 dpb-50">
                                                <?php if (!empty($description)): ?>
                                                    <div class="sans-normal font14 leading24 text-white col-10 pe-lg-0 pe-2">
                                                        <?php echo $description; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            <?php endforeach;
                            endif; ?>
                        </div>
                        <?php if (!empty($about_content)):
                            $title = $about_content['title'];
                            $content = $about_content['content'];
                            $image = $about_content['image'];
                        ?>
                            <div class="col-lg-6 ps-lg-2">
                                <div class="col-12 ps-lg-4 ms-lg-auto">
                                    <h2 class="sans-medium font48 leading44 res-font36 space0_96 res-space-0_72 text-06556c dmb-15"><?php echo $title; ?></h2>
                                    <?php if (!empty($about_content)): ?>
                                        <div class="sans-normal font25 leading34 res-font20 text-06556c dmb-70 tmb-20">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($image)): ?>
                                        <div class="service-img radius10 res-radius5 overflow-hidden tmb-45">
                                            <img src="<?php echo $image['sizes']['medium']; ?>" class="w-100 h-100 object-cover" alt="<?php echo $image['title']; ?>">
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
            <section class="contact-us-section h-vh d-flex align-items-center bg-06556c tpt-210 tpb-80">
                <div class="container px-p-0">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 d-flex flex-column justify-content-between">
                            <div class="col-10 px-p-p">
                                <?php if (!empty($title)): ?>
                                    <div class="sans-medium font61 leading61 res-font45 res-leading45 space0_61 res-space-0_45 text-white dmb-20"><?php echo $title; ?></div>
                                <?php endif; ?>
                                <div class="tmb-30 dmb-35 ">
                                    <?php if (!empty($address['url']) && !empty($address['title'])): ?>
                                        <a href="<?php echo $address['url']; ?>" target="_blank" class=" text-decoration-none sans-medium font26 leading32 res-font22 res-leading30  text-white">
                                            <?php echo $address['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($contact_no)): ?>
                                    <a class="sans-medium font26 leading32 res-font22 text-white text-decoration-none " target="_blank"
                                        href="tel:<?php echo $contact_no; ?>">
                                        <?php echo $contact_no; ?>
                                    </a>                            
                                <?php endif; ?>
                            </div>
                            <div class="social-media-content d-flex tmt-40 tpb-95 px-p-p ">
                                <?php if (!empty($social_media_content)):
                                    $contact_group = $social_media_content['contact_group'];
                                ?>
                                    <?php if (!empty($contact_group)):
                                        foreach ($contact_group as $img_content):
                                            $image = $img_content['image'];
                                            $url = $img_content['url'];
                                    ?>
                                            <?php if (!empty($url) && !empty($image)): ?>
                                                <div class="media-bg d-flex justify-content-center align-items-center rounded-circle me-2">
                                                    <a href="<?php echo $url; ?>" target="_blank">
                                                        <div class="media-img d-flex justify-content-center align-items-center">
                                                            <?php if (!empty($image)): ?>
                                                                <img class="h-100" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['title']; ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                    <?php endforeach;
                                    endif; ?>
                                <?php endif; ?>
                            </div>
                        <div class="w-100 hr-line" ></div>
                        </div>
                        <div class="col-lg-8 px-p-p">
                            <div class="col-lg-11 ps-lg-3 ms-auto">
                                <div class="sans-normal font16 leading24 text-edf4f3 dmb-30 tmt-75">
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

            <section class="privacy-policy-section bg-edf4f3 tpt-75">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-4 dmb-15">
                            <ul class="position-sticky list-none mb-0 ps-0 privacy-links d-lg-block d-flex" id="privacy-links">
                                <?php if (have_rows('privacy_group')): ?>
                                    <?php $i = 0;
                                    while (have_rows('privacy_group')):
                                        the_row();
                                        $i++;
                                    ?>
                                        <?php $title = get_sub_field('title'); ?>
                                        <li class="position-relative dmb-10 tmb-45">
                                            <a class="sans-normal font16 leading28 text-06556c opacity80 text-decoration-none transition" href="#privacy<?php echo $i; ?>">
                                                <?php echo $title; ?>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-lg-7 pe-lg-4">
                            <?php if (have_rows('privacy_group')): ?>
                                <?php $i = 0;
                                while (have_rows('privacy_group')):
                                    the_row();
                                    $i++;
                                ?>
                                    <div id="privacy<?php echo $i; ?>" class="policy-content dpt-70">
                                        <?php $title = get_sub_field('title'); ?>
                                        <?php $description = get_sub_field('description'); ?>

                                        <?php if (!empty($title)): ?>
                                            <div class="sans-normal font26 leading30 text-06556c dmb-20"><?php echo $title; ?></div>
                                        <?php endif; ?>
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