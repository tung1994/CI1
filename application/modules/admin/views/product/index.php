<meta charset="utf-8"/>
<h1 class="page-header">
                            Quản lý sản phẩm
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  
                                <?php echo isset($title) ? $title : "";?>
                            </li>
                            <li class="active" style="float: right;">
                                <a href="/admin/product/insert">New product</a>
                            </li>
                        </ol>
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Hinh anh</th>
                                        <th>Ten san pham</th>
                                        <th>Gia</th>
                                        <th>Category</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($product) && $product != null):?>
                                    <?php foreach($product as $value):?> 
                                    <tr>
                                        <td><?php echo $value['id'];?></td>
                                        <td><?php echo $value['image'] != null ? "<img src='/uploads/".$value['image']."' width='60'/>" : "";?></td>
                                        <td><?php echo $value['name'];?></td>
                                        <td><?php echo number_format($value['price'],0);?></td>
                                        <td><?php echo $value['cate_name'];?></td>
                                        <td>
                                            <a href="/admin/product/edit/<?php echo $value['id'];?>">Edit</a> |
                                            <a onclick='return confirm("Are you want to delete ?");' href="/admin/product/delete/<?php echo $value['id'];?>">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif;?> 
                                </tbody>
                            </table>