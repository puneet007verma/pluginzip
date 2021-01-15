<?php
/*
Plugin Name: Test Plugins 
Description: this is custom table for wordpress
Author: Puneet Verma
*/
?>
<?php 
if( ! class_exists( 'WP_List_Table' ) ) 
{
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
add_action('admin_menu','my_custom_fn');

function my_custom_fn()
{
 add_menu_page('Page Title','Customer List','manage_options','owt-list-table','wp_list_table_funct');
}
function wp_list_table_funct()
{
   $action = isset($_GET['action']) ? trim($_GET['action']): "";
   if ($action == 'edit_page') 
   {
    $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']):"";
	  ob_start();
    include_once plugin_dir_path( __FILE__ ).'views/updatetable.php';
    $tamplate = ob_get_contents();
	  ob_end_clean();
	  echo $tamplate;
   }

      elseif ($action == 'add_new_customer') 
   {
    $post_id = isset($_GET['post_id']) ? intval($_GET['post_id']):"";
    ob_start();
    include_once plugin_dir_path( __FILE__ ).'views/ViewPage.php';
    $tamplate = ob_get_contents();
    ob_end_clean();
    echo $tamplate;
   }

   elseif ($action == 'delete') 
   {
	 global $wpdb;
	 $post_id =$_GET['post_id'];
   
	 $table_name = $wpdb->prefix."test_customer";
	 $example_data = $wpdb->get_results( "DELETE  FROM  $table_name where test_customer_id = '".$post_id."'"); 
   if (!$example_data) {
    header("Location: http://localhost/wordpress/wp-admin/admin.php?page=owt-list-table");  
   }
   else{echo "no";}

   }
   else
   {
	ob_start();
    include_once plugin_dir_path( __FILE__ ).'views/mytable.php';
    $tamplate = ob_get_contents();
	ob_end_clean();
	echo $tamplate;
   }
}

?>