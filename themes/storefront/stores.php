<?php
/*
 * Template Name: Stores
 */

get_header();

$args = array(
    'post_type' => 'Butiker',
    'posts_per_page' => -1, 
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) { $query->the_post();

        $address = get_field('adress');
        $postcode = get_field('postnummer');
        $postaddress = get_field('postadress');
        $open_time = get_field('oppettider');
        $open_time_saturday = get_field('oppettider_lordagar');
        $open_time_sunday = get_field('oppettider_sondagar');
        $deviant_time = get_field('avvikande_oppettider');


        echo '<h2>' . get_the_title() . '</h2>';
        echo '<p>Adress: ' . $address . '</p>';
        echo '<p>Postkod: ' . $postcode . '</p>';
        echo '<p>Postadress: ' . $postaddress . '</p>';
        echo '<h4> Öppettider </h4>';
        echo '<p>Helgfria vardagar: ' . $open_time . '</p>';
        echo '<p>Lördagar: ' . $open_time_saturday . '</p>';
        echo '<p>Söndagar: ' . $open_time_sunday . '</p>';
        if ($deviant_time) {
        echo '<p>Avvikande öppettider: ' . $deviant_time . '</p>';
        };
    };
else :
    echo '<p>Inga butiker hittades.</p>';
endif;

get_footer();
?>

