<?php

/*
Plugin Name: Example Plugin
Plugin URI:
Description:Example Plugin for intern
Author: Rajat
Author URI:
Version:0.1

*/
	
function aad_admin_page(){
    global $aad_settings;
    $aad_settings= add_options_page(__('Admin Ajax Demo', 'aad'), __('Admin Ajax','aad'),'manage_options','admin-ajax-demo','aad_render_admin');

}
add_action('admin_menu','aad_admin_page');

function aad_render_admin(){
    ?>

 
    <?php    include('v_form.php'); ?>



    <?php
}


function aad_load_scripts($hook) {
    global $aad_settings;

    if($hook != $aad_settings)
        return;

    wp_enqueue_script('aad-ajax', plugin_dir_url(__FILE__).'js/aad-ajax.js', array('jquery'));
}
add_action('admin_enqueue_scripts' , 'aad_load_scripts');

function aad_process_ajax(){


?><table border="1">
<tr>
 <th>ID</th>
 <th>Name</th>
 <th>Email</th>
</tr>
  <?php
    global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM wp_my_table" );
    foreach ( $result as $print )   {
    ?>
    <tr>
    <td><?php echo $print->id;?></td>
    <td><?php echo $print->name;?></td>
    <td><?php echo $print->email;?></td>
    </tr>
        <?php }
  ?>    
  </div>          
<?php





    die();
}
add_action('wp_ajax_aad_get_results','aad_process_ajax');

?>