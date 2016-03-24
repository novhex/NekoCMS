<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admincontroller/index'); ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Dashboard Users</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Management</h1>
            </div>
        </div><!--/.row-->
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">User List</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                    <table id="tbl_users">
                                            <thead>
                                            
                                                <th> # </th>
                                                <th> Photo </th>
                                                <th> Username </th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Select Action</th>

                                          
                                            </thead>
                                            <tbody>
                                                <?php foreach($userslist as $users): ?>
                                                    <tr>
                                                    <td><?php echo $users['id']; ?></td>
                                                    <td><?php echo "<img class='img-responsive img-thumbnail' style='width:55px; height:60px;' src='".$users['profile_photo']."'>";?></td>
                                                    <td><?php echo $users['username'];?></td>
                                                    <td><?php echo $users['name'];?></td>      
                                                    <td><?php echo $users['email'];?></td>
                                                    
                                                    <td>
                                                        <a href="#" class="btn btn-primary"> Edit</a>
                                                        <a href="#" class="btn btn-primary"> Delete </a>
                                                        <a href="#" class="btn btn-primary"> Change Role </a>
                                                    </td> 

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        
    </div><!--/.main-->

    <script type="text/javascript">
    $(document).ready(function() {
        // body...
            $("#tbl_users").DataTable();
    });
    </script>