<?php
       include ('dbcon.php');
       $q3 = "select * from task order by id desc";
       $query3 = mysqli_query($con, $q3);
  ?>
  <div class="card container-fluid" style="background-color:transparent!important;">
  <h5 class="text-center">Task <i class="fas fa-eye"></i> / <a style="color:#007bff!important;" href="index.php"><i class="fas fa-user-edit"></i></a></h5>
  <p>
  <i class="fas fa-spinner" style="color:blue;font-size: 20px;"></i>Unseen,<i class="fas fa-stop-circle" style="color:orange;font-size: 20px;"></i>Running,<i class="fas fa-check-circle" style="color:green;font-size: 20px;"></i>Completed,<i class="fas fa-times-circle" style="color:red;font-size: 20px;"></i>Uncompleted.</p>
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Task</th>
                      <th>Admin</th>
                      <th>Status</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $i=1;
                      while ($result3 = mysqli_fetch_array($query3)) {
                      ?>
                        <td><?php echo$i;?></td>
                        <?php $i++;?>
                        <td><?php echo$result3['name']?></td>
                        <td><a href="mailto:<?php echo $result3['email']?>"><?php echo $result3['email']?></a></td>
                        <td><?php echo substr($result3['message'],0,20);echo"..."?></td>
                        <td><?php echo$result3['admin']?></td>
                        <td class="text-center"><?php
                        if($result3['status']=='green'){
                         ?>
                         <i class="fas fa-check-circle" style="color:green;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result3['status']=='orange'){
                         ?>
                         <i class="fas fa-stop-circle" style="color:orange;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result3['status']=='red'){
                         ?>
                         <i class="fas fa-times-circle" style="color:red;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         if($result3['status']=='unseen'){
                         ?>
                         <i class="fas fa-spinner" style="color:blue;font-size: 30px;"></i>
                        <?php  # code...
                         } 
                         ?></td>
                        <td><?php echo$result3['time']?></td>
                        <td>
                          <a href="message.php?id=<?php echo $result3['id']?>"><i class="fas fa-comments"></i>&nbsp;</a>
                          <a class="text-left" href="taskedit.php?id=<?php echo $result3['id']?>"><i class="fas fa-edit"></i>&nbsp;</a>
                          <a href="taskdelet.php?id=<?php echo $result3['id']?>">&nbsp;<i class="fas fa-trash text-right"></i></a>
                        </td>
                    </tr>
                    <?php
                  }
                  ?> 
                  </tbody> 
                </table>
              </div>
            </div>