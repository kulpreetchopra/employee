<?php
       include ('dbcon.php');
       $q3 = "select * from assign_leave order by id desc";
       $query3 = mysqli_query($con, $q3);
  ?>
  <div class="card container-fluid" style="background-color:transparent!important;">
  <h5 class="text-center">Leave <i class="fas fa-eye"></i> / <a style="color:#007bff!important;" href="index.php"><i class="fas fa-user-edit"></i></a></h5>
                    <div class="table-responsive">
                <table class="example table table-striped table-bordered" style="width:100%;color:white;">
                  <thead>                  
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>CASUAL_LEAVE</th>
                      <th>EARNED_LEAVE</th>
                      <th>SICK_LEAVE</th>
                      <th>Valid_from</th>
                      <th>Valid_to</th>
                      <th>Admin</th>
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
                        <td><?php echo$result3['assign_to']?></td>
                        <td><a href="mailto:<?php echo $result3['email']?>"><?php echo $result3['email']?></a></td>
                        <td><?php echo $result3['c_leave']?></td>
                        <td><?php echo $result3['e_leave']?></td>
                        <td><?php echo $result3['s_leave']?></td>
                        <td><?php echo $result3['valid_from']?></td>
                        <td><?php echo $result3['valid_to']?></td>
                        <td><?php echo$result3['assign_by']?></td>
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