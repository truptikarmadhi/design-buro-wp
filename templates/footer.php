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
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="sans-medium font26 leading32 text-white dmb-25">
                    <?php if (!empty($address)): ?>
                        <?php echo $address; ?>
                    <?php endif; ?>
                </div>
                <div class="dmb-35">
                    <?php if (!empty($contact_number)): ?>
                        <a href="tel:<?php echo $contact_number; ?>" class="text-decoration-none sans-medium font26 leading32 text-white">
                            <?php echo $contact_number; ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="">
                    <?php if (!empty($get_in_touch_link)): ?>
                        <a class="btnA bg-f07a47-white-text-btn sans-medium font15 leading61 d-inline-flex justify-content-center align-items-center text-decoration-none transition"
                            href="<?php echo $get_in_touch_link['url']; ?>" target="<?php echo $get_in_touch_link["target"] == "_blank" ? "_blank" : ''; ?>">
                            <?php echo $get_in_touch_link['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-2">
                <ul class="list-none mb-0 ps-0">
                    <?php if (!empty($footer_links)):
                        foreach ($footer_links as $link):
                            $links = $link['links'];
                    ?>
                            <li class="dmb-15">
                                <a href="<?php echo $links['url']; ?>"
                                    class="sans-normal font14 space0_28 leading22 text-decoration-none text-white text-capitalize" target="<?php echo $links["target"] == "_blank" ? "_blank" : ''; ?>">
                                    <?php echo $links['title']; ?>
                                </a>
                            </li>
                    <?php endforeach;
                    endif; ?>
                </ul>
            </div>

            <div class="social-media-content col-2 d-flex justify-content-end">
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
                                    <a href="<?php $content['url']; ?>" target="<?php echo $url["target"] == "_blank" ? "_blank" : ''; ?>">
                                    <?php endif; ?>
                                    <div class="media-img d-flex justify-content-center align-items-center">
                                        <?php if (!empty($image)): ?>
                                            <img class="h-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    </a>
                            </div>
                    <?php endforeach;
                    endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-between align-items-end">
            <div class="col-2 sans-normal font14 leading22 text-white text-capitalize">
                <?php if (!empty($footer_left_content)): ?>
                    <?php echo $footer_left_content; ?>
                <?php endif; ?>
            </div>
            <div class="col-5 d-flex align-items-end flex-column">
                <div class="col-3 dmb-30">
                    <img src="/public/assets/images/white-fb.svg" alt="Social Icon">
                </div>
                <ul class="mb-0 ps-0 footer-links list-none d-flex align-items-center">
                    <?php if (!empty($policy_content)):
                        foreach ($policy_content as $policy):
                            $links = $policy['links'];

                    ?>
                            <li class="d-flex align-items-center me-5">
                                <a class="sans-normal font12 space0_12 leading16 text-decoration-none text-white text-capitalize" href="<?php echo $links['url']; ?>" target="<?php echo $links["target"] == "_blank" ? "_blank" : ';'  ?>">
                                    <?php echo $links['title']; ?>
                                </a>
                            </li>
                    <?php endforeach;
                    endif; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>