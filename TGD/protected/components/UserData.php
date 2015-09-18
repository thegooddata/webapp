<?php

class UserData {

    //usage data - browsing and search history
    //Working
    public function deleteAllUsageDataByUser($member_id){
        $date = date('Y-m-d');
        $dataDaily = $this->getUsageDataDaily($date, $member_id);
        $dataTotal = $this->getUsageDataTotal($date, $member_id);
        $dataDomain = $this->getUsageDataDomain($date, $member_id);
        if($this->setUsageDataDaily($dataDaily) && $this->setUsageDataTotal($dataTotal) && $this->setUsageDataDomain($dataDomain)) {

            $this->deleteUsageDataByUser($member_id);

        }

        return true;
    }

    //usage data - browsing and search history for all
    //Working
    public function deleteAllUsageData($date){
        $dataDaily = $this->getUsageDataDaily($date);
        $dataTotal = $this->getUsageDataTotal($date);
        $dataTotalMember = $this->getUsageDataTotalMember($date);
        $dataDomain = $this->getUsageDataDomain($date);
        if($this->setUsageDataDaily($dataDaily) && $this->setUsageDataTotal($dataTotal)  &&
            $this->setUsageDataTotalMember($dataTotalMember)  && $this->setUsageDataDomain($dataDomain)) {

            $this->deleteUsageData($date);

        }

        return true;
    }

    //Working
    protected function deleteUsageDataByUser($member_id){
        Browsing::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        Queries::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        Adtracks::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
           //        InterestCategoriesCounts::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        Yii::app()->db->createCommand()->delete('tbl_cache_data', 'member_id=:member_id', array(':member_id' => $member_id));

        return true;
    }

    //Working
    protected function deleteUsageData($date){
        Browsing::model()->deleteAll('daydate<:daydate', array(':daydate' => $date));
        Queries::model()->deleteAll('daydate<:daydate', array(':daydate' => $date));
        Adtracks::model()->deleteAll('daydate<:daydate', array(':daydate' => $date));
        //        InterestCategoriesCounts::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        Yii::app()->db->createCommand()->delete('tbl_cache_data', 'date(updated_at)=:daydate', array(':daydate' => $date));

        return true;
    }

    //user data I - user id, blocking and whitelist preference, etc
    //Working
    public function deleteAllUserData($member_id){
//        Members::model()->deleteByPk($member_id);
        $user = Members::model()->findByPk($member_id);
        $user->status = -4;
        $user->save();

        Whitelists::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        ExtensionSettings::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));

        BrowsingFlagged::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        //QueriesFlagged::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));

        return true;
    }

    //member data - username and email as well as PII
    public function deleteAllMemberData($member_id){
//        Members::model()->deleteByPk($member_id);
        $user = Members::model()->findByPk($member_id);
        $user->email = '';
        $user->save();

        MembersPii::model()->deleteAll('member_id=:member_id', array(':member_id' => $member_id));
        

        return true;
    }


    public function getUsageDataDaily($date, $member_id = 0)
    {
        $command = Yii::app()->db->createCommand()
            ->select('daydate, count(*) as total')
            ->from('tbl_browsing')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('daydate');
            $data['browsing'] = $command->queryAll();

        $command = Yii::app()->db->createCommand()
            ->select('daydate, count(*) as total')
            ->from('tbl_adtracks')
            ->where(array('and', 'status = :blocked', 'daydate <= :date'), array(':blocked' => 'blocked', ':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('daydate');
        $data['adtracksBlocked'] = $command->queryAll();

        $command = Yii::app()->db->createCommand()
            ->select('daydate, count(*) as total')
            ->from('tbl_adtracks')
            ->where(array('and', 'status = :blocked', 'daydate <= :date'), array(':blocked' => 'allowed', ':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('daydate');
            $data['adtracksAllowed'] = $command->queryAll();

        $command = Yii::app()->db->createCommand()
            ->select('daydate, count(*) as total')
            ->from('tbl_queries')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('daydate');
            $data['queries'] = $command->queryAll();

        $command = Yii::app()->db->createCommand()
            ->select('daydate, count(*) as total')
            ->from('tbl_queries')
            ->where(array('and', 'share = :share', 'daydate <= :date'), array(':share' => 'true', ':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('daydate');
            $data['queriesShared']  = $command->queryAll();



        $command = Yii::app()->db->createCommand()
            ->select('member_id, daydate, count(*) as total')
            ->from('tbl_adtracks')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('member_id, daydate');
            $data['adtracks'] = $command->queryAll();

        return $data;
    }

    public function setUsageDataDaily($data)
    {
        if (!empty($data)){
            foreach ($data as $key => $arr) {
                if (!empty($arr)) {
                    foreach ($arr as $val) {
                        if(isset($val['member_id'])){
                            $condition = array('name' => $key, 'daydate' => $val['daydate'], 'member_id' => $val['member_id']);
                        }else{
                            $condition = array('name' => $key, 'daydate' => $val['daydate']);
                        }
                        $model = UsageDataDaily::model()->findByAttributes($condition);
                        if ($model) {
                            $model['value'] += $val['total'];
                        } else {
                            $model = new UsageDataDaily;
                            $model->name = $key;
                            if(isset($val['member_id'])){
                                $model->member_id = $val['member_id'];
                            }
                            $model->value = $val['total'];
                            $model->daydate = $val['daydate'];
                        }
                        $model->save();
                    }
                }
            }
        }
        return true;
    }


    public function getUsageDataTotal($date, $member_id = 0){
        $command = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('tbl_browsing')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $data['browsing'] = $command->queryScalar();

        $command = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('tbl_queries')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $data['queries'] = $command->queryScalar();

        $command = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('tbl_queries')
            ->where(array('and', 'share = :share', 'daydate <= :date'), array(':share' => 'true', ':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $data['queriesShared'] = $command->queryScalar();

        $command = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('tbl_adtracks')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $data['adtracks'] = $command->queryScalar();

        $command = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('tbl_adtracks')
            ->where(array('and', 'status = :status', 'daydate <= :date'), array(':status' => 'blocked', ':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $data['adtracksBlocked'] = $command->queryScalar();

        $command = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('tbl_adtracks')
            ->where(array('and', 'status = :status', 'daydate <= :date'), array(':status' => 'allowed', ':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
            }
            $data['adtracksAllowed'] = $command->queryScalar();

        $command = Yii::app()->db->createCommand()
            ->select('t.name, count(*) AS count')
            ->from('tbl_adtracks a, tbl_adtracks_sources s, tbl_adtracks_types t')
            ->where(array('and', 'a.adtracks_sources_id = s.id AND s.adtrack_type_id = t.id AND daydate <= :date',), array(':date' => $date));
            if ($member_id != 0){
                $command->andWhere(array('and', 'a.member_id = :member_id'), array(':member_id' => $member_id));
            }
            $command->group('t.name');
            $command->order('t.name');
            $data['adtracksSources'] = $command->queryAll();

        return $data;
    }

    public function setUsageDataTotal($data)
    {
        if (!empty($data)){
            foreach ($data as $key => $arr) {
                if (!empty($arr)) {
                    if($key != 'adtracksSources'){
                        $model = UsageDataTotal::model()->findByAttributes(array('name' => $key, 'member_id' => 0));
                        if ($model) {
                            $model['value'] += $arr;
                        } else {
                            $model = new UsageDataTotal;
                            $model->name = $key;
                            $model->value = $arr;
                        }
                        $model->save();
                    }else{
                        foreach ($arr as $val) {
                            $model = UsageDataTotal::model()->findByAttributes(array('name' => $key, 'subname' => $val['name'], 'member_id' => 0));
                            if ($model) {
                                $model['value'] += $val['count'];
                            } else {
                                $model = new UsageDataTotal;
                                $model->name = $key;
                                $model->subname = $val['name'];
                                $model->value = $val['count'];
                            }
                            $model->save();
                        }
                    }
                }
            }
        }
        return true;
    }



    public function getUsageDataTotalMember($date){
        $data['browsing'] = Yii::app()->db->createCommand()
            ->select('member_id, count(*) as count')
            ->from('tbl_browsing')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date))
            ->group('member_id')
            ->queryAll();

        $data['queries'] = Yii::app()->db->createCommand()
            ->select('member_id, count(*) as count')
            ->from('tbl_queries')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date))
            ->group('member_id')
            ->queryAll();

        $data['queriesShared'] = Yii::app()->db->createCommand()
            ->select('member_id, count(*) as count')
            ->from('tbl_queries')
            ->where(array('and', 'share = :share', 'daydate <= :date'), array(':share' => 'true', ':date' => $date))
            ->group('member_id')
            ->queryAll();

        $data['adtracks'] = Yii::app()->db->createCommand()
            ->select('member_id, count(*) as count')
            ->from('tbl_adtracks')
            ->where(array('and', 'daydate <= :date',), array(':date' => $date))
            ->group('member_id')
            ->queryAll();

        $data['adtracksBlocked'] = Yii::app()->db->createCommand()
            ->select('member_id, count(*) as count')
            ->from('tbl_adtracks')
            ->where(array('and', 'status = :status', 'daydate <= :date',), array(':status' => 'blocked', ':date' => $date))
            ->group('member_id')
            ->queryAll();

        $data['adtracksAllowed'] = Yii::app()->db->createCommand()
            ->select('member_id, count(*) as count')
            ->from('tbl_adtracks')
            ->where(array('and', 'status = :status', 'daydate <= :date',), array(':status' => 'allowed', ':date' => $date))
            ->group('member_id')
            ->queryAll();


        $data['adtracksSources'] = Yii::app()->db->createCommand()
            ->select('a.member_id, t.name, count(*) AS count')
            ->from('tbl_adtracks a, tbl_adtracks_sources s, tbl_adtracks_types t')
            ->where(array('and', 'a.adtracks_sources_id = s.id AND s.adtrack_type_id = t.id AND daydate <= :date',), array(':date' => $date))
            ->group('t.name, a.member_id')
            ->order('t.name')
            ->queryAll();

        return $data;
    }

    public function setUsageDataTotalMember($data)
    {
        if (!empty($data)){
            foreach ($data as $key => $arr) {
                if (!empty($arr)) {
                    if($key != 'adtracksSources'){
                        foreach ($arr as $val) {
                            $model = UsageDataTotal::model()->findByAttributes(array('name' => $key, 'member_id' => $val['member_id']));
                            if ($model) {
                                $model['value'] += $val['count'];
                            } else {
                                $model = new UsageDataTotal;
                                $model->member_id = $val['member_id'];
                                $model->name = $key;
                                $model->value = $val['count'];
                            }
                            $model->save();
                        }
                    }
                    else{
                        foreach ($arr as $val) {
                            $model = UsageDataTotal::model()->findByAttributes(array('name' => $key, 'subname' => $val['name'], 'member_id' => $val['member_id']));
                            if ($model) {
                                $model['value'] += $val['count'];
                            } else {
                                $model = new UsageDataTotal;
                                $model->member_id = $val['member_id'];
                                $model->name = $key;
                                $model->subname = $val['name'];
                                $model->value = $val['count'];
                            }
                            $model->save();
                        }
                    }
                }
            }
        }
        return true;
    }

    public function getUsageDataDomain($date, $member_id = 0){
        $command = Yii::app()->db->createCommand()
            ->select('member_id, domain, count(*) AS count')
            ->from('tbl_adtracks')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
        if ($member_id != 0){
            $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
        }
//        else{
//            $command->andWhere(array('and', 'member_id > 0'));
//        }
        $command->group('domain, member_id');
        $data['adtracks'] = $command->queryAll();

        $command = Yii::app()->db->createCommand()
            ->select('member_id, domain, count(*) AS count')
            ->from('tbl_browsing')
            ->where(array('and', 'daydate <= :date'), array(':date' => $date));
        if ($member_id != 0){
            $command->andWhere(array('and', 'member_id = :member_id'), array(':member_id' => $member_id));
        }
//        else{
//            $command->andWhere(array('and', 'member_id > 0'));
//        }
        $command->group('domain, member_id');
        $data['browsing'] = $command->queryAll();

        return $data;
    }

    public function setUsageDataDomain($data)
    {
        if (!empty($data)){
            foreach ($data as $key => $arr) {
                if (!empty($arr)) {
                    foreach ($arr as $val) {
                        $model = UsageDataDomain::model()->findByAttributes(array('name' => $key, 'domain' => $val['domain'], 'member_id' => $val['member_id']));
                        if ($model) {
                            $model['value'] += $val['count'];
                        } else {
                            $model = new UsageDataDomain;
                            $model->member_id = $val['member_id'];
                            $model->name = $key;
                            $model->domain = $val['domain'];
                            $model->value = $val['count'];
                        }
                        $model->save();
                    }
                }
            }
        }
        return true;
    }
}