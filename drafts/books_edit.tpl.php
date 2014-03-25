<?php
	// This is the HTML template include file (.tpl.php) for the books_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Books') . ' - ' . $this->mctBooks->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctBooks->TitleVerb); ?></h2>
		<h1><?php _t('Books')?></h1>
	</div>

	<div id="formControls">
		<?php $this->txtIsbn->RenderWithName(); ?>

		<?php $this->txtBookTitle->RenderWithName(); ?>

		<?php $this->txtBookAuthor->RenderWithName(); ?>

		<?php $this->txtYearOfPublication->RenderWithName(); ?>

		<?php $this->txtPublisher->RenderWithName(); ?>

		<?php $this->txtImageURLS->RenderWithName(); ?>

		<?php $this->txtImageURLM->RenderWithName(); ?>

		<?php $this->txtImageURLL->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>