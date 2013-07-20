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
 


<form class="form-signin form-horizontal" method="post" action="/vpromise">
<h2 class="">Bekräfta att du vill skicka <?php echo $promise['promise'] ?> <?php echo $promise['unitname'] ?> till <?php echo $promise['name'] ?></h2>


<input type="hidden" id="promise" name="promise" value="<?php echo $promise['promise'] ?>">
<input type="hidden" id="unit" name="unit" value="<?php echo $promise['unit'] ?>">
<input type="hidden" id="id" name="id" value="<?php echo $promise['id'] ?>">
<button class="btn btn-large btn-primary" type="submit">Signera</button>
</form>
</div> <!-- /container -->
</div>
</body>
</html>


