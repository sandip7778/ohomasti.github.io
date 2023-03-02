<?php include('headerside.php'); ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
                    
                            <!-- <button onclick="printdata()">Print</button> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users DataTables</h6>
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive"  >
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Status</th>
                                            <th>User Name</th>
                                            <th>Number</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Status</th>
                                            <th>User Name</th>
                                            <th>Number</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pending</td>
                                            <td>sandip@077</td>
                                            <td>9815752781</td>
                                            <td>ydvsandip@gmail.com</td>
                                            <td>
                                        
                                              <button><i class="fas fa-fw fa-cog"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Pending</td>
                                            <td>murli@077</td>
                                            <td>9815752781</td>
                                            <td>ydvsandip@gmail.com</td>
                                            <td>
                                            <form action="code.php" method="post">
                                                <!-- <input type="hidden" name="deleteid" value="<?php echo $row['sid'] ?>"> -->
                                                <button type="submit" name="delete" class="actionbtn" value=""><i class="fas fa-trash deleteicon" id="dataprint" ></i></button>
                                            </form> 

                                            <form action="studentupdate.php" method="post">
                                                <!-- <input type="hidden" name="usid" value="<?php echo $row['sid'] ?>">
                                                <input type="hidden" name="uname" value="<?php echo $row['name'] ?>">
                                                <input type="hidden" name="uaddress" value="<?php echo $row['address'] ?>">
                                                <input type="hidden" name="udob" value="<?php echo $row['dob'] ?>">
                                                <input type="hidden" name="uemail" value="<?php echo $row['email'] ?>">
                                                <input type="hidden" name="upassword" value="<?php echo $row['password'] ?>">
                                                <input type="hidden" name="usclass" value="<?php echo $row['sclass'] ?>">
                                                <input type="hidden" name="urollno" value="<?php echo $row['rollno'] ?>"> -->
                                                <button type="submit" name="studentupdate"  class="actionbtn" value=""><i class="fas fa-pencil-square editicon" ></i></i></button>
                                            </form>
                    
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- <script>
                function printdata() {
                    var body = document.getElementById("page-top").innerHTML;
                    var data = document.getElementById("prindatatable").innerHTML;
                    document.getElementById("page-top").innerHTML=data;
                    // alert(body);
                    window.print();
                    document.getElementById("page-top").innerHTML=body;
                }
               
            </script> -->
        <?php include('footer.php'); ?>    