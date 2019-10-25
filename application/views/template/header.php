<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content= "width=device-width, initial-scale=1.0">

	<title>Padiplay</title>

	<!-- style -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-select.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/chart.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/icon.css"> -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<?php $url = $this->uri->segment(1);
		if ($url == 'blog') {?>
			<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	<?php } ?>
	<style type="text/css">
		#pagination {
			color: blue;
		}
	</style>
	<style type="text/css">
  	label > input{ /* Menyembunyikan radio button */
  		visibility: hidden;
  		position: absolute;
  	}
  	label > input + img{ /* style gambar */
  		cursor:pointer;
  		border:2px solid transparent;
  	}
  	label > input:checked + img{ /* (RADIO CHECKED) style gambar */
  		border:2px solid #f00;
  	}
	</style>
	<style type="text/css">
         .current {
              color: green;
            }

            #pagin li {
              display: inline-block;
            }

            .prev {
              cursor: pointer;
            }

            .next {
              cursor: pointer;
            }

            .last{
              cursor:pointer;
              margin-left:5px;
            }

            .first{
              cursor:pointer;
              margin-right:5px;
            }
     </style>
</head>