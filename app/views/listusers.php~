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
           width: 300px;
           height: 300px;
           position: absolute;
           left: 50%;
           top: 50%; 
           margin-left: -150px;
           margin-top: -150px;
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
Välkommen tillbaka, <?php echo Auth::user()->username; ?>!<br />
<?php echo HTML::link('logout', 'Logout'); ?><br />
<?php echo HTML::link('creditlines', 'Kreditlinjer'); ?>
<?php echo HTML::link('hello', 'Hem'); ?>


</div>
	<div class="welcome">

<div class="container">
 


<form class="form-signin form-horizontal" method="post" action="/user">
<h2 class="">Sök användare med epostadress.</h2>
<input type="text" id="email" name="email" value="">
<br />
<button class="btn btn-large btn-primary" type="submit">Sök med epostadress</button>
</form>
</div> <!-- /container -->
<br /><br />

		Lista på användare i systemet <br />
    		<?php 
		$currencies = User::where('privatperson', '=', '1')->get();
		
		foreach ($currencies as $c){
			$cstringusersearch = '/user/id/' . $c['id'];
			echo HTML::link($cstringusersearch, $c['name']) . '<br />';
		}

?>
	</div>
</body>
</html>
