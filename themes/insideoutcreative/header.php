<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 

if(get_field('header', 'options')) { the_field('header', 'options'); }

if(get_field('custom_css')) { 
?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php 
}
wp_head(); 
?>
</head>
<body <?php body_class(); ?>>
<?php
if(get_field('body','options')) { the_field('body','options'); }



echo '<div class="blank-space position-fixed w-100 z-9" style="top:0;left:0;background:#363636;mix-blend-mode:multiply;opacity:.55;"></div>';
echo '<div class="bg-clip-path position-fixed w-25 z-9" style="
background:#c19b30;
top:0;
right:0;
mix-blend-mode:overlay;
clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
-ms-clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
-webkit-clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
-moz-clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
-o-clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);
"></div>';
echo '<header class="position-fixed pb-3 z-10 w-100" style="top:0;left:0;">';

if(get_field('secondary_navigation','options')){
    echo '<div class="secondary-nav bg-light" style="padding-top:1rem;">';
    echo '<div class="container">';
        echo '<div class="row">';
            echo '<div class="col-12 text-center">';
            echo get_field('secondary_navigation','options');
            echo '</div>';
        echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '<div class="nav">';
echo '<div class="container-fluid">';
echo '<div class="row align-items-center">';

echo '<div class="col-lg-3 col-6 text-center order-1">';
echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'h-auto','style'=>'width:305px;transition:all 1s ease-in-out;max-width:100%;','id'=>'logo-main']); 
}

echo '</a>';
echo '</div>';

echo '<div class="col-6 text-center order-2 mobile-hidden">';

wp_nav_menu(array(
    'menu' => 'primary',
    'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0 text-white'
)); 

echo '</div>';

echo '<div class="col-lg-3 text-center order-4 mobile-hidden">';

wp_nav_menu(array(
    'menu' => 'Contact',
    'menu_class'=>'menu list-unstyled mb-0 text-white'
)); 

echo '</div>';


echo '<div class="col-lg-4 col-6 desktop-hidden order-3">';
echo '<a id="navToggle" class="nav-toggle">';
echo '<div>';
echo '<div class="line-1 bg-accent"></div>';
echo '<div class="line-2 bg-accent"></div>';
echo '<div class="line-3 bg-accent"></div>';
echo '</div>';
echo '</a>';
echo '</div>';
echo '<div id="navMenuOverlay" class="position-fixed z-2"></div>';
echo '<div class="col-lg-4 col-md-8 col-11 nav-items bg-accent-quaternary desktop-hidden" id="navItems">';

echo '<div class="pt-5 pb-5">';
echo '<div class="close-menu">';
echo '<div>';
echo '<span id="navMenuClose" class="close h1 text-white">X</span>';
echo '</div>';
echo '</div>';

echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}

echo '</a>';

echo '</div>';

wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu list-unstyled mb-0'
)); 

wp_nav_menu(array(
    'menu' => 'Contact',
    'menu_class'=>'menu list-unstyled mb-0'
)); 

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</header>';

echo '<section class="hero position-relative">';
$globalPlaceholderImg = get_field('global_placeholder_image','options');
if(is_page()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute'));
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute']);
}


if(is_front_page()) {
echo '<div class="text-white text-center" style="">';
echo '<div class="hero-inner-padding" style="padding-top:675px;padding-bottom:75px;">';
echo '<div class="position-relative">';
// echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
echo '<div class="position-relative">';
echo '<div class="container">';
echo '<div class="row">';
echo '<div class="col-12">';
echo '<h1 class="pt-3 pb-3 mb-0 coromant-garamond text-uppercase" style="font-size:4rem;letter-spacing:.1em;">' . get_the_title() . '</h1>';

if(have_rows('subheader_group')): while(have_rows('subheader_group')): the_row();

echo '<span class="" style="letter-spacing:.5em;">' . get_sub_field('subheader') . '</span>';

endwhile; endif;

if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile;
endif;

echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}



if(!is_front_page()) {
echo '<div class="container pt-5 pb-5 text-white text-center">';
echo '<div class="row">';
echo '<div class="col-md-12">';
if(is_page() || !is_front_page()){
echo '<h1 class="">' . get_the_title() . '</h1>';
} elseif(is_single()){
echo '<h1 class="">' . single_post_title() . '</h1>';
} elseif(is_author()){
echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
} elseif(is_tag()){
echo '<h1 class="">' . get_single_tag_title() . '</h1>';
} elseif(is_category()){
echo '<h1 class="">' . get_single_cat_title() . '</h1>';
} elseif(is_archive()){
echo '<h1 class="">' . get_archive_title() . '</h1>';
}
elseif(!is_front_page() && is_home()){
echo '<h1 class="">' . get_the_title(133) . '</h1>';
}
echo '</div>';
echo '</div>';
echo '</div>';
}

echo '</section>';
?>