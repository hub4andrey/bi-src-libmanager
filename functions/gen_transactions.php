<?php 

// $result[input]=[$year, $qty];
// $result[input]=['year'=>$year, 'qty'=>$qty];
$result[input] = $args;



//=== Andrew: remove transactions dated 2018:
$this->db->getval("delete from books_transactions where id > 5");

$args[qty] = ($args[qty] >1 )? $args[qty] : 3;
$args[year] = ($args[year] > 1970)? $args[year] : $this->dates->F_thisyear();


//shortcut pd.
// echo $this->html->pre_display($args,"result");

// exit;

for ($i=0; $i < $args[qty]; $i++) 
{
	

	//=== Andrew: method 1 , when list is NOT big:
	$max_entity_id = $this->db->getval("SELECT max(id) from entities where active = '1' ");
	//=== Andrew: method 2 , when list is BIG:
	$max_entity_id = $this->db->getval("SELECT id from entities where active = '1' order by id desc limit 1 ");

	$entity_id = rand(1,$max_entity_id);


	$max_boods_id = $this->db->getval("SELECT max(id) from books where active = '1' ");
	$book_id = rand(1,$max_boods_id);


	$type_id = rand(1,4);

	// $rating=0;
	// if($type_id == 2)$rating=rand(1,5);
	$rating=($type_id==2)?$rating=rand(1,5):0;


	$date_start = "01.01.$args[year]";
	$date = $this->dates->F_dateadd($date_start, rand(0,364)); //random range
	$date_from=$this->dates->F_date($date, 1); //random range;
	$date_to=$this->dates->F_dateadd($date, rand(10,15));; //random range;


	$name = $this->data->get_new_name('books_transactions', $date,'','BTR-');

	$vals=[
	    'name' => $name,
	    'date' => $date,
	    // 'user_id' => $user_id,
	    'user_id' => $GLOBALS[uid],
	    'entity_id' => $entity_id,
	    'type_id' => $type_id,
	    'book_id' => $book_id,
	    'date_from' => $date_from,
	    'date_to' => $date_to,
	    'rating' => $rating,
	];


	// echo "Insert Transaction $vals[name]<br>";
	// echo $this->html->pre_display($vals,"Insert Transaction");
    $id=$this->db->insert_db('books_transactions', $vals);
    $result[output][ids][]=$id;

}




return $result;


 ?>