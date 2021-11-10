<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <head>
        <title>Data Pelanggan ARA LISTRIK</title>
        <?php 
        echo link_tag('assets/css/bootstrap.css'); 
        echo link_tag('assets/css/default.css'); 
        echo link_tag('assets/js/jquery-ui.css'); 
        ?>
    </head>
    <body>
        <?php echo $contens; ?>
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <script>
            $( "#datepicker" ).datepicker({
	           inline: true
            });
        </script>
    </body>
</html>