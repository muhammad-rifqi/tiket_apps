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
        <h1> Detail Data  : </h1>
        <hr> 
        <p> TICKET NUMBER : <b> <?= $detail[0]['tiket_number'];?> </b> </p>
        <p> SUBMITTED DATE : <b> <?= $detail[0]['submitted_date'];?> </b> </p>
        <p> WORKSHOP : <b> <?= $detail[0]['workshop'];?> </b> </p>
        <p> SERVICE : <b> <?= $detail[0]['service'];?> </b> </p>
        <p> PART : <b> <?= $detail[0]['part'];?> </b> </p>
    </div>
  </div>
</body>
</html>