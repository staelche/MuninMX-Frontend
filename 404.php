<?php
include("inc/startup.php");
if(!isLoggedIn())
{
	header("Location: login.php");
	die;
}
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
	<?php $tpl->title = APP_NAME . " - Page not Found"; include("templates/core/head.tpl.php"); ?>
	</head>
	<body class="">

		<!-- HEADER -->
		<header id="header">
		<?php include("templates/core/header.tpl.php"); ?>
		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<?php include("templates/nav/left.tpl.php"); ?>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
			   <!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				<!-- end breadcrumb -->
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Errors <span>> 404 Page Not Found</span></h1>
					</div>
				</div>

				<!-- row -->
				<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-sm-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-x" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					
								<header>
									<span class="widget-icon"> <i class="fa fa-align-justify"></i> </span>
									<h2>Page not Found </h2>
								</header>
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">
										<?php display_error("ERROR 404"," The requested page could not be found",false)?>
									</div>
								</div>
							</div>
						</article>
				</div>
				<!-- end row -->


			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->


		<!--================================================== -->
		<?php include("templates/core/scripts.tpl.php"); ?>
	</body>

</html>