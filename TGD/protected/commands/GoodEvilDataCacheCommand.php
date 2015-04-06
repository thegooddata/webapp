<?php
//    * 04 * * * /usr/bin/php /var/www/tgd/protected/yiic.php GoodEvilDataCache CreateCache
class GoodEvilDataCacheCommand extends CConsoleCommand
{
    public function actionCreateCache(){

        $goodEvilCache = new GoodEvilCache();

        //Evil Data Cache
        $goodEvilCache->setEvilAdtracksRatios();

        $goodEvilCache->setEvilRiskRatios();

        //Good Data Cache
        $goodEvilCache->setGoodCompanyAchievementsData();

    }
}