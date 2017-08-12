<?php include_once('admin_header.php');?>
    <div id="wrapper">
<?php include_once('navbar.php');?>



 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome <?php  echo strtoupper( $this->session->userdata('username'));?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           View Articles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Category Name</th>
                                        <th>Category Date</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        if(count($category)):
                                        foreach($category as $cat):
                                          $sno=1;
                                        //print_r($article);
                                 ?>
                                    <tr class="odd gradeX">
                                         <td><?php echo $sno;?></td>
                                        <td><?php echo $cat->cat_name; ?></td>
                                        
                                        <td><?php echo $cat->creation; ?></td>
                                        <td class="center">4</td>
                                       
                                    </tr>
                                    <?php endforeach; ?>
                                        <?php else: ?>
                                          <tr align="center">
                                          <td colspan="8">
                                            No Records Found
                                          </td>
                                        </tr>
                                      <?php endif;?>
                                    </tbody>
                                    </table>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>


 </div>
<?php include_once('admin_footer.php');?>
