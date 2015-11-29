<meta charset="utf-8"/>
<div id="content" class="float_r">
    <?php if(isset($product) && $product != null):?>
    <h1>Danh sách sản phẩm</h1>
    <?php foreach($product as $list):?>
    <div class="product_box">    
   	    <a href=""><img src="/uploads/<?php echo $list['image'];?>" alt="Image 01" width="200" height="150"/></a>
        <h3><?php echo $list['name'];?></h3>
        <p class="product_price"><?php echo number_format($list['price'],0);?></p>
        <a href="" class="add_to_card">Add to Cart</a>
        <a href="" class="detail">Detail</a>
    </div> 
    <?php  endforeach; endif;?>       	              
</div> 