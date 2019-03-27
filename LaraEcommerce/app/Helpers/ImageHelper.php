<?php
namespace App\Helpers;

use App\Helpers\GravatarHelper;
use App\User;


class ImageHelper
{
	public static function getUserImage($id)
	{
		$user = User::find($id);
		if (!is_null($user)) {
			if ($user->avatar == NULL) {
				if (GravatarHelper::validate_gravatar($user->email)) {
					$avatar_url = GravatarHelper::gravatar_image($user->email, 100);
				}else{
					$avatar_url = url('images/default/panda.png');
				}
			}else{
				$avatar_url=url('images/users/'.$user->avatar);
			}
		}

		return $avatar_url;
	}
}