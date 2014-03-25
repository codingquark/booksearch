<?php
	// This is the HTML template include file (.tpl.php) for booksEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->txtIsbn->RenderWithName(); ?>

		<?php $_CONTROL->txtBookTitle->RenderWithName(); ?>

		<?php $_CONTROL->txtBookAuthor->RenderWithName(); ?>

		<?php $_CONTROL->txtYearOfPublication->RenderWithName(); ?>

		<?php $_CONTROL->txtPublisher->RenderWithName(); ?>

		<?php $_CONTROL->txtImageURLS->RenderWithName(); ?>

		<?php $_CONTROL->txtImageURLM->RenderWithName(); ?>

		<?php $_CONTROL->txtImageURLL->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
