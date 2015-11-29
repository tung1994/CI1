<meta charset="utf-8"/>
<div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>Danh mục sản phẩm <a href="http://fr.photohq.com" title="photos de la reserve" class="more_link"  target="_blank"></a></h3>   
                <div class="content"> 
                    <?php if(isset($category) && $category != null):?>
                    <?php foreach($category as $value):?>
                	<ul class="sidebar_list">
                    	<li class="first"><a href="#"><?php echo $value['cate_name'];?></a></li>
                        
                    </ul>
                    <?php endforeach;endif;?>
                </div>
            </div>