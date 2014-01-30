<?php

class OpauthModule extends CWebModule {

	public $opauthParams = array();
    public $opauth = null; 
	public function init() {
	   
		$this->setImport(array(
			'opauth.vendors.Opauth.Opauth',
		));
		$path = Yii::app()->createUrl($this->id) . '/';
		$this->opauthParams['path'] = $path;
		$this->opauthParams['Callback.uri'] = '{path}callback';
		if ($_SERVER['REQUEST_URI'] != $path . 'callback') {
		    //for all calls different to the strategies
			$this->opauth = new Opauth($this->opauthParams);
		}
		else{
		    //for the callback 
		    $this->opauth = new Opauth($this->opauthParams,false);
		}
		
	}

	public function beforeControllerAction($controller, $action) {
		if (parent::beforeControllerAction($controller, $action)) {
			return true;
		}
		else
			return false;
	}

}
