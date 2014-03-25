<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Books class.  It uses the code-generated
	 * BooksMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Books columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both books_edit.php AND
	 * books_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class BooksEditPanel extends QPanel {
		// Local instance of the BooksMetaControl
		/**
		 * @var BooksMetaControl
		 */
		protected $mctBooks;

		// Controls for Books's Data Fields
		public $txtIsbn;
		public $txtBookTitle;
		public $txtBookAuthor;
		public $txtYearOfPublication;
		public $txtPublisher;
		public $txtImageURLS;
		public $txtImageURLM;
		public $txtImageURLL;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		/**
		 * @var QButton Save
		 */
		public $btnSave;
		/**
		 * @var QButton Delete
		 */
		public $btnDelete;
		/**
		 * @var QButton Cancel
		 */
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $strIsbn = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/BooksEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the BooksMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctBooks = BooksMetaControl::Create($this, $strIsbn);

			// Call MetaControl's methods to create qcontrols based on Books's data fields
			$this->txtIsbn = $this->mctBooks->txtIsbn_Create();
			$this->txtBookTitle = $this->mctBooks->txtBookTitle_Create();
			$this->txtBookAuthor = $this->mctBooks->txtBookAuthor_Create();
			$this->txtYearOfPublication = $this->mctBooks->txtYearOfPublication_Create();
			$this->txtPublisher = $this->mctBooks->txtPublisher_Create();
			$this->txtImageURLS = $this->mctBooks->txtImageURLS_Create();
			$this->txtImageURLM = $this->mctBooks->txtImageURLM_Create();
			$this->txtImageURLL = $this->mctBooks->txtImageURLL_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Books'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctBooks->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the BooksMetaControl
			$this->mctBooks->SaveBooks();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the BooksMetaControl
			$this->mctBooks->DeleteBooks();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}

		
	}
?>