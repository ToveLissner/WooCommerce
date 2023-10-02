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

if ($query->have_posts()) {
    while ($query->have_posts()) { $query->the_post();

        $address = get_field('adress');
        $postcode = get_field('postnummer');
        $postaddress = get_field('postadress');
        $open_time = get_field('oppettider');
        $open_time_saturday = get_field('oppettider_lordagar');
        $open_time_sunday = get_field('oppettider_sondagar');
        $deviant_time = get_field('avvikande_oppettider');


        echo '<h2>' . get_the_title() . '</h2>';
        echo '<h4> Adress </h4>';
        echo '<h5>' . $address . ',' . ' ' . $postcode . ' ' . $postaddress .'</h5>';

        echo '<h4> Öppettider </h4>';
        echo '<h5>Helgfria vardagar: ' . $open_time . '</h5>';
        echo '<h5>Lördagar: ' . $open_time_saturday . '</h5>';
        echo '<h5>Söndagar: ' . $open_time_sunday . '</h5>';
        if ($deviant_time) {
        echo '<h5>Avvikande öppettider: ' . $deviant_time . '</h5>';
        echo '<br>';
    } else {
            echo '<br>';
        }
    };
} else {
    echo '<p>Inga butiker hittades.</p>';
};

get_footer();
?>

