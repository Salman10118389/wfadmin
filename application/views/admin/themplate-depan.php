    <?php $this->load->view('admin/themplate/header'); ?>
    <style type="text/css">
        .mt-10{
            margin-top: 10%;
        }
        .all{
            height: 700px;
        }
        .checkbox.login-checkbox label {
            padding-left: 20px;
        }       
    </style>
<body>


	<?php $this->load->view($file); ?>
    <?php $this->load->view('admin/themplate/footer'); ?>