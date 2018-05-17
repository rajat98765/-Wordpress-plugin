<?php
global $wpdb;
// creates my_table in database if not exists
$table = $wpdb->prefix . "my_table"; 
$charset_collate = $wpdb->get_charset_collate();
$sql = "CREATE TABLE IF NOT EXISTS $table (
    `id` mediumint(9) NOT NULL AUTO_INCREMENT,
    `name` text NOT NULL,`email` text NOT NULL,
UNIQUE (`id`)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

?>




<div class="wrap">
   <h2> <?php _e('Admin Ajax Demo', 'aad'); ?></h2>
<form action="#v_form" method="post" id="aad-submit">
    <label for="visitor_name"><h3>Hello there! What is your name?</h3></label>
    <input type="text" name="visitor_name" id="visitor_name" />
    <br>
   <label for="visitor_email"><h3>Hello there! What is your email?</h3></label>
    <input type="email" name="visitor_email" id="visitor_email"/>
    <br>
    <input type="submit" class="button-primary" name="aad-submit" value="Submit" />
</form>
<br>
<form action="#v_form" method="post" id="aad-form">
    <input type="submit" class="button-primary" name="aad-form" value="<?php _e('Get Results','aad'); ?>" />
</form>
<div id="aad_results">
    
</div>
<br>




        



</div>


<?php
if ( isset( $_POST["aad-submit"] ) && $_POST["visitor_name"] != "" && $_POST["visitor_email"] !="") {
    $table = $wpdb->prefix."my_table";
    $name = strip_tags($_POST["visitor_name"], "");
    $email = strip_tags($_POST["visitor_email"], "");
    $wpdb->insert( 
        $table, 
        array( 
            'name' => $name,
            'email' => $email
        )
    );
    $html = "<p>Your name <strong>$name</strong> and email <strong>$email</strong> was successfully recorded. Thanks!!</p>";
}
// if the form is submitted but the name is empty
if ( isset( $_POST["aad-submit"] ) && ($_POST["visitor_name"] == "" or $_POST["visitor_email"] == "" ))
    $html = "<p>You need to fill the required fields.</p>";

?>




<?php

