<?php
	// This is the HTML template include file (.tpl.php) for the gaims_books_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('GaimsBooks') . ' - ' . $this->mctGaimsBooks->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctGaimsBooks->TitleVerb); ?></h2>
		<h1><?php _t('GaimsBooks')?></h1>
	</div>

	<div id="formControls">
		<?php $this->txtAccNo->RenderWithName(); ?>

		<?php $this->txtClassNo->RenderWithName(); ?>

		<?php $this->txtTitle->RenderWithName(); ?>

		<?php $this->txtVol->RenderWithName(); ?>

		<?php $this->txtEdtion->RenderWithName(); ?>

		<?php $this->txtAuthor->RenderWithName(); ?>

		<?php $this->txtPub->RenderWithName(); ?>

		<?php $this->txtYear->RenderWithName(); ?>

		<?php $this->txtPages->RenderWithName(); ?>

		<?php $this->txtPrice->RenderWithName(); ?>

		<?php $this->txtRcptDT->RenderWithName(); ?>

		<?php $this->txtPONo->RenderWithName(); ?>

		<?php $this->txtBillDate->RenderWithName(); ?>

		<?php $this->txtNameOfVendor->RenderWithName(); ?>

		<?php $this->txtRemarks->RenderWithName(); ?>

		<?php $this->txtSub->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>