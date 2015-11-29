<h3><?php echo isset($title) ? $title : "";?></h3>
<form action="" method="post" enctype="multipart/form-data" >
<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <td width="130">Category Name</td>
            <td>
                <input type="text" name="cate_name" value="<?php echo isset($info['cate_name']) ? $info['cate_name'] : "";?>"/>
                <span class="error"><?php echo form_error("cate_name");?></span>
            </td>
        </tr>
        <tr>
            <td width="130">Category Parent</td>
            <td>
                <select name="parent">
                    <option value="0">category cha</option>
                    <?php 
                        foreach($category as $key => $value){
                            if($value['parent'] == 0){
                                echo "<option value='".$value['id']."'>".$value['cate_name']."</option>";
                                foreach($category as $v){
                                    if($v['parent'] == $value['id']){
                                        echo "<option value='".$v['id']."'>-----".$v['cate_name']."</option>";
                                        foreach($category as $v2){
                                            if($v2['parent'] == $v['id']){
                                                echo "<option value='".$v2['id']."'>----------".$v2['cate_name']."</option>";
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="130">Category Status</td>
            <td>
                Active<input type="radio" name="status" value="0" <?php echo isset($info['status']) && $info['status'] == 0 ? "checked" : "checked";?>/>
                Disable<input type="radio" name="status" value="1"<?php echo isset($info['status']) && $info['status'] == 1 ? "checked" : "";?>/>
            </td>
        </tr>
        <tr>
            <td width="130">Category Image</td>
            <td>
                <input type="file" name="images" value=""/> 
                <?php if(isset($info['image']) && $info['image']):?>
                    <img src="/uploads/<?php echo $info['image'];?>" width="100"/>
                <?php endif;?>               
            </td>
        </tr> 
        <tr>
            <td width="130">&nbsp;</td>
            <td><input type="submit" name="ok" value="<?php echo isset($title) ? $title : "";?>"/></td>
        </tr>                                                                
    </tbody>    
</table>
</form>