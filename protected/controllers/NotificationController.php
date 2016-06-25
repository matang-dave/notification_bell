<?php
class NotificationController extends CController {

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow', // allow authenticated users to access all actions
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	public function actionCounts() {

		$userId = Yii::app()->session['userId'];
		$model = new Notification();
		$count = $model->getNotificationiCount($userId);

		echo json_encode(array('count'=>$count));
		Yii::app()->end();
	}

	public function actionNotifications() {
		$userId = Yii::app()->session['userId'];
		$model = new Notification();
		$notification =  $model->getNotifications($userId);
		echo json_encode($notification);
		Yii::app()->end();

	}
}
?>