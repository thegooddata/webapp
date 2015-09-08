<?php

class TruncatePreTablesCommand extends TGDCommand{
    
    
    public function actionIndex($execute=false)
    {

        if($execute){
            $command = Yii::app()->db->createCommand();
            $command->truncateTable('tbl_browsing');
            $command->truncateTable('tbl_adtracks');
        }
        else{
            $this->debug("To prevent wrong usage of this tool, this command won't be run until you use param --execute=1");
            return false;
        }
        

    }

}


?>