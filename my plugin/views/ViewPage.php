<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'fansco';
$conn =  mysqli_connect($host,$user,$pass,$database);
?>

<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Open+Sans");

/* Styles */
* {
  margin: 0;
  padding: 0;
  }
@media(max-width: 768px)
{

 .container {
  width: 488px;
  margin: 20px auto;
}

form {
  padding: 20px;
  background: #2c3e50;
  color: #fff;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
}
    .overlay{
        display: none;
    position: absolute;
    width: 5%;
    height: 10%;
        top: 0;
        left: 0;
        z-index: 999;
        transition-delay: 5s;
        background: rgba(255,255,255,0.0) url("/objex/final.gif") center no-repeat ;
        -webkit-transition: background-image s;
            margin-top: 600px !important;
    margin-left: 770px;
        transition-delay: 5s;
    }

    /* Turn off scrollbar when body element has the loading class */
    body.loading{
        overflow: hidden;
        
    }
    /* Make spinner image visible when body element has the loading class */
    body.loading .overlay{
        display: block;
        
    }

    label#answer {
    width: 37%;
    margin-top: 19px !important;
    height: 40px;
    text-align: center;
    background-color: firebrick;
    margin: auto;
    border-radius: 8px;
    font-size: 25px;
    /* margin-left: 24px; */
}

body {
  font-family: "Open Sans";
  font-size: 14px;
  background-color: #eee;
}

.container {
  width: 500px;
  margin: 25px auto;
}

form {
  padding: 20px;
  background: #2c3e50;
  color: #fff;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  border-radius: 4px;
}
form label,
form input,
form button {
  border: 0;
  margin-bottom: 3px;
  display: block;
  width: 100%;
  font-size: 21px;
}
form input {
  height: 45px;
  line-height: 25px;
  background: #fff;
  color: #000;
  padding: 0 6px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
input[type=submit] {
    -webkit-appearance: button;
    cursor: pointer;
    font-size: 21px;
}
form button {
  height: 30px;
  line-height: 30px;
  background: #e67e22;
  color: #fff;
  margin-top: 10px;
  cursor: pointer;
}
form .error {
  color: #ff0000;
}

h2{
  color: skyblue;
  text-align: center;
}
  </style>

</head>
<body>

<div class="container">
  <h2>Customer Detail</h2>
 <form method="POST" name =myform action="" id="myform"> 

    <label for="firstname">First Name</label>
    <input type="text"  id="firstname" name="firstname" value='<?php echo  $firstname; ?>' />

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" value='<?php echo  $lastname; ?>'  />


    <label for="email">Email</label>
    <input type="text" name="email" id="email" value='<?php echo  $email; ?>' />

<!--     <label for="lastname">Image</label>
    <input type="button" value="Upload Image" class="button-primary" id="upload_image"/>
    <input type="hidden" name="attachment_id" class="wp_attachment_id" value="" /> </br>
    <img src="" class="image" style="display:none;margin-top:10px;"/> -->
<?php

    if( $image = wp_get_attachment_image_src( $image_id ) ) {
 
  echo '<a href="#" class="misha-upl"><img src="' . $image[0] . '" /></a>
        <a href="#" class="misha-rmv">Remove image</a>
        <input type="hidden" name="misha-img" value="' . $image_id . '">';
 
} else {
 
  echo '<a href="#" class="misha-upl">Upload image</a>
        <a href="#" class="misha-rmv" style="display:none">Remove image</a>
        <input type="hidden" name="misha-img" value="">';
 
}
?>
  <!--       <label for="image">Image</label>
    <input type="image" name="threeparameter" id="threeparameter" placeholder="ISBN" value='<?php echo  $image; ?>'/> -->

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value='<?php echo  $password; ?>' />

    
    <label for="confirmpass">Confirm Password</label>
    <input type="password" name="confirmpass" id="confirmpass" value='<?php echo  $password; ?>' />

    <label for="city">City</label>
    <input type="text" name="city" id="city"  value='<?php echo  $city; ?>' />

    <label for="country">Country</label>
    <input type="text" name="country" id="country" value='<?php echo  $country; ?>' />

    <label for="state">State</label>
    <input type="text" name="state" id="state" value='<?php echo  $state; ?>'  />  
    </br></br>
<!-- <div class="clickbtn">
 <input type="submit" name="" value="Save" id="submitbtn"class="btn btn-success"> -->
<!--  <button name="submitbtn">Save</button> -->
 <input type="submit" name="submit">
     <input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" /></br>
</br></br>
 </div>
  </form>
</div>
</body>
</html>
<!--  jquery script  -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<!--  validation script  -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script>
 
<!--  jsrender script  -->
<script src="http://cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>
 
<!-- Essential JS UI widget -->
<script src="http://cdn.syncfusion.com/16.4.0.52/js/web/ej.web.all.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


<script type="text/javascript">
  
  $("#myform").validate({
  rules: {
    firstname: {
      required: true,
      minlength: 2
    },
      lastname: {
      required: true,
      minlength: 2
    },
             email: {
      required: true,
      minlength: 2,
      email:true
    },
          password: {
      //required: true,
      minlength: 5
    },
              confirmpass: {
      //required: true,
      minlength: 5,
      equalTo: "#password"
    },
    
          city: {
      required: true,
      minlength: 2
    },
              country: {
      required: true,
      minlength: 2
    },
              state: {
      required: true,
      minlength: 2
    },
  },
  messages: {
    firstname: {
      required: "please enter firstname",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },
        lastname: {
      required: "please enter lastname",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },
            email: {
      required: "please enter email",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },
                password: {
      required: "please enter password",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },
                    confirmpass: {
      required: "please enter confirm password",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },

        city: {
      required: "please enter city",
      minlength: jQuery.validator.format("At least {0} characters required!")
       },

            country: {
      required: "please enter country",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },

            state: {
      required: "please enter state",
      minlength: jQuery.validator.format("At least {0} characters required!")
    },

  }
});
jQuery(function($){
 
  // on upload button click
  $('body').on( 'click', '.misha-upl', function(e){
 
    e.preventDefault();
 
    var button = $(this),
    custom_uploader = wp.media({
      title: 'Insert image',
      library : {
        // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
        type : 'image'
      },
      button: {
        text: 'Use this image' // button label text
      },
      multiple: false
    }).on('select', function() { // it also has "open" and "close" events
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      button.html('<img src="' + attachment.url + '">').next().val(attachment.id).next().show();
    }).open();
 
  });
 
  // on remove button click
  $('body').on('click', '.misha-rmv', function(e){
 
    e.preventDefault();
 
    var button = $(this);
    button.next().val(''); // emptying the hidden field
    button.hide().prev().html('Upload image');
  });
 
});
</script>

<?php 
if (isset($_POST['submit']))
 {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $state = $_POST['state'];

    $inserted = "INSERT INTO wp_test_customer (firstname,lastname,email,password,city,country,state) VALUES('".$firstname."','".$lastname."','".$email."','".$password."','".$city."','".$country."','".$state."')";
  
  if (mysqli_query($conn,$inserted)) {
      
      header("Location: http://localhost/wordpress/wp-admin/admin.php?page=owt-list-table");
  }
  else
  {
     echo "Error: " . $inserted . "<br>" . mysqli_error($conn);
  }

 }
?> 


