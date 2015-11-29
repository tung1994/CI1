<?php
    $this->load->view("template/top");
    $this->load->view("template/left");

    if(isset($template) && $template != null){
        $this->load->view($template);
    }

    $this->load->view("template/footer");
?> 