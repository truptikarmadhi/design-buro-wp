<?php
global $wp;
$current_url = trailingslashit(home_url($wp->request));
$header_logo = get_field('header_logo', 'option');
$dark_logo = get_field('dark_logo', 'option');
$header_links = get_field('header_links', 'option');
$header_select = get_field('header_select');
$header_color = '';
if ($header_select === 'white-header'){
    $header_color = '';
}elseif ($header_select === 'dark-header'){
    $header_color = 'dark-header';
}
?>
zxdvdxsbgvdf
<header class="header <?php echo $header_color; ?> position-fixed top-0 w-100 transition">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="header-wrapper col-2 d-flex">
                <?php if (!empty($header_logo)): ?>
                    <div class="header-logo white-logo d-block transition">
                        <a href="<?php echo get_home_url(); ?>">
                            <img class="w-100" src="<?php echo $header_logo['url']; ?>" alt="<?php $header_logo['title']; ?>">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($dark_logo)): ?>
                    <div class="header-logo dark-logo d-none transition">
                        <a href="<?php echo get_home_url(); ?>">
                            <img class="w-100" src="<?php echo $dark_logo['url']; ?>" alt="<?php $dark_logo['title']; ?>">
                        </a>
                    </div>
                <?php endif; ?>
                <div class="logo-scroll d-none transition">
                    <a href="<?php echo get_home_url(); ?>">
                        <img class="h-100" src="<?php echo get_template_directory_uri() ?>/templates/icons/logo-scroll.svg" alt="Header Logo">
                    </a>
                </div>
            </div>
            <nav class="col-8 navigation d-flex justify-content-end align-items-center">
                <ul class="list-none d-flex justify-content-end ps-0 mb-0">
                    <?php
                    $current_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

                    if (!empty($header_links)) :
                        foreach ($header_links as $nav_links) :
                            $link = $nav_links['link'];
                            if (!$link) continue;

                            $link_path = trim(parse_url($link['url'], PHP_URL_PATH), '/');
                            $is_active = ($current_path === $link_path);
                    ?>
                            <li>
                                <a
                                    href="<?php echo esc_url($link['url']); ?>"
                                    class="header-link sans-medium font16 leading22 text-capitalize py-2 text-decoration-none transition
                           <?php echo $is_active ? 'is-active' : ''; ?>" target="<?php echo $link["target"] == "_blank" ? "_blank" : ''; ?>">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                    <?php endforeach;
                    endif; ?>
                </ul>
            </nav>

        </div>
    </div>
</header>