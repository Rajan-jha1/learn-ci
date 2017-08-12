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
             <?php
 if($feedback=$this->session->flashdata('feedback')): 
  $feedback_class=$this->session->flashdata('feedback_class');
  ?>
  <div class="row">
  <div class="col-lg-6 col-lg-offset-3">
  <div id="id1" class="alert alert-dismissible <?php echo $feedback_class; ?>">
  <?php echo $feedback; ?>
  </div>
  </div>
  </div>
  <?php endif;?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Add Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php echo form_open_multipart('admin/add_category');?>
                        <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label>Category Name</label>
                                    </div>
                                    <div class="col-lg-7">
                                       <?php echo form_input(['name'=>'cname','class'=>'form-control','placeholder'=>'Category Name']);?>
                                       <?php echo form_error('cname');?>
                                    </div>
                                </div>
                            </div>
                           <br/>
                             <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-3">
                                        <label>Creation Date</label>
                                    </div>
                                    <div class="col-lg-7">
                                          <input class="form-control" value="<?php echo date('d-m-Y');?>" readonly="readonly" name="cdate">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-7 col-lg-offset-3">
                                    <?php  echo form_submit(['class'=>'btn btn-lg btn-primary btn-block','value'=>'Add Category']);?>
                                    </div>
                                </div>
                            </div>
                            </form>
                            </div>
                          </div>
                    </div>
             </div>
                 </div>
               </div>


 </div>
<?php include_once('admin_footer.php');?>