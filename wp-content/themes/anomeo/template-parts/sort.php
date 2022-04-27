<?php $sort= $_GET['sort'];
if($sort == "title")
{
$order= "orderby=title";
}
if($sort == "date")
{
$order= "orderby=date";
}
?>

<a  href="?sort=title" <?php if ($sort == "title"){ echo 'style="color:gray"'; } ?>>title</a><a href="?sort=date" <?php if ($sort == "date"){ echo 'style="color:gray"'; } ?>>Date</a>