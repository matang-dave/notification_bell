<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
	<?php
	if(!Yii::app()->user->isGuest)
			Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl."/js/main.js");
		 ?>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header-left">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div>

	<?php if(Yii::app()->user->isGuest) {
		$class = 'not-visible';
		}
	else {
		$class = '';
	}?>
	<div id="header-right" <?php echo "class=$class"?>>
		<div class='badge'>0</div>
		<img id="bell" src="<?php echo Yii::app()->request->baseUrl; ?>/image/bell.jpeg"></img>
	</div>
	<div class="clear"></div>

	<div class="notification" <?php echo "class=$class"?>>
		<div class="arrow-up"></div>
		<div class="nContainer">
				 <span> Notifications</span>
				<div class='badge2'>0</div>
			</div>
		<div class="msg">
		</div>

	</div>
	<!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('post/index'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php
// 	$this->widget('zii.widgets.CBreadcrumbs', array(
//  		'links'=>$this->breadcrumbs,
// 	));
	?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>