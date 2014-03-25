<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the GaimsBooks class.  It uses the code-generated
	 * GaimsBooksMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a GaimsBooks columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 *
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both gaims_books_edit.php AND
	 * gaims_books_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class GaimsBooksEditPanel extends QPanel {
		// Local instance of the GaimsBooksMetaControl
		/**
		 * @var GaimsBooksMetaControl
		 */
		protected $mctGaimsBooks;

		// Controls for GaimsBooks's Data Fields
		public $txtAccNo;
		public $txtClassNo;
		public $txtTitle;
		public $txtVol;
		public $txtEdtion;
		public $txtAuthor;
		public $txtPub;
		public $txtYear;
		public $txtPages;
		public $txtPrice;
		public $txtRcptDT;
		public $txtPONo;
		public $txtBillDate;
		public $txtNameOfVendor;
		public $txtRemarks;
		public $txtSub;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intAccNo = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/GaimsBooksEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the GaimsBooksMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctGaimsBooks = GaimsBooksMetaControl::Create($this, $intAccNo);

			// Call MetaControl's methods to create qcontrols based on GaimsBooks's data fields
			$this->txtAccNo = $this->mctGaimsBooks->txtAccNo_Create();
			$this->txtClassNo = $this->mctGaimsBooks->txtClassNo_Create();
			$this->txtTitle = $this->mctGaimsBooks->txtTitle_Create();
			$this->txtVol = $this->mctGaimsBooks->txtVol_Create();
			$this->txtEdtion = $this->mctGaimsBooks->txtEdtion_Create();
			$this->txtAuthor = $this->mctGaimsBooks->txtAuthor_Create();
			$this->txtPub = $this->mctGaimsBooks->txtPub_Create();
			$this->txtYear = $this->mctGaimsBooks->txtYear_Create();
			$this->txtPages = $this->mctGaimsBooks->txtPages_Create();
			$this->txtPrice = $this->mctGaimsBooks->txtPrice_Create();
			$this->txtRcptDT = $this->mctGaimsBooks->txtRcptDT_Create();
			$this->txtPONo = $this->mctGaimsBooks->txtPONo_Create();
			$this->txtBillDate = $this->mctGaimsBooks->txtBillDate_Create();
			$this->txtNameOfVendor = $this->mctGaimsBooks->txtNameOfVendor_Create();
			$this->txtRemarks = $this->mctGaimsBooks->txtRemarks_Create();
			$this->txtSub = $this->mctGaimsBooks->txtSub_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('GaimsBooks'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctGaimsBooks->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the GaimsBooksMetaControl
			$this->mctGaimsBooks->SaveGaimsBooks();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the GaimsBooksMetaControl
			$this->mctGaimsBooks->DeleteGaimsBooks();
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