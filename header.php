<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>
            <?php wp_title('|',true,'right'); ?>
            <?php bloginfo('name'); ?>
        </title>

        <!-- Meta tags-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="The National Archives web team">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <!-- View port -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- Add fav icon -->
        <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php bloginfo("stylesheet_directory");?>/favicon.ico.png">
        <!-- Styling -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="<?php bloginfo("stylesheet_directory");?>/css/main.css?v=1.1" rel="stylesheet">
        <!-- Main font -->
        <link href='https://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
        <script>
            // If JS is enable add js class to HTML tag
            document.getElementsByTagName('html')[0].className += 'js';
        </script>



		<?php wp_head(); ?>


</head>

    <?php if (is_home() || is_front_page()){
    ?>
    <body class="f-grid">
    <?php

}else{?>

	<body>
<?php }?>