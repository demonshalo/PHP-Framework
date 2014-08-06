<?php
class HomeController extends Controller{
    public function viewAction(){
        $this->renderView("main_view.php", array("DATA" => "SAMPLE DATA FOR THE VIEW TO SHOW!"));
    }

    public function apiAction(){
        $this->renderAPI(200, array("DATA" => "SAMPLE DATA"));
    }

    public function testAction(){
        $this->renderView("main_view.php", array("PARAMS" => $this->params));
    }
}