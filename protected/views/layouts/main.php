<!DOCTYPE html>
<html lang="pt">  
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Apoio ao Pesquisador">
    <meta name="author" content="Guilherme Severo">
	 <!-- Fav Icons -->
  	<link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/icon.png" /> 
  	<link rel="shortcut icon" type="image/x-icon"  href="<?php echo Yii::app()->request->baseUrl; ?>/css/icon.png" />
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/notification.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/kanban.min.css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome/css/font-awesome.min.css">
	
   <!-- User Styles -->
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/sipesq.less" rel="stylesheet/less">
   <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/elements.less" rel="stylesheet/less">
   
   
   <?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl .'/js/jquery.js' ?>"></script>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl .'/js/ejs.js' ?>"></script>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl .'/js/less.js' ?>"></script>
   <script type="text/javascript">

(function() {
	//var url = 'http://www.ufrgs.br/cegov/pessoa/json?callback=?';	

/* Loading JSON objects using JSONP */
    $.ajax({
   		type: 'GET',
	    url: 'http://www.ufrgs.br/cegov/pessoa/json',
	    async: false,
	    jsonpCallback: 'jsonCallback',
	    contentType: "application/json",
	    dataType: 'jsonp',
	    success: function(json) {
	       console.log(json.pessoas[1]);
	       //jsonCallback();
	    },
	    error: function(e) {
	       console.log(e.message);
	    }
	    //,jsonp: 'jsonp'
	});
/*
jsonCallback(
	{

		"pessoas":
        [
            {
                "nome": "JQUERY4U",
                "email": "http://www.jquery4u.com",
            },
            {
                "nome": "BLOGOOLA",
                "email": "http://www.blogoola.com",
            },
            {
                "nome": "PHPSCRIPTS4U",
                "email": "http://www.phpscripts4u.com",
            }
        ]
    }
);
*/

})(); 
/*

*/
</script>
   
	<title><?php echo CHtml::encode("SIPESQ"); ?></title>
	<style>
	body{
		padding-top: 27px;
	}
	#page-main-content{
		min-height: 500px;
	}
	</style>
	
</head>

<body>
<?php /*
<div class="navbar-fixed-top">
	<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
	            'items'=>Sipesq::mainMenu(),
	    )); ?>
</div> */ ?>
<div class="menu">
<?php 
	if(!Yii::app()->user->isGuest)
		$this->renderPartial("/layouts/menu/menu_usuario");
	else 
		$this->renderPartial("/layouts/menu/menu_visitante");
?>
</div>

    <div class="container page">
    <div class="row-fluid header">
    	<div class="span6 offset3">
    		<div id="header">
    		<?php echo CHtml::image(Yii::app()->request->baseUrl ."/css/logocl2.png",'logo' ,array('align'=>"center",'class'=>'img-rounded'))?>
    		</div>
    	</div>	
    </div>
    <div class="row-fluid">
    	<div class="span12">
	    <?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'tagName'=>'ul',
				'htmlOptions'=>array('class'=>'breadcrumb'),
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		</div>
	</div>
		<div id="page-main-content">
		<?php echo $content; ?>
		</div>
    </div> <!-- /container -->
</body>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl .'/js/bootstrap.min.js' ?>"></script>
<script>

$('#sq').change(function(){
	if($('#sq').val().trim().length > 2)
		window.location.href = '/sipesq/index.php/site/search/?q=' + $('#sq').val().trim();
});

</script>
</html>
