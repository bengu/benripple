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

</div>
    <div class="welcome">		
<?php
echo $user['name'] . '<br /><br />';


if($email == true) 
echo 'E-postadressen ' . $user['email'] . ' tillhör ' . $user['name'] . '<br /><br />';


$mystring = '/trust/' . $user['id'] . '/unit/1/amount/100';
$myuserstring2 = 'Ge förtroende till ' . $user['name'] . ' för att kunna ta emot överföringar.';
echo HTML::link($mystring, $myuserstring2); ?>

<?php 
$exists = Creditline::join('goods', 'good_id', '=', 'goods.id')
->where('from', $user['id'])->where('to', Auth::user()->id)->get();

echo "Du har redan uppgett att du litar på användaren motsvarande ";
foreach ($exists as $ex)
	{
		echo '<br />' . $ex['trust'], ' ', $ex['description'], ' ' ;
	}
?>
    </div>
</body>
</html>
