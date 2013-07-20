<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
           width: 500px;
           height: 500px;
           position: absolute;
           left: 50%;
           top: 50%; 
           margin-left: -250px;
           margin-top: -250px;
        }

        a, a:visited {
            color:#FF5949;
            text-decoration:none;
        }

        a:hover {
            text-decoration:underline;
        }

        ul li {
            display:inline;
            margin:0 1.2em;
        }

        p {
            margin:2em 0;
            color:#555;
        }
    </style>
</head>
<body>
<div class="header">
<?php echo Auth::user()->username; ?> är inloggad.<br />
<?php echo HTML::link('logout', 'Logout'); ?><br />
<?php echo HTML::link('creditlines', 'Kreditlinjer'); ?>
<?php echo HTML::link('hello', 'Hem'); ?>
<?php echo HTML::link('listusers', 'Lista användare'); ?>


</div>
    <div class="welcome">		
<?php
echo $user['name'] . '<br /><br />';

echo $user['desc'] . '<br /><br />';

if($email == true) 
echo 'E-postadressen ' . $user['email'] . ' tillhör ' . $user['name'] . '<br /><br />';


$mystring = '/trust/' . $user['id'] . '/unit/1/amount/100';
$myuserstring2 = 'Ge förtroende till ' . $user['name'] . ' för att kunna ta emot överföringar.';
if (Auth::user()->id != $user['id']){
echo HTML::link($mystring, $myuserstring2);

$exists = Creditline::join('goods', 'good_id', '=', 'goods.id')
->where('from', $user['id'])->where('to', Auth::user()->id)->get();

foreach ($exists as $ex)
	{
		echo '<br />' . $ex['trust'], ' ', $ex['description'], ' är satt som kreditgräns.' ;
	}
}
?>

<br /><br />ovan kan också vara ett formulär. här nedan behöver en veta hur mycket som kan skickas. det behövs valm.jligheter för hur en vill skicka (direkt eller via någon)

<div class="container">
<form class="form-signin form-horizontal" method="post" action="/promise">
<h2 class="">Skicka SEK till <?php echo $user['name']?></h2>
<input type="hidden" id="id" name="id" value="<?php echo $user['id']?>">
<input type="hidden" id="unit" name="unit" value="1">
<input type="text" id="promise" name="promise" value="0">
<br />
<button class="btn btn-large btn-primary" type="submit">Skicka till <?php echo $user['name']?></button>
</form>
</div> <!-- /container -->
<br /><br />

    </div>
</body>
</html>
