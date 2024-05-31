<?php

/**
 * Package pays
 * Version 1.0.0
 */
/*
Plugin name: pays
Plugin uri: https://github.com/eddytuto
Version: 1.0.0
Description: Permet d'afficher les destinations qui répondent à certains critères
*/
function aydr_pays_enqueue()
{
    $version_css = filemtime(plugin_dir_path(__FILE__) . "style.css");
    $version_js = filemtime(plugin_dir_path(__FILE__) . "js/pays.js");
    wp_enqueue_style(
        'em_plugin_pays_css',
        plugin_dir_url(__FILE__) . "style.css",
        array(),
        $version_css
    );

    wp_enqueue_script(
        'em_plugin_pays_js',
        plugin_dir_url(__FILE__) . "js/pays.js",
        array(),
        $version_js,
        true
    );
}
add_action('wp_enqueue_scripts', 'aydr_pays_enqueue');

/* Création de la liste des destinations en HTML */
function creation_destinations()
{
    $contenu = '
    <button class="boutton_categorie" id="cat_2">France</button>
    <button class="boutton_categorie" id="cat_3">États-Unis</button>
    <button class="boutton_categorie" id="cat_4">Canada</button>
    <button class="boutton_categorie" id="cat_5">Argentine</button>
    <button class="boutton_categorie" id="cat_6">Chili</button>
    <button class="boutton_categorie" id="cat_7">Belgique</button>
    <button class="boutton_categorie" id="cat_8">Maroc</button>
    <button class="boutton_categorie" id="cat_9">Mexique</button>
    <button class="boutton_categorie" id="cat_10">Japon</button>
    <button class="boutton_categorie" id="cat_11">Italie</button>
    <button class="boutton_categorie" id="cat_12">Islande</button>
    <button class="boutton_categorie" id="cat_13">Chine</button>
    <button class="boutton_categorie" id="cat_14">Grèce</button>
    <button class="boutton_categorie" id="cat_15">Suisse</button>
    
    <div class="contenu__restapi">
    </div>';
    return $contenu;
}

add_shortcode('em_destination', 'creation_destinations');
