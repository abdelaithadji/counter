<?php
/*
	Plugin Name: Counter Plugin
	Description: 
   	Plugin URI: http://abdellahaithadji.com
	Author: Abdellah Ait hadji
	Author URI: http://abdellahaithadji.com
	License: GPL2
	Version: 1.0.1
*/

/*  Copyright 2015 Abdellah Ait hadji (email : abdel@abdellahaithadji.com)

    This program is free software; you can redistribute it and/or modify.
  
*/

add_action("init", "counters_init");
add_action('init', 'scripts_counter');


function counters_init(){
 

		$labels = array(
			
			"name" => "Compteur",
			"singular_name" => "Compteur",
			"add_new" => "Ajouter un Compteur",
			"add_new_item" => "Ajouter un nouveau Compteur",
			"edit_item" => "Editer un Compteur",
			"new_item" => "Nouveau Compteur",
			"view_item" => "Voir le Compteur",
			"search_items" => "Rechercher un Compteur",
			"not_found" => "Aucun Compteur",
			"not_found_in_trash" => "Aucun Compteur dans la corbeille",
			"parent_item_colon" => "",
			"menu_name" => "Votes",	

		);       
                register_post_type("counter", array(
                    "public" => true,
                    "publicly_queryable" => false,
                    "labels" => $labels,
                    "menu_position" => 6,
                    "capability_type" => "post",
                    "supports" => array("item", "thumbnail",)
                ));

}

function counters_metaboxes(){
      
	add_meta_box("compteurs", "valeur", "counters_metabox", "counter", "normal", "high");
}

function counters_metabox($object){

	wp_nonce_field("counters", "counters_nonce");
	?>
	


	<?php

}

function scripts_counter() {
  	
	 wp_enqueue_script('twentysixty', plugins_url('js/counter.js', __FILE__));
          wp_enqueue_script('twentysixty', plugins_url('js/jquery.counter.js', __FILE__));
	 wp_enqueue_style('twentysixty', plugins_url('css/counter.css', __FILE__));

}




?>