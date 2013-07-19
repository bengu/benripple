<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            text-align:center;
            color: #999;
        }

        .welcome {
           width: 400px;
           height: 400px;
           position: absolute;
           left: 50%;
           top: 50%; 
           margin-left: -200px;
           margin-top: -200px;
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
<?php echo Auth::user()->username; ?> är inloggad.<br />
<?php echo HTML::link('logout', 'Logout'); ?><br />
<?php echo HTML::link('creditlines', 'Kreditlinjer'); ?>
<?php echo HTML::link('hello', 'Hem'); ?>
<?php echo HTML::link('listusers', 'Lista användare'); ?>

    <div class="welcome">
	<div class="container">
 


<form class="form-signin form-horizontal" method="post" action="/vtrust">
<h2 class="">Bekräfta att du vill kunna ta emot <?php echo $trust['amount'] ?> <?php echo $trustunitname ?> av <?php echo $trustname ?></h2>

<?php 
$exists = Creditline::where('from', $trust['from'])->where('to', Auth::user()->id)->where('good_id', $trust['unit'])->select('trust')->get()->first();

if($exists['trust'] > 0)
echo "Du har redan ", $exists['trust'] ?>

<input type="hidden" id="amount" name="amount" value="<?php echo $trust['amount'] ?>">
<input type="hidden" id="unit" name="unit" value="<?php echo $trust['unit'] ?>">
<input type="hidden" id="from" name="from" value="<?php echo $trust['from'] ?>">
<button class="btn btn-large btn-primary" type="submit">Signera</button>
</form>
</div> <!-- /container -->
</div>
</body>
</html>


