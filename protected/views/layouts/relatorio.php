<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode("SIPESQ"); ?></title>

	<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAwtW6REnoXPwabzosDJ1ZbxSf6zeDUL0NX_-81yZ_3MTVk-1i4xQ4nST236nGieybG_Uiv9EE12qxDg"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sipesq.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" />

	
	<style>
	body{
		display: block;
		margin:0 auto;
		background-color: #fff;
		font-family: 'Open Sans', Arial, Helvetica, sans-serif;
		/*font-size: 62.5%;  with this 1em = 10px */
		/*padding-top: 42px;*/
		font-size: 14px;
	}

	@media print{
		body{
			display: block;
			margin:0 auto;
			background-color: #fff;
			font-family: 'Open Sans', Arial, Helvetica, sans-serif;
			font-size: 12px;

		}
	}

	h1, h2, h3, h4, h5, h6 {
		font-family: 'Open Sans', Arial, Helvetica, sans-serif;
		font-weight: 700;00;
	}

	@media print{
		h1, h2, h3, h4, h5, h6 {
			font-family: 'Open Sans', Arial, Helvetica, sans-serif;

		}
	}

	.bar_chart{
		width: 800px;
		height: 300px;
	}
	.char-table{
		margin-top: 20px;
	}

	.view-atividade{
		font-weight: 400;
		font-style: normal;

	}
	

	@media all {
		.page-break	{ display: none; }
	}

	@media print {
		.page-break	{ display: block; page-break-before: always; }
	}

	/*
	
	table{
	border-collapse:collapse;
	}
	table, th, td
		{
		border: 1px solid black;
		padding: 5px;
		}
	.atv-description{
		border: 1px solid #ccc;
		padding: 5px;
	}
	
	.atv-date{
	 float: right;
	 /*border: 3px solid black;
	 font-weight: bold;
	}
	*/
	
	</style>
	
</head>

<body> 

<div class="container-fluid" id="page">
	<div class="row-fluid">
		<?php echo $content; ?>
	</div>
</div><!-- page -->

</body>
</html>
