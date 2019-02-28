<?php 

// input arguments: $args=['year'=>2018,'qty'=>30]
$result[input] = $args;



//=== Andrew: remove transactions dated 2018:
$this->db->getval("delete from books_transactions where id >= 1");

$args[qty] = ($args[qty] >1 )? $args[qty] : 3;
$args[year] = ($args[year] > 1970)? $args[year] : $this->dates->F_thisyear();

// Remove all books_transactions. Create function "Randomly acquire books within dates range"
// acquire transaction id = 1

$sql = "select id from books";
$book_ids = $this->db->GetResults($sql);
echo $this->html->pre_display($book_ids,"result");