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
$_0001_pelabuhan_list = new _0001_pelabuhan_list();

// Run the page
$_0001_pelabuhan_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_0001_pelabuhan_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_0001_pelabuhan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var f_0001_pelabuhanlist = currentForm = new ew.Form("f_0001_pelabuhanlist", "list");
f_0001_pelabuhanlist.formKeyCountName = '<?php echo $_0001_pelabuhan_list->FormKeyCountName ?>';

// Form_CustomValidate event
f_0001_pelabuhanlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_0001_pelabuhanlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var f_0001_pelabuhanlistsrch = currentSearchForm = new ew.Form("f_0001_pelabuhanlistsrch");

// Filters
f_0001_pelabuhanlistsrch.filterList = <?php echo $_0001_pelabuhan_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$_0001_pelabuhan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($_0001_pelabuhan_list->TotalRecs > 0 && $_0001_pelabuhan_list->ExportOptions->visible()) { ?>
<?php $_0001_pelabuhan_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($_0001_pelabuhan_list->ImportOptions->visible()) { ?>
<?php $_0001_pelabuhan_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($_0001_pelabuhan_list->SearchOptions->visible()) { ?>
<?php $_0001_pelabuhan_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($_0001_pelabuhan_list->FilterOptions->visible()) { ?>
<?php $_0001_pelabuhan_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$_0001_pelabuhan_list->renderOtherOptions();
?>
<?php if (!$_0001_pelabuhan->isExport() && !$_0001_pelabuhan->CurrentAction) { ?>
<form name="f_0001_pelabuhanlistsrch" id="f_0001_pelabuhanlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($_0001_pelabuhan_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="f_0001_pelabuhanlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="_0001_pelabuhan">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($_0001_pelabuhan_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($_0001_pelabuhan_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $_0001_pelabuhan_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($_0001_pelabuhan_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($_0001_pelabuhan_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($_0001_pelabuhan_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($_0001_pelabuhan_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $_0001_pelabuhan_list->showPageHeader(); ?>
<?php
$_0001_pelabuhan_list->showMessage();
?>
<?php if ($_0001_pelabuhan_list->TotalRecs > 0 || $_0001_pelabuhan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_0001_pelabuhan_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _0001_pelabuhan">
<form name="f_0001_pelabuhanlist" id="f_0001_pelabuhanlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_0001_pelabuhan_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_0001_pelabuhan_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_0001_pelabuhan">
<div id="gmp__0001_pelabuhan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($_0001_pelabuhan_list->TotalRecs > 0 || $_0001_pelabuhan->isGridEdit()) { ?>
<table id="tbl__0001_pelabuhanlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_0001_pelabuhan_list->RowType = ROWTYPE_HEADER;

// Render list options
$_0001_pelabuhan_list->renderListOptions();

// Render list options (header, left)
$_0001_pelabuhan_list->ListOptions->render("header", "left");
?>
<?php if ($_0001_pelabuhan->id->Visible) { // id ?>
	<?php if ($_0001_pelabuhan->sortUrl($_0001_pelabuhan->id) == "") { ?>
		<th data-name="id" class="<?php echo $_0001_pelabuhan->id->headerCellClass() ?>"><div id="elh__0001_pelabuhan_id" class="_0001_pelabuhan_id"><div class="ew-table-header-caption"><?php echo $_0001_pelabuhan->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_0001_pelabuhan->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_0001_pelabuhan->SortUrl($_0001_pelabuhan->id) ?>',1);"><div id="elh__0001_pelabuhan_id" class="_0001_pelabuhan_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_0001_pelabuhan->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_0001_pelabuhan->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_0001_pelabuhan->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_0001_pelabuhan->pelabuhan->Visible) { // pelabuhan ?>
	<?php if ($_0001_pelabuhan->sortUrl($_0001_pelabuhan->pelabuhan) == "") { ?>
		<th data-name="pelabuhan" class="<?php echo $_0001_pelabuhan->pelabuhan->headerCellClass() ?>"><div id="elh__0001_pelabuhan_pelabuhan" class="_0001_pelabuhan_pelabuhan"><div class="ew-table-header-caption"><?php echo $_0001_pelabuhan->pelabuhan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="pelabuhan" class="<?php echo $_0001_pelabuhan->pelabuhan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $_0001_pelabuhan->SortUrl($_0001_pelabuhan->pelabuhan) ?>',1);"><div id="elh__0001_pelabuhan_pelabuhan" class="_0001_pelabuhan_pelabuhan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_0001_pelabuhan->pelabuhan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($_0001_pelabuhan->pelabuhan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_0001_pelabuhan->pelabuhan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_0001_pelabuhan_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($_0001_pelabuhan->ExportAll && $_0001_pelabuhan->isExport()) {
	$_0001_pelabuhan_list->StopRec = $_0001_pelabuhan_list->TotalRecs;
} else {

	// Set the last record to display
	if ($_0001_pelabuhan_list->TotalRecs > $_0001_pelabuhan_list->StartRec + $_0001_pelabuhan_list->DisplayRecs - 1)
		$_0001_pelabuhan_list->StopRec = $_0001_pelabuhan_list->StartRec + $_0001_pelabuhan_list->DisplayRecs - 1;
	else
		$_0001_pelabuhan_list->StopRec = $_0001_pelabuhan_list->TotalRecs;
}
$_0001_pelabuhan_list->RecCnt = $_0001_pelabuhan_list->StartRec - 1;
if ($_0001_pelabuhan_list->Recordset && !$_0001_pelabuhan_list->Recordset->EOF) {
	$_0001_pelabuhan_list->Recordset->moveFirst();
	$selectLimit = $_0001_pelabuhan_list->UseSelectLimit;
	if (!$selectLimit && $_0001_pelabuhan_list->StartRec > 1)
		$_0001_pelabuhan_list->Recordset->move($_0001_pelabuhan_list->StartRec - 1);
} elseif (!$_0001_pelabuhan->AllowAddDeleteRow && $_0001_pelabuhan_list->StopRec == 0) {
	$_0001_pelabuhan_list->StopRec = $_0001_pelabuhan->GridAddRowCount;
}

// Initialize aggregate
$_0001_pelabuhan->RowType = ROWTYPE_AGGREGATEINIT;
$_0001_pelabuhan->resetAttributes();
$_0001_pelabuhan_list->renderRow();
while ($_0001_pelabuhan_list->RecCnt < $_0001_pelabuhan_list->StopRec) {
	$_0001_pelabuhan_list->RecCnt++;
	if ($_0001_pelabuhan_list->RecCnt >= $_0001_pelabuhan_list->StartRec) {
		$_0001_pelabuhan_list->RowCnt++;

		// Set up key count
		$_0001_pelabuhan_list->KeyCount = $_0001_pelabuhan_list->RowIndex;

		// Init row class and style
		$_0001_pelabuhan->resetAttributes();
		$_0001_pelabuhan->CssClass = "";
		if ($_0001_pelabuhan->isGridAdd()) {
		} else {
			$_0001_pelabuhan_list->loadRowValues($_0001_pelabuhan_list->Recordset); // Load row values
		}
		$_0001_pelabuhan->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$_0001_pelabuhan->RowAttrs = array_merge($_0001_pelabuhan->RowAttrs, array('data-rowindex'=>$_0001_pelabuhan_list->RowCnt, 'id'=>'r' . $_0001_pelabuhan_list->RowCnt . '__0001_pelabuhan', 'data-rowtype'=>$_0001_pelabuhan->RowType));

		// Render row
		$_0001_pelabuhan_list->renderRow();

		// Render list options
		$_0001_pelabuhan_list->renderListOptions();
?>
	<tr<?php echo $_0001_pelabuhan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_0001_pelabuhan_list->ListOptions->render("body", "left", $_0001_pelabuhan_list->RowCnt);
?>
	<?php if ($_0001_pelabuhan->id->Visible) { // id ?>
		<td data-name="id"<?php echo $_0001_pelabuhan->id->cellAttributes() ?>>
<span id="el<?php echo $_0001_pelabuhan_list->RowCnt ?>__0001_pelabuhan_id" class="_0001_pelabuhan_id">
<span<?php echo $_0001_pelabuhan->id->viewAttributes() ?>>
<?php echo $_0001_pelabuhan->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($_0001_pelabuhan->pelabuhan->Visible) { // pelabuhan ?>
		<td data-name="pelabuhan"<?php echo $_0001_pelabuhan->pelabuhan->cellAttributes() ?>>
<span id="el<?php echo $_0001_pelabuhan_list->RowCnt ?>__0001_pelabuhan_pelabuhan" class="_0001_pelabuhan_pelabuhan">
<span<?php echo $_0001_pelabuhan->pelabuhan->viewAttributes() ?>>
<?php echo $_0001_pelabuhan->pelabuhan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_0001_pelabuhan_list->ListOptions->render("body", "right", $_0001_pelabuhan_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$_0001_pelabuhan->isGridAdd())
		$_0001_pelabuhan_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$_0001_pelabuhan->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($_0001_pelabuhan_list->Recordset)
	$_0001_pelabuhan_list->Recordset->Close();
?>
<?php if (!$_0001_pelabuhan->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$_0001_pelabuhan->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($_0001_pelabuhan_list->Pager)) $_0001_pelabuhan_list->Pager = new PrevNextPager($_0001_pelabuhan_list->StartRec, $_0001_pelabuhan_list->DisplayRecs, $_0001_pelabuhan_list->TotalRecs, $_0001_pelabuhan_list->AutoHidePager) ?>
<?php if ($_0001_pelabuhan_list->Pager->RecordCount > 0 && $_0001_pelabuhan_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($_0001_pelabuhan_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $_0001_pelabuhan_list->pageUrl() ?>start=<?php echo $_0001_pelabuhan_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($_0001_pelabuhan_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $_0001_pelabuhan_list->pageUrl() ?>start=<?php echo $_0001_pelabuhan_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $_0001_pelabuhan_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($_0001_pelabuhan_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $_0001_pelabuhan_list->pageUrl() ?>start=<?php echo $_0001_pelabuhan_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($_0001_pelabuhan_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $_0001_pelabuhan_list->pageUrl() ?>start=<?php echo $_0001_pelabuhan_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $_0001_pelabuhan_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($_0001_pelabuhan_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $_0001_pelabuhan_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $_0001_pelabuhan_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $_0001_pelabuhan_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $_0001_pelabuhan_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_0001_pelabuhan_list->TotalRecs == 0 && !$_0001_pelabuhan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_0001_pelabuhan_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_0001_pelabuhan_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_0001_pelabuhan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_0001_pelabuhan_list->terminate();
?>