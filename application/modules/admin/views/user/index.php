<meta charset="utf-8"/>
<h1 class="page-header">
                            Quản lý User
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Trang chủ</a>
                            </li>
                            <li class="active" style='float:right;'>
                                <a href='/admin/user/insert'><i class="fa fa-file"></i> 
                                Insert User</a>
                            </li>
                        </ol>
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($user) && $user != null) :
                                               foreach($user as $key => $value) : ?>
                                                   <tr>
                                                        <td><?php echo $value['name'];?></td>
                                                        <td><?php echo $value['email'];?></td>
                                                        <td><?php echo $value['address'];?></td>
                                                        <td><a href="/admin/user/edit/<?php echo $value['id'];?>">edit</a>&nbsp;
                                                            <a onclick='return confirm("ban co thuc su muon xoa")' href="/admin/user/delete/<?php echo $value['id'];?>">delete</a>
                                                        </td>
                                                   </tr>
                                    <?php  endforeach; endif;?>  
                                </tbody>
                            </table>