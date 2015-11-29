<meta charset="utf-8"/>
<?php
    function dequi($data = array(),$parent = 0,$level = 0){
        foreach($data as $value){
            if($value['parent'] == $parent){
                echo "<tr>";
                    echo "<td style='padding-left:".$level."px;'>".$value['cate_name']."</td>";
                    echo "<td>".$value['status']."</td>";
                    echo "<td><img src='/uploads/".$value['image']."' width='50'/></td>";
                    echo "<td><a href='/admin/category/edit/".$value['id']."'>edit &nbsp; <a href='/admin/category/delete/".$value['id']."'>delete</td>";
                echo "</tr>";
                dequi($data,$value['id'],25);
            }
        }
    }
?>
<h1 class="page-header">
                            Quản lý Category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active" style="float: right;">
                                <a href="/admin/category/insert">
                                    <i class="fa fa-file"></i> Create New</a>
                            </li>
                        </ol>
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Category Status</th>
                                        <th>Category images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php dequi($category);?>                                        
                                </tbody>    
                            </table>
                            <div class="pagination">
                            <?php echo $this->pagination->create_links();?>
                            </div>
                            <style>
                                .pagination a{
                                    text-decoration: none;
                                    background: #ccc;
                                    border: 1px solid #f1f1f1;
                                    padding: 5px;
                                }
                            </style>   