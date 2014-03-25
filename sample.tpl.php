<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
<title>Sample QForm</title>
<link href="assets/css/bootstrap.css" rel="stylesheet">
 <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
</head><body>
	<?php $this->RenderBegin(); ?>
	<div class="navbar navbar-fixed-top">
		<div class="container">
			<div class="hero-unit">
			<p><?php $this->lblMessage->Render(); ?></p>
			<p><?php $this->btnButton->Render(); ?></p>
		</div>
		</div>

	</div>
	<?php $this->RenderEnd(); ?>
	
</body></html>