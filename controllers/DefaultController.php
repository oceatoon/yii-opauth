<?php

class DefaultController extends Controller {
    const moduleTitle = "Authentication";
	public function actionIndex() {
		$this->render('index');
	}

}
