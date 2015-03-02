<?php


class GoodEvilCache
{
    //AdtracksRatiosTotal

    public function setEvilAdtracksRatios(){
        // get cache data
        $average = array();
        // set cache key for this data
        $cacheKey="GlobalCacheDataEvilDataAdtracksRatioTotal";

        $adtracks = Yii::app()->db->createCommand()
                ->setFetchMode(PDO::FETCH_OBJ)
                ->select("name, count")
                ->from('view_adtracks_sources_total')
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
        // Get total risk
        $adtracks = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select("_getRiskTotal () as risk")
            ->from('tbl_members')
            ->limit(1)
            ->queryAll();

        $resultGlobal['risk_average'] = number_format($adtracks[0]->risk, 2, '.', '');

        // Get total risk ratio

        $adtracks = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select("_getRiskRatioTotal () as risk")
            ->from('tbl_members')
            ->limit(1)
            ->queryAll();

        $resultGlobal['risk_ratio_average'] = number_format($adtracks[0]->risk);

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

        if (!count($total) > 0) $total = 0;
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

        if (!count($total) > 0) $total = 0;
        $result['total_registered_members'] = $total;

        // queries last month ---------------------

        $startdate = date('Y-m-d', strtotime("-1 month"));
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*) as total')
            ->from('tbl_browsing')
            ->where("created_at >= '$startdate'")
            ->queryScalar();

        $result['monthly_visits_stored'] = (!empty($total)) ? $total : 0;

        // queries traded blocked last month ------------------

        $startdate = date('Y-m-d', strtotime("-1 month"));
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*) as total')
            ->from('tbl_adtracks')
            ->where("status = 'blocked'")
            ->andWhere("created_at >= '$startdate'")
            ->queryScalar();

        $result['monthly_adtracks_blocked'] = (!empty($total)) ? $total : 0;

        // queries traded last month ------------------

        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*) as total')
            ->from('view_queries_trade_month')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['monthly_queries_trade_processed'] = $total;

        // and save it in cache for later use:
        Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);

        return $result;
    }

    public function setGoodInvestmentsData(){
        $result = array();

        $cacheKey="GoodInvestmentsData";
        // regenerate because it is not found in cache

        // money earned -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('(sum(gross_amount) - sum(expenses)) as total')
            ->from('tbl_incomes')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        // convert to usd
        $total=Currencies::convertDefaultTo($total, 'USD');
        $total=Yii::app()->numberFormatter->formatCurrency($total, 'USD');

        $result['total_money_earned'] = $total;

        // money lost -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('sum(loss) as total')
            ->from('tbl_loans')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['total_lost'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

        // money lent -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('sum(contribution) as total')
            ->from('tbl_loans')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['total_contribution'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

        // Outstanding portfolio -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('sum(contribution - paidback - loss) as total')
            ->from('tbl_loans')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['total_outstanding'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

        // money repaid -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('sum(paidback) as total')
            ->from('tbl_loans')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['total_paidback'] = Yii::app()->numberFormatter->formatCurrency($total, 'USD');

        // and save it in cache for later use:
        Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);

        return $result;
    }

    public function setGoodProjectsData(){
        $result = array();

        $cacheKey="GoodProjectsData";

        // loans_countries -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*)')
            ->from('view_loans_countries')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['loans_countries'] = $total;

        // loans_count -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*)')
            ->from('tbl_loans')
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['loans_count'] = $total;

        // loans_paying_back_count -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*)')
            ->from('tbl_loans')
            ->where(array(
                    'and',
                    'id_loans_status = :id',
                ), array(
                    ':id' => 3)
            )
            ->queryScalar();

        if (!count($total) > 0) $total = 0;

        $result['loans_paying_back_count'] = $total;

        // loans_paid_back_count -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*)')
            ->from('tbl_loans')
            ->where(array(
                    'and',
                    'id_loans_status = :id',
                ), array(
                    ':id' => 4)
            )
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['loans_paid_back_count'] = $total;

        // loans_lost_count -----------------------
        $total = Yii::app()->db->createCommand()
            ->setFetchMode(PDO::FETCH_OBJ)
            ->select('count(*)')
            ->from('tbl_loans')
            ->where(array(
                    'and',
                    'id_loans_status = :id',
                ), array(
                    ':id' => 5)
            )
            ->queryScalar();

        if (!count($total) > 0) $total = 0;
        $result['loans_lost_count'] = $total;

        // and save it in cache for later use:
        Yii::app()->cache->set($cacheKey, $result, Yii::app()->params['cacheLifespanOneDay']);

        return $result;
    }

}