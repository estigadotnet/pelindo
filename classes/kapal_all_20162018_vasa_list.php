<?php
namespace PHPMaker2019\project1;

/**
 * Page class
 */
class kapal_all_20162018_vasa_list extends kapal_all_20162018_vasa
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{C44F9D66-099F-4CF9-9DCC-1FF3E612E32E}";

	// Table name
	public $TableName = 'kapal_all_20162018_vasa';

	// Page object name
	public $PageObjName = "kapal_all_20162018_vasa_list";

	// Grid form hidden field names
	public $FormName = "fkapal_all_20162018_vasalist";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;
	public $CancelUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (kapal_all_20162018_vasa)
		if (!isset($GLOBALS["kapal_all_20162018_vasa"]) || get_class($GLOBALS["kapal_all_20162018_vasa"]) == PROJECT_NAMESPACE . "kapal_all_20162018_vasa") {
			$GLOBALS["kapal_all_20162018_vasa"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["kapal_all_20162018_vasa"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->AddUrl = "kapal_all_20162018_vasaadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "kapal_all_20162018_vasadelete.php";
		$this->MultiUpdateUrl = "kapal_all_20162018_vasaupdate.php";
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'kapal_all_20162018_vasa');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions();
		$this->ImportOptions->Tag = "div";
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions();
		$this->OtherOptions["addedit"]->Tag = "div";
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions();
		$this->OtherOptions["detail"]->Tag = "div";
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions();
		$this->OtherOptions["action"]->Tag = "div";
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option fkapal_all_20162018_vasalistsrch";

		// List actions
		$this->ListActions = new ListActions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $kapal_all_20162018_vasa;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($kapal_all_20162018_vasa);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			AddHeader("Location", $url);
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
	}

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecs = 20;
	public $StartRec;
	public $StopRec;
	public $TotalRecs = 0;
	public $RecRange = 10;
	public $Pager;
	public $AutoHidePager = AUTO_HIDE_PAGER;
	public $AutoHidePageSizeSelector = AUTO_HIDE_PAGE_SIZE_SELECTOR;
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $RecCnt = 0; // Record count
	public $EditRowCnt;
	public $StartRowCnt = 1;
	public $RowCnt = 0;
	public $Attrs = array(); // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SearchError, $EXPORT;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(TABLE_GRID_ADD_ROW_COUNT, "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();
		$this->MA_PELB->setVisibility();
		$this->NO_PPK1->setVisibility();
		$this->PERIODE->setVisibility();
		$this->NAMA_KAPAL->setVisibility();
		$this->MKPL_JENIS->setVisibility();
		$this->GT_KAPAL->setVisibility();
		$this->LOA->setVisibility();
		$this->JASA->setVisibility();
		$this->JENIS_GERAKAN->setVisibility();
		$this->BENDERA->setVisibility();
		$this->TGL_MULAI_REA->setVisibility();
		$this->TGL_SELESAI_REA->setVisibility();
		$this->LOKASI_AWAL->setVisibility();
		$this->LOKASI_AKHIR->setVisibility();
		$this->hideFieldsForAddEdit();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions->Items["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		$this->setupLookupOptions($this->MA_PELB);
		$this->setupLookupOptions($this->PERIODE);
		$this->setupLookupOptions($this->NAMA_KAPAL);
		$this->setupLookupOptions($this->JASA);

		// Search filters
		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command <> "search" && $this->Command <> "reset" && $this->Command <> "resetall") && $this->Command <> "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
		}

		// Restore display records
		if ($this->Command <> "json" && $this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		if ($this->Command <> "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->Command <> "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);
		if ($filter == "") {
			$filter = "0=101";
			$this->SearchWhere = $filter;
		}

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRec = 1;
			$this->DisplayRecs = $this->GridAddRowCount;
			$this->TotalRecs = $this->DisplayRecs;
			$this->StopRec = $this->DisplayRecs;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecs = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
			$this->StartRec = 1;
			if ($this->DisplayRecs <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecs = $this->TotalRecs;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRec();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRec - 1, $this->DisplayRecs);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecs == 0) {
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecs]);
			$this->terminate(TRUE);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey <> "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter <> "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode($GLOBALS["COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arKeyFlds) >= 0) {
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->MA_PELB->AdvancedSearch->toJson(), ","); // Field MA_PELB
		$filterList = Concat($filterList, $this->NO_PPK1->AdvancedSearch->toJson(), ","); // Field NO_PPK1
		$filterList = Concat($filterList, $this->PERIODE->AdvancedSearch->toJson(), ","); // Field PERIODE
		$filterList = Concat($filterList, $this->NAMA_KAPAL->AdvancedSearch->toJson(), ","); // Field NAMA_KAPAL
		$filterList = Concat($filterList, $this->MKPL_JENIS->AdvancedSearch->toJson(), ","); // Field MKPL_JENIS
		$filterList = Concat($filterList, $this->GT_KAPAL->AdvancedSearch->toJson(), ","); // Field GT_KAPAL
		$filterList = Concat($filterList, $this->LOA->AdvancedSearch->toJson(), ","); // Field LOA
		$filterList = Concat($filterList, $this->JASA->AdvancedSearch->toJson(), ","); // Field JASA
		$filterList = Concat($filterList, $this->JENIS_GERAKAN->AdvancedSearch->toJson(), ","); // Field JENIS_GERAKAN
		$filterList = Concat($filterList, $this->BENDERA->AdvancedSearch->toJson(), ","); // Field BENDERA
		$filterList = Concat($filterList, $this->TGL_MULAI_REA->AdvancedSearch->toJson(), ","); // Field TGL_MULAI_REA
		$filterList = Concat($filterList, $this->TGL_SELESAI_REA->AdvancedSearch->toJson(), ","); // Field TGL_SELESAI_REA
		$filterList = Concat($filterList, $this->LOKASI_AWAL->AdvancedSearch->toJson(), ","); // Field LOKASI_AWAL
		$filterList = Concat($filterList, $this->LOKASI_AKHIR->AdvancedSearch->toJson(), ","); // Field LOKASI_AKHIR

		// Return filter list in JSON
		if ($filterList <> "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList <> "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList <> "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fkapal_all_20162018_vasalistsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field MA_PELB
		$this->MA_PELB->AdvancedSearch->SearchValue = @$filter["x_MA_PELB"];
		$this->MA_PELB->AdvancedSearch->SearchOperator = @$filter["z_MA_PELB"];
		$this->MA_PELB->AdvancedSearch->SearchCondition = @$filter["v_MA_PELB"];
		$this->MA_PELB->AdvancedSearch->SearchValue2 = @$filter["y_MA_PELB"];
		$this->MA_PELB->AdvancedSearch->SearchOperator2 = @$filter["w_MA_PELB"];
		$this->MA_PELB->AdvancedSearch->save();

		// Field NO_PPK1
		$this->NO_PPK1->AdvancedSearch->SearchValue = @$filter["x_NO_PPK1"];
		$this->NO_PPK1->AdvancedSearch->SearchOperator = @$filter["z_NO_PPK1"];
		$this->NO_PPK1->AdvancedSearch->SearchCondition = @$filter["v_NO_PPK1"];
		$this->NO_PPK1->AdvancedSearch->SearchValue2 = @$filter["y_NO_PPK1"];
		$this->NO_PPK1->AdvancedSearch->SearchOperator2 = @$filter["w_NO_PPK1"];
		$this->NO_PPK1->AdvancedSearch->save();

		// Field PERIODE
		$this->PERIODE->AdvancedSearch->SearchValue = @$filter["x_PERIODE"];
		$this->PERIODE->AdvancedSearch->SearchOperator = @$filter["z_PERIODE"];
		$this->PERIODE->AdvancedSearch->SearchCondition = @$filter["v_PERIODE"];
		$this->PERIODE->AdvancedSearch->SearchValue2 = @$filter["y_PERIODE"];
		$this->PERIODE->AdvancedSearch->SearchOperator2 = @$filter["w_PERIODE"];
		$this->PERIODE->AdvancedSearch->save();

		// Field NAMA_KAPAL
		$this->NAMA_KAPAL->AdvancedSearch->SearchValue = @$filter["x_NAMA_KAPAL"];
		$this->NAMA_KAPAL->AdvancedSearch->SearchOperator = @$filter["z_NAMA_KAPAL"];
		$this->NAMA_KAPAL->AdvancedSearch->SearchCondition = @$filter["v_NAMA_KAPAL"];
		$this->NAMA_KAPAL->AdvancedSearch->SearchValue2 = @$filter["y_NAMA_KAPAL"];
		$this->NAMA_KAPAL->AdvancedSearch->SearchOperator2 = @$filter["w_NAMA_KAPAL"];
		$this->NAMA_KAPAL->AdvancedSearch->save();

		// Field MKPL_JENIS
		$this->MKPL_JENIS->AdvancedSearch->SearchValue = @$filter["x_MKPL_JENIS"];
		$this->MKPL_JENIS->AdvancedSearch->SearchOperator = @$filter["z_MKPL_JENIS"];
		$this->MKPL_JENIS->AdvancedSearch->SearchCondition = @$filter["v_MKPL_JENIS"];
		$this->MKPL_JENIS->AdvancedSearch->SearchValue2 = @$filter["y_MKPL_JENIS"];
		$this->MKPL_JENIS->AdvancedSearch->SearchOperator2 = @$filter["w_MKPL_JENIS"];
		$this->MKPL_JENIS->AdvancedSearch->save();

		// Field GT_KAPAL
		$this->GT_KAPAL->AdvancedSearch->SearchValue = @$filter["x_GT_KAPAL"];
		$this->GT_KAPAL->AdvancedSearch->SearchOperator = @$filter["z_GT_KAPAL"];
		$this->GT_KAPAL->AdvancedSearch->SearchCondition = @$filter["v_GT_KAPAL"];
		$this->GT_KAPAL->AdvancedSearch->SearchValue2 = @$filter["y_GT_KAPAL"];
		$this->GT_KAPAL->AdvancedSearch->SearchOperator2 = @$filter["w_GT_KAPAL"];
		$this->GT_KAPAL->AdvancedSearch->save();

		// Field LOA
		$this->LOA->AdvancedSearch->SearchValue = @$filter["x_LOA"];
		$this->LOA->AdvancedSearch->SearchOperator = @$filter["z_LOA"];
		$this->LOA->AdvancedSearch->SearchCondition = @$filter["v_LOA"];
		$this->LOA->AdvancedSearch->SearchValue2 = @$filter["y_LOA"];
		$this->LOA->AdvancedSearch->SearchOperator2 = @$filter["w_LOA"];
		$this->LOA->AdvancedSearch->save();

		// Field JASA
		$this->JASA->AdvancedSearch->SearchValue = @$filter["x_JASA"];
		$this->JASA->AdvancedSearch->SearchOperator = @$filter["z_JASA"];
		$this->JASA->AdvancedSearch->SearchCondition = @$filter["v_JASA"];
		$this->JASA->AdvancedSearch->SearchValue2 = @$filter["y_JASA"];
		$this->JASA->AdvancedSearch->SearchOperator2 = @$filter["w_JASA"];
		$this->JASA->AdvancedSearch->save();

		// Field JENIS_GERAKAN
		$this->JENIS_GERAKAN->AdvancedSearch->SearchValue = @$filter["x_JENIS_GERAKAN"];
		$this->JENIS_GERAKAN->AdvancedSearch->SearchOperator = @$filter["z_JENIS_GERAKAN"];
		$this->JENIS_GERAKAN->AdvancedSearch->SearchCondition = @$filter["v_JENIS_GERAKAN"];
		$this->JENIS_GERAKAN->AdvancedSearch->SearchValue2 = @$filter["y_JENIS_GERAKAN"];
		$this->JENIS_GERAKAN->AdvancedSearch->SearchOperator2 = @$filter["w_JENIS_GERAKAN"];
		$this->JENIS_GERAKAN->AdvancedSearch->save();

		// Field BENDERA
		$this->BENDERA->AdvancedSearch->SearchValue = @$filter["x_BENDERA"];
		$this->BENDERA->AdvancedSearch->SearchOperator = @$filter["z_BENDERA"];
		$this->BENDERA->AdvancedSearch->SearchCondition = @$filter["v_BENDERA"];
		$this->BENDERA->AdvancedSearch->SearchValue2 = @$filter["y_BENDERA"];
		$this->BENDERA->AdvancedSearch->SearchOperator2 = @$filter["w_BENDERA"];
		$this->BENDERA->AdvancedSearch->save();

		// Field TGL_MULAI_REA
		$this->TGL_MULAI_REA->AdvancedSearch->SearchValue = @$filter["x_TGL_MULAI_REA"];
		$this->TGL_MULAI_REA->AdvancedSearch->SearchOperator = @$filter["z_TGL_MULAI_REA"];
		$this->TGL_MULAI_REA->AdvancedSearch->SearchCondition = @$filter["v_TGL_MULAI_REA"];
		$this->TGL_MULAI_REA->AdvancedSearch->SearchValue2 = @$filter["y_TGL_MULAI_REA"];
		$this->TGL_MULAI_REA->AdvancedSearch->SearchOperator2 = @$filter["w_TGL_MULAI_REA"];
		$this->TGL_MULAI_REA->AdvancedSearch->save();

		// Field TGL_SELESAI_REA
		$this->TGL_SELESAI_REA->AdvancedSearch->SearchValue = @$filter["x_TGL_SELESAI_REA"];
		$this->TGL_SELESAI_REA->AdvancedSearch->SearchOperator = @$filter["z_TGL_SELESAI_REA"];
		$this->TGL_SELESAI_REA->AdvancedSearch->SearchCondition = @$filter["v_TGL_SELESAI_REA"];
		$this->TGL_SELESAI_REA->AdvancedSearch->SearchValue2 = @$filter["y_TGL_SELESAI_REA"];
		$this->TGL_SELESAI_REA->AdvancedSearch->SearchOperator2 = @$filter["w_TGL_SELESAI_REA"];
		$this->TGL_SELESAI_REA->AdvancedSearch->save();

		// Field LOKASI_AWAL
		$this->LOKASI_AWAL->AdvancedSearch->SearchValue = @$filter["x_LOKASI_AWAL"];
		$this->LOKASI_AWAL->AdvancedSearch->SearchOperator = @$filter["z_LOKASI_AWAL"];
		$this->LOKASI_AWAL->AdvancedSearch->SearchCondition = @$filter["v_LOKASI_AWAL"];
		$this->LOKASI_AWAL->AdvancedSearch->SearchValue2 = @$filter["y_LOKASI_AWAL"];
		$this->LOKASI_AWAL->AdvancedSearch->SearchOperator2 = @$filter["w_LOKASI_AWAL"];
		$this->LOKASI_AWAL->AdvancedSearch->save();

		// Field LOKASI_AKHIR
		$this->LOKASI_AKHIR->AdvancedSearch->SearchValue = @$filter["x_LOKASI_AKHIR"];
		$this->LOKASI_AKHIR->AdvancedSearch->SearchOperator = @$filter["z_LOKASI_AKHIR"];
		$this->LOKASI_AKHIR->AdvancedSearch->SearchCondition = @$filter["v_LOKASI_AKHIR"];
		$this->LOKASI_AKHIR->AdvancedSearch->SearchValue2 = @$filter["y_LOKASI_AKHIR"];
		$this->LOKASI_AKHIR->AdvancedSearch->SearchOperator2 = @$filter["w_LOKASI_AKHIR"];
		$this->LOKASI_AKHIR->AdvancedSearch->save();
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		$this->buildSearchSql($where, $this->MA_PELB, $default, FALSE); // MA_PELB
		$this->buildSearchSql($where, $this->NO_PPK1, $default, FALSE); // NO_PPK1
		$this->buildSearchSql($where, $this->PERIODE, $default, FALSE); // PERIODE
		$this->buildSearchSql($where, $this->NAMA_KAPAL, $default, FALSE); // NAMA_KAPAL
		$this->buildSearchSql($where, $this->MKPL_JENIS, $default, FALSE); // MKPL_JENIS
		$this->buildSearchSql($where, $this->GT_KAPAL, $default, FALSE); // GT_KAPAL
		$this->buildSearchSql($where, $this->LOA, $default, FALSE); // LOA
		$this->buildSearchSql($where, $this->JASA, $default, FALSE); // JASA
		$this->buildSearchSql($where, $this->JENIS_GERAKAN, $default, FALSE); // JENIS_GERAKAN
		$this->buildSearchSql($where, $this->BENDERA, $default, FALSE); // BENDERA
		$this->buildSearchSql($where, $this->TGL_MULAI_REA, $default, FALSE); // TGL_MULAI_REA
		$this->buildSearchSql($where, $this->TGL_SELESAI_REA, $default, FALSE); // TGL_SELESAI_REA
		$this->buildSearchSql($where, $this->LOKASI_AWAL, $default, FALSE); // LOKASI_AWAL
		$this->buildSearchSql($where, $this->LOKASI_AKHIR, $default, FALSE); // LOKASI_AKHIR

		// Set up search parm
		if (!$default && $where <> "" && in_array($this->Command, array("", "reset", "resetall"))) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->MA_PELB->AdvancedSearch->save(); // MA_PELB
			$this->NO_PPK1->AdvancedSearch->save(); // NO_PPK1
			$this->PERIODE->AdvancedSearch->save(); // PERIODE
			$this->NAMA_KAPAL->AdvancedSearch->save(); // NAMA_KAPAL
			$this->MKPL_JENIS->AdvancedSearch->save(); // MKPL_JENIS
			$this->GT_KAPAL->AdvancedSearch->save(); // GT_KAPAL
			$this->LOA->AdvancedSearch->save(); // LOA
			$this->JASA->AdvancedSearch->save(); // JASA
			$this->JENIS_GERAKAN->AdvancedSearch->save(); // JENIS_GERAKAN
			$this->BENDERA->AdvancedSearch->save(); // BENDERA
			$this->TGL_MULAI_REA->AdvancedSearch->save(); // TGL_MULAI_REA
			$this->TGL_SELESAI_REA->AdvancedSearch->save(); // TGL_SELESAI_REA
			$this->LOKASI_AWAL->AdvancedSearch->save(); // LOKASI_AWAL
			$this->LOKASI_AKHIR->AdvancedSearch->save(); // LOKASI_AKHIR
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(",", $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(",", $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (SEARCH_MULTI_VALUE_OPTION == 1)
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal <> "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 <> "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 <> "")
				$wrk = ($wrk <> "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == NULL_VALUE || $fldVal == NOT_NULL_VALUE)
			return $fldVal;
		$value = $fldVal;
		if ($fld->DataType == DATATYPE_BOOLEAN) {
			if ($fldVal <> "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal <> "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{
		if ($this->MA_PELB->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NO_PPK1->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->PERIODE->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->NAMA_KAPAL->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->MKPL_JENIS->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->GT_KAPAL->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LOA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->JASA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->JENIS_GERAKAN->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->BENDERA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TGL_MULAI_REA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->TGL_SELESAI_REA->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LOKASI_AWAL->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->LOKASI_AKHIR->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->MA_PELB->AdvancedSearch->unsetSession();
		$this->NO_PPK1->AdvancedSearch->unsetSession();
		$this->PERIODE->AdvancedSearch->unsetSession();
		$this->NAMA_KAPAL->AdvancedSearch->unsetSession();
		$this->MKPL_JENIS->AdvancedSearch->unsetSession();
		$this->GT_KAPAL->AdvancedSearch->unsetSession();
		$this->LOA->AdvancedSearch->unsetSession();
		$this->JASA->AdvancedSearch->unsetSession();
		$this->JENIS_GERAKAN->AdvancedSearch->unsetSession();
		$this->BENDERA->AdvancedSearch->unsetSession();
		$this->TGL_MULAI_REA->AdvancedSearch->unsetSession();
		$this->TGL_SELESAI_REA->AdvancedSearch->unsetSession();
		$this->LOKASI_AWAL->AdvancedSearch->unsetSession();
		$this->LOKASI_AKHIR->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore advanced search values
		$this->MA_PELB->AdvancedSearch->load();
		$this->NO_PPK1->AdvancedSearch->load();
		$this->PERIODE->AdvancedSearch->load();
		$this->NAMA_KAPAL->AdvancedSearch->load();
		$this->MKPL_JENIS->AdvancedSearch->load();
		$this->GT_KAPAL->AdvancedSearch->load();
		$this->LOA->AdvancedSearch->load();
		$this->JASA->AdvancedSearch->load();
		$this->JENIS_GERAKAN->AdvancedSearch->load();
		$this->BENDERA->AdvancedSearch->load();
		$this->TGL_MULAI_REA->AdvancedSearch->load();
		$this->TGL_SELESAI_REA->AdvancedSearch->load();
		$this->LOKASI_AWAL->AdvancedSearch->load();
		$this->LOKASI_AKHIR->AdvancedSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->MA_PELB); // MA_PELB
			$this->updateSort($this->NO_PPK1); // NO_PPK1
			$this->updateSort($this->PERIODE); // PERIODE
			$this->updateSort($this->NAMA_KAPAL); // NAMA_KAPAL
			$this->updateSort($this->MKPL_JENIS); // MKPL_JENIS
			$this->updateSort($this->GT_KAPAL); // GT_KAPAL
			$this->updateSort($this->LOA); // LOA
			$this->updateSort($this->JASA); // JASA
			$this->updateSort($this->JENIS_GERAKAN); // JENIS_GERAKAN
			$this->updateSort($this->BENDERA); // BENDERA
			$this->updateSort($this->TGL_MULAI_REA); // TGL_MULAI_REA
			$this->updateSort($this->TGL_SELESAI_REA); // TGL_SELESAI_REA
			$this->updateSort($this->LOKASI_AWAL); // LOKASI_AWAL
			$this->updateSort($this->LOKASI_AKHIR); // LOKASI_AKHIR
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->MA_PELB->setSort("");
				$this->NO_PPK1->setSort("");
				$this->PERIODE->setSort("");
				$this->NAMA_KAPAL->setSort("");
				$this->MKPL_JENIS->setSort("");
				$this->GT_KAPAL->setSort("");
				$this->LOA->setSort("");
				$this->JASA->setSort("");
				$this->JENIS_GERAKAN->setSort("");
				$this->BENDERA->setSort("");
				$this->TGL_MULAI_REA->setSort("");
				$this->TGL_SELESAI_REA->setSort("");
				$this->LOKASI_AWAL->setSort("");
				$this->LOKASI_AKHIR->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew.selectAllKey(this);\">";
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = &$this->ListOptions->getItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// Set up list action buttons
		$opt = &$this->ListOptions->getItem("listactions");
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = array();
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));return false;\">" . $Language->phrase("ListActionButton") . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = &$this->ListOptions->Items["checkbox"];
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fkapal_all_20162018_vasalistsrch\" href=\"#\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fkapal_all_20162018_vasalistsrch\" href=\"#\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"\" onclick=\"ew.submitAction(event,jQuery.extend({f:document.fkapal_all_20162018_vasalist}," . $listaction->toJson(TRUE) . "));return false;\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->getItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter <> "" && $userAction <> "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions->Items[$userAction]->Caption;
				if (!$this->ListActions->Items[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = '';
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() <> "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() <> "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere <> "") ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fkapal_all_20162018_vasalistsrch\">" . $Language->phrase("SearchLink") . "</button>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ResetSearch") . "\" data-caption=\"" . $Language->phrase("ResetSearch") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ResetSearchBtn") . "</a>";
		$item->Visible = ($this->SearchWhere <> $this->DefaultSearchWhere && $this->SearchWhere <> "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
	}
	protected function setupListOptionsExt()
	{
		global $Security, $Language;
	}
	protected function renderListOptionsExt()
	{
		global $Security, $Language;
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Load search values for validation
	protected function loadSearchValues()
	{
		global $CurrentForm;

		// Load search values
		// MA_PELB

		if (!$this->isAddOrEdit())
			$this->MA_PELB->AdvancedSearch->setSearchValue(Get("x_MA_PELB", Get("MA_PELB", "")));
		if ($this->MA_PELB->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MA_PELB->AdvancedSearch->setSearchOperator(Get("z_MA_PELB", ""));

		// NO_PPK1
		if (!$this->isAddOrEdit())
			$this->NO_PPK1->AdvancedSearch->setSearchValue(Get("x_NO_PPK1", Get("NO_PPK1", "")));
		if ($this->NO_PPK1->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NO_PPK1->AdvancedSearch->setSearchOperator(Get("z_NO_PPK1", ""));

		// PERIODE
		if (!$this->isAddOrEdit())
			$this->PERIODE->AdvancedSearch->setSearchValue(Get("x_PERIODE", Get("PERIODE", "")));
		if ($this->PERIODE->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->PERIODE->AdvancedSearch->setSearchOperator(Get("z_PERIODE", ""));

		// NAMA_KAPAL
		if (!$this->isAddOrEdit())
			$this->NAMA_KAPAL->AdvancedSearch->setSearchValue(Get("x_NAMA_KAPAL", Get("NAMA_KAPAL", "")));
		if ($this->NAMA_KAPAL->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->NAMA_KAPAL->AdvancedSearch->setSearchOperator(Get("z_NAMA_KAPAL", ""));

		// MKPL_JENIS
		if (!$this->isAddOrEdit())
			$this->MKPL_JENIS->AdvancedSearch->setSearchValue(Get("x_MKPL_JENIS", Get("MKPL_JENIS", "")));
		if ($this->MKPL_JENIS->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->MKPL_JENIS->AdvancedSearch->setSearchOperator(Get("z_MKPL_JENIS", ""));

		// GT_KAPAL
		if (!$this->isAddOrEdit())
			$this->GT_KAPAL->AdvancedSearch->setSearchValue(Get("x_GT_KAPAL", Get("GT_KAPAL", "")));
		if ($this->GT_KAPAL->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->GT_KAPAL->AdvancedSearch->setSearchOperator(Get("z_GT_KAPAL", ""));

		// LOA
		if (!$this->isAddOrEdit())
			$this->LOA->AdvancedSearch->setSearchValue(Get("x_LOA", Get("LOA", "")));
		if ($this->LOA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LOA->AdvancedSearch->setSearchOperator(Get("z_LOA", ""));

		// JASA
		if (!$this->isAddOrEdit())
			$this->JASA->AdvancedSearch->setSearchValue(Get("x_JASA", Get("JASA", "")));
		if ($this->JASA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->JASA->AdvancedSearch->setSearchOperator(Get("z_JASA", ""));

		// JENIS_GERAKAN
		if (!$this->isAddOrEdit())
			$this->JENIS_GERAKAN->AdvancedSearch->setSearchValue(Get("x_JENIS_GERAKAN", Get("JENIS_GERAKAN", "")));
		if ($this->JENIS_GERAKAN->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->JENIS_GERAKAN->AdvancedSearch->setSearchOperator(Get("z_JENIS_GERAKAN", ""));

		// BENDERA
		if (!$this->isAddOrEdit())
			$this->BENDERA->AdvancedSearch->setSearchValue(Get("x_BENDERA", Get("BENDERA", "")));
		if ($this->BENDERA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->BENDERA->AdvancedSearch->setSearchOperator(Get("z_BENDERA", ""));

		// TGL_MULAI_REA
		if (!$this->isAddOrEdit())
			$this->TGL_MULAI_REA->AdvancedSearch->setSearchValue(Get("x_TGL_MULAI_REA", Get("TGL_MULAI_REA", "")));
		if ($this->TGL_MULAI_REA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TGL_MULAI_REA->AdvancedSearch->setSearchOperator(Get("z_TGL_MULAI_REA", ""));

		// TGL_SELESAI_REA
		if (!$this->isAddOrEdit())
			$this->TGL_SELESAI_REA->AdvancedSearch->setSearchValue(Get("x_TGL_SELESAI_REA", Get("TGL_SELESAI_REA", "")));
		if ($this->TGL_SELESAI_REA->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->TGL_SELESAI_REA->AdvancedSearch->setSearchOperator(Get("z_TGL_SELESAI_REA", ""));

		// LOKASI_AWAL
		if (!$this->isAddOrEdit())
			$this->LOKASI_AWAL->AdvancedSearch->setSearchValue(Get("x_LOKASI_AWAL", Get("LOKASI_AWAL", "")));
		if ($this->LOKASI_AWAL->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LOKASI_AWAL->AdvancedSearch->setSearchOperator(Get("z_LOKASI_AWAL", ""));

		// LOKASI_AKHIR
		if (!$this->isAddOrEdit())
			$this->LOKASI_AKHIR->AdvancedSearch->setSearchValue(Get("x_LOKASI_AKHIR", Get("LOKASI_AKHIR", "")));
		if ($this->LOKASI_AKHIR->AdvancedSearch->SearchValue <> "" && $this->Command == "")
			$this->Command = "search";
		$this->LOKASI_AKHIR->AdvancedSearch->setSearchOperator(Get("z_LOKASI_AKHIR", ""));
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = &$this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->MA_PELB->setDbValue($row['MA_PELB']);
		$this->NO_PPK1->setDbValue($row['NO_PPK1']);
		$this->PERIODE->setDbValue($row['PERIODE']);
		$this->NAMA_KAPAL->setDbValue($row['NAMA_KAPAL']);
		$this->MKPL_JENIS->setDbValue($row['MKPL_JENIS']);
		$this->GT_KAPAL->setDbValue($row['GT_KAPAL']);
		$this->LOA->setDbValue($row['LOA']);
		$this->JASA->setDbValue($row['JASA']);
		$this->JENIS_GERAKAN->setDbValue($row['JENIS_GERAKAN']);
		$this->BENDERA->setDbValue($row['BENDERA']);
		$this->TGL_MULAI_REA->setDbValue($row['TGL_MULAI_REA']);
		$this->TGL_SELESAI_REA->setDbValue($row['TGL_SELESAI_REA']);
		$this->LOKASI_AWAL->setDbValue($row['LOKASI_AWAL']);
		$this->LOKASI_AKHIR->setDbValue($row['LOKASI_AKHIR']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['MA_PELB'] = NULL;
		$row['NO_PPK1'] = NULL;
		$row['PERIODE'] = NULL;
		$row['NAMA_KAPAL'] = NULL;
		$row['MKPL_JENIS'] = NULL;
		$row['GT_KAPAL'] = NULL;
		$row['LOA'] = NULL;
		$row['JASA'] = NULL;
		$row['JENIS_GERAKAN'] = NULL;
		$row['BENDERA'] = NULL;
		$row['TGL_MULAI_REA'] = NULL;
		$row['TGL_SELESAI_REA'] = NULL;
		$row['LOKASI_AWAL'] = NULL;
		$row['LOKASI_AKHIR'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{
		return FALSE;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Convert decimal values if posted back
		if ($this->LOA->FormValue == $this->LOA->CurrentValue && is_numeric(ConvertToFloatString($this->LOA->CurrentValue)))
			$this->LOA->CurrentValue = ConvertToFloatString($this->LOA->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// MA_PELB
		// NO_PPK1
		// PERIODE
		// NAMA_KAPAL
		// MKPL_JENIS
		// GT_KAPAL
		// LOA
		// JASA
		// JENIS_GERAKAN
		// BENDERA
		// TGL_MULAI_REA
		// TGL_SELESAI_REA
		// LOKASI_AWAL
		// LOKASI_AKHIR

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// MA_PELB
			$curVal = strval($this->MA_PELB->CurrentValue);
			if ($curVal <> "") {
				$this->MA_PELB->ViewValue = $this->MA_PELB->lookupCacheOption($curVal);
				if ($this->MA_PELB->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`pelabuhan`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->MA_PELB->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->MA_PELB->ViewValue = $this->MA_PELB->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->MA_PELB->ViewValue = $this->MA_PELB->CurrentValue;
					}
				}
			} else {
				$this->MA_PELB->ViewValue = NULL;
			}
			$this->MA_PELB->ViewCustomAttributes = "";

			// NO_PPK1
			$this->NO_PPK1->ViewValue = $this->NO_PPK1->CurrentValue;
			$this->NO_PPK1->ViewValue = FormatNumber($this->NO_PPK1->ViewValue, 0, -2, -2, -2);
			$this->NO_PPK1->ViewCustomAttributes = "";

			// PERIODE
			$curVal = strval($this->PERIODE->CurrentValue);
			if ($curVal <> "") {
				$this->PERIODE->ViewValue = $this->PERIODE->lookupCacheOption($curVal);
				if ($this->PERIODE->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`periode`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->PERIODE->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = $rswrk->fields('df2');
						$this->PERIODE->ViewValue = $this->PERIODE->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->PERIODE->ViewValue = $this->PERIODE->CurrentValue;
					}
				}
			} else {
				$this->PERIODE->ViewValue = NULL;
			}
			$this->PERIODE->ViewCustomAttributes = "";

			// NAMA_KAPAL
			$arwrk = array();
			$arwrk[1] = $this->NAMA_KAPAL->CurrentValue;
			$this->NAMA_KAPAL->ViewValue = $this->NAMA_KAPAL->displayValue($arwrk);
			$this->NAMA_KAPAL->ViewCustomAttributes = "";

			// MKPL_JENIS
			$this->MKPL_JENIS->ViewValue = $this->MKPL_JENIS->CurrentValue;
			$this->MKPL_JENIS->ViewCustomAttributes = "";

			// GT_KAPAL
			$this->GT_KAPAL->ViewValue = $this->GT_KAPAL->CurrentValue;
			$this->GT_KAPAL->ViewValue = FormatNumber($this->GT_KAPAL->ViewValue, 0, -2, -2, -2);
			$this->GT_KAPAL->ViewCustomAttributes = "";

			// LOA
			$this->LOA->ViewValue = $this->LOA->CurrentValue;
			$this->LOA->ViewValue = FormatNumber($this->LOA->ViewValue, 2, -2, -2, -2);
			$this->LOA->ViewCustomAttributes = "";

			// JASA
			$curVal = strval($this->JASA->CurrentValue);
			if ($curVal <> "") {
				$this->JASA->ViewValue = $this->JASA->lookupCacheOption($curVal);
				if ($this->JASA->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`jasa`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->JASA->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->JASA->ViewValue = $this->JASA->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->JASA->ViewValue = $this->JASA->CurrentValue;
					}
				}
			} else {
				$this->JASA->ViewValue = NULL;
			}
			$this->JASA->ViewCustomAttributes = "";

			// JENIS_GERAKAN
			$this->JENIS_GERAKAN->ViewValue = $this->JENIS_GERAKAN->CurrentValue;
			$this->JENIS_GERAKAN->ViewCustomAttributes = "";

			// BENDERA
			$this->BENDERA->ViewValue = $this->BENDERA->CurrentValue;
			$this->BENDERA->ViewCustomAttributes = "";

			// TGL_MULAI_REA
			$this->TGL_MULAI_REA->ViewValue = $this->TGL_MULAI_REA->CurrentValue;
			$this->TGL_MULAI_REA->ViewCustomAttributes = "";

			// TGL_SELESAI_REA
			$this->TGL_SELESAI_REA->ViewValue = $this->TGL_SELESAI_REA->CurrentValue;
			$this->TGL_SELESAI_REA->ViewCustomAttributes = "";

			// LOKASI_AWAL
			$this->LOKASI_AWAL->ViewValue = $this->LOKASI_AWAL->CurrentValue;
			$this->LOKASI_AWAL->ViewCustomAttributes = "";

			// LOKASI_AKHIR
			$this->LOKASI_AKHIR->ViewValue = $this->LOKASI_AKHIR->CurrentValue;
			$this->LOKASI_AKHIR->ViewCustomAttributes = "";

			// MA_PELB
			$this->MA_PELB->LinkCustomAttributes = "";
			$this->MA_PELB->HrefValue = "";
			$this->MA_PELB->TooltipValue = "";

			// NO_PPK1
			$this->NO_PPK1->LinkCustomAttributes = "";
			$this->NO_PPK1->HrefValue = "";
			$this->NO_PPK1->TooltipValue = "";

			// PERIODE
			$this->PERIODE->LinkCustomAttributes = "";
			$this->PERIODE->HrefValue = "";
			$this->PERIODE->TooltipValue = "";

			// NAMA_KAPAL
			$this->NAMA_KAPAL->LinkCustomAttributes = "";
			$this->NAMA_KAPAL->HrefValue = "";
			$this->NAMA_KAPAL->TooltipValue = "";

			// MKPL_JENIS
			$this->MKPL_JENIS->LinkCustomAttributes = "";
			$this->MKPL_JENIS->HrefValue = "";
			$this->MKPL_JENIS->TooltipValue = "";

			// GT_KAPAL
			$this->GT_KAPAL->LinkCustomAttributes = "";
			$this->GT_KAPAL->HrefValue = "";
			$this->GT_KAPAL->TooltipValue = "";

			// LOA
			$this->LOA->LinkCustomAttributes = "";
			$this->LOA->HrefValue = "";
			$this->LOA->TooltipValue = "";

			// JASA
			$this->JASA->LinkCustomAttributes = "";
			$this->JASA->HrefValue = "";
			$this->JASA->TooltipValue = "";

			// JENIS_GERAKAN
			$this->JENIS_GERAKAN->LinkCustomAttributes = "";
			$this->JENIS_GERAKAN->HrefValue = "";
			$this->JENIS_GERAKAN->TooltipValue = "";

			// BENDERA
			$this->BENDERA->LinkCustomAttributes = "";
			$this->BENDERA->HrefValue = "";
			$this->BENDERA->TooltipValue = "";

			// TGL_MULAI_REA
			$this->TGL_MULAI_REA->LinkCustomAttributes = "";
			$this->TGL_MULAI_REA->HrefValue = "";
			$this->TGL_MULAI_REA->TooltipValue = "";

			// TGL_SELESAI_REA
			$this->TGL_SELESAI_REA->LinkCustomAttributes = "";
			$this->TGL_SELESAI_REA->HrefValue = "";
			$this->TGL_SELESAI_REA->TooltipValue = "";

			// LOKASI_AWAL
			$this->LOKASI_AWAL->LinkCustomAttributes = "";
			$this->LOKASI_AWAL->HrefValue = "";
			$this->LOKASI_AWAL->TooltipValue = "";

			// LOKASI_AKHIR
			$this->LOKASI_AKHIR->LinkCustomAttributes = "";
			$this->LOKASI_AKHIR->HrefValue = "";
			$this->LOKASI_AKHIR->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// MA_PELB
			$this->MA_PELB->EditAttrs["class"] = "form-control";
			$this->MA_PELB->EditCustomAttributes = "";
			$curVal = trim(strval($this->MA_PELB->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->MA_PELB->AdvancedSearch->ViewValue = $this->MA_PELB->lookupCacheOption($curVal);
			else
				$this->MA_PELB->AdvancedSearch->ViewValue = $this->MA_PELB->Lookup !== NULL && is_array($this->MA_PELB->Lookup->Options) ? $curVal : NULL;
			if ($this->MA_PELB->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->MA_PELB->EditValue = array_values($this->MA_PELB->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`pelabuhan`" . SearchString("=", $this->MA_PELB->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->MA_PELB->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->MA_PELB->EditValue = $arwrk;
			}

			// NO_PPK1
			$this->NO_PPK1->EditAttrs["class"] = "form-control";
			$this->NO_PPK1->EditCustomAttributes = "";
			$this->NO_PPK1->EditValue = HtmlEncode($this->NO_PPK1->AdvancedSearch->SearchValue);
			$this->NO_PPK1->PlaceHolder = RemoveHtml($this->NO_PPK1->caption());

			// PERIODE
			$this->PERIODE->EditAttrs["class"] = "form-control";
			$this->PERIODE->EditCustomAttributes = "";
			$curVal = trim(strval($this->PERIODE->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->PERIODE->AdvancedSearch->ViewValue = $this->PERIODE->lookupCacheOption($curVal);
			else
				$this->PERIODE->AdvancedSearch->ViewValue = $this->PERIODE->Lookup !== NULL && is_array($this->PERIODE->Lookup->Options) ? $curVal : NULL;
			if ($this->PERIODE->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->PERIODE->EditValue = array_values($this->PERIODE->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`periode`" . SearchString("=", $this->PERIODE->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->PERIODE->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->PERIODE->EditValue = $arwrk;
			}

			// NAMA_KAPAL
			$this->NAMA_KAPAL->EditAttrs["class"] = "form-control";
			$this->NAMA_KAPAL->EditCustomAttributes = "";

			// MKPL_JENIS
			$this->MKPL_JENIS->EditAttrs["class"] = "form-control";
			$this->MKPL_JENIS->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->MKPL_JENIS->AdvancedSearch->SearchValue = HtmlDecode($this->MKPL_JENIS->AdvancedSearch->SearchValue);
			$this->MKPL_JENIS->EditValue = HtmlEncode($this->MKPL_JENIS->AdvancedSearch->SearchValue);
			$this->MKPL_JENIS->PlaceHolder = RemoveHtml($this->MKPL_JENIS->caption());

			// GT_KAPAL
			$this->GT_KAPAL->EditAttrs["class"] = "form-control";
			$this->GT_KAPAL->EditCustomAttributes = "";
			$this->GT_KAPAL->EditValue = HtmlEncode($this->GT_KAPAL->AdvancedSearch->SearchValue);
			$this->GT_KAPAL->PlaceHolder = RemoveHtml($this->GT_KAPAL->caption());

			// LOA
			$this->LOA->EditAttrs["class"] = "form-control";
			$this->LOA->EditCustomAttributes = "";
			$this->LOA->EditValue = HtmlEncode($this->LOA->AdvancedSearch->SearchValue);
			$this->LOA->PlaceHolder = RemoveHtml($this->LOA->caption());

			// JASA
			$this->JASA->EditAttrs["class"] = "form-control";
			$this->JASA->EditCustomAttributes = "";
			$curVal = trim(strval($this->JASA->AdvancedSearch->SearchValue));
			if ($curVal <> "")
				$this->JASA->AdvancedSearch->ViewValue = $this->JASA->lookupCacheOption($curVal);
			else
				$this->JASA->AdvancedSearch->ViewValue = $this->JASA->Lookup !== NULL && is_array($this->JASA->Lookup->Options) ? $curVal : NULL;
			if ($this->JASA->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->JASA->EditValue = array_values($this->JASA->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`jasa`" . SearchString("=", $this->JASA->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
				}
				$sqlWrk = $this->JASA->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->JASA->EditValue = $arwrk;
			}

			// JENIS_GERAKAN
			$this->JENIS_GERAKAN->EditAttrs["class"] = "form-control";
			$this->JENIS_GERAKAN->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->JENIS_GERAKAN->AdvancedSearch->SearchValue = HtmlDecode($this->JENIS_GERAKAN->AdvancedSearch->SearchValue);
			$this->JENIS_GERAKAN->EditValue = HtmlEncode($this->JENIS_GERAKAN->AdvancedSearch->SearchValue);
			$this->JENIS_GERAKAN->PlaceHolder = RemoveHtml($this->JENIS_GERAKAN->caption());

			// BENDERA
			$this->BENDERA->EditAttrs["class"] = "form-control";
			$this->BENDERA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->BENDERA->AdvancedSearch->SearchValue = HtmlDecode($this->BENDERA->AdvancedSearch->SearchValue);
			$this->BENDERA->EditValue = HtmlEncode($this->BENDERA->AdvancedSearch->SearchValue);
			$this->BENDERA->PlaceHolder = RemoveHtml($this->BENDERA->caption());

			// TGL_MULAI_REA
			$this->TGL_MULAI_REA->EditAttrs["class"] = "form-control";
			$this->TGL_MULAI_REA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TGL_MULAI_REA->AdvancedSearch->SearchValue = HtmlDecode($this->TGL_MULAI_REA->AdvancedSearch->SearchValue);
			$this->TGL_MULAI_REA->EditValue = HtmlEncode($this->TGL_MULAI_REA->AdvancedSearch->SearchValue);
			$this->TGL_MULAI_REA->PlaceHolder = RemoveHtml($this->TGL_MULAI_REA->caption());

			// TGL_SELESAI_REA
			$this->TGL_SELESAI_REA->EditAttrs["class"] = "form-control";
			$this->TGL_SELESAI_REA->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TGL_SELESAI_REA->AdvancedSearch->SearchValue = HtmlDecode($this->TGL_SELESAI_REA->AdvancedSearch->SearchValue);
			$this->TGL_SELESAI_REA->EditValue = HtmlEncode($this->TGL_SELESAI_REA->AdvancedSearch->SearchValue);
			$this->TGL_SELESAI_REA->PlaceHolder = RemoveHtml($this->TGL_SELESAI_REA->caption());

			// LOKASI_AWAL
			$this->LOKASI_AWAL->EditAttrs["class"] = "form-control";
			$this->LOKASI_AWAL->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LOKASI_AWAL->AdvancedSearch->SearchValue = HtmlDecode($this->LOKASI_AWAL->AdvancedSearch->SearchValue);
			$this->LOKASI_AWAL->EditValue = HtmlEncode($this->LOKASI_AWAL->AdvancedSearch->SearchValue);
			$this->LOKASI_AWAL->PlaceHolder = RemoveHtml($this->LOKASI_AWAL->caption());

			// LOKASI_AKHIR
			$this->LOKASI_AKHIR->EditAttrs["class"] = "form-control";
			$this->LOKASI_AKHIR->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->LOKASI_AKHIR->AdvancedSearch->SearchValue = HtmlDecode($this->LOKASI_AKHIR->AdvancedSearch->SearchValue);
			$this->LOKASI_AKHIR->EditValue = HtmlEncode($this->LOKASI_AKHIR->AdvancedSearch->SearchValue);
			$this->LOKASI_AKHIR->PlaceHolder = RemoveHtml($this->LOKASI_AKHIR->caption());
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return TRUE;

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->MA_PELB->AdvancedSearch->load();
		$this->NO_PPK1->AdvancedSearch->load();
		$this->PERIODE->AdvancedSearch->load();
		$this->NAMA_KAPAL->AdvancedSearch->load();
		$this->MKPL_JENIS->AdvancedSearch->load();
		$this->GT_KAPAL->AdvancedSearch->load();
		$this->LOA->AdvancedSearch->load();
		$this->JASA->AdvancedSearch->load();
		$this->JENIS_GERAKAN->AdvancedSearch->load();
		$this->BENDERA->AdvancedSearch->load();
		$this->TGL_MULAI_REA->AdvancedSearch->load();
		$this->TGL_SELESAI_REA->AdvancedSearch->load();
		$this->LOKASI_AWAL->AdvancedSearch->load();
		$this->LOKASI_AKHIR->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->ParentFields) == 0 && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_MA_PELB":
							break;
						case "x_PERIODE":
							break;
						case "x_NAMA_KAPAL":
							break;
						case "x_JASA":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
}
?>