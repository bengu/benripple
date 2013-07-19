<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php echo $title; ?>
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
<?php echo HTML::link('listusers', 'Lista användare'); ?>


</div>
	<div class="welcome">
		Lista på valutor i systemet <br />
    		<?php 
		$currencies = User::join('creditlines', 'users.id', '=', 'creditlines.from' )
			->select(DB::raw('count(*) as creditline_count, name, users.id'))
                     	->groupBy('users.id')			
			->where('privatperson', '=', '0')
			->orderBy('creditline_count', 'desc')
			->get();
		
		foreach ($currencies as $c){
			$cstringusersearch = '/user/id/' . $c['id'];
			echo HTML::link($cstringusersearch, $c['name'] . ' (' . $c['creditline_count'] . ')'), '<br />';
		}

?>
	</div>
</body>
</html>
