         <div class="row">
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <button class="pull-right btn btn-sm btn-rounded btn-info" data-toggle="modal" data-target="#myModal">Add Task</button>
                                        <h4 class="card-title">To Do list</h4>
                                        <h6 class="card-subtitle">List of your next task to complete</h6>
            
                                               <!-- Column -->
                                      <div class="to-do-widget m-t-20">
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"      aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >     
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Add Task</h4>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                                    <span aria-hidden="true">&times;</span> 
                                                  </button>
                                                </div>
                                          <div class="modal-body">
                                               <div class="form-group">
                                                  <label>Task name</label>
                                                    <input type="text" id="tasktitle" name="tasktitle" class="form-control" placeholder="Enter Task Name"> 
                                                  </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <input type="submit" id="submit_btn" class="btn btn-success"  name="submit_btn" value="Submit">
                                          </div>         
                                        </form>
                                      </div>
                                <!-- /.modal-content -->
                                  </div>
                                <!-- /.modal-dialog -->
                              </div>
                          </div>
                            <div class="slimScrollDiv" style="height:600px; overflow: hidden; overflow-y: auto">
                                          
                         <!-- Column -->
                      <div class="table-responsive">
                        <table class="list-task todo-list list-group m-b-0 " data-role="tasklist" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Title</th>
                                                        <th>Action</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <div class="slimScrollDiv" style="height:600px; overflow: hidden; overflow-y: auto">
                                           <?php

                                            $sql = "SELECT * FROM `todo_list`";
                                             $result = $conn->query($sql);
                     

                                            if(mysqli_num_rows($result)>0)
                                                {
                                                   while($data=mysqli_fetch_array($result))
                                                    {
                           
                                                    ?>
                                            <tr>
                                              <td class="list-group-item list-task" data-role="task">
                                                <div class="checkbox checkbox-info" >
                                                <input type="checkbox" id="<?php echo $data['id'];?>" class="" name="<?php echo $data['title'];?>">
                                              </td>
                                              <td>
                                              <div  for="<?php echo $data['id'];?>" class="">
                                               <div id="tasktitle"><?php echo $data['title'];?></div>
                                             </div>
                                              </td>
                                              <td>
                                                 <a href="#editModal" class="edit" data-toggle="modal"><i class="mdi mdi-marker pull-right editbutton " data-toggle="tooltip" title="Edit"></i></a>
                                                
                                                 <a href="#deleteModal"  class="delete" data-toggle="modal"><i class="mdi mdi-delete pull-right delete-row " data-toggle="tooltip" title="Delete"></i></a>
                                              </td>
                                            </tr>
                                                    <?php

                                                        }
                                                        }
                                                        ?>
                                                  
                                                         
                                                </tbody>
                                                </div>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
               </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
           
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

 

<div id="editModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  onSubmit="return editmodalvalidate();">
          <div class="modal-header">            
            <h4 class="modal-title">Edit Agent</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
          <div class="form-group">
       
               <label>Agent name</label>
               <input type="text"  name="name" id="agentname" class="form-control name_modal" required>
               <label>Email ID</label>
               <input type="email"  name="email" id="emailid" class="form-control email_id_modal"required>
               <label>Mobile No.</label>
               <input type="number" name="mobile" id="mobileno" class="form-control mobile_modal"  required>
               <label>Password</label>
               <input type="password"  name="pass" id="pass" class="form-control password_modal"  required>
               <label>Company name</label>
               <input type="text"  name="company" id="companyname" class="form-control company_modal" required> 
            </div>
          </div>
          <input type="hidden" name="a_id" class="agent_id">
          <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" name="Save_btn" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>


<div id="deleteModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="modal-header">            
            <h4 class="modal-title">Delete Agent</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">          
            <p>Are you sure you want to delete these Record?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <input type="hidden" name="a_id" class="agent_id">
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger " id="Delete_btn" name="Delete_btn" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>