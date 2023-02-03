<?php

echo '<div class="bg-white pt-5 pb-5"></div>';

echo '<footer class="" style="background:#111111;">';

echo '<section class="">';
echo '<div class="container">';
// echo '<div class="row justify-content-center">';
// echo '<div class="col-lg-4 col-md-6 col-7 text-center pb-4">';

// echo '</div>';
// echo '</div>';

echo '<div class="row justify-content-center">';

echo '<div class="col-lg-4 col-md-6 p-5 text-white order-md-1 order-3">';

echo '<div class="h-100 d-flex align-items-end">';
echo '<div>';

echo '<p>CONTACT</p>';

echo '<div class="d-flex">';
echo '<div class="text-accent">A:</div>';
echo '<p class="ml-2">' . get_field('address','options') . '</p>';
echo '</div>';

echo '<div class="d-flex pt-4">';
echo '<div class="text-accent">T:</div>';
echo '<a href="tel:+1' . get_field('phone','options') . '" class="ml-2">' . get_field('phone','options') . '</a>';
echo '</div>';

echo '<a href="https://insideoutcreative.io/" target="_blank" rel="noopener noreferrer" style="padding-top:115px;" class="d-block">';
echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/12/IOC-Backlink.png" style="width:150px;" class="h-auto ml-2" alt="">';
// echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/06/created-by-inside-out-creative-black.png" style="width:150px;" class="h-auto ml-2" alt="">';
echo '</a>';

echo '</div>';
echo '</div>';

echo '</div>'; // end of col

echo '<div class="col-lg-4 col-md-6 p-5 order-md-2 order-1" style="padding-bottom:75px!important;">';
echo '<div class="position-absolute bg-black w-100" style="top:-30px;left:0;height:30px;"></div>';
echo '<div class="position-absolute bg-black w-100 h-100" style="mix-blend-mode:multiply;top:0;left:0;"></div>';

echo '<a href="' . home_url() . '">';

$logo = get_field('logo','options'); 
$logoFooter = get_field('logo_footer','options'); 

if($logoFooter){
echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'w-100 h-auto position-relative']); 
} elseif($logo) {
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto']);
}

echo '</a>';

// echo '<div class="position-relative">';
//         echo '<p class="text-white">USEFUL LINK</p>';
//         wp_nav_menu(array(
//                 'menu' => 'footer',
//                 'menu_class'=>'menu list-unstyled text-white text-uppercase'
//         ));
// echo '</div>';

echo '</div>';

echo '<div class="col-lg-4 col-12 p-5 order-md-3 order-2" style="padding-bottom:0 !important;">';

echo '<div class="h-100 d-flex align-items-end">';
echo '<div>';

echo get_template_part('partials/si');

echo '<div class="pt-4">';
echo '<p class="h6 text-white bold">Enquire</p>';
echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]');
echo '</div>';

echo '<div class="text-white position-relative">';
the_field('website_message','options');
echo '</div>';


echo '</div>';
echo '</div>';

echo '</div>'; // end of col


echo '</div>';

echo '</div>';
echo '</section>';


echo '</footer>';

if(get_field('footer', 'options')) { the_field('footer', 'options'); }

wp_footer();

echo '</body>';
echo '</html>';
?>