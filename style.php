<?php
// begin required info for wordpress
    $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
    $wp_load = $absolute_path[0] . 'wp-load.php';
    require_once($wp_load);

    header('Content-type: text/css');
    header('Cache-control: must-revalidate');
// end required info for wordpress

// begin style variables
    $std_font = 'open_sansregular';
    $light_font = 'open_sanslight';
    $bold_font = 'open_sanssemibold';
    $alt_title_font = 'source_serif_probold';
    $social_font = 'social_shapesregular';

    $color_white = get_option( 'color_white', '#ffffff' );
    $color_xlite = get_option( 'color_xlite', '#ffd5ee' );
    $color_lite = get_option( 'color_lite', '#ffbde4' );
    $color_medium = get_option( 'color_medium', '#ff78c8' );
    $color_dark = get_option( 'color_dark', '#816d79' );
    $color_xdark = get_option( 'color_xdark', '#444444' );
    $color_black = get_option( 'color_black', '#000000' );

    $background_em = <<<BG1
        background: $color_lite; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(90deg, $color_lite, $color_xlite, $color_lite); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(90deg, $color_lite, $color_xlite, $color_lite); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(90deg, $color_lite, $color_xlite, $color_lite); /* For Firefox 3.6 to 15 */
        background: linear-gradient(90deg, $color_lite, $color_xlite, $color_lite); /* Standard syntax */
BG1;

// end style variables

//begin styles
$content = <<<CSS
    body {
        background: $color_xdark;
        color: $color_dark;
        font-family: '$std_font';
        font-size: 13px;
    }
    body * {
        -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
        -moz-box-sizing: border-box;    /* Firefox, other Gecko */
        box-sizing: border-box;         /* Opera/IE 8+ */
    }
    h1 {
        font-size: 200%;
    }
    a:link, a:visited {
        color: inherit;
        text-decoration: none;
    }
    a:hover, a:active {
        color: inherit;
        /*font-family: 'open_sanssemibold';*/
        text-decoration: underline;
    }
    table {
        border-collapse: collapse;
        -webkit-border-horizontal-spacing: 0px;
        -webkit-border-vertical-spacing: 0px;
    }
    form {
        margin: 0;
        padding: 0;
    }
    input[type=text], input[type=email], input[type=number], input[type=date], select, textarea {
        border: 1px solid $color_dark;
        color: $color_dark;
        padding: 5px 8px;
        /*font-family: 'open_sansregular';*/
        font-size: 11px;
        width: 100%;
        font-weight: normal;
        outline: none;
        margin: 0;
    }
    /* Chrome 29+ */
    @media screen and (-webkit-min-device-pixel-ratio:0)
    and (min-resolution:.001dpcm) {
        input[type=text], select, textarea {
            font-family: '$std_font';
        }
    }

    /* Chrome 22-28 */
    @media screen and(-webkit-min-device-pixel-ratio:0) {
        input[type=text], select, textarea {-chrome-:only(; 
            font-family: '$std_font';
        );} 
    }
    section.site {
        max-width: 1600px;
        margin: 0 auto;
        position: relative;
        background: $color_white;
    }
    hr.seperator {
        border: 0px;
        border-top: 1px solid $color_dark;
        width: 60px;
        margin: 15px 0px;
        text-align: left;
    }
	.top-middle {
		position: absolute;
		top: 15px;
		left: 50%;
		transform: translateX(-50%);
	}
	.bottom-middle {
		position: absolute;
		bottom: 15px;
		left: 50%;
		transform:  translateX(-50%);
	}
    .call-to-action {
        /*position: absolute;
        width: 100%;
        bottom: 0px;
        padding: 50px;*/
		display: inline-block;
		text-align: center;
        font-family: '$light_font';
    }
    .call-to-action button {
        $background_em
        font-family: '$light_font';
        font-size: 35px;
        color: inherit;
        border: 2px solid $color_medium;
        max-width: 500px;
        border-radius: 10px;
        cursor: pointer;
    }
    .call-to-action button strong {
        display: block;
        font-family: '$bold_font';
    }
    .std-button, .submit, .wpcf7-submit  {
        border: 1px solid $color_dark;
        border-radius: 5px;
        padding: 5px 8px;
        color: $color_dark;
        background: transparent;
    }
    .large-button-text {
        font-size: 120%;
    }
    .light-button, footer .wpcf7-submit, footer .submit  {
        border: 1px solid $color_white;
        border-radius: 5px;
        padding: 5px 8px;
        color: $color_white;
        background: transparent;
    }
    .hide {
        display: none;
    }
	.set-right {
		float: right;
		margin: 10px;
	}
	.ui-btn {
    	visibility:collapse;
	}
	button.ui-btn {
		visibility:visible;
	}
	.ui-btn * {
    	visibility:visible;
	}
	.ui-btn .light-button, .ui-btn .wpcf7-submit, .ui-btn .submit {
		float: left;
	}
	.ui-btn .ajax-loader {
		clear: both;
	}
    /*
    ** End Universal Styles
    */

    /*
    ** Begin Header Styles
    */
    header {
        /*background-color: #ffffff;
        background-image: url(images/header_image.png);
        min-height: 783px;
        position: relative;*/
        position: absolute;
        width: 100%;
        z-index: 25;
    }
    header .topbar {
        width: 100%;
        $background_em
        padding: 8px 210px;
        border-bottom: 1px solid $color_medium;
        font-family: '$bold_font';
        font-size: 110%;
        letter-spacing: 2px;
        line-height: 30px;
        text-align: right;
    }
    header .topbar span {
        display: inline-block;
        position: relative;
    }
    header .topbar .social {
        font-family: '$social_font';
        font-size: 30px;
        line-height: 30px;
        top: 4px;
        margin: 0 10px;
    }
    header .topbar .social strong {
        font-weight: normal;
        color: $color_medium;
    }
    header .topbar .social a:link,
    header .topbar .social a:active,
    header .topbar .social a:hover,
    header .topbar .social a:visited {
        text-decoration: none;
    }
    header .main-nav {
        position: relative;
        text-align: center;
        background: rgba(255,255,255,0.35);
    }
    header .mobile-main-nav {
        text-align: center;
        font-size: 120%;
        padding: 0 20px;
        display: none;
    }
    header .mobile-main-nav a {
        display: inline-block;
        border: 1px solid $color_white;
        color: $color_white;
        padding: 1px 5px;
        border-radius: 5px;
        background: $color_medium;
        font-weight: 100;
    }
    header .mobile-main-nav a:hover,
    header .mobile-main-nav a:active {
        text-decoration: none;
    }
    header .main-nav .main-nav-container {
        position: relative;
        display: inline-block;
        margin: 30px 0;
    }
    header .main-nav:after {
        content: "";
        clear: both;
    }
    header .main-nav .logo {
        display: inline-block;
        /*-webkit-filter: drop-shadow(1px 1px 4px #fff);
        filter: drop-shadow(0px 0px 5px #fff);*/
    } 
	header .main-nav .menu-main-menu-container {
		display: inline-block;
	}
    header .main-nav ul {
        display: inline-block;
        list-style-type: none;
        margin: 0;
        padding: 10px 0 0 0;
        position: relative;
        font-size: 110%;
        white-space: nowrap;
        font-family: '$bold_font';
        
    }
    header .main-nav ul li {
		position: relative;
        display: inline-block;
        position: relative;
		margin: 0 10px;
    }
	header .main-nav ul li ul {
        position: absolute;
		display: block;
		margin-left: -10px;
		display: none;
    }
	header .main-nav ul li ul li {
		display: block;
		text-align: left;
		background: rgba(255,255,255,0.5);
		padding: 3px 5px;
		margin: 3px 0;
    }
	header .main-nav ul li:hover ul {
        display: block;
    }
    header .main-nav ul li a {
        color: $color_black;
        /*text-shadow: 1px 1px 4px #fff;*/
    }
    /*
    ** End Header Styles
    */

    /*
    ** Begin Slider Styles
    */
    .fotorama__nav-wrap {
        /*margin-top: -30px;*/
    }
    .fotorama__dot {
        width: 8px;
        height: 8px;
        border: 1px solid $color_black;
        background-color: $color_white;
        box-shadow: 0px 0px 5px $color_black;
    }
    .fotorama__nav__frame.fotorama__active .fotorama__dot {
        width: 8px;
        height: 8px;
        border-width: 1px;
        background-color: $color_xdark;
    }
    .fotorama__caption {
        bottom: 0;
        left: 0;
        width: 100%;
    }
    .fotorama__caption__wrap {
        display:block;
        $background_em
        font-family: '$light_font';
        font-size: 35px;
        text-align: center;
        border-top: 1px solid $color_medium;
        border-bottom: 1px solid $color_medium;
        cursor: pointer;
    }
    .fotorama__caption a {
        display: block;
        cursor: pointer;
    }
    .fotorama__caption a:link,
    .fotorama__caption a:visited {
        color: $color_dark;
        border: 0px;
    }
    .fotorama__caption a:hover,
    .fotorama__caption a:active {
        color: $color_dark;
        border: 0px;
        text-decoration: none;
    }
    .fotorama__caption__wrap strong {
        font-family: '$bold_font';
    }
    .slider {
        border-bottom: 0px solid $color_medium;
		min-height: 200px;
    }
    /*
    ** End Slider Styles
    */

    /*
    ** Begin Content Styles
    */
    .content-section {
        padding: 10px 100px 30px;
    }
	.content-section a, .content-section-em a {
		color: $color_medium;
	}
    .content-section-em {
        position: relative;
        $background_em
        height: 498px;
        /*padding: 30px 100px 30px 100px;*/
        border-top: 1px solid $color_medium;
        border-bottom: 1px solid $color_medium;
    }
    .bg-left .bg-img {
		float: left;
		position: relative;
		margin-right: 20px;
		left:0;
		top:0;
    }
	.bg-img img {
		height: 100%;
	}
    .bg-right .bg-img {
        float: right;
		position: relative;
		margin-left: 20px;
		left:0;
		top:0;
    }
	.bg-full .bg-img {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
	.bg-full .bg-img img {
		width: 100%;
		height: 100%;
	}
	.bg-full .section-group {
		text-align: center;
	}
    .content-section-em .section-group {
        position: relative;
        top: calc(50% - 40px);
        transform: translateY(-50%);
		margin: 20px 100px 20px 100px;
    }
    .bios-scroll-left, .bios-scroll-right {
        position: relative;
        top: -170px;
        margin-bottom: -170px;
        font-size: 200%;
        width: 35px;
        line-height: 350px;
        display: inline-block;
        text-align: center;
        color: $color_medium;
    }
    .bios-scroll-container {
        display: inline-block;
        width: calc(100% - 150px);
        max-width: 1200px;
        overflow: hidden;
    }
    .bios {
        list-style-type: none;
        padding: 0;
        margin: 0;
        white-space: nowrap;
    }
    .bios li {
        margin: 0 40px;
        width: 220px;
        display: inline-block;
    }
    .bio-img {
        border: 3px solid $color_medium;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        overflow:hidden;
    }
    .bio-img img {
        margin: -3px 0 0 -3px;
        width: calc(100% + 6px);
    }
    .bio-title {
        background: $color_medium;
        color: $color_white;
        text-align: center;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        white-space: pre-wrap;
        padding: 10px;
        font-family: '$light_font';
    }
    .bio-title strong {
        font-size: 200%;
    }
	
	#post_thumb {
		margin: 15px 0;
	}

    /** begin accordian styles **/
    .content-section-ac{
        width: 100%;
        text-align: left;
    }
    .content-section-ac label{
        font-family: '$light_font';
        padding: 0px 100px;
        position: relative;
        z-index: 20;
        display: block;
        height: 30px;
        cursor: pointer;
        color: $color_white;
        /*text-shadow: 1px 1px 1px rgba(255,255,255,0.8);
        line-height: 33px;*/
        font-size: 19px;
        background: $color_medium;
        border-top: 1px solid $color_dark;
        border-bottom: 1px solid $color_dark;
        /*background: -moz-linear-gradient(top, #ffffff 1%, #eaeaea 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#ffffff), color-stop(100%,#eaeaea));
        background: -webkit-linear-gradient(top, #ffffff 1%,#eaeaea 100%);
        background: -o-linear-gradient(top, #ffffff 1%,#eaeaea 100%);
        background: -ms-linear-gradient(top, #ffffff 1%,#eaeaea 100%);
        background: linear-gradient(top, #ffffff 1%,#eaeaea 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=0 );
        box-shadow: 
            0px 0px 0px 1px rgba(155,155,155,0.3), 
            1px 0px 0px 0px rgba(255,255,255,0.9) inset, 
            0px 2px 2px rgba(0,0,0,0.1);*/
    }
    .content-section-ac label:hover{
        $background_em
        color: $color_dark;
        border-top: 1px solid $color_medium;
        border-bottom: 1px solid $color_medium;
    }
    .content-section-ac input:checked + label,
    .content-section-ac input:checked + label:hover{
        $background_em
        color: $color_dark;
        /*text-shadow: 0px 1px 1px rgba(255,255,255, 0.6);
        box-shadow: 
            0px 0px 0px 1px rgba(155,155,155,0.3), 
            0px 2px 2px rgba(0,0,0,0.1);*/
    }
    .content-section-ac label:hover:after,
    .content-section-ac input:checked + label:hover:after{
        content: '';
        position: absolute;
        width: 24px;
        height: 24px;
        left: 70px;
        top: 2px;
        background: transparent url(images/arrow_down.png) no-repeat center center;	
    }
    .content-section-ac input:checked + label:hover:after{
        background-image: url(images/arrow_up.png);
    }
    .content-section-ac input{
        display: none;
    }
    .content-section-ac article{
        background: rgba(255, 255, 255, 0.5);
        margin-top: -1px;
        overflow: hidden;
        height: 0px;
        position: relative;
        z-index: 10;
        -webkit-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
        -moz-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
        -o-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
        -ms-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
        transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
        padding: 0 100px;
    }
    .content-section-ac article p{
        
    }
    .content-section-ac input:checked ~ article{
        -webkit-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
        -moz-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
        -o-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
        -ms-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
        transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
        box-shadow: 0px 0px 0px 1px rgba(155,155,155,0.3);
    }
    .content-section-ac input:checked ~ article.ac-small{
        min-height: 50px;
        height: auto;
    }
    .content-section-ac input:checked ~ article.ac-medium{
        min-height: 50px;
        height: auto;
    }
    .content-section-ac input:checked ~ article.ac-large{
        min-height: 50px;
        height: auto;
    }
    /** end accordian styles **/
    
    /*
    ** End Content Styles
    */

    /*
    ** Begin Footer Styles
    */
    footer .information {
        background: $color_dark;
        color: $color_white;
        padding: 30px 100px;
    }
    footer .info-sections {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    footer .info-sections li {
        float: left;
        width: calc(25% - 30px);
        padding: 0 15px;
    }
    footer .info-sections td, .info-sections th {
        color: $color_white;
        font-size: 13px;
        padding: 3px 5px;
    }
	footer .info-sections td {
		border-top: 1px solid $color_white;
	}
	footer .info-sections td:first-child {
		border-top: 0px solid $color_white;
	}
    footer .info-sections table {
        width: 100%;
    }
    footer .info-sections h2 {
        text-align: left;
        font-family:'$alt_title_font';
        font-size: 130%;
        padding: 0 0 10px 0;
		margin: 0;
    }
    footer #map {
        width: 100%;
        height: 229px;
    }
	footer .info-sections .textwidget {
		border-top: 1px solid $color_white;	
	}
	footer .info-sections .textwidget p {
		margin: 13px;
		-webkit-margin-before: 3px;
    	-webkit-margin-after: 3px;
	}
    footer #contact_form div {
        padding: 6px 0;
    }
    footer #contact_form textarea {
        height: 65px;
    }
    footer .info-follow td {
        height: 118px;
    }
    footer .legal {
        text-align: center;
        $background_em
        padding: 30px 100px;
        border-top: 1px solid $color_medium;
    }
    footer .legal strong {
        color: $color_medium;
    }
    footer .legal a {
        color: $color_medium;
    }
	footer .legal .footer_menu {
		display: inline-block;
	}
	footer .legal ul {
		display: inline-block;
		list-style-type: none;
		padding: 0;
		margin: 0;
	}
	footer .legal li {
		display: inline-block;
		border-right: 1px solid $color_dark;
		padding: 0 10px;
	}
	footer .legal li:first-child {
		border-left: 1px solid $color_dark;
	}
    /*
    ** End Footer Styles
    */

    /*
    ** Start Specific Browser Compatability styles
    */
    /* Chrome 29+ */
    @media screen and (-webkit-min-device-pixel-ratio:0)
    and (min-resolution:.001dpcm) {
        footer #contact_form textarea {
            height: 63px;
        }
    }

    /* Chrome 22-28 */
    @media screen and(-webkit-min-device-pixel-ratio:0) {
    footer #contact_form textarea {-chrome-:only(; 
            height: 63px;
        );} 
    }
    /* IE 10+ */
    @media all and (-ms-high-contrast:none)
    {
        footer #map { height: 225px; } /* IE10 */
        *::-ms-backdrop, footer #map { height: 225px; } /* IE11 */

        footer .info-follow td { height: 116px; } /* IE10 */
        *::-ms-backdrop, footer .info-follow td { height: 116px; } /* IE11 */
    }
    /* Edge Browser */
    @supports (-ms-ime-align:auto) {
        footer #map {
            height: 225px;
        }
        footer .info-follow td {
            height: 116px;
        }
    }
    /*
    ** End Specific Browser Compatability styles
    */

    /*
    ** Start Responsive styles
    */
    @media screen and (max-width: 1255px) {
        header .main-nav .main-nav-container {
            padding: 0px;
        }
        header .main-nav .logo {
            display: block;
        }
		header .main-nav .menu-main-menu-container {
			display: block;
		}
        header .main-nav ul {
            display: block;
        }
        .content-section-em {
            height: 398px;
        }
        /*.content-section-em.bg-left{
            padding-left: 700px;
        }
        .content-section-em.bg-right {
            padding-right: 700px;
        }*/
        footer .info-sections li {
            /*width: calc(50% - 30px);*/
            width: calc(50% - 15px);
        }
    }
    @media screen and (max-width: 1058px) {
        header .topbar {
            padding: 8px 30px;
        }
        header .main-nav .logo img {
            width: 250px;
			height: auto;
        }
        .fotorama__caption__wrap {
            font-size: 25px;
        }
        .content-section {
            padding: 10px 30px 30px;
        }
        .content-section-em {
            height: 298px;
            /*padding: 30px 30px;*/
        }
		.content-section-em .section-group {
			margin: 20px;
		}
        /*.content-section-em.bg-left {
            padding-left: 540px;
        }
        .content-section-em.bg-right {
            padding-right: 540px;
        }*/
        .content-section-ac label, .content-section-ac article {
            padding: 0 30px;
        }
        footer .information {
            padding: 30px 30px;
        }
        footer .legal {
            padding: 30px 30px;
        }
        .bios li {
            margin: 0 20px;
        }
        .bios-scroll-container {
            width: calc(100% - 80px);
        }
    }
    @media screen and (max-width: 963px) {
       header .main-nav .main-nav-container {
            margin: 0;
            padding: 10px 0;
            display: block;
        }
        header .main-nav .logo img {
            width: 200px;
        }
        header .main-nav ul {
            position: absolute;
            right: 0;
            transform: none;
        }
        header .main-nav .mobile-main-nav {
            display: block;
			text-align: right;
        }
        header .main-nav ul li {
            display: none;
            position: relative;
            background: rgba(255,255,255, 0.8);
            margin: 5px 0;
            padding: 3px 20px;
            box-shadow: 1px 1px 10px $color_black;
        }   
        header .main-nav .logo {
            float: left;
            text-align: left;
            width: 50%;
        }
        header .main-nav ul {
            float: right;
            text-align: right;
            width: 50%;
        }
		.slider {
			min-height: 0;
		}
        .fotorama__caption__wrap {
            font-size: 20px;
        }
        .content-section-em {
            /*height: 250px;*/
        }
        /*.content-section-em.bg-left {
            padding-left: 430px;
        }
        .content-section-em.bg-right {
            padding-right: 430px;
        }*/
        h1 {
            font-size: 130%;
        }
        .content-section-em .section-group {
            top: calc(50% - 20px);
        }
    }
    @media screen and (max-width: 814px) {
        header .main-nav .main-nav-container {
            margin: 0;
            padding: 10px 0;
            display: block;
        }
        header .mobile-main-nav {
            text-align: right;
        }
        header .main-nav ul {
            position: absolute;
            right: 0;
            transform: none;
        }
        header .main-nav .logo {
            float: left;
            text-align: left;
            width: 50%;
        }
        header .main-nav ul {
            float: right;
            text-align: right;
            width: 50%;
        }
        .content-section-em .section-group {
            position: relative;
            top: 0;
            transform: none;
        }
		.bg-left .bg-img, .bg-right .bg-img {
			float: none;
			margin: 0;
			text-align:center;
		}
		.bg-img img {
			height: auto;
			width: 60%;
		}
		
        /*.content-section-em.bg-left {
            background: $color_lite url(images/phylosophy_image.png) no-repeat center left;
            padding-left: calc(50% + 20px);
        }
        .content-section-em.bg-right {
            background: $color_lite url(images/testimonial_image.png) no-repeat center right;
            padding-right: calc(50% + 20px);
        }*/
        .content-section-em {
            height: auto;
            /*background-size: 50% auto !important;*/
        }
    }
    @media screen and (max-width: 620px) {
        .fotorama__caption__wrap {
            font-size: 16px;
        }
		.set-right {
			float: none;
			display: block;
			margin: 10px 0;
			text-align: center;
		}
    }
    @media screen and (max-width: 565px) {
        header .topbar {
            font-size: 80%;
            padding: 3px 10px;
        }
        header .topbar .social {
            font-size: 20px;
        }
        header .main-nav .logo img {
            width: 150px;
        }
        .fotorama__caption__wrap {
            font-size: 14px;
        }
        footer .info-sections li {
            /*width: calc(50% - 30px);*/
            width: calc(100% - 15px);
        }
        .bios li {
            width: 220px;
        }
    }
    @media screen and (max-width: 450px) {
        .fotorama__caption__wrap {
            font-size: 11px;
        }
        .content-section-em .section-group {
            position: relative;
            top: 0;
            transform: none;
		}
        .content-section-em {
            height: auto;
            /*background-size: auto 200px !important;*/
        }
        .bios li {
            width: 180px;
        }
    }
    /*
    ** End Responsive styles
    */
CSS;
// end styles

    echo $content;
?>
