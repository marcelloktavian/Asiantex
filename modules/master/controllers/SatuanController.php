<?php

use \modules\dashboard\controllers\MainController;

class SatuanController extends MainController {

    public function index() {
        $this->template('master/satuan', array('data' => 'test'));
    }


}
?>