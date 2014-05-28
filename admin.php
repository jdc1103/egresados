<?php 
	session_start();
	if (!isset($_SESSION['user'])) {
		header ("Location: login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-ES" lang="es-ES" >

<!-- Mirrored from www.iucesmag.edu.co/?page_id=2468 by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 13 Jun 2013 00:40:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<title>Oficina de Proyeccion Institucional | Institución Universitaria CESMAG</title>
<link rel="alternate" type="application/rss+xml" title="Institución Universitaria CESMAG &raquo; Feed" href="http://www.iucesmag.edu.co/?feed=rss2" />
<link rel="alternate" type="application/rss+xml" title="Institución Universitaria CESMAG &raquo; RSS de los comentarios" href="http://www.iucesmag.edu.co/?feed=comments-rss2" />
<link rel='stylesheet' id='gantry618-css'  href='http://www.iucesmag.edu.co/wp-content/plugins/gantry/css/gantry.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='grid-12233-css'  href='http://www.iucesmag.edu.co/wp-content/plugins/gantry/css/grid-12.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='wordpress900-css'  href='http://www.iucesmag.edu.co/wp-content/plugins/gantry/css/wordpress.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='wordpress693-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/wordpress.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='template714-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/template.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='wp881-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/wp.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='overlays231-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/overlays.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='typography402-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/typography.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='fusionmenu61-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/fusionmenu.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='splitmenu854-css'  href='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/css/splitmenu.css?ver=1.24' type='text/css' media='all' />
<link rel='stylesheet' id='rokbox-style.css-css'  href='http://www.iucesmag.edu.co/wp-content/plugins/wp_rokbox/themes/light/rokbox-style.css?ver=3.4.2' type='text/css' media='all' />
<link rel='stylesheet' id='rokstories.css-css'  href='http://www.iucesmag.edu.co/wp-content/plugins/wp_rokstories/css/rokstories.css?ver=3.4.2' type='text/css' media='all' />
<link rel="stylesheet" href="http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/style.css" type="text/css"/><script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/gantry/js/mootools.js?ver=3.4.2'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-includes/js/jquery/jquery.js?ver=1.7.2'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/js/gantry-articledetails.js?ver=1.24'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/gantry/js/gantry-buildspans.js?ver=1.24'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/gantry/js/gantry-inputs.js?ver=1.24'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/gantry/js/fusion.js?ver=1.24'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/wp_rokbox/rokbox.js?ver=3.4.2'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/wp_rokstories/js/rokstories.js?ver=3.4.2'></script>
<script type='text/javascript' src='http://www.iucesmag.edu.co/wp-content/plugins/wp_roktabs/js/roktabs.js?ver=3.4.2'></script>
<link rel='prev' title='Convocatorias 2013' href='http://www.iucesmag.edu.co/?page_id=2437' />
<link rel='next' title='Arquitectura' href='http://www.iucesmag.edu.co/?page_id=2470' />
<link rel='canonical' href='http://www.iucesmag.edu.co/?page_id=2468' />
<script type="text/javascript">var rokboxPath = "http://www.iucesmag.edu.co/wp-content/plugins/wp_rokbox/";</script>
<script type="text/javascript" src="http://www.iucesmag.edu.co/wp-content/plugins/wp_rokbox/themes/light/rokbox-config.js"></script>
<script type="text/javascript">var RokStoriesImage = {}, RokStoriesLinks = {};</script>
	<style type="text/css">
		<!--

.module-content ul.menu li.active > a, .module-content ul.menu li.active > .separator, .module-content ul.menu li.active > .item, .module-content ul.menu li > a:hover, .module-content ul.menu li .separator:hover, .module-content ul.menu li > .item:hover {color:#A70000;}
.box1 .module-content ul.menu li.active > a, .box1 .module-content ul.menu li.active > .separator, .box1 .module-content ul.menu li.active > .item, .box1 .module-content ul.menu li > a:hover, .box1 .module-content ul.menu li .separator:hover, .box1 .module-content ul.menu li > .item:hover {color:#A70000;}
.box2 .module-content ul.menu li.active > a, .box2 .module-content ul.menu li.active > .separator, .box2 .module-content ul.menu li.active > .item, .box2 .module-content ul.menu li > a:hover, .box2 .module-content ul.menu li .separator:hover, .box2 .module-content ul.menu li > .item:hover {color:#FFFFFF;}
.box3 .module-content ul.menu li.active > a, .box3 .module-content ul.menu li.active > .separator, .box3 .module-content ul.menu li.active > .item, .box3 .module-content ul.menu li > a:hover, .box3 .module-content ul.menu li .separator:hover, .box3 .module-content ul.menu li > .item:hover {color:#FFFFFF;}
body {background:#EEEEEE;}
#rt-header, #rt-top, #rt-navigation {background:#f1f1f1;}
.menutop.theme-fusion ul {background-color:#f1f1f1;}
#rt-header, #rt-header .title, #rt-top, #rt-top .title, #rt-navigation {color:#666666;}
#rt-header .module-content a, #rt-header .title span, #rt-top a, #rt-top .title span, #rt-navigation .module-content a {color:#ffffff;}
.menutop.theme-fusion li.root > .item, .menutop.theme-fusion li > .item {color:#666666;}
.menutop.theme-fusion li.root.active > .item, .menutop.theme-fusion li.root.active > .item:hover, .menutop.theme-fusion li.root.active.f-mainparent-itemfocus > .item, .menutop.theme-fusion li.root:hover > .item, .menutop.theme-fusion li.root.f-mainparent-itemfocus > .item, .menutop.theme-fusion li:hover > .image, .menutop.theme-fusion li.f-menuparent-itemfocus .image, .menutop.theme-fusion li.active > .image, .menutop.theme-fusion li.active > .image, .menutop.theme-fusion li:hover > .bullet, .menutop.theme-fusion li.f-menuparent-itemfocus .bullet, .menutop.theme-fusion li.active > .bullet, .menutop.theme-fusion li.active > .bullet, .menu-type-splitmenu .menutop.theme-splitmenu li.active .item, .menu-type-splitmenu .menutop.theme-splitmenu li:hover .item, body #idrops li.root-sub a, body #idrops li.root-sub span.separator, body #idrops li.root-sub.active a, body #idrops li.root-sub.active span.separator {color:#ffffff;}
#rt-header .menutop.theme-fusion li a:hover{color:#ffffff;}
#rt-body-bg2, #more-articles span, #form-login .inputbox, body #roksearch_results .roksearch_header, body #roksearch_results .roksearch_row_btm, body #roksearch_results .roksearch_even:hover, body #roksearch_results .roksearch_odd:hover {background:#FFFFFF;}
#roksearch_search_str {background-color:#FFFFFF !important;}
.title1 .title, .title1 .title span, .title1 .title a, .title1 .title a span, .title2 .title, .title2 .title span, .title2 .title a, .title2 .title a span, .number-image {color:#FFFFFF;}
body, #rt-bottom, legend, a:hover, .button:hover, .module-content ul.menu a, .module-content ul.menu .separator, .module-content ul.menu .item, .roktabs-wrapper .roktabs-links li span, #rokajaxsearch .inputbox, #form-login .inputbox {color:#555555;}
a, .button, .module-content ul.menu a:hover, .module-content ul.menu .separator:hover, .module-content ul.menu .item:hover, .roktabs-wrapper .roktabs-links li.active span, .heading1, .box1 .title {color:#A70000;}
#rt-footer-surround {background:#003169;}
#rt-footer, #rt-footer .module-content a:hover, #rt-copyright, #rt-copyright a:hover, #rt-footer .title, #rt-copyright .title {color:#999999;}
#rt-footer .module-content a, #rt-copyright a, #rt-footer .title span, #rt-copyright .title span {color:#ffffff;}
.box1 .rt-block, .box1 .rt-article-bg, .roktabs-wrapper .active-arrows, .title3 .module-title-surround, #more-articles, .details-layout3 .rt-wordpress .rt-articleinfo, .rt-wordpress .inputbox, .rt-wordpress input#email, .rt-wordpress input#author, .rt-wordpress input#url, .rt-wordpress textarea#comment, .rt-wordpress input#name, .rt-wordpress input#username, .rt-wordpress input#password, .rt-wordpress input#password2, .rt-wordpress input#passwd, body #roksearch_results, .body-overlay-light .rt-post .rt-tags {background:#e3e3e3;}
.box1 .number-image {color:#e3e3e3;}
.box1 .rt-block, .roktabs-wrapper .active-arrows, .title3 .module-title-surround, .details-layout1 .rt-articleinfo, .roktabs-wrapper .roktabs-links ul li, #more-articles, #more-articles span, .details-layout3 .rt-wordpress .rt-articleinfo, #rokajaxsearch .inputbox, .box1 .rt-article-bg, body #roksearch_results, body #roksearch_results .roksearch_header, body #roksearch_results .roksearch_even, body #roksearch_results .roksearch_odd, .body-overlay-light .rt-post .rt-tags {border-color:#f1f1f1;}
#more-articles.disabled, #more-articles.disabled:hover {color: #999999}
.box1 .module-content, .box1 .module-content .button:hover, .box1 .title, .title3 .title, .title3 .title a, .box1 .module-content a:hover, .rt-wordpress .inputbox, .rt-wordpress  input#email, .rt-wordpress input#author, .rt-wordpress input#url, .rt-wordpress textarea#comment, #rt-main input#name, .rt-wordpress input#username, .rt-wordpress input#password, .rt-wordpress input#password2, .rt-wordpress input#passwd {color:#555555;}
.box1 .module-content a, .box1 .module-content .button, .box1 .title span, .title3 .title span, .title3 .title a span {color:#A70000;}
.box2 .rt-block, .box2 .rt-article-bg, .title1 .module-title-surround, .title4 .module-title-surround {background:#999999;}
.box2 .number-image {color:#999999;}
.box2 .rt-block, .title4 .module-title-surround, .box2 .rt-article-bg {border-color:#7C7C7C;}
.box2 .module-content, .box2 .title, .title4 .title, .title4 .title a, .box2 .module-content a:hover, .box2 .module-content .button:hover, .box2 .module-content ul.menu li a, .box2 .module-content ul.menu li .separator, .box2 .module-content ul.menu li .item {color:#DDDDDD;}
.box2 .module-content a, .box2 .module-content .button, .box2 .title span, .title4 .title span, .title4 .title a span {color:#FFFFFF;}
.box3 .rt-block, .box3 .rt-article-bg, .title2 .module-title-surround, .title5 .module-title-surround {background:#666666;}
.box3 .number-image {color:#666666;}
.box3 .rt-block, .title5 .module-title-surround, .box3 .rt-article-bg {border-color:#555555;}
.box3 .module-content, .box3 .module-content .button:hover, .box3 .title, .title5 .title, .title5 .title a, .box3 .module-content a:hover, .box3 .module-content ul.menu li a, .box3 .module-content ul.menu li .separator, .box3 .module-content ul.menu li .item {color:#DDDDDD;}
.box3 .module-content a, .box3 .module-content .button, .box3 .title span, .title5 .title span, .title5 .title a span {color:#FFFFFF;}
.rt-wordpress th, .rt-wordpress tr.even td  {background:#e3e3e3;}
.rt-wordpress th {border-bottom: 2px solid #f1f1f1;}
.rt-wordpress tr.even td  {border-bottom: 1px solid #f1f1f1;}
#jc h1 {border-color:#f1f1f1;}
#jc #comments .even #respond input, #jc #comments .even #respond textarea, #jc #comments.comments-basic ol.commentlist {border-color:#f1f1f1;}
#jc #comments .odd #respond input, #jc #comments .odd #respond textarea {border-color:#7C7C7C;}
#jc h1 {color:#555555;}
#jc .even .rbox, #jc #comments.comments-standard .even #respond input, #jc #comments.comments-standard .even #respond textarea {background:#e3e3e3;}
#jc .odd .rbox, #jc #comments.comments-standard .odd #respond input, #jc #comments.comments-standard .odd #respond textarea {background:#999999;}
#jc #comments.comments-basic .comment-meta-time {background:#e3e3e3;}
#jc #comments.comments-basic #respond input, #jc #comments.comments-basic #respond textarea {border-color:#f1f1f1;}
#jc #comments .even .quote, #jc #comments .even .comment-box .comment-body,#jc #comments .even .comment-box .comment-author, #jc #comments .even .comment-box .comment-anchor, #jc #comments .even .comment-box .comment-date {color:#555555 !important;}
#jc #comments .odd .quote,#jc #comments .odd .comment-box .comment-body, #jc #comments .odd .comment-box .comment-author, #jc #comments .odd .comment-box .comment-anchor, #jc #comments .odd .comment-box .comment-date{color:#DDDDDD !important;}
#jc #comments .even a {color:#A70000;}
#jc #comments.comments-standard .odd a {color:#FFFFFF;}
body.rt-normal .rt-articleinfo, body.rt-flipped .rt-articleinfo, body.rt-left .rt-articleinfo, body.rt-right .rt-articleinfo {color:#A70000;}
body.rt-normal .rt-articleinfo, body.rt-flipped .rt-articleinfo, body.rt-left .rt-articleinfo, body.rt-right .rt-articleinfo {background:#e3e3e3;}
#rt-rotator-bg {background-image: url(http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/images/showcase-bgs/marco.jpg);}

		-->
	</style>
	<script type="text/javascript">

InputsExclusion.push('.content_vote,#rt-popup')

				window.addEvent('domready', function() {
					var content = $$('#rt-rotator .rotator-desc'), overlay = $$('.rotator-overlay');
					if (!content.length) { if (overlay.length) overlay.setStyle('display', 'none'); } 
				});
			
	</script>
	<script type="text/javascript">//<![CDATA[
window.addEvent('domready', function() {
				var modules = ['rt-block'];
				var header = ['h3','h2','h1'];
				GantryBuildSpans(modules, header);
		

				var switcher = document.id('gantry-viewswitcher');
				if (switcher) {
					switcher.addEvent('click', function(e) {
						e.stop();
						if ('1' == '0') document.id('gantry-viewswitcher').addClass('off');
						else $('gantry-viewswitcher').removeClass('off');
						Cookie.write('panacea-win-switcher', '1');
						window.location.reload();
					});
				}
		
            new Fusion('ul.menutop', {
                pill: 0,
                effect: 'slide and fade',
                opacity:  1,
                hideDelay:  500,
                centered:  0,
                tweakInitial: {'x': 0, 'y': 0},
                tweakSubsequent: {'x':  2, 'y':  -12},
                menuFx: {duration:  200, transition: Fx.Transitions.Sine.easeOut},
                pillFx: {duration:  400, transition: Fx.Transitions.Back.easeOut}
            });
            
});	//]]></script>
    
    
 <style> body { background: url(http://www.iucesmag.edu.co/recursos/imagenes/fondo2.png) repeat;} 
		.menutop.theme-fusion li.root.active > .item,
		.menutop.theme-fusion li.root.active > .item:hover,
		.menutop.theme-fusion li.root.active.f-mainparent-itemfocus > .item,
		.menutop.theme-fusion li.root:hover > .item,
		.menutop.theme-fusion li.root.f-mainparent-itemfocus > .item, 
		.menutop.theme-fusion li:hover > .image,
		.menutop.theme-fusion li.f-menuparent-itemfocus .image,
		.menutop.theme-fusion li.active > .image,
		.menutop.theme-fusion li.active > .image,
		.menutop.theme-fusion li:hover > .bullet,
		.menutop.theme-fusion li.f-menuparent-itemfocus .bullet,
		.menutop.theme-fusion li.active > .bullet,
		.menutop.theme-fusion li.active > .bullet,
		.menu-type-splitmenu .menutop.theme-splitmenu li.active .item,
		.menu-type-splitmenu .menutop.theme-splitmenu li:hover .item,
		body #idrops li.root-sub a,
		body #idrops li.root-sub span.separator,
		body #idrops li.root-sub.active a,
		body #idrops li.root-sub.active span.separator{color:#A70000;}
		body #roksearch_results .roksearch_header{background:#003169;color:#f1f1f1;}
   </style>
  <link rel="shortcut icon" href="http://www.iucesmag.edu.co/iucesmag.ico">


<META content="Institución Universitaria CESMAG.centro de estudios superiores maría goretti.Ingeniería electrónica.Preescolar.Educación Física.Gestión financiera.Psicología.licenciatura en educación preescolar.pasto.derecho.electrónica.San juan de pasto" name="description">

<META name="Keywords" content="Institución Universitaria CESMAG,Facultad de Arquitectura y bellas artes,Facultad de Ciencias sociales y humanas,educación,Ingeniería,Ciencias Administrativas y Contables,Maestrías,Educación desde la Diversidad,Derecho procesal,Desarrollo sostenible y medio ambiente,Tributación política y fiscal,Administración de empresas,Contablidad y finanzas,Contaduría pública,Gestión financiera,Arquitectura,Diseño Gráfico,Derecho,Psicología,Ingeniería de Sistemas,Ingeniería Electrónica,Licenciatura en educación física,licenciatura en educación preescolar,pasto,San juan de pasto,cesmag,Colombian University"/>


<META content="index,follow" name="robots">
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="Institución Universitaria CESMAG" name="author">
<META content="Global" name="Distribution">
<META content="(c) 2012 - Institución Universitaria CESMAG" name="Copyright">
<META content="Never" name="Expires">
<META content="General" name="Rating">
<META content="Web Page" name="doc-type">
<META content="Institución Universitaria CESMAG" name="owner">
<META http-equiv="Content-Language" content="es">
<META http-equiv="Last-Modified" content="0">

<script type="text/javascript">

  var _gaq = _gaq || [];
  
  var pluginUrl = 'http://www.google-analytics.com/plugins/ga/inpage_linkid.js';
 _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  
  _gaq.push(['_setAccount', 'UA-40543493-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body  class="page page-id-2468 page-parent page-template-default readonstyle-button font-family-default font-size-is-default col12 menu-type-splitmenu">
						<div class="rt-container">
			<div class="rt-wrapped"><div class="rt-wrapped2"><div class="rt-wrapped3"><div class="rt-wrapped4">
							<div id="rt-header-surround" class="header-overlay-light">
															<div id="rt-header"><div id="rt-header2">
													            <div class="rt-grid-12 rt-alpha rt-omega">
            <div class="flush"><div id="text-63" class="widget widget_text rt-block"><div class="rt-module-surround"><div class="rt-module-inner"><div class="module-content">			<div class="textwidget"><!--<img src="http://190.14.239.48/cesmagw/wp-content/themes/rt_panacea_wp/images/header/prueba-04-938x160.png" width="938" height="160"/>

<img src="../cesmagw/wp-content/themes/rt_panacea_wp/images/header/prueba-06-938x160.png" width="960" height="190" align="middle"/>
-->



<img src="http://www.iucesmag.edu.co/recursos/imagenes/banner-02.png" width="957" height="192" border="0" usemap="#Map"><br/>
<map name="Map">
<area shape="circle" coords="895,151,20" href="http://www.youtube.com/user/iucesmag2012?gl=CO" target="_blank" alt="youtube" />
<area shape="circle" coords="839,151,20" href="https://twitter.com/iucesmag" target="_blank" alt="twitter" />
<area shape="circle" coords="783,151,20" href="http://www.facebook.com/pages/Institución-Universitaria-Cesmag/448759031837402" target="_blank" alt="facebook" />
<area shape="circle" coords="727,151,20" href="http://mail.iucesmag.edu.co/" target="_blank" alt="Correo" />
<area shape="poly" coords="883,42,883,92,735,91,735,66,733,42" href="http://cendesoft.iucesmag.edu.co/beta/usuarios/login" target="_blank"/> 
</map></div>
		<div class="clear"></div></div></div></div></div></div><div class="flush"><div id="gantry_menu-3" class="widget widget_gantry_menu rt-block"><div class="rt-module-surround"><div class="rt-module-inner"><div class="module-content">		<div class="nopill">
		        <ul class="menutop level1 theme-fusion ">
	        		                
        <li class=" item2439 first-item root" >
            <a class="orphan item image" href="http://www.iucesmag.edu.co/" >
            <span>
                                           <img src="http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/images/icons/icon-home.png" alt="" />
                          Inicio                                      </span>
            </a>
	        	                </li>
        	        		                
        <li class=" item2440 parent root" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=2401" >
            <span>
                                       Institución                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level2">
				<div class="drop-top"></div>
	            <ul class="level2">
		            			                    
        <li class=" item2441" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2403" >
            <span>
                                       Misión y Visión                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2442" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2405" >
            <span>
                                       Rectoría                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2444 parent" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=2407" >
            <span>
                                       Vicerrectorías                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level3">
				<div class="drop-top"></div>
	            <ul class="level3">
		            			                    
        <li class=" item2445 parent" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=2409" >
            <span>
                                       Académica                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level4">
				<div class="drop-top"></div>
	            <ul class="level4">
		            			                    
        <li class=" item4540" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=4537" >
            <span>
                                       Documentos Pedagógicos                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        		            			                    
        <li class=" item2446" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2411" >
            <span>
                                       Administrativa-Financiera                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2447" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2413" >
            <span>
                                       Bienestar Universitario                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2703 parent" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=2697" >
            <span>
                                       Investigaciones                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level4">
				<div class="drop-top"></div>
	            <ul class="level4">
		            			                    
        <li class=" item3970" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=3967" >
            <span>
                                       Publicaciones                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        		            	            </ul>
	        </div>
	                </li>
        		            			                    
        <li class=" item2443" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2415" >
            <span>
                                       Reglamentos                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3929" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/recursos/organigrama-iucesmag.pdf" target="_blank" >
            <span>
                                       Organigrama                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        	        		                
        <li class=" item3490 parent root" >
            <a class="daddy item bullet" href="#" >
            <span>
                                       Comunidad                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level2">
				<div class="drop-top"></div>
	            <ul class="level2">
		            			                    
        <li class=" item3814" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=3812" >
            <span>
                                       Centro de Humanidades                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3505 parent" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=3503" >
            <span>
                                       Proyección Institucional                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level3">
				<div class="drop-top"></div>
	            <ul class="level3">
		            			                    
        <li class=" item2449" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2421" >
            <span>
                                       Egresados                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        		            			                    
        <li class=" item5764" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=5602" >
            <span>
                                       Trabajo Social                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        	        		                
        <li class=" item3489 parent root" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/" >
            <span>
                                       Programas                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level2">
				<div class="drop-top"></div>
	            <ul class="level2">
		            			                    
        <li class=" item2453 parent" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=2425" >
            <span>
                                       Pregrado                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level3">
				<div class="drop-top"></div>
	            <ul class="level3">
		            			                    
        <li class=" item3493" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2489" >
            <span>
                                       Administración de Empresas                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3491" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2470" >
            <span>
                                       Arquitectura                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3494" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2487" >
            <span>
                                       Contaduría Pública                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3497" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2479" >
            <span>
                                       Derecho                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3492" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2472" >
            <span>
                                       Diseño Gráfico                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3501" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2499" >
            <span>
                                       Ingeniería de Sistemas                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3502" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2501" >
            <span>
                                       Ingeniería Electrónica                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3499" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2495" >
            <span>
                                       Licenciatura en Educación Física                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3500" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2493" >
            <span>
                                       Licenciatura en Educación Preescolar                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3498" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2476" >
            <span>
                                       Psicología                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3495" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2485" >
            <span>
                                       Tec. Contabilidad y Finanzas                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3496" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2483" >
            <span>
                                       Tec. Gestión Financiera                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        		            			                    
        <li class=" item2557 parent" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/?page_id=2526" >
            <span>
                                       Postgrado                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level3">
				<div class="drop-top"></div>
	            <ul class="level3">
		            			                    
        <li class=" item2546" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2531" >
            <span>
                                       Maestría en Derecho Procesal                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item4223" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=4219" >
            <span>
                                       Maestría en Desarrollo Sostenible y Medio Ambiente                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2547" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2529" >
            <span>
                                       Maestría en Educación desde la Diversidad                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item5164" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=5009" >
            <span>
                                       Maestría en Tributación y Política Fiscal                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        		            	            </ul>
	        </div>
	                </li>
        	        		                
        <li class=" item3488 parent root" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/" >
            <span>
                                       servicios                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level2">
				<div class="drop-top"></div>
	            <ul class="level2">
		            			                    
        <li class=" item2460" >
            <a class="orphan item bullet" href="http://goretti.iucesmag.edu.co/fortezza/" target="_blank" >
            <span>
                                       Biblioteca                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item5143" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=5119" >
            <span>
                                       Becas y Subsidios                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2456" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2433" >
            <span>
                                       Crédito Educativo                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item4648" >
            <a class="orphan item bullet" href="http://cendesoft.iucesmag.edu.co/beta/" target="_blank" >
            <span>
                                       Incripciones en Línea                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3677" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=3675" >
            <span>
                                       Simulador de crédito                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item2459" >
            <a class="orphan item bullet" href="http://cendesoft.iucesmag.edu.co/cendesoft/zeus/evaluacion/index.php" target="_blank" >
            <span>
                                       Sistema de Evaluaciones                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        	        		                
        <li class=" item3969 root" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=3967" >
            <span>
                                       Publicaciones                                      </span>
            </a>
	        	                </li>
        	        		                
        <li class=" item2458 root" >
            <a class="orphan item bullet" href="http://www.iucesmag.edu.co/?page_id=2437" >
            <span>
                                       Convocatorias 2013                                      </span>
            </a>
	        	                </li>
        	        		                
        <li class=" item3487 parent root" >
            <a class="daddy item bullet" href="http://www.iucesmag.edu.co/" >
            <span>
                                       Contáctenos                                      </span>
            </a>
	        	                	<div class="fusion-submenu-wrapper level2">
				<div class="drop-top"></div>
	            <ul class="level2">
		            			                    
        <li class=" item3208" >
            <a class="orphan item image" href="http://mail.iucesmag.edu.co/" target="_blank" >
            <span>
                                           <img src="http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/images/icons/icon-email.png" alt="" />
                          Correo Institucional                                      </span>
            </a>
	        	                </li>
        		            			                    
        <li class=" item3484" >
            <a class="orphan item image" href="http://www.iucesmag.edu.co/?page_id=3482" >
            <span>
                                           <img src="http://www.iucesmag.edu.co/wp-content/themes/rt_panacea_wp/images/icons/icon-email.png" alt="" />
                          Correos Institucionales                                      </span>
            </a>
	        	                </li>
        		            	            </ul>
	        </div>
	                </li>
        	                </ul>
        		</div>
		<div class="clear"></div></div></div></div></div></div></div>							<div class="clear"></div>
											</div></div>
														</div>
										</div></div></div></div>
		</div>
				<div class="header-wrapped">
			<div id="rt-body-surround" class="body-overlay-light">
				<div class="rt-container">
                
					<div id="rt-body-bg" class="header-wrapped footer-wrapped"><div id="rt-body-bg2">  
					
<div style="height:50%;width:100%;overflow:scroll;">

<!-- Contenido Jose -->
<div id="miContenido">
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Egresados</title>
	<link rel="stylesheet" type="text/css" href="css/cesmag/jquery-ui.css">
	<link rel="stylesheet" href="css/ui.jqgrid.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-te.css">
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/jquery.ui.datepicker-es.js"></script>
	<script type="text/javascript" src="scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="scripts/jquery-te.js"></script>
	<script type="text/javascript" src="scripts/grillaAdmin.js"></script>
	<script type="text/javascript" src="scripts/laboral.js"></script>
	<script type="text/javascript" src="scripts/grid.locale-es.js"></script>
	<script type="text/javascript" src="scripts/jquery.jqGrid.js"></script>
	<script type="text/javascript" src="scripts/admin.js"></script>

	<script src="js/jquery.iframe-transport.js"></script>
	<script src="js/jquery.fileupload.js"></script>
	<script type="text/javascript">
		$(document).ready(inicio);
	</script>
</head>
<body>
	<div id="mensaje"></div>
	<div id="ver">
		<textarea id="taVer" cols="30" rows="10"></textarea>
	</div>
	<div id="correo">
		<input type="text" id="asunto" placeholder="Asunto">
		<div id="lCorreo" ></div>
		<input id="fileupload" type="file" name="files[]" data-url="server/php/">
		<div id="progress">
		    <div class="bar" style="width: 0%;"></div>
		</div>
		<textarea id="contenido" cols="30" rows="10"></textarea>
		<input type="button" id="btECorreo" value="Enviar">
	</div>
	<div class="divWithTable">
		<span class="titulos">Egresados</span>
		<span class="titulo-inv">
			<span id="usuario">
				<input type="text" value='<?php echo $_SESSION["user"] ?>'>
				<input type="button" id="saveName" value="Guardar" style="display: none;"/>
			</span>
			<a id="cPass">Cambiar contraseña</a>
			<a href="pdf/admin.pdf" name="principal" target="_blank">Ayuda</a>
			<a id="close">Cerrar sesion</a>
		</span>
		<table id="list27"></table>
        <div id="pager27" ></div>
	</div>
	<div id="cPassD">
		<form action="">
			<label for="passA">Contraseña Antigua</label>
			<input type="password" id="passA">
			<label for="passN">Contraseña Nueva</label>
			<input type="password" id="passN">
			<label for="passC">Confirme contraseña</label>
			<input type="password" id="passC">
			<input type="button" id="btCpass" value="cambiar">
		</form>
	</div>
</body>
</html>
</div> 
<!-- Fin contenido Jose -->
	

					
					
					
					<div id="rt-body-bg3"><div id="rt-body-bg4">
																																				<div id="rt-breadcrumbs"><div class="clear">
                            
                            
                            <div id="gantry_breakcrumbs-20002" class="widget widget_gantry_breadcrumbs rt-breadcrumb-surround">Oficina de Proyeccion Institucional</div>							<div class="clear">
                            
                            
                            
                            
                            </div>
						</div>
																							            <div id="rt-main" class="mb9-sa3">
        	<div class="rt-main-inner">
                <div class="rt-grid-9 "></div><div class="clear"></div>
            </div>
        </div>
        																							</div></div></div></div>
				</div>
			</div>
		</div>
				<div class="rt-container">
			<div class="rt-wrapped"><div class="rt-wrapped2"><div class="rt-wrapped3"><div class="rt-wrapped4">
							<div id="rt-footer-surround" class="footer-overlay-dark"><div id="rt-footer-surround2">
								<div id="rt-footer">
											            <div class="rt-grid-6 rt-alpha">
            <div id="text-5" class="widget widget_text rt-block"><div class="module-title-surround"><div class="module-title"><h2 class="title">Enlaces de Interés</h2></div></div><div class="rt-module-surround"><div class="rt-module-inner"><div class="module-content">			<div class="textwidget"><ul class="bullet-2">
<li><a href="http://www.renata.edu.co/index.php" target="_blank">RENATA</a></li>
<li><a href="http://www.icetex.gov.co/" target="_blank">Icetex</a></li>
<li><a href="http://twitter.com/iucesmag" target="_blank">Twitter</a></li>
<li><a href="http://www.multilegis.com/colombia/iucesmag" target="_blank">LEGIS</a></li>
</ul>
<div class="clear"></div></div>
		<div class="clear"></div></div></div></div></div></div>            <div class="rt-grid-6 rt-omega">
            <div class="borderleft"><div id="text-6" class="widget widget_text rt-block"><div class="rt-module-surround"><div class="rt-module-inner"><div class="module-content">			<div class="textwidget"><!--<img src="../cesmagw/wp-content/themes/rt_panacea_wp/images/footer/light/escudo-pie.png"/>-->

<p align="justify"><br><br><br><br><br><br><br><br><br>
</p>
<div class="clear"></div>
						</div>
		<div class="clear"></div></div></div></div></div></div></div>						<div class="clear"></div>
									</div>
											</div></div>
					</div></div></div></div>
		</div>
										




	</body>

<!-- Mirrored from www.iucesmag.edu.co/?page_id=2468 by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 13 Jun 2013 00:40:22 GMT -->
</html>
