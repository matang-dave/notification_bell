<?php
/**
 *
 * @author mdave
 * @property id integer
 * @property fromUserId integer
 * @property msg text
 * @property toUserId integer
 * @property createdOn
 * @property isRead
 *
 *
 */
class Notification extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return static the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{notification}}';
	}

	public function getNotificationiCount($userId) {

		$sql = "SELECT count(*) as count FROM ".$this->tableName().' WHERE toUserId = '.$userId.' AND isRead IS FALSE';
		$result = Yii::app()->db->createCommand($sql)->queryRow();
		return $result['count'];
	}

	public function getNotifications($userId) {

		$sql = "SELECT msg,fromUserId FROM ".$this->tableName().' WHERE toUserId = '.$userId.' AND isRead IS FALSE';
		$result = Yii::app()->db->createCommand($sql)->queryAll();

		$sql = "Update ".$this->tableName().' set isRead = true where toUserId = '.$userId;
		Yii::app()->db->createCommand($sql)->execute();

		$returnData = array();
		$notificationMsg = array();
		for($i=0;$i<count($result);$i++) {
			$notification = $result[$i];
			//$sql = "SELECT "
			$user = User::model()->findByPk($notification['fromUserId']);
			if(!empty($user))
				$returnData[] = $user->username.' '.$notification['msg'];
		}

		return array('notifications'=>$returnData);
	}


}
?>