<?php 
//shortcut rq.
$email=$var=$this->html->readRQ('_email');
$entity_id=$var=$this->html->readRQ('entity_id');
$JSONData=array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => $email, 'f' => $entity_id);