<?php

function getPercentile($id)
{
	$member_id = $id;
	if (!is_numeric($member_id))
	{
		$member_id = 0;
	}

	if ($member_id != 0)
	{
		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('percentile')
		    ->from('view_queries_members_percentil')
		    ->where(array(
		                'and',
		                'member_id = :member_id'
		                ),
		                array(
		                    'member_id'=>$member_id)
		                )
		    ->queryAll();

	    if (count($datas)>0)
	    {
	    	return $datas[0]->percentile;
	    }
		else
		{
			return 0;
		}
		
	}
	else
	{
		$user_id = $id;
		$datas = Yii::app()->db->createCommand()
		    ->setFetchMode(PDO::FETCH_OBJ)
		    ->select('percentile')
		    ->from('view_queries_users_percentil')
		    ->where(array(
		                'and',
		                'user_id = :user_id'
		                ),
		                array(
		                    'user_id'=>$user_id)
		                )
		    ->queryAll();

	    if (count($datas)>0)
	    {
	    	return $datas[0]->percentile;
	    }
		else
		{
			return 0;
		}
	}
}


function  getSeniorityLevelAndPercentile($id)
{

	$percentile = getPercentile($id);
	$result = array('percentile' => $percentile, 'level' => '');

	$status = Yii::app()->user->user($id);

	if(!Yii::app()->user->isGuest() && $status == 2)
	{
		if(false /* TODO: find out a way to figure out if the user is a collaborator*/))
		{
			$result['level'] = 'Collaborator';
		}
		else
		{
			if($percentile < 20)
			{
				$result['level'] = 'Owner';
			}
			else
			{
				$result['level'] = 'Expert';
			}
		}
	}
	else
	{
		if($percentile < 5)
		{
			$result['level'] = 'Apprentice';
		}
		else
		{
			$result['level'] = 'Journeyman';
		}
	}

	return $result;
}