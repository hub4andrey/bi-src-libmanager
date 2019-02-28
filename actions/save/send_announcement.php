<?php
$id=$this->html->readRQn('id');
$type=$this->html->readRQs('type');
if($type=='mail_alert'){

	$book = 'New book';

	$book_transaction_id=$this->html->readRQn('book_transaction_id'); 

	$book_transaction=$this->data->get_row('books_transactions',$book_transaction_id);
	// echo $this->html->pre_display($book_transaction,"result");

	$email= $this->data->get_val('entities', 'email',$book_transaction[user_id]);
	// echo $this->html->pre_display($email,"email");

	$book=$this->data->get_val('books','name', $book_transaction[book_id]);
	// echo $this->html->pre_display($book,"book");

	$client_name=$this->data->get_val('entities','name',$book_transaction[user_id]);
	// echo $this->html->pre_display($client_name,"client_name");

	$body = "Hi $client_name. Plsea revert $book.";
	echo $this->html->pre_display($body,"result");



	$from = 'adm_andrey@suekag.com';
	$subject = "$client_name, time to bring book back";
	$status = $this->comm->send_announcement($email, $from, $subject, $description, $body);
	echo $this->html->pre_display($status,"result");
}

if($type=='sms_alert'){
	$mobile='+35799357429';
	$status=$this->comm->sendsms($mobile, "Test for SMS $rnd");
	echo $this->html->pre_display($status,"status of sendsms to $mobile ($rnd)");
}

if($type=='sendgrid_alert'){
	$rnd = md5(uniqid(rand(), true));
	$status=$this->comm->sendgrid('FastConsent:fastconsent@gmail.com', "alex Titov:rozdol@gmail.com", "Testing2", "Test2 $rnd");
	echo $this->html->pre_display($status,"status of sendgrid ($rnd)");
}



if($status!=''){

	if($name=='')$name = $this->data->get_new_name('alerts_history', '','','ALRT-');

	$vals=array(
		'name'=>$name,
		'user_id'=>$GLOBALS[uid],
		'entity_id'=>$book_transaction[user_id],
		'books_transaction_id'=>$book_transaction_id,
		'type_id'=>6,
		'descr'=>$subject,
		'text'=>$body
	);
	$id=$this->db->insert_db('alerts_history',$vals);

	echo $this->html->pre_display($id,"alerts_history. New record id");
}

exit;