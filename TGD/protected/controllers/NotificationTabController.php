<?php

class NotificationTabController extends Controller {
  
    public function actionIndex() {
      $this->layout = '//layouts/notification';
      
      $id = Yii::app()->request->getQuery('id');
      
      var_dump($id);
//      die;
//      Yii::app()->end();
      
      
      //TODO: call these from ApiController
      
      if ( is_null( $id ) )
      {
        //Last achievement     
        $criteria=new CDbCriteria(array(
            'condition'=>'t.deleted=0 AND t.achievements_finish >= :now AND t.achievements_start <= :now',
            'params'=>array(
                ':now'=>date("Y-m-d H:i:s"),
            ),
            'limit'=>5,
            'order'=>'t.created_at DESC',
        ));
        $achievements= Achievements::model()->find($criteria); 
      }
      else
      {
        $achievements= Achievements::model()->findByPk($id);
      }
      
      $this->pageTitle = " - ".$achievements->title;
      $this->pageDescription = substr($achievements->text_en, 0,160);
      
//      var_dump($achievements);
        
      //Projects funded with your help
      $loans_models = Loans::model()->findAll();

      if (is_array($loans_models))
      {              
        $loans_count = (string)count($loans_models);
      }

      //Value colected so far

      $total_money_earned = Yii::app()->db->createCommand()
          ->setFetchMode(PDO::FETCH_OBJ)
          ->select('sum((gross_amount - expenses)) as total')
          ->from('tbl_incomes')
          ->queryScalar();

      if (!count($total_money_earned) > 0) $total_money_earned = 0;
      // convert to usd
      $total_money_earned=Currencies::convertDefaultTo($total_money_earned, 'USD');
      $total_money_earned=Yii::app()->numberFormatter->formatCurrency($total_money_earned, 'USD');

      $this->render('index', array(
          'achievements' => $achievements,
          'loans_count' => $loans_count,
          'total_money_earned' => $total_money_earned,
      ));
    }
    
    public function actionDeactivateNotification()
    {
      Yii::app()->user->setState('showNotification', 'false');
      //TODO: perhaps close window instead redirect
      $this->redirect('index');
    }

}
