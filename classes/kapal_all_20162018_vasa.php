<?php
namespace PHPMaker2019\project1;

/**
 * Table class for kapal_all_20162018_vasa
 */
class kapal_all_20162018_vasa extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
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

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'kapal_all_20162018_vasa';
		$this->TableName = 'kapal_all_20162018_vasa';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`kapal_all_20162018_vasa`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// MA_PELB
		$this->MA_PELB = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_MA_PELB', 'MA_PELB', '`MA_PELB`', '`MA_PELB`', 200, -1, FALSE, '`MA_PELB`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->MA_PELB->Sortable = TRUE; // Allow sort
		$this->MA_PELB->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->MA_PELB->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->MA_PELB->Lookup = new Lookup('MA_PELB', 't0001_pelabuhan', FALSE, 'pelabuhan', ["pelabuhan","","",""], [], [], [], [], [], [], '', '');
		$this->fields['MA_PELB'] = &$this->MA_PELB;

		// NO_PPK1
		$this->NO_PPK1 = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_NO_PPK1', 'NO_PPK1', '`NO_PPK1`', '`NO_PPK1`', 3, -1, FALSE, '`NO_PPK1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NO_PPK1->Sortable = TRUE; // Allow sort
		$this->NO_PPK1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['NO_PPK1'] = &$this->NO_PPK1;

		// PERIODE
		$this->PERIODE = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_PERIODE', 'PERIODE', '`PERIODE`', '`PERIODE`', 3, -1, FALSE, '`PERIODE`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->PERIODE->Sortable = TRUE; // Allow sort
		$this->PERIODE->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->PERIODE->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->PERIODE->Lookup = new Lookup('PERIODE', 'v0001_periode', FALSE, 'periode', ["bulan","tahun","",""], [], [], [], [], [], [], '', '');
		$this->PERIODE->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['PERIODE'] = &$this->PERIODE;

		// NAMA_KAPAL
		$this->NAMA_KAPAL = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_NAMA_KAPAL', 'NAMA_KAPAL', '`NAMA_KAPAL`', '`NAMA_KAPAL`', 200, -1, FALSE, '`NAMA_KAPAL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->NAMA_KAPAL->Sortable = TRUE; // Allow sort
		$this->NAMA_KAPAL->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->NAMA_KAPAL->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->NAMA_KAPAL->Lookup = new Lookup('NAMA_KAPAL', 'kapal_all_20162018_vasa', FALSE, 'NAMA_KAPAL', ["NAMA_KAPAL","","",""], [], [], [], [], [], [], '', '');
		$this->fields['NAMA_KAPAL'] = &$this->NAMA_KAPAL;

		// MKPL_JENIS
		$this->MKPL_JENIS = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_MKPL_JENIS', 'MKPL_JENIS', '`MKPL_JENIS`', '`MKPL_JENIS`', 200, -1, FALSE, '`MKPL_JENIS`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->MKPL_JENIS->Sortable = TRUE; // Allow sort
		$this->fields['MKPL_JENIS'] = &$this->MKPL_JENIS;

		// GT_KAPAL
		$this->GT_KAPAL = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_GT_KAPAL', 'GT_KAPAL', '`GT_KAPAL`', '`GT_KAPAL`', 3, -1, FALSE, '`GT_KAPAL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->GT_KAPAL->Sortable = TRUE; // Allow sort
		$this->GT_KAPAL->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['GT_KAPAL'] = &$this->GT_KAPAL;

		// LOA
		$this->LOA = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_LOA', 'LOA', '`LOA`', '`LOA`', 131, -1, FALSE, '`LOA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOA->Sortable = TRUE; // Allow sort
		$this->LOA->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['LOA'] = &$this->LOA;

		// JASA
		$this->JASA = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_JASA', 'JASA', '`JASA`', '`JASA`', 200, -1, FALSE, '`JASA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->JASA->Sortable = TRUE; // Allow sort
		$this->JASA->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->JASA->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->JASA->Lookup = new Lookup('JASA', 't0002_jasa', FALSE, 'jasa', ["jasa","","",""], [], [], [], [], [], [], '', '');
		$this->fields['JASA'] = &$this->JASA;

		// JENIS_GERAKAN
		$this->JENIS_GERAKAN = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_JENIS_GERAKAN', 'JENIS_GERAKAN', '`JENIS_GERAKAN`', '`JENIS_GERAKAN`', 200, -1, FALSE, '`JENIS_GERAKAN`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->JENIS_GERAKAN->Sortable = TRUE; // Allow sort
		$this->fields['JENIS_GERAKAN'] = &$this->JENIS_GERAKAN;

		// BENDERA
		$this->BENDERA = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_BENDERA', 'BENDERA', '`BENDERA`', '`BENDERA`', 200, -1, FALSE, '`BENDERA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BENDERA->Sortable = TRUE; // Allow sort
		$this->fields['BENDERA'] = &$this->BENDERA;

		// TGL_MULAI_REA
		$this->TGL_MULAI_REA = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_TGL_MULAI_REA', 'TGL_MULAI_REA', '`TGL_MULAI_REA`', '`TGL_MULAI_REA`', 200, -1, FALSE, '`TGL_MULAI_REA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TGL_MULAI_REA->Sortable = TRUE; // Allow sort
		$this->fields['TGL_MULAI_REA'] = &$this->TGL_MULAI_REA;

		// TGL_SELESAI_REA
		$this->TGL_SELESAI_REA = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_TGL_SELESAI_REA', 'TGL_SELESAI_REA', '`TGL_SELESAI_REA`', '`TGL_SELESAI_REA`', 200, -1, FALSE, '`TGL_SELESAI_REA`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TGL_SELESAI_REA->Sortable = TRUE; // Allow sort
		$this->fields['TGL_SELESAI_REA'] = &$this->TGL_SELESAI_REA;

		// LOKASI_AWAL
		$this->LOKASI_AWAL = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_LOKASI_AWAL', 'LOKASI_AWAL', '`LOKASI_AWAL`', '`LOKASI_AWAL`', 200, -1, FALSE, '`LOKASI_AWAL`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOKASI_AWAL->Sortable = TRUE; // Allow sort
		$this->fields['LOKASI_AWAL'] = &$this->LOKASI_AWAL;

		// LOKASI_AKHIR
		$this->LOKASI_AKHIR = new DbField('kapal_all_20162018_vasa', 'kapal_all_20162018_vasa', 'x_LOKASI_AKHIR', 'LOKASI_AKHIR', '`LOKASI_AKHIR`', '`LOKASI_AKHIR`', 200, -1, FALSE, '`LOKASI_AKHIR`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LOKASI_AKHIR->Sortable = TRUE; // Allow sort
		$this->fields['LOKASI_AKHIR'] = &$this->LOKASI_AKHIR;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
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
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`kapal_all_20162018_vasa`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
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

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->MA_PELB->DbValue = $row['MA_PELB'];
		$this->NO_PPK1->DbValue = $row['NO_PPK1'];
		$this->PERIODE->DbValue = $row['PERIODE'];
		$this->NAMA_KAPAL->DbValue = $row['NAMA_KAPAL'];
		$this->MKPL_JENIS->DbValue = $row['MKPL_JENIS'];
		$this->GT_KAPAL->DbValue = $row['GT_KAPAL'];
		$this->LOA->DbValue = $row['LOA'];
		$this->JASA->DbValue = $row['JASA'];
		$this->JENIS_GERAKAN->DbValue = $row['JENIS_GERAKAN'];
		$this->BENDERA->DbValue = $row['BENDERA'];
		$this->TGL_MULAI_REA->DbValue = $row['TGL_MULAI_REA'];
		$this->TGL_SELESAI_REA->DbValue = $row['TGL_SELESAI_REA'];
		$this->LOKASI_AWAL->DbValue = $row['LOKASI_AWAL'];
		$this->LOKASI_AKHIR->DbValue = $row['LOKASI_AKHIR'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "kapal_all_20162018_vasalist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "kapal_all_20162018_vasaview.php")
			return $Language->phrase("View");
		elseif ($pageName == "kapal_all_20162018_vasaedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "kapal_all_20162018_vasaadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "kapal_all_20162018_vasalist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("kapal_all_20162018_vasaview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("kapal_all_20162018_vasaview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "kapal_all_20162018_vasaadd.php?" . $this->getUrlParm($parm);
		else
			$url = "kapal_all_20162018_vasaadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("kapal_all_20162018_vasaedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("kapal_all_20162018_vasaadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("kapal_all_20162018_vasadelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->MA_PELB->setDbValue($rs->fields('MA_PELB'));
		$this->NO_PPK1->setDbValue($rs->fields('NO_PPK1'));
		$this->PERIODE->setDbValue($rs->fields('PERIODE'));
		$this->NAMA_KAPAL->setDbValue($rs->fields('NAMA_KAPAL'));
		$this->MKPL_JENIS->setDbValue($rs->fields('MKPL_JENIS'));
		$this->GT_KAPAL->setDbValue($rs->fields('GT_KAPAL'));
		$this->LOA->setDbValue($rs->fields('LOA'));
		$this->JASA->setDbValue($rs->fields('JASA'));
		$this->JENIS_GERAKAN->setDbValue($rs->fields('JENIS_GERAKAN'));
		$this->BENDERA->setDbValue($rs->fields('BENDERA'));
		$this->TGL_MULAI_REA->setDbValue($rs->fields('TGL_MULAI_REA'));
		$this->TGL_SELESAI_REA->setDbValue($rs->fields('TGL_SELESAI_REA'));
		$this->LOKASI_AWAL->setDbValue($rs->fields('LOKASI_AWAL'));
		$this->LOKASI_AKHIR->setDbValue($rs->fields('LOKASI_AKHIR'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
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

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// MA_PELB
		$this->MA_PELB->EditAttrs["class"] = "form-control";
		$this->MA_PELB->EditCustomAttributes = "";

		// NO_PPK1
		$this->NO_PPK1->EditAttrs["class"] = "form-control";
		$this->NO_PPK1->EditCustomAttributes = "";
		$this->NO_PPK1->EditValue = $this->NO_PPK1->CurrentValue;
		$this->NO_PPK1->PlaceHolder = RemoveHtml($this->NO_PPK1->caption());

		// PERIODE
		$this->PERIODE->EditAttrs["class"] = "form-control";
		$this->PERIODE->EditCustomAttributes = "";

		// NAMA_KAPAL
		$this->NAMA_KAPAL->EditAttrs["class"] = "form-control";
		$this->NAMA_KAPAL->EditCustomAttributes = "";

		// MKPL_JENIS
		$this->MKPL_JENIS->EditAttrs["class"] = "form-control";
		$this->MKPL_JENIS->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->MKPL_JENIS->CurrentValue = HtmlDecode($this->MKPL_JENIS->CurrentValue);
		$this->MKPL_JENIS->EditValue = $this->MKPL_JENIS->CurrentValue;
		$this->MKPL_JENIS->PlaceHolder = RemoveHtml($this->MKPL_JENIS->caption());

		// GT_KAPAL
		$this->GT_KAPAL->EditAttrs["class"] = "form-control";
		$this->GT_KAPAL->EditCustomAttributes = "";
		$this->GT_KAPAL->EditValue = $this->GT_KAPAL->CurrentValue;
		$this->GT_KAPAL->PlaceHolder = RemoveHtml($this->GT_KAPAL->caption());

		// LOA
		$this->LOA->EditAttrs["class"] = "form-control";
		$this->LOA->EditCustomAttributes = "";
		$this->LOA->EditValue = $this->LOA->CurrentValue;
		$this->LOA->PlaceHolder = RemoveHtml($this->LOA->caption());
		if (strval($this->LOA->EditValue) <> "" && is_numeric($this->LOA->EditValue))
			$this->LOA->EditValue = FormatNumber($this->LOA->EditValue, -2, -2, -2, -2);

		// JASA
		$this->JASA->EditAttrs["class"] = "form-control";
		$this->JASA->EditCustomAttributes = "";

		// JENIS_GERAKAN
		$this->JENIS_GERAKAN->EditAttrs["class"] = "form-control";
		$this->JENIS_GERAKAN->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->JENIS_GERAKAN->CurrentValue = HtmlDecode($this->JENIS_GERAKAN->CurrentValue);
		$this->JENIS_GERAKAN->EditValue = $this->JENIS_GERAKAN->CurrentValue;
		$this->JENIS_GERAKAN->PlaceHolder = RemoveHtml($this->JENIS_GERAKAN->caption());

		// BENDERA
		$this->BENDERA->EditAttrs["class"] = "form-control";
		$this->BENDERA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->BENDERA->CurrentValue = HtmlDecode($this->BENDERA->CurrentValue);
		$this->BENDERA->EditValue = $this->BENDERA->CurrentValue;
		$this->BENDERA->PlaceHolder = RemoveHtml($this->BENDERA->caption());

		// TGL_MULAI_REA
		$this->TGL_MULAI_REA->EditAttrs["class"] = "form-control";
		$this->TGL_MULAI_REA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TGL_MULAI_REA->CurrentValue = HtmlDecode($this->TGL_MULAI_REA->CurrentValue);
		$this->TGL_MULAI_REA->EditValue = $this->TGL_MULAI_REA->CurrentValue;
		$this->TGL_MULAI_REA->PlaceHolder = RemoveHtml($this->TGL_MULAI_REA->caption());

		// TGL_SELESAI_REA
		$this->TGL_SELESAI_REA->EditAttrs["class"] = "form-control";
		$this->TGL_SELESAI_REA->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->TGL_SELESAI_REA->CurrentValue = HtmlDecode($this->TGL_SELESAI_REA->CurrentValue);
		$this->TGL_SELESAI_REA->EditValue = $this->TGL_SELESAI_REA->CurrentValue;
		$this->TGL_SELESAI_REA->PlaceHolder = RemoveHtml($this->TGL_SELESAI_REA->caption());

		// LOKASI_AWAL
		$this->LOKASI_AWAL->EditAttrs["class"] = "form-control";
		$this->LOKASI_AWAL->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->LOKASI_AWAL->CurrentValue = HtmlDecode($this->LOKASI_AWAL->CurrentValue);
		$this->LOKASI_AWAL->EditValue = $this->LOKASI_AWAL->CurrentValue;
		$this->LOKASI_AWAL->PlaceHolder = RemoveHtml($this->LOKASI_AWAL->caption());

		// LOKASI_AKHIR
		$this->LOKASI_AKHIR->EditAttrs["class"] = "form-control";
		$this->LOKASI_AKHIR->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->LOKASI_AKHIR->CurrentValue = HtmlDecode($this->LOKASI_AKHIR->CurrentValue);
		$this->LOKASI_AKHIR->EditValue = $this->LOKASI_AKHIR->CurrentValue;
		$this->LOKASI_AKHIR->PlaceHolder = RemoveHtml($this->LOKASI_AKHIR->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->MA_PELB);
					$doc->exportCaption($this->NO_PPK1);
					$doc->exportCaption($this->PERIODE);
					$doc->exportCaption($this->NAMA_KAPAL);
					$doc->exportCaption($this->MKPL_JENIS);
					$doc->exportCaption($this->GT_KAPAL);
					$doc->exportCaption($this->LOA);
					$doc->exportCaption($this->JASA);
					$doc->exportCaption($this->JENIS_GERAKAN);
					$doc->exportCaption($this->BENDERA);
					$doc->exportCaption($this->TGL_MULAI_REA);
					$doc->exportCaption($this->TGL_SELESAI_REA);
					$doc->exportCaption($this->LOKASI_AWAL);
					$doc->exportCaption($this->LOKASI_AKHIR);
				} else {
					$doc->exportCaption($this->MA_PELB);
					$doc->exportCaption($this->NO_PPK1);
					$doc->exportCaption($this->PERIODE);
					$doc->exportCaption($this->NAMA_KAPAL);
					$doc->exportCaption($this->MKPL_JENIS);
					$doc->exportCaption($this->GT_KAPAL);
					$doc->exportCaption($this->LOA);
					$doc->exportCaption($this->JASA);
					$doc->exportCaption($this->JENIS_GERAKAN);
					$doc->exportCaption($this->BENDERA);
					$doc->exportCaption($this->TGL_MULAI_REA);
					$doc->exportCaption($this->TGL_SELESAI_REA);
					$doc->exportCaption($this->LOKASI_AWAL);
					$doc->exportCaption($this->LOKASI_AKHIR);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->MA_PELB);
						$doc->exportField($this->NO_PPK1);
						$doc->exportField($this->PERIODE);
						$doc->exportField($this->NAMA_KAPAL);
						$doc->exportField($this->MKPL_JENIS);
						$doc->exportField($this->GT_KAPAL);
						$doc->exportField($this->LOA);
						$doc->exportField($this->JASA);
						$doc->exportField($this->JENIS_GERAKAN);
						$doc->exportField($this->BENDERA);
						$doc->exportField($this->TGL_MULAI_REA);
						$doc->exportField($this->TGL_SELESAI_REA);
						$doc->exportField($this->LOKASI_AWAL);
						$doc->exportField($this->LOKASI_AKHIR);
					} else {
						$doc->exportField($this->MA_PELB);
						$doc->exportField($this->NO_PPK1);
						$doc->exportField($this->PERIODE);
						$doc->exportField($this->NAMA_KAPAL);
						$doc->exportField($this->MKPL_JENIS);
						$doc->exportField($this->GT_KAPAL);
						$doc->exportField($this->LOA);
						$doc->exportField($this->JASA);
						$doc->exportField($this->JENIS_GERAKAN);
						$doc->exportField($this->BENDERA);
						$doc->exportField($this->TGL_MULAI_REA);
						$doc->exportField($this->TGL_SELESAI_REA);
						$doc->exportField($this->LOKASI_AWAL);
						$doc->exportField($this->LOKASI_AKHIR);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));

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
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
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
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
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
}
?>