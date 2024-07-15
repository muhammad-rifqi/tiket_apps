<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>

<div class="row">
    <div class="col-lg-12">
        <h1>Excel file:Display</h1> 
        <hr>      
    </div>
</div><!-- /.row -->
<p>
    <a href="add" class="btn btn-primary">Tambah</a>
</p>
<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">ID</th>
                <th class="header">Ticket Number</th>
                <th class="header">Submitted Date</th>                           
                <th class="header">Workshop</th>                      
                <th class="header">Service</th>
                <th class="header">Part</th>
                <th class="header">View</th>
                <th class="header">Edit</th>
                <th class="header">Delete</th>
            </tr>
        </thead>
        <tbody id="list">
             
        </tbody>
    </table>
</div>

<br>
<br>

<div class="row">
    <div class="col-md-6 text-center">
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
    </div>
    <div class="col-md-6 text-center">
        <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        window.addEventListener("load", async () => {
        
                var url = new URL(window.location.href);
                fetch(url.href+'api/list')
                .then(response => response.json())
                .then((data)=>{
                    var html = ``;
                    for(var i = 0 ; i < data.length; i++){
                        html += `<td> ${data[i]?.id}</td>
                        <td>${data[i]?.tiket_number}</td>   
                        <td>${data[i]?.submitted_date}</td> 
                        <td>${data[i]?.workshop}</td>                       
                        <td>${data[i]?.service}</td>
                        <td>${data[i]?.part}</td>
                        <td><a href="view/${data[i]?.id}" class="btn btn-info">View</a></td>
                        <td><a href="edit/${data[i]?.id}" class="btn btn-warning">Edit</a></td>
                        <td><a href="delete/${data[i]?.id}>" class="btn btn-danger" onclick="return confirm('Are You Sure ??')">Delete</a></td>
                    </tr>`;
                    }
                    document.getElementById("list").innerHTML = html;
                })


        });

        var urls = new URL(window.location.href);
        fetch(urls.href+'api/tiket')
        .then(dd => dd.json())
        .then((dd) => {

          var XX = []
          var YY = []
          for (var i = 0; i < dd.length; i++) {
            XX.push(dd[i]?.tiket_number);
            YY.push(dd[i]?.jml)
          }

          new Chart("myChart1", {
            type: "bar",
            data: {
              labels: XX,
              datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: YY
              }]
            },
            options: {
              legend: { display: false },
              scales: {
                yAxes: [{ ticks: { min: 0, max: 5 } }],
              }
            }
          });
        })

        fetch(urls.href+'api/workshop')
        .then(ddd => ddd.json())
        .then((ddd) => {

          var XXX = []
          var YYY = []
          for (var j = 0; j < ddd.length; j++) {
            XXX.push(ddd[j]?.workshop);
            YYY.push(ddd[j]?.jml)
          }

          new Chart("myChart2", {
            type: "bar",
            data: {
              labels: XXX,
              datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: YYY
              }]
            },
            options: {
              legend: { display: false },
              scales: {
                yAxes: [{ ticks: { min: 0, max: 5 } }],
              }
            }
          });
        })

</script>
</html>


