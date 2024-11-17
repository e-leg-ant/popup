<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column2',
	 * meaning using a double column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';
	
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

    public $pageTitle;

    public $metaDescription;

    /**
     * Class constructor
     *
     * @access public
     * @param string $id id of this controller
	 * @param CWebModule $module the module that this controller belongs to. This parameter
     * @return Controller
     */
    public function __construct($id, $module = null)
    {
        $this->metaDescription = Yii::app()->name;

        parent::__construct($id, $module);
    }

}
