<?php
	// This is the HTML template include file (.tpl.php) for gaims_booksEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->txtAccNo->RenderWithName(); ?>

		<?php $_CONTROL->txtClassNo->RenderWithName(); ?>

		<?php $_CONTROL->txtTitle->RenderWithName(); ?>

		<?php $_CONTROL->txtVol->RenderWithName(); ?>

		<?php $_CONTROL->txtEdtion->RenderWithName(); ?>

		<?php $_CONTROL->txtAuthor->RenderWithName(); ?>

		<?php $_CONTROL->txtPub->RenderWithName(); ?>

		<?php $_CONTROL->txtYear->RenderWithName(); ?>

		<?php $_CONTROL->txtPages->RenderWithName(); ?>

		<?php $_CONTROL->txtPrice->RenderWithName(); ?>

		<?php $_CONTROL->txtRcptDT->RenderWithName(); ?>

		<?php $_CONTROL->txtPONo->RenderWithName(); ?>

		<?php $_CONTROL->txtBillDate->RenderWithName(); ?>

		<?php $_CONTROL->txtNameOfVendor->RenderWithName(); ?>

		<?php $_CONTROL->txtRemarks->RenderWithName(); ?>

		<?php $_CONTROL->txtSub->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
