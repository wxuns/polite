<?php

class TestController extends BaseController {
    public function HelloAction(){
        echo 'this is a modules test';
        return false;
    }
}