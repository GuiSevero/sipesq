<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
	<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAwtW6REnoXPwabzosDJ1ZbxSf6zeDUL0NX_-81yZ_3MTVk-1i4xQ4nST236nGieybG_Uiv9EE12qxDg"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl?>/js/jquery.js"></script>

	<title><?php echo CHtml::encode("SIPESQ"); ?></title>
	
	<style>
	.bar_chart{
		height: 300;
	}
	
	body{
		padding-top: 42px;
	}
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
	 /*border: 3px solid black;*/
	 font-weight: bold;
	}
	</style>
	
</head>

<body data-spy="scroll" data-target=".navbar"> 

<div class="container-fluid" id="page">
	<div class="row-fluid">
	<?php echo $content; ?>
	</div>
</div><!-- page -->

</body>
</html>
