<?php namespace app\controllers;

use Yii;

class SiteController extends BaseController {

    public function actionIndex() {
        $result = "API Service";
        return $result;
    }

    public function actionSample() {
        $this->checkParms(["parm1",
            "parm2"]);

        $result = "Pass!";
        
        return $result;
    }

}
