<?php
$address = get_field('address', 'option');
$contact_number = get_field('contact_number', 'option');
$get_in_touch_link = get_field('get_in_touch_link', 'option');
$footer_links = get_field('footer_links', 'option');
$social_media_content = get_field('social_media_content', 'option');
$logo = get_field('logo', 'option');
$footer_left_content = get_field('footer_left_content', 'option');
$policy_content = get_field('policy_content', 'option');
?>

<footer class="footer bg-06556c dpt-80 dpb-60">
    <div class="container">
        <div class="d-lg-none d-flex justify-content-center dmb-30">
            <?php if(!empty($logo)):?>
                <img src="<?php echo $logo['url']; ?>" alt="Social Icon">
            <?php endif;?>
        </div>
        <div class="social-media-content col-lg-2 d-flex d-lg-none justify-content-center tmb-80">
            <?php if (!empty($social_media_content)):
                    $content = $social_media_content['content'];
            ?>
                <?php if (!empty($content)):
                    foreach ($content as $img_content):
                        $image = $img_content['image'];
                        $url = $img_content['url'];
                ?>
                    <div class="media-bg d-flex justify-content-center align-items-center rounded-circle me-2">
                        <?php if (!empty($url)): ?>
                            <a href="<?php echo $url; ?>" target="_blank">
                                <div class="media-img d-flex justify-content-center align-items-center">
                                    <?php if (!empty($image)): ?>
                                        <img class="h-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                 <?php endforeach;
                    endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12 text-center text-lg-start pe-lg-3">
                <div class="dmb-25">
                    <?php if (!empty($address['url']) && !empty($address['title'])): ?>
                        <a href="<?php echo $address['url']; ?>" target="_blank" class="text-decoration-none sans-medium font26 leading32 text-white res-font22 res-leading30">
                            <?php echo $address['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="dmb-35 tmb-25">
                    <?php if (!empty($contact_number)): ?>
                        <a href="tel:<?php echo $contact_number; ?>" target="_blank" class="text-decoration-none sans-medium font26 leading32 res-font22 res-leading28 text-white">
                            <?php echo $contact_number; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="tmb-80">
                    <?php if (!empty($get_in_touch_link)): ?>
                        <a class="btnA bg-f07a47-white-text-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                            href="<?php echo $get_in_touch_link['url']; ?>" target="<?php echo $get_in_touch_link["target"] == "_blank" ? "_blank" : ''; ?>">
                            <?php echo $get_in_touch_link['title']; ?>
                        </a>
                    <?php endif; ?> 
                </div>
            </div>
            <div class="col-lg-4 col-12 text-center text-lg-start tmb-60">
                <div class="col-7 mx-auto">
                    <ul class="list-none mb-0 ps-0">
                        <?php if (!empty($footer_links)):
                            foreach ($footer_links as $link):
                                $links = $link['links'];
                        ?>
                                <li class="dmb-15 tmb-10">
                                    <a href="<?php echo $links['url']; ?>"
                                        class="sans-normal font14 space0_28 leading22 res-font22 res-leading61 res-space-0_44 text-decoration-none text-white text-capitalize" target="<?php echo $links["target"] == "_blank" ? "_blank" : ''; ?>">
                                        <?php echo $links['title']; ?>
                                    </a>
                                </li>
                        <?php endforeach;
                        endif; ?>
                    </ul>
                </div>
            </div>
            <div class="social-media-content col-lg-2 d-none d-lg-flex justify-content-end">
                <?php if (!empty($social_media_content)):
                    $content = $social_media_content['content'];
                ?>
                    <?php if (!empty($content)):
                        foreach ($content as $img_content):
                            $image = $img_content['image'];
                            $url = $img_content['url'];
                    ?>
                            <div class="media-bg d-flex justify-content-center align-items-center rounded-circle me-2">
                                <?php if (!empty($url)): ?>
                                    <a href="<?php echo $url; ?>" target="_blank">
                                        <div class="media-img d-flex justify-content-center align-items-center">
                                            <?php if (!empty($image)): ?>
                                                <img class="h-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                    <?php endforeach;
                    endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="d-lg-flex d-none justify-content-end dmb-30">
            <?php if(!empty($logo)):?>
                <img src="<?php echo $logo['url']; ?>" alt="Social Icon">
            <?php endif;?>
        </div>
        <div class="d-lg-flex aling-items-center justify-content-between">
            <?php if (!empty($footer_left_content)): ?>
                <div class="col-lg-2 sans-normal font14 leading22 text-white text-capitalize text-center d-lg-flex d-none">
                    <?php echo $footer_left_content; ?>
                </div>
            <?php endif; ?>
             <ul class="mb-0 ps-0 footer-links list-none d-lg-flex align-items-center tmb-45">
                <?php if (!empty($policy_content)):
                    foreach ($policy_content as $policy):
                        $links = $policy['links'];
                ?>
                    <li class="d-lg-flex align-items-center text-center ms-lg-5 tmb-25">
                        <a class="sans-normal font12 space0_12 leading16 res-font15 res-leading28 res-space-0_15 text-decoration-none text-white text-capitalize " href="<?php echo $links['url']; ?>" target="<?php echo $links["target"] == "_blank" ? "_blank" : ';'  ?>">
                            <?php echo $links['title']; ?>
                        </a>
                    </li>
                <?php endforeach;
                 endif; ?>
            </ul>
            <?php if (!empty($footer_left_content)): ?>
                <div class="col-lg-2 sans-normal font14 leading22 res-font16  text-white text-capitalize d-flex justify-content-center d-lg-none">
                    <?php echo $footer_left_content; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>