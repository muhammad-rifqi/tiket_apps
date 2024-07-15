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
    <form action="<?php echo base_url();?>import/multiupload" method="post" enctype="multipart/form-data">
        <h1> Upload Gambar : </h1>
        <hr> 
        <p> <input type="hidden" name="id_tiket" value="<?= $detail[0]['id'];?>" class="form-control"/></p>
        <p> <input type="text" name="tiket_number" value="NO Tiket : <?= $detail[0]['tiket_number'];?>" class="form-control" disabled/></p>
        <p> <input type="file" name="foto[]" id="foto" multiple class="form-control"/></p>
        <p> <input type="submit" name="submit" value="Upload" class="btn btn-primary"/> <a href="<?= base_url();?> " class="btn btn-warning"> Kembali </a></p>
    </form>
    </div>
  </div>
</body>
<script>
    document.getElementById("foto").addEventListener("change", async (e) => {
        if (e?.target?.files?.length < 2) {
                alert("Only 3 or more files accepted.");
                window.location.reload();
        }else{
            console.log("OKE")
        }
    });
</script>
</html>