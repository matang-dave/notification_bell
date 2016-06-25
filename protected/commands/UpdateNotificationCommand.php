<?php

class UpdateNotificationCommand extends CConsoleCommand
{
	public function run($args)
	{
		$dummayNotifications = array(
				  "posted a photo on your wall",
				  "commented on your last video",
				  "liked your photo",
				  "commented on your video",
				  "commented on your status",
				  "is now friend with you",
				  "poked you",
				  "reminds you of the memory",
				  "shared a video of you",
				  "tagged a photo of you",
				  "has become friend of you",
				  "watched the video you shared",
		);

		while(true) {

			$users = User::model()->findAll();
			$userIds = array();
			for($i=0;$i<count($users);$i++)
				$userIds[] = $users[$i]['id'];

			for($i=0;$i<count($userIds);$i++) {
				$random  = rand(0,count($userIds)-1);

				$notification  = new Notification();
				$notification->fromUserId = $userIds[$random];
				$notification->toUserId = $userIds[$i];
				$notification->msg = $dummayNotifications[rand(0,count($dummayNotifications)-1)];
				$notification->save();
				sleep(2);

			}

			sleep(5);
		}
	}

}
?>