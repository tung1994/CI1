<h1 class="page-header">New User</h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active" style='float:right;'>
                                <a href='/admin/user'><i class="fa fa-file"></i> 
                                Back</a>
                            </li>
                        </ol>
                        <form action="" method="post">
                            <label>username</label>
                            <input type="text" name="name" value="<?php echo set_value('name');?>"/>
                            <span class="error"><?php echo form_error("name");?></span>
                            <br />
                            <label>email</label>
                            <input type="text" name="email" value="<?php echo set_value('email');?>"/>
                            <span class="error"><?php echo form_error("email");?></span>
                            <br />
                            <label>password</label>
                            <input type="password" name="pass" value=""/>
                            <span class="error"><?php echo form_error("pass");?></span>
                            <br />
                            <label>repass</label>
                            <input type="password" name="repass" value=""/>
                            <span class="error"><?php echo form_error("repass");?></span>
                            <br />
                            <label>address</label>
                            <input type="text" name="address" value="<?php echo set_value('address');?>"/>
                            <span class="error"><?php echo form_error("address");?></span>
                            <br />
                            <label>&nbsp;</label>
                            <input type="submit" name="ok" value="insert"/>
                        </form>