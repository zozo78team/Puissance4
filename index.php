<!doctype html>
<html>
<head>
<title>Connect 4 - The Game</title>
<style type="text/css">
p{ margin-top:50px; }
p.message{font-size:1.5em; text-transform:uppercase; }
table { border-left:1px solid #444; border-top:1px solid #444; border-collapse:collapse; }
table td{
	font-family:arial;
	font-size:12px;
	width:30px;
	height:30px;
	vertical-align:middle;
	text-align:center;
	border-right:1px solid #444;
	border-bottom:1px solid #444;
	text-indent:-9999px;
}
table td.player-1{background:red; }
table td.player-2{background:yellow; }
</style>
</head>

<body>
<h2>Puissance 4</h2>
Joueur 1 - Rouge <br/>
Joueur 2 - Jaune <br/>
<?php
require 'PuissanceFour.php';
$new_game = new PuissanceFour();
?>
</body>
</html>
