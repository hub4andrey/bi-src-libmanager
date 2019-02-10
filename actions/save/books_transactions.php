<?php
//Save books_transactions
$id=$this->html->readRQn('id');
$name=$this->html->readRQ('name');
$date=$this->html->readRQ('date');
$user_id=$this->html->readRQn('user_id');
$entity_id=$this->html->readRQn('entity_id');
$type_id=$this->html->readRQn('type_id');
$book_id=$this->html->readRQn('book_id');
$date_from=$this->html->readRQ('date_from');
$date_to=$this->html->readRQ('date_to');
$rating=$this->html->readRQn('rating');
$active=$this->html->readRQn('active');
$descr=$this->html->readRQ('descr');

    
    $vals=array(
	'name'=>$name,
	'date'=>$date,
	'user_id'=>$user_id,
	'entity_id'=>$entity_id,
	'type_id'=>$type_id,
	'book_id'=>$book_id,
	'date_from'=>$date_from,
	'date_to'=>$date_to,
	'rating'=>$rating,
	'active'=>$active,
	'descr'=>$descr
);
    echo $this->html->pre_display($_POST,'Post'); 
    echo $this->html->pre_display($vals,'Vals');
    // exit;
    
    if($id==0){$id=$this->db->insert_db($what,$vals);}else{$id=$this->db->update_db($what,$id,$vals);}
    $body.=$out;
    