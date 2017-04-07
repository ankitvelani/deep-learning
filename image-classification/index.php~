<?php
$imageName="";
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"./image/".$file_name);
         $imageName=$file_name;
         exec('python ./classify_image.py \''.$file_name.'\'',$output, $return_var);
        
      }else{
         print_r($errors);
      }
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Image Classification</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">ImageClassification</a>
       
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="row">
      <div class="col-lg-6">
        <div class="gap-150"></div>
        <h4>Input your image.</h4>
        <br>
           <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit" name="submit" value="Click to Analyze"/>
      </form>
      <br>
       
        
      </div>
      
      <div class="col-lg-6">
        <br>
       <?php

        if(isset($output))
        {
          echo "<img src='./image/".$imageName."' class='img-thumbnail' style='max-height: 380px;max-width:100%;'>";
          echo "<br><br>";
          echo "<table class='table table-bordered' style='margin-top:9px;'>
        <tr>
          <th>
            Category
          </th>
          <th>
            Confidence level
          </th>
        </tr>";
         
          foreach ($output as $data) {
            $t=explode("=", $data);
      
             echo "<tr>
                  <td>
                    ".substr($t[0], 0,strlen($t[0])-7)."
                  </td>
                  <td>
                      ".substr($t[1],0,strlen($t[1])-1)."
                  </td>
              </tr>";
                    
         
          }
          
        }
       ?>
       </table>
       <br><br>
      </div>
    </div>
    </div>

    <footer class="footer">
      <div class="container">
        <span class="text-muted"><a href="https://github.com/ankitvelani/deep-learning/tree/master/image-classification" target='_new'>Github</a></span>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>


  </body>
</html>
