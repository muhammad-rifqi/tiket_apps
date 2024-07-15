<?php
$this->load->view('templates/header');
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Excel file:Dispaly</h1>       
    </div>
</div><!-- /.row -->
<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">First Name</th>
                <th class="header">Last Name</th>                           
                <th class="header">Email</th>                      
                <th class="header">DOB</th>
                <th class="header">Contact Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($employeeInfo) && !empty($employeeInfo)) {
                foreach ($employeeInfo as $key => $element) {
                    ?>
                    <tr>
                        <td><?php echo $element['first_name']; ?></td>   
                        <td><?php echo $element['last_name']; ?></td> 
                        <td><?php echo $element['email']; ?></td>                       
                        <td><?php echo $element['dob']; ?></td>
                        <td><?php echo $element['contact_no']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">There is no employee.</td>    
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div> 
<div class="row">
    <div class="col-lg-12"> 
<a class="pull-right btn btn-primary btn-xs" style="margin: 2px" href="http://techarise.com/import-excel-file-mysql-codeigniter/"><i class="fa fa-mail-reply"></i> Tutorial</a>          
    </div>
</div><!-- /.row -->
<?php
$this->load->view('templates/footer');
?>
