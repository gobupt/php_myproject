<?php
require_once 'include.php';
$id = $_GET['id'];
delete_board($id);
go("board.php");