<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the GaimsBooks class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of GaimsBooks objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this GaimsBooksListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 *
	 */
	class GaimsBooksListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list GaimsBookses
		/**
		 * @var GaimsBooksDataGrid
		 */
		public $dtgGaimsBookses;

		// Other public QControls in this panel
		/**
		 * @var QButton CreateNew
		 */
		public $btnCreateNew;
		/**
		 * @var QControlProxy ProxyEdit
		 */
		public $pxyEdit;

		// Callback Method Names
		/**
		 * @var string SetEditPanelMethod
		 */
		protected $strSetEditPanelMethod;
		/**
		 * @var string CloseEditPanelMethod
		 */
		protected $strCloseEditPanelMethod;

		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/GaimsBooksListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgGaimsBookses = new GaimsBooksDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgGaimsBookses->CssClass = 'datagrid';
			$this->dtgGaimsBookses->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgGaimsBookses->Paginator = new QPaginator($this->dtgGaimsBookses);
			$this->dtgGaimsBookses->ItemsPerPage = __FORM_DRAFTS_PANEL_LIST_ITEMS_PER_PAGE__;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgGaimsBookses->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for GAIMS_BOOKS's properties, or you
			// can traverse down QQN::GAIMS_BOOKS() to display fields that are down the hierarchy)
			$this->dtgGaimsBookses->MetaAddColumn('AccNo');
			$this->dtgGaimsBookses->MetaAddColumn('ClassNo');
			$this->dtgGaimsBookses->MetaAddColumn('Title');
			$this->dtgGaimsBookses->MetaAddColumn('Vol');
			$this->dtgGaimsBookses->MetaAddColumn('Edtion');
			$this->dtgGaimsBookses->MetaAddColumn('Author');
			$this->dtgGaimsBookses->MetaAddColumn('Pub');
			$this->dtgGaimsBookses->MetaAddColumn('Year');
			$this->dtgGaimsBookses->MetaAddColumn('Pages');
			$this->dtgGaimsBookses->MetaAddColumn('Price');
			$this->dtgGaimsBookses->MetaAddColumn('RcptDT');
			$this->dtgGaimsBookses->MetaAddColumn('PONo');
			$this->dtgGaimsBookses->MetaAddColumn('BillDate');
			$this->dtgGaimsBookses->MetaAddColumn('NameOfVendor');
			$this->dtgGaimsBookses->MetaAddColumn('Remarks');
			$this->dtgGaimsBookses->MetaAddColumn('Sub');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('GaimsBooks');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new GaimsBooksEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new GaimsBooksEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>