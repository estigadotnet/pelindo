<?php
namespace PHPReportMaker12\pelindo_prj;

/**
 * Table class for Report1
 */
class Report1 extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $MA_PELB;
	public $NO_PPK1;
	public $PERIODE;
	public $NAMA_KAPAL;
	public $MKPL_JENIS;
	public $GT_KAPAL;
	public $LOA;
	public $JASA;
	public $JENIS_GERAKAN;
	public $BENDERA;
	public $TGL_MULAI_REA;
	public $TGL_SELESAI_REA;
	public $LOKASI_AWAL;
	public $LOKASI_AKHIR;
	public $periode2;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'Report1';
		$this->TableName = 'Report1';
		$this->TableType = 'REPORT';
		$this->TableReportType = 'summary';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// MA_PELB
		$this->MA_PELB = new ReportField('Report1', 'Report1', 'x_MA_PELB', 'MA_PELB', '`MA_PELB`', 200, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MA_PELB->Sortable = TRUE; // Allow sort
		$this->MA_PELB->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MA_PELB->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->MA_PELB->DateFilter = "";
		$this->MA_PELB->Lookup = new ReportLookup('MA_PELB', 'Report1', TRUE, 'MA_PELB', ["MA_PELB","","",""], [], [], [], [], [], [], '`MA_PELB` ASC', '');
		$this->MA_PELB->Lookup->RenderViewFunc = "renderLookup";
		$this->fields['MA_PELB'] = &$this->MA_PELB;

		// NO_PPK1
		$this->NO_PPK1 = new ReportField('Report1', 'Report1', 'x_NO_PPK1', 'NO_PPK1', '`NO_PPK1`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NO_PPK1->Sortable = TRUE; // Allow sort
		$this->NO_PPK1->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->NO_PPK1->DateFilter = "";
		$this->fields['NO_PPK1'] = &$this->NO_PPK1;

		// PERIODE
		$this->PERIODE = new ReportField('Report1', 'Report1', 'x_PERIODE', 'PERIODE', '`PERIODE`', 3, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PERIODE->Sortable = TRUE; // Allow sort
		$this->PERIODE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PERIODE->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->PERIODE->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->PERIODE->DateFilter = "";
		$this->fields['PERIODE'] = &$this->PERIODE;

		// NAMA_KAPAL
		$this->NAMA_KAPAL = new ReportField('Report1', 'Report1', 'x_NAMA_KAPAL', 'NAMA_KAPAL', '`NAMA_KAPAL`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NAMA_KAPAL->Sortable = TRUE; // Allow sort
		$this->NAMA_KAPAL->DateFilter = "";
		$this->fields['NAMA_KAPAL'] = &$this->NAMA_KAPAL;

		// MKPL_JENIS
		$this->MKPL_JENIS = new ReportField('Report1', 'Report1', 'x_MKPL_JENIS', 'MKPL_JENIS', '`MKPL_JENIS`', 200, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MKPL_JENIS->Sortable = TRUE; // Allow sort
		$this->MKPL_JENIS->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MKPL_JENIS->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->MKPL_JENIS->DateFilter = "";
		$this->MKPL_JENIS->Lookup = new ReportLookup('MKPL_JENIS', 'Report1', TRUE, 'MKPL_JENIS', ["MKPL_JENIS","","",""], [], [], [], [], [], [], '`MKPL_JENIS` ASC', '');
		$this->MKPL_JENIS->Lookup->RenderViewFunc = "renderLookup";
		$this->fields['MKPL_JENIS'] = &$this->MKPL_JENIS;

		// GT_KAPAL
		$this->GT_KAPAL = new ReportField('Report1', 'Report1', 'x_GT_KAPAL', 'GT_KAPAL', '`GT_KAPAL`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GT_KAPAL->Sortable = TRUE; // Allow sort
		$this->GT_KAPAL->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->GT_KAPAL->DateFilter = "";
		$this->fields['GT_KAPAL'] = &$this->GT_KAPAL;

		// LOA
		$this->LOA = new ReportField('Report1', 'Report1', 'x_LOA', 'LOA', '`LOA`', 131, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOA->Sortable = TRUE; // Allow sort
		$this->LOA->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->LOA->DateFilter = "";
		$this->fields['LOA'] = &$this->LOA;

		// JASA
		$this->JASA = new ReportField('Report1', 'Report1', 'x_JASA', 'JASA', '`JASA`', 200, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->JASA->Sortable = TRUE; // Allow sort
		$this->JASA->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->JASA->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->JASA->DateFilter = "";
		$this->JASA->Lookup = new ReportLookup('JASA', 'Report1', TRUE, 'JASA', ["JASA","","",""], [], [], [], [], [], [], '`JASA` ASC', '');
		$this->JASA->Lookup->RenderViewFunc = "renderLookup";
		$this->fields['JASA'] = &$this->JASA;

		// JENIS_GERAKAN
		$this->JENIS_GERAKAN = new ReportField('Report1', 'Report1', 'x_JENIS_GERAKAN', 'JENIS_GERAKAN', '`JENIS_GERAKAN`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->JENIS_GERAKAN->Sortable = TRUE; // Allow sort
		$this->JENIS_GERAKAN->DateFilter = "";
		$this->fields['JENIS_GERAKAN'] = &$this->JENIS_GERAKAN;

		// BENDERA
		$this->BENDERA = new ReportField('Report1', 'Report1', 'x_BENDERA', 'BENDERA', '`BENDERA`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BENDERA->Sortable = TRUE; // Allow sort
		$this->BENDERA->DateFilter = "";
		$this->fields['BENDERA'] = &$this->BENDERA;

		// TGL_MULAI_REA
		$this->TGL_MULAI_REA = new ReportField('Report1', 'Report1', 'x_TGL_MULAI_REA', 'TGL_MULAI_REA', '`TGL_MULAI_REA`', 135, 111, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TGL_MULAI_REA->Sortable = TRUE; // Allow sort
		$this->TGL_MULAI_REA->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->TGL_MULAI_REA->DateFilter = "";
		$this->fields['TGL_MULAI_REA'] = &$this->TGL_MULAI_REA;

		// TGL_SELESAI_REA
		$this->TGL_SELESAI_REA = new ReportField('Report1', 'Report1', 'x_TGL_SELESAI_REA', 'TGL_SELESAI_REA', '`TGL_SELESAI_REA`', 135, 111, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TGL_SELESAI_REA->Sortable = TRUE; // Allow sort
		$this->TGL_SELESAI_REA->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->TGL_SELESAI_REA->DateFilter = "";
		$this->fields['TGL_SELESAI_REA'] = &$this->TGL_SELESAI_REA;

		// LOKASI_AWAL
		$this->LOKASI_AWAL = new ReportField('Report1', 'Report1', 'x_LOKASI_AWAL', 'LOKASI_AWAL', '`LOKASI_AWAL`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOKASI_AWAL->Sortable = TRUE; // Allow sort
		$this->LOKASI_AWAL->DateFilter = "";
		$this->fields['LOKASI_AWAL'] = &$this->LOKASI_AWAL;

		// LOKASI_AKHIR
		$this->LOKASI_AKHIR = new ReportField('Report1', 'Report1', 'x_LOKASI_AKHIR', 'LOKASI_AKHIR', '`LOKASI_AKHIR`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOKASI_AKHIR->Sortable = TRUE; // Allow sort
		$this->LOKASI_AKHIR->DateFilter = "";
		$this->fields['LOKASI_AKHIR'] = &$this->LOKASI_AKHIR;

		// periode2
		$this->periode2 = new ReportField('Report1', 'Report1', 'x_periode2', 'periode2', '`periode2`', 200, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->periode2->Sortable = TRUE; // Allow sort
		$this->periode2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->periode2->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->periode2->DateFilter = "";
		$this->periode2->Lookup = new ReportLookup('periode2', 'Report1', TRUE, 'periode2', ["periode2","","",""], [], [], [], [], [], [], '`periode2` ASC', '');
		$this->periode2->Lookup->RenderViewFunc = "renderLookup";
		$this->fields['periode2'] = &$this->periode2;
	}

	// Render for popup
	public function renderPopup()
	{
		global $ReportLanguage;
	}

	// Render for lookup
	public function renderLookup()
	{
		$this->MA_PELB->ViewValue = GetDropDownDisplayValue($this->MA_PELB->CurrentValue, "", 0);
		$this->MKPL_JENIS->ViewValue = GetDropDownDisplayValue($this->MKPL_JENIS->CurrentValue, "", 0);
		$this->JASA->ViewValue = GetDropDownDisplayValue($this->JASA->CurrentValue, "", 0);
		$this->periode2->ViewValue = GetDropDownDisplayValue($this->periode2->CurrentValue, "", 0);
	}

	// Get Field Visibility
	public function getFieldVisibility($fldparm)
	{
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Single column sort
	protected function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($fld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			if ($fld->GroupingFieldId == 0) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql <> "") {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Table level SQL
	private $_sqlFrom = "";
	private $_sqlSelect = "";
	private $_sqlWhere = "";
	private $_sqlGroupBy = "";
	private $_sqlHaving = "";
	private $_sqlOrderBy = "";

	// From
	public function getSqlFrom()
	{
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`kapal_all_20162018_vasa`";
	}
	public function setSqlFrom($v)
	{
		$this->_sqlFrom = $v;
	}

	// Select
	public function getSqlSelect()
	{
		return ($this->_sqlSelect <> "") ? $this->_sqlSelect : "SELECT *, concat(right(periode, 2), ', ',  left(periode, 4)) AS `periode2` FROM " . $this->getSqlFrom();
	}
	public function setSqlSelect($v)
	{
		$this->_sqlSelect = $v;
	}

	// Where
	public function getSqlWhere()
	{
		$where = ($this->_sqlWhere <> "") ? $this->_sqlWhere : "";
		$filter = "";
		AddFilter($where, $filter);
		return $where;
	}
	public function setSqlWhere($v)
	{
		$this->_sqlWhere = $v;
	}

	// Group By
	public function getSqlGroupBy()
	{
		return ($this->_sqlGroupBy <> "") ? $this->_sqlGroupBy : "";
	}
	public function setSqlGroupBy($v)
	{
		$this->_sqlGroupBy = $v;
	}

	// Having
	public function getSqlHaving()
	{
		return ($this->_sqlHaving <> "") ? $this->_sqlHaving : "";
	}
	public function setSqlHaving($v)
	{
		$this->_sqlHaving = $v;
	}

	// Order By
	public function getSqlOrderBy()
	{
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "";
	}
	public function setSqlOrderBy($v)
	{
		$this->_sqlOrderBy = $v;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table Level Group SQL
	private $_sqlFirstGroupField = "";
	private $_sqlSelectGroup = "";
	private $_sqlOrderByGroup = "";

	// First Group Field
	public function getSqlFirstGroupField()
	{
		return ($this->_sqlFirstGroupField <> "") ? $this->_sqlFirstGroupField : "";
	}
	public function setSqlFirstGroupField($v)
	{
		$this->_sqlFirstGroupField = $v;
	}

	// Select Group
	public function getSqlSelectGroup()
	{
		return ($this->_sqlSelectGroup <> "") ? $this->_sqlSelectGroup : "SELECT DISTINCT " . $this->getSqlFirstGroupField() . " FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectGroup($v)
	{
		$this->_sqlSelectGroup = $v;
	}

	// Order By Group
	public function getSqlOrderByGroup()
	{
		return ($this->_sqlOrderByGroup <> "") ? $this->_sqlOrderByGroup : "";
	}
	public function setSqlOrderByGroup($v)
	{
		$this->_sqlOrderByGroup = $v;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix <> "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix <> "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount <> "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = '';
		return $rs;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		return "";
	}

	// Lookup data from table
	public function lookup()
	{

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));

		// Create lookup object and output JSON
		$lookup = new ReportLookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if (Post("keys") !== NULL) { // Selected records from modal
			$keys = Post("keys");
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["class"] = "xxx";

	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', PROJECT_NAMESPACE . 'GetStartsWithAFilter'); // With function, or
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->Name == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->Name == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->Name == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->Name == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>