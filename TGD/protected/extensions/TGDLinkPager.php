<?php
/**
 * CLinkPager class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CLinkPager displays a list of hyperlinks that lead to different pages of target.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package system.web.widgets.pagers
 * @since 1.0
 */
class TGDLinkPager extends CLinkPager
{
	
  public $showFirstAndLastPages=true;
  public $showLastPageNumber=false;

	/**
	 * Initializes the pager by setting some default property values.
	 */
	public function init()
	{
		parent::init();
	}

	/**
	 * Creates the page buttons.
	 * @return array a list of page buttons (in HTML code).
	 */
	protected function createPageButtons()
	{
		if(($pageCount=$this->getPageCount())<=1)
			return array();

		list($beginPage,$endPage)=$this->getPageRange();
		$currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
		$buttons=array();

		// first page
        if ($this->showFirstAndLastPages) {
          $buttons[]=$this->createPageButton($this->firstPageLabel,0,$this->firstPageCssClass,$currentPage<=0,false);
        }
		
		// prev page
		if(($page=$currentPage-1)<0)
			$page=0;
		$buttons[]=$this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0,false);

		// internal pages
		for($i=$beginPage;$i<=$endPage;++$i)
			$buttons[]=$this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);

        // show last page number
        if ($this->showLastPageNumber && !in_array($pageCount-1, range($beginPage, $endPage))) {
          $buttons[]='<li>...</li>';
          $buttons[]=$this->createPageButton($pageCount,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false);
        }
        
		// next page
		if(($page=$currentPage+1)>=$pageCount-1)
			$page=$pageCount-1;
		$buttons[]=$this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false);

		// last page
        if ($this->showFirstAndLastPages) {
          $buttons[]=$this->createPageButton($this->lastPageLabel,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false);
        }

		return $buttons;
	}
}
