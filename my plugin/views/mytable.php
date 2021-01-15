<?php 


class my_custom_list_table extends wp_list_table
{
    public function getdata()
      {
         global $wpdb;
         $table_name = $wpdb->prefix."test_customer";
         $example_data = $wpdb->get_results( "SELECT  *   FROM  $table_name ",ARRAY_A);
         return $example_data;     
      }

      function searchingdata()
      {
         global $wpdb;
         if (isset($_POST['s']) && $_POST['s']) 
         {
         
         $table_name = $wpdb->prefix."test_customer";
         $search_term = isset($_POST['s'])?trim($_POST['s']):'';

         $example_data = $wpdb->get_results( "SELECT  *  FROM  $table_name where 
          firstname = '".$search_term."'",ARRAY_A);
     
         return $example_data;
         }
  
             
      }

    public function prepare_items()
    {   
    	$search_data = $this->searchingdata();
        $data = $this->getdata();
        $coulmns = $this->get_columns();
        $sortable    = $this->get_sortable_columns();
        $this->_column_headers = array($coulmns,$sortable);
       
             $per_page = 5;
             $current_page = $this->get_pagenum();
             $total_items = count($this->getdata());           

             // only ncessary because we have sample data
             $data = array_slice($data,(($current_page-1)*$per_page),$per_page);       

             $this->set_pagination_args( array(
              'total_items' => $total_items,                  //WE have to calculate the total number of items
              'per_page'    => $per_page                     //WE have to determine how many items to show on a 
              ) );

            if ((isset($_POST['s']) &&$_POST['s']))
             {
                $this->items = $this->searchingdata();
             }
             else
             {
              $this->items = $data;
             }  
    }
    function extra_tablenav( $which ) {
      if ( $which == "top" ){
        echo '<h2><a href="admin.php?page=owt-list-table&action=add_new_customer">Add New customer</a></h2>';
     }

   }
     public   function get_columns()
      {
        $columns = array(
          'cb'        => '<input type="checkbox" />',
          'test_customer_id' => 'ID',
          'image'     => 'Image',
          'firstname'    => 'First Name',
          'lastname'      => 'last Name',
          'email' => 'Email',
          'status' => 'Status',
          'action' => 'Action',
      );
        return $columns;
      }           

    public function column_action($item)
    {
               $actions = array(
               'view'      => sprintf('<a href="?page=%s&action=%s&post_id=%s" target="_blank">Edit</a>',$_GET['page'],'edit_page',$item['test_customer_id']),
               'delete'    => sprintf('<a href="?page=%s&action=%s&post_id=%s">delete</a>',$_GET['page'],'delete',$item['test_customer_id']),
                );

                return sprintf('%1$s %2$s', $item['action'], $this->row_actions($actions));
    }



        function get_sortable_columns()
          {
            $sortable_columns = array(
              'booktitle'  => array('booktitle',false),
              'author'     => array('author',false),
              'isbn'       => array('isbn',false));
            return $sortable_columns;
          }
    public function get_bulk_actions()
    {
                   $actions = array(
                      'delete'    => 'Delete'
                     );
                      return $actions;
    }
                
    public function column_cb($item) 
            {
                return sprintf(
               '<input type="checkbox" name="book[]" value="%s" />', $item['ID']
               );

            }

    public  function column_default( $item, $column_name )
       {
        switch( $column_name ) 
        { 
          case 'test_customer_id':
          case 'image':
          case 'firstname':
          case 'lastname':
          case 'email':
          case 'status':
          case 'action':
            return $item[ $column_name ];
          default:
            return print_r( $item, true ); //Show the whole array for troubleshooting purposes
        }
      }
}

function summaryoffunction()
{
	
		  $my_custom_list_table = new my_custom_list_table();
		  $my_custom_list_table->prepare_items();
		  $my_custom_list_table->get_columns();
          $my_custom_list_table->get_sortable_columns();
          $my_custom_list_table->searchingdata();
	      ?>
          <form method="post">
          <input type="hidden" name="page" value="owt-list-table" />
          <?php $my_custom_list_table->search_box("search_box", "search_id"); ?>
          </form>
          <?php 

$my_custom_list_table->display();
}
summaryoffunction();

?> 
