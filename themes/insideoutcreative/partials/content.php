<?php
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Content + Image'){
    if(have_rows('content_image')): while(have_rows('content_image')): the_row();
    $bgImg = get_sub_field('background_image');
        $style = get_sub_field('style');
        $classes = get_sub_field('classes');
        $content = get_sub_field('content');
        $img = get_sub_field('image');
        if($bgImg){
            echo '<section class="position-relative content-section bg-accent-secondary text-accent-quinary ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;padding:150px 0;' . $style . '" id="' . get_sub_field('id') . '">';
            // echo '</section>';
        } else {
            echo '<section class="position-relative content-section bg-accent-secondary text-accent-quinary ' . $classes . '" style="padding:150px 0;' . $style . '" id="' . get_sub_field('id') . '">';
        }

        echo '<div class="container">';
        echo '<div class="row row-content align-items-center justify-content-between">';
        echo '<div class="col-lg-4">';
            echo $content;
        echo '</div>';

        if($img):
        echo '<div class="col-lg-6 pt-lg-0 pt-5">';
            echo wp_get_attachment_image($img['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        echo '</div>';
        endif;

        echo '</div>';
        echo '</div>';

        echo '</section>';
    endwhile; endif;

} elseif($layout == 'Text Columns'){

if(have_rows('text_columns')): while(have_rows('text_columns')): the_row();
    $bgImg = get_sub_field('background_image');
    $style = get_sub_field('style');
    $classes = get_sub_field('classes');

    if($bgImg){
        echo '<section class="position-relative content-section bg-accent-quaternary ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg['id'],'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
        // echo '</section>';
    } else {
        echo '<section class="position-relative content-section bg-accent-quaternary ' . $classes . '" style="padding:150px 0;' . $style . '">';
    }

    echo '<div class="container">';
    echo '<div class="row row-content align-items-center justify-content-between">';

    if(have_rows('columns')): while(have_rows('columns')): the_row();
    echo '<div class="col-lg-3 col-md-6 text-center pt-lg-0 pb-lg-0 position-relative" style="padding-top:100px;padding-bottom:100px;">';
    echo '<span class="position-absolute h1 mb-0 text-columns-big-title" style="
    opacity: .5;
    top: -50%;
    left: 50%;
    transform: translate(-60%,-50%);
    font-size: 180px;
    color:#a49c86;
    mix-blend-mode:multiply;">' . get_sub_field('big_title') . '</span>';

    echo '<span class="" style="color:var(--accent-septenary);letter-spacing:0.5em;">' . get_sub_field('small_title') . '</span>';

    echo '</div>';
    endwhile; endif;

    echo '</div>';
    echo '</div>';

    echo '</section>';

    endwhile; endif;
} elseif($layout == 'Content'){
    if(have_rows('content')): while(have_rows('content')): the_row();
    echo '<section class="position-relative text-white bg-accent-quaternary" style="padding:100px 0;">';
    echo '<div class="container-fluid">';
    echo '<div class="row justify-content-center">';

    echo '<div class="col-lg-9 text-center">';
    echo get_sub_field('content');
    echo '</div>';

    echo '</div>';
    echo '</div>';
    echo '</section>';
    endwhile; endif;

} elseif($layout == 'Icons'){
    if(have_rows('icons')): while(have_rows('icons')): the_row();
        $bgImg = get_sub_field('background_image');
        $style = get_sub_field('style');
        $classes = get_sub_field('classes');
        $content = get_sub_field('content');
        $img = get_sub_field('image');
        if($bgImg){
            echo '<section class="position-relative content-section text-white ' . $classes . '" style="background:url(' . wp_get_attachment_image_url($bgImg,'full') . ');background-size:cover;padding:150px 0;' . $style . '">';
            // echo '</section>';
        } else {
            echo '<section class="position-relative ' . $classes . '" style="padding:150px 0;' . $style . '">';
        }

        echo '<div class="container">';
        echo '<div class="row row-content justify-content-center">';
        echo '<div class="col-lg-9 text-center pb-4">';
            echo $content;
        echo '</div>';

        echo '</div>';

        if(have_rows('icons_inner')):
        echo '<div class="row row-content justify-content-between">';
            while(have_rows('icons_inner')): the_row();
            $icon = get_sub_field('icon');
            echo '<div class="col-lg-4 col-6 text-center mb-5">';
            echo '<div class="border-hover d-flex align-items-center justify-content-center ml-auto mr-auto mb-4" style="border-radius:50%;height:105px;width:105px;border:1px solid var(--accent-quinary);">';
            echo wp_get_attachment_image($icon['id'],'full','',['class'=>'','style'=>'height:70px;width:70px;object-fit:contain;']);
            echo '</div>';
                
                echo '<h3 class="h6 light">' . get_sub_field('title') . '</h3>';
            echo '</div>';
            endwhile;
        echo '</div>';
        endif;


        echo '</div>';

        echo '</section>';
    endwhile; endif;
} elseif($layout == 'Testimonials'){
    if(have_rows('testimonials')): while(have_rows('testimonials')): the_row();
    echo '<section class="position-relative bg-accent-quinary" style="padding:150px 0;">';

    echo wp_get_attachment_image(173,'full','',['class'=>'w-100 position-absolute','style'=>'height:80%;top:10%;left:0;mix-blend-mode:multiply;']);
    
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 text-center pb-5">';
    echo wp_get_attachment_image(218,'full','',['class'=>'h-100 z-1 img-quote','style'=>'object-fit:contain;']);

    echo get_sub_field('content');

    echo '</div>';

        if(have_rows('testimonial_repeater')): 
            

            echo '<div class="testimonial-carousel owl-carousel owl-theme arrows-middle">';
            while(have_rows('testimonial_repeater')): the_row();


                echo '<div class="text-center col-lg-6 ml-auto mr-auto">';
                echo '<div class="pb-4 text-white" style="font-size:125%;">';
                echo get_sub_field('content');
                echo '</div>';

                $headshot = get_sub_field('headshot');
                echo wp_get_attachment_image($headshot['id'],'full','',['class'=>'ml-auto mr-auto','style'=>'width:100px;height:100px;object-fit:cover;border-radius:50%;']);

                echo '<span class="d-block h5 cormorant pt-4">' . get_sub_field('name') . '</span>';
                echo '<span class="d-block text-white">' . get_sub_field('title') . '</span>';
                
                echo '</div>';

            
            endwhile;
        endif;
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    endwhile; endif;
} elseif($layout == 'Contact'){
    if(have_rows('contact')): while(have_rows('contact')): the_row();
        echo '<section class="position-relative bg-accent-quinary" style="padding-top:500px;padding-bottom:100px;">';

        $bgImg = get_sub_field('background_image');
        echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100','style'=>'height:80%;top:0;left:0;object-fit:cover;']);

        echo '<div class="container">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-9 text-center">';
        echo '<div class="position-relative p-5" style="">';
        echo wp_get_attachment_image(173,'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;opacity:.71;object-fit:cover;']);

        echo '<div class="position-relative">';
        echo get_sub_field('content');
        echo '</div>';
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    endwhile; endif;
}

endwhile; endif;
?>