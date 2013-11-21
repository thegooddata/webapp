<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array context menu admin items. This property will be assigned to {@link CMenu::items}.
	 */
	
	public $menu_admin=array(
		array('label'=>'Manage Members', 'url'=>array('/user/admin')),
		array('label'=>'Manage Queries', 'url'=>array('/queries/admin')),	
		array('label'=>'Manage Adtracks', 'url'=>array('/adtracks/admin')),	
		array('label'=>'Manage Adtracks Sources', 'url'=>array('/adtracksSources/admin')),	
		array('label'=>'Manage Adtracks Types', 'url'=>array('/adtracksTypes/admin')),
		array('label'=>'Manage Browsing', 'url'=>array('/browsing/admin')),
		array('label'=>'Manage Whitelists', 'url'=>array('/whitelists/admin')),
		array('label'=>'Manage Queries Blacklist', 'url'=>array('/queriesBlacklist/admin')),
		array('label'=>'Manage Loans Status', 'url'=>array('/loansStatus/admin')),
		array('label'=>'Manage Loans Activities', 'url'=>array('/loansActivities/admin')),
		array('label'=>'Manage Loans Countries', 'url'=>array('/loansCountries/admin')),
		array('label'=>'Manage Loans', 'url'=>array('/loans/admin')),
		array('label'=>'Manage Incomes', 'url'=>array('/incomes/admin')),
		array('label'=>'Manage Achievements', 'url'=>array('/achievements/admin')),
		array('label'=>'Manage Achievements Types', 'url'=>array('/achievementsTypes/admin')),
	);

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	


}