<?php include('headerside.php'); ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Musics</h1>

                            <!-- <button onclick="printdata()">Print</button> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Musics DataTables</h6>
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive"  >
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Song</th>
                                            <th>Like</th>
                                            <th>date</th>
                                            <th>Visibility</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td> <i class="fas fa-fw fa-cog"></i></td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
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