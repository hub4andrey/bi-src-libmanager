<?php 



$on_date=$this->dates->F_date($on_date,1); // convert now() to 11.02.2019
// $on_date=$this->dates->F_USdate($on_date); // convert now() to 

// echo $this->html->pre_display($on_date,"result");

// exclude transactions after day x
// generate list of unique book ids
// order transactions by date desc
// loop for each book id
// if 1st top transaction with given book is in status 'check-in' or 'aquisition', then => available. Otherwase => not available
// create array with ['book_id'=> , 'book_status_that_day'=>]

$sql = "
select t1.book_id, t1.type_id 
	from books_transactions as t1
join
( 
	select max(date) as latest_date, book_id 
		from books_transactions 
		where date <= '$on_date'::date 
		group by book_id
) as t2
on t1.date = t2.latest_date
and t1.book_id= t2.book_id
";
// echo $this->html->pre_display($sql,"result");


$result = $this->db->GetResults($sql);
// echo $this->html->pre_display($reply,"result");

foreach ($result as $row){
	echo $this->html->pre_display($row,"row");
	$reply[$row[book_id]] = $row;
}


echo $this->html->pre_display($reply,"reply");

// output:
// Array
// (
//     [0] => Array
//         (
//             [book_id] => 1
//             [type_id] => 3
//         )

//     [1] => Array
//         (
//             [book_id] => 2
//             [type_id] => 1
//         )

//     [2] => Array
//         (
//             [book_id] => 3
//             [type_id] => 3
//         )

// )


// !! neet to convert it in form for access array[book_id][type_id] = x