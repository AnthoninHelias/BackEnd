<?php

namespace Helia\BstSioAG12022QuizzizBackend\Core\Controller;

interface ControllerInterface
{

        public function getOutput();

        public function setInput($post, $get, $var);

}