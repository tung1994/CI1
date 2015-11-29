<ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i>
        <?php echo isset($title) ? $title : ""; ?>
    </li>
    <li style="float:right;">
    <a href="/admin/product">Back</a>
    </li>
</ol>
<form role="form" method="post" enctype="multipart/form-data">
    <div class="radio form-group">
        <label>Category</label>
        <select name="category" class="form-control" style="width:200px;">
            <option value="">chon category</option>
            <?php if(isset($category) && $category != null):?>
            <?php foreach($category as $value):
                if(isset($product['cate_id']) && $product['cate_id'] == $value['id']){
                    $selected = "selected = 'selected'";
                }else{
                    $selected = "";
                }
            ?>
            <option value="<?php echo $value['id'];?>" <?php echo $selected;?>><?php echo $value['cate_name'];?></option>
            <?php endforeach; endif;?>
        </select>
        <?php echo form_error("category");?>
    </div>
    <div class="form-group has-success">
        <label class="control-label" for="inputSuccess">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo isset($product['name']) ? $product['name'] : "";?>" />
        <?php echo form_error("name");?>
    </div>
    <div class="form-group has-success">
        <label class="control-label" for="inputSuccess">Price</label>
        <input type="text" class="form-control" name="price" value="<?php echo isset($product['price']) ? $product['price'] : "";?>" />
        <?php echo form_error("price");?>
    </div>
    <div class="form-group has-success">
        <label class="control-label" for="inputSuccess">Infomation</label>
        <textarea rows="3" name="info" style="width: 600px; height: 100px;" ><?php echo isset($product['info']) ? $product['info'] : "";?></textarea>
        <?php echo form_error("info");?>
    </div>
    <div class="radio">
        <label>Status </label>
        <select name="status" class="form-control" style="width:100px;">
            <option value="0" <?php echo isset($product['status']) &&  $product['status'] == 0 ? "checked = 'checked'" : "";?>>Enable</option>
            <option value="1" <?php echo isset($product['status']) &&  $product['status'] == 1 ? "checked = 'checked'" : "";?>>Disable</option>
        </select>
    </div>
    <div class="form-group has-success">
        <label class="control-label" for="inputSuccess">Image</label>
        <input type="file" name="image" class="form-control" style="width:200px;"/>
        <br/>
        <?php if(isset($product['image']) && $product['image'] != null):?>
            <img src="/uploads/<?php echo $product['image'];?>" width="100"/>
        <?php endif;?>
    </div>
    <div class="form-group has-success"> 
        <label>&nbsp;</label>
        <input type="submit" name="ok" class="form-control btn btn-primary" style="width:80px;"/>
    </div>
</form> 
   