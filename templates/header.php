<?php
global $wp;
$current_url = trailingslashit(home_url($wp->request));
$header_logo = get_field('header_logo', 'option');
$dark_logo = get_field('dark_logo', 'option');
$header_links = get_field('header_links', 'option');
$social_icons = get_field('social_icons', 'option');
$header_select = get_field('header_select');
$header_color = '';
if ($header_select === 'white-header'){
    $header_color = '';
}elseif ($header_select === 'dark-header'){
    $header_color = 'dark-header';
}
?>
<header class="header <?php echo $header_color; ?> position-fixed top-0 w-100 transition dpt-35 dpb-25 tpt-30 tpb-30">
    <div class="container">
        <div class="row flex-column flex-lg-row justify-content-between align-items-center">
            <div class="col-lg-2 d-flex align-items-center justify-content-between">
                <div class="header-wrapper d-flex">
                    <?php if (!empty($header_logo)): ?>
                        <div class="header-logo white-logo d-block transition">
                            <a href="<?php echo get_home_url(); ?>">
                                <img class="h-100" src="<?php echo $header_logo['url']; ?>" alt="<?php $header_logo['title']; ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($dark_logo)): ?>
                        <div class="header-logo dark-logo d-none transition">
                            <a href="<?php echo get_home_url(); ?>">
                                <img class="h-100" src="<?php echo $dark_logo['url']; ?>" alt="<?php $dark_logo['title']; ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="logo-scroll d-none transition">
                        <a href="<?php echo get_home_url(); ?>">
                            <img class="h-100" src="<?php echo get_template_directory_uri() ?>/templates/icons/logo-scroll.svg" alt="Header Logo">
                        </a>
                    </div>
                </div>
                <div class="menu-icons d-flex d-lg-none align-items-center justify-content-center">
                    <div class="menu-icon d-flex">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/menu-icon.svg" alt="" class="h-100">
                    </div>
                    <div class="close-icon d-none">
                        <img src="<?php echo get_template_directory_uri(); ?>/templates/icons/close-icon.svg" alt="" class="h-100">
                    </div>
                </div>
            </div>

            <nav class="col-12 col-lg-8 navigation d-flex flex-column flex-lg-row justify-content-between justify-content-lg-end align-items-lg-center tpt-75">
                <ul class="list-none d-flex flex-column flex-lg-row justify-content-lg-end ps-0 mb-0">
                    <?php
                    $current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

                    if (!empty($header_links)) :
                        foreach ($header_links as $nav_links) :
                            $link = $nav_links['link'];
                            if (!$link) continue;

                            $link_path = trim(parse_url($link['url'], PHP_URL_PATH), '/');
                            $is_active = ($current_path === $link_path);
                    ?>
                            <li class="me-lg-1 tmb-40 position-relative">
                                <a
                                    href="<?php echo esc_url($link['url']); ?>"
                                    class="header-link sans-medium font16 leading22 res-font32 res-leading34 fw-normal text-capitalize py-lg-2 text-decoration-none transition
                           <?php echo $is_active ? 'is-active' : ''; ?>" target="<?php echo $link["target"] == "_blank" ? "_blank" : ''; ?>">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                    <?php endforeach;
                    endif; ?>
                </ul>
                <div class="social-media-content d-lg-none d-flex tmt-200">
                    <?php if(!empty($social_icons)):
                        foreach($social_icons as $social):
                            $icon = $social['icon'];
                            $url = $social['url'];
                    ?>
                        <?php if (!empty($url)): ?>
                            <a href="<?php echo $url; ?>" target="_blank" class="media-bg d-flex justify-content-center align-items-center rounded-circle me-2">
                                <div class="media-img d-flex justify-content-center align-items-center">
                                    <?php if (!empty($icon)): ?>
                                        <img class="h-100" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>">
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach;
                    endif; ?>
                </div>
            </nav>
        </div>
    </div>
</header>