<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter Import Excel data to mysql database Example</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="col-md-12">
    <form action="<?php echo base_url();?>import/importFile" method="post" enctype="multipart/form-data">
        <h1> Upload excel file : </h1>
        <hr> 
        <p> <input type="file" name="uploadFile" value="" class="form-control"/></p>
        <p> <input type="submit" name="submit" value="Upload" class="btn btn-primary"/> <a href="<?= base_url();?> " class="btn btn-warning"> Kembali </a></p>
    </form>
    </div>
  </div>
</body>
</html>