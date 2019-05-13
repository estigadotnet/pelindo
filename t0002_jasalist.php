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
$t0002_jasa_list = new t0002_jasa_list();

// Run the page
$t0002_jasa_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0002_jasa_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0002_jasa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0002_jasalist = currentForm = new ew.Form("ft0002_jasalist", "list");
ft0002_jasalist.formKeyCountName = '<?php echo $t0002_jasa_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0002_jasalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0002_jasalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0002_jasalistsrch = currentSearchForm = new ew.Form("ft0002_jasalistsrch");

// Filters
ft0002_jasalistsrch.filterList = <?php echo $t0002_jasa_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0002_jasa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0002_jasa_list->TotalRecs > 0 && $t0002_jasa_list->ExportOptions->visible()) { ?>
<?php $t0002_jasa_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0002_jasa_list->ImportOptions->visible()) { ?>
<?php $t0002_jasa_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0002_jasa_list->SearchOptions->visible()) { ?>
<?php $t0002_jasa_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0002_jasa_list->FilterOptions->visible()) { ?>
<?php $t0002_jasa_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0002_jasa_list->renderOtherOptions();
?>
<?php if (!$t0002_jasa->isExport() && !$t0002_jasa->CurrentAction) { ?>
<form name="ft0002_jasalistsrch" id="ft0002_jasalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0002_jasa_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0002_jasalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0002_jasa">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0002_jasa_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0002_jasa_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0002_jasa_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0002_jasa_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0002_jasa_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0002_jasa_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0002_jasa_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $t0002_jasa_list->showPageHeader(); ?>
<?php
$t0002_jasa_list->showMessage();
?>
<?php if ($t0002_jasa_list->TotalRecs > 0 || $t0002_jasa->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0002_jasa_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0002_jasa">
<form name="ft0002_jasalist" id="ft0002_jasalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0002_jasa_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0002_jasa_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0002_jasa">
<div id="gmp_t0002_jasa" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0002_jasa_list->TotalRecs > 0 || $t0002_jasa->isGridEdit()) { ?>
<table id="tbl_t0002_jasalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0002_jasa_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0002_jasa_list->renderListOptions();

// Render list options (header, left)
$t0002_jasa_list->ListOptions->render("header", "left");
?>
<?php if ($t0002_jasa->id->Visible) { // id ?>
	<?php if ($t0002_jasa->sortUrl($t0002_jasa->id) == "") { ?>
		<th data-name="id" class="<?php echo $t0002_jasa->id->headerCellClass() ?>"><div id="elh_t0002_jasa_id" class="t0002_jasa_id"><div class="ew-table-header-caption"><?php echo $t0002_jasa->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t0002_jasa->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0002_jasa->SortUrl($t0002_jasa->id) ?>',1);"><div id="elh_t0002_jasa_id" class="t0002_jasa_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0002_jasa->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0002_jasa->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0002_jasa->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0002_jasa->jasa->Visible) { // jasa ?>
	<?php if ($t0002_jasa->sortUrl($t0002_jasa->jasa) == "") { ?>
		<th data-name="jasa" class="<?php echo $t0002_jasa->jasa->headerCellClass() ?>"><div id="elh_t0002_jasa_jasa" class="t0002_jasa_jasa"><div class="ew-table-header-caption"><?php echo $t0002_jasa->jasa->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jasa" class="<?php echo $t0002_jasa->jasa->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0002_jasa->SortUrl($t0002_jasa->jasa) ?>',1);"><div id="elh_t0002_jasa_jasa" class="t0002_jasa_jasa">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0002_jasa->jasa->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0002_jasa->jasa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0002_jasa->jasa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0002_jasa_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0002_jasa->ExportAll && $t0002_jasa->isExport()) {
	$t0002_jasa_list->StopRec = $t0002_jasa_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0002_jasa_list->TotalRecs > $t0002_jasa_list->StartRec + $t0002_jasa_list->DisplayRecs - 1)
		$t0002_jasa_list->StopRec = $t0002_jasa_list->StartRec + $t0002_jasa_list->DisplayRecs - 1;
	else
		$t0002_jasa_list->StopRec = $t0002_jasa_list->TotalRecs;
}
$t0002_jasa_list->RecCnt = $t0002_jasa_list->StartRec - 1;
if ($t0002_jasa_list->Recordset && !$t0002_jasa_list->Recordset->EOF) {
	$t0002_jasa_list->Recordset->moveFirst();
	$selectLimit = $t0002_jasa_list->UseSelectLimit;
	if (!$selectLimit && $t0002_jasa_list->StartRec > 1)
		$t0002_jasa_list->Recordset->move($t0002_jasa_list->StartRec - 1);
} elseif (!$t0002_jasa->AllowAddDeleteRow && $t0002_jasa_list->StopRec == 0) {
	$t0002_jasa_list->StopRec = $t0002_jasa->GridAddRowCount;
}

// Initialize aggregate
$t0002_jasa->RowType = ROWTYPE_AGGREGATEINIT;
$t0002_jasa->resetAttributes();
$t0002_jasa_list->renderRow();
while ($t0002_jasa_list->RecCnt < $t0002_jasa_list->StopRec) {
	$t0002_jasa_list->RecCnt++;
	if ($t0002_jasa_list->RecCnt >= $t0002_jasa_list->StartRec) {
		$t0002_jasa_list->RowCnt++;

		// Set up key count
		$t0002_jasa_list->KeyCount = $t0002_jasa_list->RowIndex;

		// Init row class and style
		$t0002_jasa->resetAttributes();
		$t0002_jasa->CssClass = "";
		if ($t0002_jasa->isGridAdd()) {
		} else {
			$t0002_jasa_list->loadRowValues($t0002_jasa_list->Recordset); // Load row values
		}
		$t0002_jasa->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0002_jasa->RowAttrs = array_merge($t0002_jasa->RowAttrs, array('data-rowindex'=>$t0002_jasa_list->RowCnt, 'id'=>'r' . $t0002_jasa_list->RowCnt . '_t0002_jasa', 'data-rowtype'=>$t0002_jasa->RowType));

		// Render row
		$t0002_jasa_list->renderRow();

		// Render list options
		$t0002_jasa_list->renderListOptions();
?>
	<tr<?php echo $t0002_jasa->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0002_jasa_list->ListOptions->render("body", "left", $t0002_jasa_list->RowCnt);
?>
	<?php if ($t0002_jasa->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t0002_jasa->id->cellAttributes() ?>>
<span id="el<?php echo $t0002_jasa_list->RowCnt ?>_t0002_jasa_id" class="t0002_jasa_id">
<span<?php echo $t0002_jasa->id->viewAttributes() ?>>
<?php echo $t0002_jasa->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0002_jasa->jasa->Visible) { // jasa ?>
		<td data-name="jasa"<?php echo $t0002_jasa->jasa->cellAttributes() ?>>
<span id="el<?php echo $t0002_jasa_list->RowCnt ?>_t0002_jasa_jasa" class="t0002_jasa_jasa">
<span<?php echo $t0002_jasa->jasa->viewAttributes() ?>>
<?php echo $t0002_jasa->jasa->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0002_jasa_list->ListOptions->render("body", "right", $t0002_jasa_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0002_jasa->isGridAdd())
		$t0002_jasa_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0002_jasa->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0002_jasa_list->Recordset)
	$t0002_jasa_list->Recordset->Close();
?>
<?php if (!$t0002_jasa->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0002_jasa->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0002_jasa_list->Pager)) $t0002_jasa_list->Pager = new PrevNextPager($t0002_jasa_list->StartRec, $t0002_jasa_list->DisplayRecs, $t0002_jasa_list->TotalRecs, $t0002_jasa_list->AutoHidePager) ?>
<?php if ($t0002_jasa_list->Pager->RecordCount > 0 && $t0002_jasa_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0002_jasa_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0002_jasa_list->pageUrl() ?>start=<?php echo $t0002_jasa_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0002_jasa_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0002_jasa_list->pageUrl() ?>start=<?php echo $t0002_jasa_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0002_jasa_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0002_jasa_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0002_jasa_list->pageUrl() ?>start=<?php echo $t0002_jasa_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0002_jasa_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0002_jasa_list->pageUrl() ?>start=<?php echo $t0002_jasa_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0002_jasa_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0002_jasa_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0002_jasa_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0002_jasa_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0002_jasa_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0002_jasa_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0002_jasa_list->TotalRecs == 0 && !$t0002_jasa->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0002_jasa_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0002_jasa_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0002_jasa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0002_jasa_list->terminate();
?>