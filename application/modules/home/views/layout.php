<?php 
    require("template/top.php");
    require("template/slide.php");
    require("template/category.php");
    require("template/best.php");
    $this->load->view($template);
    require("template/footer.php");
?>