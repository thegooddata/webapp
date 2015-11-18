<?php


class GoodEvilCache
{
    //AdtracksRatiosTotal

    public function setEvilAdtracksRatios(){
        // get cache data
        $average = array();
        // set cache key for this data
        $cacheKey="GlobalCacheDataEvilDataAdtracksRatioTotals";

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("subname AS name, sum(value) as count")
                ->from('tbl_usage_data_total')
                ->where("name = 'adtracksSources'")
                ->group('subname')
                ->queryAll();


        $average = $this->_getColor($adtracks);

        // save in cache
        Yii::app()->cache->set($cacheKey, $average, Yii::app()->params['cacheLifespanOneDay']);

        return $average;
    }

    public function setEvilRiskRatios(){
        // get cache data
        $resultGlobal = array();

        // set cache key for this data
        $cacheKey="GlobalCacheDataEvilDataRiskTotal";

        $adtracks = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select("value")
            ->from('tbl_usage_data_total')
            ->where("name= 'adtracks'")
            ->limit(1)
            ->queryAll();

        $adtracksAllowed = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select("value")
            ->from('tbl_usage_data_total')
            ->where("name= 'adtracksAllowed'")
            ->limit(1)
            ->queryAll();

        $pagesVisited = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select("value")
            ->from('tbl_usage_data_total')
            ->where("name= 'browsing'")
            ->limit(1)
            ->queryAll();

        $resultGlobal['risk_average'] = number_format($adtracks[0]->value/$pagesVisited[0]->value, 2, '.', '');

        // Get total risk ratio

        $resultGlobal['risk_ratio_average'] = number_format($adtracksAllowed[0]->value/$adtracks[0]->value*100);

        // save data to cache
        Yii::app()->cache->set($cacheKey, $resultGlobal, Yii::app()->params['cacheLifespanOneDay']);

        return $resultGlobal;
    }

    public function _getColor($adtracks) {

        $result = array();
        foreach ($adtracks as $adtrack) {

            $color = '';

            if ($adtrack->name == 'Advertising') {
                $color = '#8ac6ea';
                $light_color = '#cbe6f6';
            } else if ($adtrack->name == 'Analytics') {
                $color = '#72bc81';
                $light_color = '#a6d5af';
            } else if ($adtrack->name == 'Others' || $adtrack->name == 'Content') {
                $color = '#fcc34a';
                $light_color = '#fddc95';
            } else if ($adtrack->name == 'Social') {
                $color = '#ea6654';
                $light_color = '#f2a398';
            }

            $tmp = array();
            //$tmp['name'] = $adtrack->name;
            $tmp['value'] = $adtrack->count;
            $tmp['color'] = $color;
            $tmp['highlight'] = $light_color;

            $result[] = $tmp;
        }

        return $result;
    }

    public function setGoodCompanyAchievementsData(){
        $result = array();
        // set cache key for this data
        $cacheKey="CompanyAchievementsData";

        // Active users ----------------------
        $total = Yii::app()->db->createCommand("
                SELECT count(*) from (
                    SELECT member_or_user_id
                    FROM tbl_active_users
                    WHERE tbl_active_users.created_at >= (now() - '30 days'::interval)
                    GROUP BY member_or_user_id
                ) as tmp")->queryScalar();

        $result['monthly_active_users'] = $total;

        // registered members ----------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*) as total')
            ->from('tbl_members')
            ->where(array(
                    'and',
                    'status = :status',
                ), array(
                    ':status' => User::STATUS_ACCEPTED)
            )
            ->queryScalar();

        $result['total_registered_members'] = $total;

        // browsed pages last month ---------------------

        $startdate = date('Y-m-d', strtotime("-1 month"));
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('sum(value) as total')
            ->from('tbl_usage_data_daily')
            ->where("name = 'browsing'")
            ->andWhere("daydate >= '$startdate'")
            ->queryScalar();
        
        $result['monthly_visits_stored'] = $total;

        // adtracks blocked last month ------------------

        $startdate = date('Y-m-d', strtotime("-1 month"));
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('sum(value) as total')
            ->from('tbl_usage_data_daily')
            ->where("name = 'adtracksBlocked'")
            ->andWhere("daydate >= '$startdate'")
            ->queryScalar();
        
        $result['monthly_adtracks_blocked'] = $total;

        // queries run last month ------------------

        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('total')
            ->from('view_queries_month')
            ->queryScalar();
        
        $result['monthly_queries_run'] = $total;





        // and save it in cache for later use:
        Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);

        return $result;
    }
}