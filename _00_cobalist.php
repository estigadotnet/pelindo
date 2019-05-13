<?php
namespace PHPMaker2019\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$_00_coba_list = new _00_coba_list();

// Run the page
$_00_coba_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_00_coba_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_00_coba->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var f_00_cobalist = currentForm = new ew.Form("f_00_cobalist", "list");
f_00_cobalist.formKeyCountName = '<?php echo $_00_coba_list->FormKeyCountName ?>';

// Form_CustomValidate event
f_00_cobalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_00_cobalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_00_cobalist.lists["x_kode1"] = <?php echo $_00_coba_list->kode1->Lookup->toClientList() ?>;
f_00_cobalist.lists["x_kode1"].options = <?php echo JsonEncode($_00_coba_list->kode1->lookupOptions()) ?>;

// Form object for search
var f_00_cobalistsrch = currentSearchForm = new ew.Form("f_00_cobalistsrch");

// Validate function for search
f_00_cobalistsrch.validate = function(fobj) {
	if (!this.validateRequired)
		return true; // Ignore validation
	fobj = fobj || this._form;
	var infix = "";

	// Fire Form_CustomValidate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate event
f_00_cobalistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_00_cobalistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_00_cobalistsrch.lists["x_kode1"] = <?php echo $_00_coba_list->kode1->Lookup->toClientList() ?>;
f_00_cobalistsrch.lists["x_kode1"].options = <?php echo JsonEncode($_00_coba_list->kode1->lookupOptions()) ?>;

// Filters
f_00_cobalistsrch.filterList = <?php echo $_00_coba_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$_00_coba->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_00_coba_list->TotalRecs > 0 && $_00_coba_list->ExportOptions->visible()) { ?>
<?php $_00_coba_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_00_coba_list->ImportOptions->visible()) { ?>
<?php $_00_coba_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_00_coba_list->SearchOptions->visible()) { ?>
<?php $_00_coba_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_00_coba_list->FilterOptions->visible()) { ?>
<?php $_00_coba_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_00_coba_list->renderOtherOptions();
?>
<?php if (!$_00_coba->isExport() && !$_00_coba->CurrentAction) { ?>
<form name="f_00_cobalistsrch" id="f_00_cobalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($_00_coba_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="f_00_cobalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_00_coba">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$_00_coba_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$_00_coba->RowType = ROWTYPE_SEARCH;

// Render row
$_00_coba->resetAttributes();
$_00_coba_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($_00_coba->kode1->Visible) { // kode1 ?>
	<div id="xsc_kode1" class="ew-cell form-group">
		<label for="x_kode1" class="ew-search-caption ew-label"><?php echo $_00_coba->kode1->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_kode1" id="z_kode1" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_00_coba" data-field="x_kode1" data-value-separator="<?php echo $_00_coba->kode1->displayValueSeparatorAttribute() ?>" id="x_kode1" name="x_kode1"<?php echo $_00_coba->kode1->editAttributes() ?>>
		<?php echo $_00_coba->kode1->selectOptionListHtml("x_kode1") ?>
	</select>
</div>
<?php echo $_00_coba->kode1->Lookup->getParamTag("p_x_kode1") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $_00_coba_list->showPageHeader(); ?>
<?php
$_00_coba_list->showMessage();
?>
<?php if ($_00_coba_list->TotalRecs > 0 || $_00_coba->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_00_coba_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _00_coba">
<form name="f_00_cobalist" id="f_00_cobalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_00_coba_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_00_coba_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_00_coba">
<div id="gmp__00_coba" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($_00_coba_list->TotalRecs > 0 || $_00_coba->isGridEdit()) { ?>
<table id="tbl__00_cobalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_00_coba_list->RowType = ROWTYPE_HEADER;

// Render list options
$_00_coba_list->renderListOptions();

// Render list options (header, left)
$_00_coba_list->ListOptions->render("header", "left");
?>
<?php if ($_00_coba->kode1->Visible) { // kode1 ?>
	<?php if ($_00_coba->sortUrl($_00_coba->kode1) == "") { ?>
		<th data-name="kode1" class="<?php echo $_00_coba->kode1->headerCellClass() ?>"><div id="elh__00_coba_kode1" class="_00_coba_kode1"><div class="ew-table-header-caption"><?php echo $_00_coba->kode1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode1" class="<?php echo $_00_coba->kode1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_00_coba->SortUrl($_00_coba->kode1) ?>',1);"><div id="elh__00_coba_kode1" class="_00_coba_kode1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_00_coba->kode1->caption() ?></span><span class="ew-table-header-sort"><?php if ($_00_coba->kode1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_00_coba->kode1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_00_coba->kode2->Visible) { // kode2 ?>
	<?php if ($_00_coba->sortUrl($_00_coba->kode2) == "") { ?>
		<th data-name="kode2" class="<?php echo $_00_coba->kode2->headerCellClass() ?>"><div id="elh__00_coba_kode2" class="_00_coba_kode2"><div class="ew-table-header-caption"><?php echo $_00_coba->kode2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode2" class="<?php echo $_00_coba->kode2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_00_coba->SortUrl($_00_coba->kode2) ?>',1);"><div id="elh__00_coba_kode2" class="_00_coba_kode2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_00_coba->kode2->caption() ?></span><span class="ew-table-header-sort"><?php if ($_00_coba->kode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_00_coba->kode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_00_coba->kode3->Visible) { // kode3 ?>
	<?php if ($_00_coba->sortUrl($_00_coba->kode3) == "") { ?>
		<th data-name="kode3" class="<?php echo $_00_coba->kode3->headerCellClass() ?>"><div id="elh__00_coba_kode3" class="_00_coba_kode3"><div class="ew-table-header-caption"><?php echo $_00_coba->kode3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode3" class="<?php echo $_00_coba->kode3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_00_coba->SortUrl($_00_coba->kode3) ?>',1);"><div id="elh__00_coba_kode3" class="_00_coba_kode3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_00_coba->kode3->caption() ?></span><span class="ew-table-header-sort"><?php if ($_00_coba->kode3->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_00_coba->kode3->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_00_coba->kode4->Visible) { // kode4 ?>
	<?php if ($_00_coba->sortUrl($_00_coba->kode4) == "") { ?>
		<th data-name="kode4" class="<?php echo $_00_coba->kode4->headerCellClass() ?>"><div id="elh__00_coba_kode4" class="_00_coba_kode4"><div class="ew-table-header-caption"><?php echo $_00_coba->kode4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kode4" class="<?php echo $_00_coba->kode4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_00_coba->SortUrl($_00_coba->kode4) ?>',1);"><div id="elh__00_coba_kode4" class="_00_coba_kode4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_00_coba->kode4->caption() ?></span><span class="ew-table-header-sort"><?php if ($_00_coba->kode4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_00_coba->kode4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_00_coba_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_00_coba->ExportAll && $_00_coba->isExport()) {
	$_00_coba_list->StopRec = $_00_coba_list->TotalRecs;
} else {

	// Set the last record to display
	if ($_00_coba_list->TotalRecs > $_00_coba_list->StartRec + $_00_coba_list->DisplayRecs - 1)
		$_00_coba_list->StopRec = $_00_coba_list->StartRec + $_00_coba_list->DisplayRecs - 1;
	else
		$_00_coba_list->StopRec = $_00_coba_list->TotalRecs;
}
$_00_coba_list->RecCnt = $_00_coba_list->StartRec - 1;
if ($_00_coba_list->Recordset && !$_00_coba_list->Recordset->EOF) {
	$_00_coba_list->Recordset->moveFirst();
	$selectLimit = $_00_coba_list->UseSelectLimit;
	if (!$selectLimit && $_00_coba_list->StartRec > 1)
		$_00_coba_list->Recordset->move($_00_coba_list->StartRec - 1);
} elseif (!$_00_coba->AllowAddDeleteRow && $_00_coba_list->StopRec == 0) {
	$_00_coba_list->StopRec = $_00_coba->GridAddRowCount;
}

// Initialize aggregate
$_00_coba->RowType = ROWTYPE_AGGREGATEINIT;
$_00_coba->resetAttributes();
$_00_coba_list->renderRow();
while ($_00_coba_list->RecCnt < $_00_coba_list->StopRec) {
	$_00_coba_list->RecCnt++;
	if ($_00_coba_list->RecCnt >= $_00_coba_list->StartRec) {
		$_00_coba_list->RowCnt++;

		// Set up key count
		$_00_coba_list->KeyCount = $_00_coba_list->RowIndex;

		// Init row class and style
		$_00_coba->resetAttributes();
		$_00_coba->CssClass = "";
		if ($_00_coba->isGridAdd()) {
		} else {
			$_00_coba_list->loadRowValues($_00_coba_list->Recordset); // Load row values
		}
		$_00_coba->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_00_coba->RowAttrs = array_merge($_00_coba->RowAttrs, array('data-rowindex'=>$_00_coba_list->RowCnt, 'id'=>'r' . $_00_coba_list->RowCnt . '__00_coba', 'data-rowtype'=>$_00_coba->RowType));

		// Render row
		$_00_coba_list->renderRow();

		// Render list options
		$_00_coba_list->renderListOptions();
?>
	<tr<?php echo $_00_coba->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_00_coba_list->ListOptions->render("body", "left", $_00_coba_list->RowCnt);
?>
	<?php if ($_00_coba->kode1->Visible) { // kode1 ?>
		<td data-name="kode1"<?php echo $_00_coba->kode1->cellAttributes() ?>>
<span id="el<?php echo $_00_coba_list->RowCnt ?>__00_coba_kode1" class="_00_coba_kode1">
<span<?php echo $_00_coba->kode1->viewAttributes() ?>>
<?php echo $_00_coba->kode1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_00_coba->kode2->Visible) { // kode2 ?>
		<td data-name="kode2"<?php echo $_00_coba->kode2->cellAttributes() ?>>
<span id="el<?php echo $_00_coba_list->RowCnt ?>__00_coba_kode2" class="_00_coba_kode2">
<span<?php echo $_00_coba->kode2->viewAttributes() ?>>
<?php echo $_00_coba->kode2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_00_coba->kode3->Visible) { // kode3 ?>
		<td data-name="kode3"<?php echo $_00_coba->kode3->cellAttributes() ?>>
<span id="el<?php echo $_00_coba_list->RowCnt ?>__00_coba_kode3" class="_00_coba_kode3">
<span<?php echo $_00_coba->kode3->viewAttributes() ?>>
<?php echo $_00_coba->kode3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_00_coba->kode4->Visible) { // kode4 ?>
		<td data-name="kode4"<?php echo $_00_coba->kode4->cellAttributes() ?>>
<span id="el<?php echo $_00_coba_list->RowCnt ?>__00_coba_kode4" class="_00_coba_kode4">
<span<?php echo $_00_coba->kode4->viewAttributes() ?>>
<?php echo $_00_coba->kode4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_00_coba_list->ListOptions->render("body", "right", $_00_coba_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$_00_coba->isGridAdd())
		$_00_coba_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$_00_coba->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_00_coba_list->Recordset)
	$_00_coba_list->Recordset->Close();
?>
<?php if (!$_00_coba->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_00_coba->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_00_coba_list->Pager)) $_00_coba_list->Pager = new PrevNextPager($_00_coba_list->StartRec, $_00_coba_list->DisplayRecs, $_00_coba_list->TotalRecs, $_00_coba_list->AutoHidePager) ?>
<?php if ($_00_coba_list->Pager->RecordCount > 0 && $_00_coba_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($_00_coba_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $_00_coba_list->pageUrl() ?>start=<?php echo $_00_coba_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($_00_coba_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $_00_coba_list->pageUrl() ?>start=<?php echo $_00_coba_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $_00_coba_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($_00_coba_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $_00_coba_list->pageUrl() ?>start=<?php echo $_00_coba_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($_00_coba_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $_00_coba_list->pageUrl() ?>start=<?php echo $_00_coba_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $_00_coba_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($_00_coba_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_00_coba_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_00_coba_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_00_coba_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_00_coba_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_00_coba_list->TotalRecs == 0 && !$_00_coba->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_00_coba_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_00_coba_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_00_coba->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_00_coba_list->terminate();
?>