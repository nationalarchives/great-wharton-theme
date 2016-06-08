<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title>
            <?php
            if (is_front_page()){
              bloginfo("name");
echo(" -");

            }else{

            wp_title('-',true,'right'); }?> The National Archives
        </title>

        <!-- Meta tags-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="The National Archives web team">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <!-- View port -->
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <!-- Add fav icon -->
        <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo make_path_relative( get_template_directory_uri() ); ?>/favicon.ico.png">
        <!-- Styling -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo make_path_relative( get_template_directory_uri() ); ?>/css/main.css?v=1.1" rel="stylesheet">

        <!--[if gte IE 8]>
        <link href="<?php echo make_path_relative( get_template_directory_uri() ); ?>/css/ie8.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if gte IE 9]>
        <link href="<?php echo make_path_relative( get_template_directory_uri() );?>/css/ie9.css" rel="stylesheet" type="text/css" />
        <![endif]-->
        <!--[if IE ]>
        <link href="<?php echo make_path_relative( get_template_directory_uri() );?>/css/ie10.css" rel="stylesheet" type="text/css" />
        <![endif]-->

        <!-- Main font -->
        <link href='https://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
        <script>
            // If JS is enable add js class to HTML tag
            document.getElementsByTagName('html')[0].className += 'js';
        </script>



		<?php tna_wp_head(); ?>
        <!-- GA Tag Manager code -->

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-2827241-1']);
            _gaq.push(['_setDomainName', 'nationalarchives.gov.uk']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>

</head>

    <?php if (is_home() || is_front_page()){
    ?>
    <body class="f-grid">
    <?php

}else{?>

	<body class="s-grid">
<?php }?>