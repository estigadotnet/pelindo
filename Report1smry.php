<?php
namespace PHPReportMaker12\pelindo_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($Report1_summary))
	$Report1_summary = new Report1_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$Report1_summary;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<script>
currentPageID = ew.PAGE_ID = "summary"; // Page ID
</script>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fReport1summary = currentForm = new ew.Form("fReport1summary");

// Validate method
fReport1summary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fReport1summary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fReport1summary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fReport1summary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fReport1summary.lists["x_MA_PELB"] = <?php echo $Report1_summary->MA_PELB->Lookup->toClientList() ?>;
fReport1summary.lists["x_MA_PELB"].options = <?php echo JsonEncode($Report1_summary->MA_PELB->lookupOptions()) ?>;
fReport1summary.lists["x_MKPL_JENIS"] = <?php echo $Report1_summary->MKPL_JENIS->Lookup->toClientList() ?>;
fReport1summary.lists["x_MKPL_JENIS"].options = <?php echo JsonEncode($Report1_summary->MKPL_JENIS->lookupOptions()) ?>;
fReport1summary.lists["x_JASA"] = <?php echo $Report1_summary->JASA->Lookup->toClientList() ?>;
fReport1summary.lists["x_JASA"].options = <?php echo JsonEncode($Report1_summary->JASA->lookupOptions()) ?>;
fReport1summary.lists["x_periode2"] = <?php echo $Report1_summary->periode2->Lookup->toClientList() ?>;
fReport1summary.lists["x_periode2"].options = <?php echo JsonEncode($Report1_summary->periode2->lookupOptions()) ?>;
</script>
<?php } ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $Report1_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<div id="report_summary">
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fReport1summary" id="fReport1summary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fReport1summary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_MA_PELB" class="ew-cell form-group">
	<label for="x_MA_PELB" class="ew-search-caption ew-label"><?php echo $Page->MA_PELB->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report1" data-field="x_MA_PELB" data-value-separator="<?php echo $Page->MA_PELB->displayValueSeparatorAttribute() ?>" id="x_MA_PELB" name="x_MA_PELB"<?php echo $Page->MA_PELB->editAttributes() ?>>
		<?php echo $Page->MA_PELB->selectOptionListHtml("x_MA_PELB") ?>
	</select>
</div>
<?php echo $Page->MA_PELB->Lookup->getParamTag("p_x_MA_PELB") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_MKPL_JENIS" class="ew-cell form-group">
	<label for="x_MKPL_JENIS" class="ew-search-caption ew-label"><?php echo $Page->MKPL_JENIS->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report1" data-field="x_MKPL_JENIS" data-value-separator="<?php echo $Page->MKPL_JENIS->displayValueSeparatorAttribute() ?>" id="x_MKPL_JENIS" name="x_MKPL_JENIS"<?php echo $Page->MKPL_JENIS->editAttributes() ?>>
		<?php echo $Page->MKPL_JENIS->selectOptionListHtml("x_MKPL_JENIS") ?>
	</select>
</div>
<?php echo $Page->MKPL_JENIS->Lookup->getParamTag("p_x_MKPL_JENIS") ?>
</span>
</div>
</div>
<div id="r_3" class="ew-row d-sm-flex">
<div id="c_JASA" class="ew-cell form-group">
	<label for="x_JASA" class="ew-search-caption ew-label"><?php echo $Page->JASA->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report1" data-field="x_JASA" data-value-separator="<?php echo $Page->JASA->displayValueSeparatorAttribute() ?>" id="x_JASA" name="x_JASA"<?php echo $Page->JASA->editAttributes() ?>>
		<?php echo $Page->JASA->selectOptionListHtml("x_JASA") ?>
	</select>
</div>
<?php echo $Page->JASA->Lookup->getParamTag("p_x_JASA") ?>
</span>
</div>
</div>
<div id="r_4" class="ew-row d-sm-flex">
<div id="c_periode2" class="ew-cell form-group">
	<label for="x_periode2" class="ew-search-caption ew-label"><?php echo $Page->periode2->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report1" data-field="x_periode2" data-value-separator="<?php echo $Page->periode2->displayValueSeparatorAttribute() ?>" id="x_periode2" name="x_periode2"<?php echo $Page->periode2->editAttributes() ?>>
		<?php echo $Page->periode2->selectOptionListHtml("x_periode2") ?>
	</select>
</div>
<?php echo $Page->periode2->Lookup->getParamTag("p_x_periode2") ?>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fReport1summary.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_Report1" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->MA_PELB->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="MA_PELB"><div class="Report1_MA_PELB"><span class="ew-table-header-caption"><?php echo $Page->MA_PELB->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="MA_PELB">
<?php if ($Page->sortUrl($Page->MA_PELB) == "") { ?>
		<div class="ew-table-header-btn Report1_MA_PELB">
			<span class="ew-table-header-caption"><?php echo $Page->MA_PELB->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report1_MA_PELB" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->MA_PELB) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->MA_PELB->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->MA_PELB->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->MA_PELB->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->MKPL_JENIS->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="MKPL_JENIS"><div class="Report1_MKPL_JENIS"><span class="ew-table-header-caption"><?php echo $Page->MKPL_JENIS->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="MKPL_JENIS">
<?php if ($Page->sortUrl($Page->MKPL_JENIS) == "") { ?>
		<div class="ew-table-header-btn Report1_MKPL_JENIS">
			<span class="ew-table-header-caption"><?php echo $Page->MKPL_JENIS->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report1_MKPL_JENIS" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->MKPL_JENIS) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->MKPL_JENIS->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->MKPL_JENIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->MKPL_JENIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->JASA->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="JASA"><div class="Report1_JASA"><span class="ew-table-header-caption"><?php echo $Page->JASA->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="JASA">
<?php if ($Page->sortUrl($Page->JASA) == "") { ?>
		<div class="ew-table-header-btn Report1_JASA">
			<span class="ew-table-header-caption"><?php echo $Page->JASA->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report1_JASA" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->JASA) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->JASA->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->JASA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->JASA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->TGL_MULAI_REA->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TGL_MULAI_REA"><div class="Report1_TGL_MULAI_REA"><span class="ew-table-header-caption"><?php echo $Page->TGL_MULAI_REA->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TGL_MULAI_REA">
<?php if ($Page->sortUrl($Page->TGL_MULAI_REA) == "") { ?>
		<div class="ew-table-header-btn Report1_TGL_MULAI_REA">
			<span class="ew-table-header-caption"><?php echo $Page->TGL_MULAI_REA->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report1_TGL_MULAI_REA" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TGL_MULAI_REA) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->TGL_MULAI_REA->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TGL_MULAI_REA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TGL_MULAI_REA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->TGL_SELESAI_REA->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TGL_SELESAI_REA"><div class="Report1_TGL_SELESAI_REA"><span class="ew-table-header-caption"><?php echo $Page->TGL_SELESAI_REA->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TGL_SELESAI_REA">
<?php if ($Page->sortUrl($Page->TGL_SELESAI_REA) == "") { ?>
		<div class="ew-table-header-btn Report1_TGL_SELESAI_REA">
			<span class="ew-table-header-caption"><?php echo $Page->TGL_SELESAI_REA->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report1_TGL_SELESAI_REA" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TGL_SELESAI_REA) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->TGL_SELESAI_REA->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TGL_SELESAI_REA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TGL_SELESAI_REA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->periode2->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="periode2"><div class="Report1_periode2"><span class="ew-table-header-caption"><?php echo $Page->periode2->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="periode2">
<?php if ($Page->sortUrl($Page->periode2) == "") { ?>
		<div class="ew-table-header-btn Report1_periode2">
			<span class="ew-table-header-caption"><?php echo $Page->periode2->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report1_periode2" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->periode2) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->periode2->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->periode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->periode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->MA_PELB->Visible) { ?>
		<td data-field="MA_PELB"<?php echo $Page->MA_PELB->cellAttributes() ?>>
<span<?php echo $Page->MA_PELB->viewAttributes() ?>><?php echo $Page->MA_PELB->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->MKPL_JENIS->Visible) { ?>
		<td data-field="MKPL_JENIS"<?php echo $Page->MKPL_JENIS->cellAttributes() ?>>
<span<?php echo $Page->MKPL_JENIS->viewAttributes() ?>><?php echo $Page->MKPL_JENIS->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->JASA->Visible) { ?>
		<td data-field="JASA"<?php echo $Page->JASA->cellAttributes() ?>>
<span<?php echo $Page->JASA->viewAttributes() ?>><?php echo $Page->JASA->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->TGL_MULAI_REA->Visible) { ?>
		<td data-field="TGL_MULAI_REA"<?php echo $Page->TGL_MULAI_REA->cellAttributes() ?>>
<span<?php echo $Page->TGL_MULAI_REA->viewAttributes() ?>><?php echo $Page->TGL_MULAI_REA->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->TGL_SELESAI_REA->Visible) { ?>
		<td data-field="TGL_SELESAI_REA"<?php echo $Page->TGL_SELESAI_REA->cellAttributes() ?>>
<span<?php echo $Page->TGL_SELESAI_REA->viewAttributes() ?>><?php echo $Page->TGL_SELESAI_REA->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->periode2->Visible) { ?>
		<td data-field="periode2"<?php echo $Page->periode2->cellAttributes() ?>>
<span<?php echo $Page->periode2->viewAttributes() ?>><?php echo $Page->periode2->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
<?php } ?>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_Report1" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "Report1_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>