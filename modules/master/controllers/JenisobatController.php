<?php

use \modules\dashboard\controllers\MainController;

class JenisobatController extends MainController {

    public function index() {
        $this->template('master/jenisobat', array('data' => 'test'));
    }


}
?>