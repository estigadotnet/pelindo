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
if (!isset($Report2_summary))
	$Report2_summary = new Report2_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$Report2_summary;

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
var fReport2summary = currentForm = new ew.Form("fReport2summary");

// Validate method
fReport2summary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fReport2summary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fReport2summary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fReport2summary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fReport2summary.lists["x_ma_pelb"] = <?php echo $Report2_summary->ma_pelb->Lookup->toClientList() ?>;
fReport2summary.lists["x_ma_pelb"].options = <?php echo JsonEncode($Report2_summary->ma_pelb->lookupOptions()) ?>;
fReport2summary.lists["x_periode2"] = <?php echo $Report2_summary->periode2->Lookup->toClientList() ?>;
fReport2summary.lists["x_periode2"].options = <?php echo JsonEncode($Report2_summary->periode2->lookupOptions()) ?>;
fReport2summary.lists["x_MKPL_JENIS"] = <?php echo $Report2_summary->MKPL_JENIS->Lookup->toClientList() ?>;
fReport2summary.lists["x_MKPL_JENIS"].options = <?php echo JsonEncode($Report2_summary->MKPL_JENIS->lookupOptions()) ?>;
fReport2summary.lists["x_jasa"] = <?php echo $Report2_summary->jasa->Lookup->toClientList() ?>;
fReport2summary.lists["x_jasa"].options = <?php echo JsonEncode($Report2_summary->jasa->lookupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $Report2_summary->CenterContentClass ?>">
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
<form name="fReport2summary" id="fReport2summary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fReport2summary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_ma_pelb" class="ew-cell form-group">
	<label for="x_ma_pelb" class="ew-search-caption ew-label"><?php echo $Page->ma_pelb->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report2" data-field="x_ma_pelb" data-value-separator="<?php echo $Page->ma_pelb->displayValueSeparatorAttribute() ?>" id="x_ma_pelb" name="x_ma_pelb"<?php echo $Page->ma_pelb->editAttributes() ?>>
		<?php echo $Page->ma_pelb->selectOptionListHtml("x_ma_pelb") ?>
	</select>
</div>
<?php echo $Page->ma_pelb->Lookup->getParamTag("p_x_ma_pelb") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_periode2" class="ew-cell form-group">
	<label for="x_periode2" class="ew-search-caption ew-label"><?php echo $Page->periode2->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report2" data-field="x_periode2" data-value-separator="<?php echo $Page->periode2->displayValueSeparatorAttribute() ?>" id="x_periode2" name="x_periode2"<?php echo $Page->periode2->editAttributes() ?>>
		<?php echo $Page->periode2->selectOptionListHtml("x_periode2") ?>
	</select>
</div>
<?php echo $Page->periode2->Lookup->getParamTag("p_x_periode2") ?>
</span>
</div>
</div>
<div id="r_3" class="ew-row d-sm-flex">
<div id="c_MKPL_JENIS" class="ew-cell form-group">
	<label for="x_MKPL_JENIS" class="ew-search-caption ew-label"><?php echo $Page->MKPL_JENIS->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report2" data-field="x_MKPL_JENIS" data-value-separator="<?php echo $Page->MKPL_JENIS->displayValueSeparatorAttribute() ?>" id="x_MKPL_JENIS" name="x_MKPL_JENIS"<?php echo $Page->MKPL_JENIS->editAttributes() ?>>
		<?php echo $Page->MKPL_JENIS->selectOptionListHtml("x_MKPL_JENIS") ?>
	</select>
</div>
<?php echo $Page->MKPL_JENIS->Lookup->getParamTag("p_x_MKPL_JENIS") ?>
</span>
</div>
</div>
<div id="r_4" class="ew-row d-sm-flex">
<div id="c_jasa" class="ew-cell form-group">
	<label for="x_jasa" class="ew-search-caption ew-label"><?php echo $Page->jasa->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="Report2" data-field="x_jasa" data-value-separator="<?php echo $Page->jasa->displayValueSeparatorAttribute() ?>" id="x_jasa" name="x_jasa"<?php echo $Page->jasa->editAttributes() ?>>
		<?php echo $Page->jasa->selectOptionListHtml("x_jasa") ?>
	</select>
</div>
<?php echo $Page->jasa->Lookup->getParamTag("p_x_jasa") ?>
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
fReport2summary.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_Report2" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->ma_pelb->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ma_pelb"><div class="Report2_ma_pelb"><span class="ew-table-header-caption"><?php echo $Page->ma_pelb->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="ma_pelb">
<?php if ($Page->sortUrl($Page->ma_pelb) == "") { ?>
		<div class="ew-table-header-btn Report2_ma_pelb">
			<span class="ew-table-header-caption"><?php echo $Page->ma_pelb->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_ma_pelb" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->ma_pelb) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->ma_pelb->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->ma_pelb->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->ma_pelb->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->periode2->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="periode2"><div class="Report2_periode2"><span class="ew-table-header-caption"><?php echo $Page->periode2->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="periode2">
<?php if ($Page->sortUrl($Page->periode2) == "") { ?>
		<div class="ew-table-header-btn Report2_periode2">
			<span class="ew-table-header-caption"><?php echo $Page->periode2->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_periode2" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->periode2) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->periode2->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->periode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->periode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->MKPL_JENIS->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="MKPL_JENIS"><div class="Report2_MKPL_JENIS"><span class="ew-table-header-caption"><?php echo $Page->MKPL_JENIS->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="MKPL_JENIS">
<?php if ($Page->sortUrl($Page->MKPL_JENIS) == "") { ?>
		<div class="ew-table-header-btn Report2_MKPL_JENIS">
			<span class="ew-table-header-caption"><?php echo $Page->MKPL_JENIS->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_MKPL_JENIS" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->MKPL_JENIS) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->MKPL_JENIS->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->MKPL_JENIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->MKPL_JENIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->jasa->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="jasa"><div class="Report2_jasa"><span class="ew-table-header-caption"><?php echo $Page->jasa->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="jasa">
<?php if ($Page->sortUrl($Page->jasa) == "") { ?>
		<div class="ew-table-header-btn Report2_jasa">
			<span class="ew-table-header-caption"><?php echo $Page->jasa->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_jasa" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->jasa) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->jasa->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->jasa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->jasa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->start->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="start"><div class="Report2_start"><span class="ew-table-header-caption"><?php echo $Page->start->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="start">
<?php if ($Page->sortUrl($Page->start) == "") { ?>
		<div class="ew-table-header-btn Report2_start">
			<span class="ew-table-header-caption"><?php echo $Page->start->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_start" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->start) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->start->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->start->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->start->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->finish->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="finish"><div class="Report2_finish"><span class="ew-table-header-caption"><?php echo $Page->finish->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="finish">
<?php if ($Page->sortUrl($Page->finish) == "") { ?>
		<div class="ew-table-header-btn Report2_finish">
			<span class="ew-table-header-caption"><?php echo $Page->finish->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_finish" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->finish) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->finish->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->finish->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->finish->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->dT->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="dT"><div class="Report2_dT"><span class="ew-table-header-caption"><?php echo $Page->dT->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="dT">
<?php if ($Page->sortUrl($Page->dT) == "") { ?>
		<div class="ew-table-header-btn Report2_dT">
			<span class="ew-table-header-caption"><?php echo $Page->dT->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer Report2_dT" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->dT) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->dT->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->dT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->dT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->ma_pelb->Visible) { ?>
		<td data-field="ma_pelb"<?php echo $Page->ma_pelb->cellAttributes() ?>>
<span<?php echo $Page->ma_pelb->viewAttributes() ?>><?php echo $Page->ma_pelb->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->periode2->Visible) { ?>
		<td data-field="periode2"<?php echo $Page->periode2->cellAttributes() ?>>
<span<?php echo $Page->periode2->viewAttributes() ?>><?php echo $Page->periode2->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->MKPL_JENIS->Visible) { ?>
		<td data-field="MKPL_JENIS"<?php echo $Page->MKPL_JENIS->cellAttributes() ?>>
<span<?php echo $Page->MKPL_JENIS->viewAttributes() ?>><?php echo $Page->MKPL_JENIS->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->jasa->Visible) { ?>
		<td data-field="jasa"<?php echo $Page->jasa->cellAttributes() ?>>
<span<?php echo $Page->jasa->viewAttributes() ?>><?php echo $Page->jasa->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->start->Visible) { ?>
		<td data-field="start"<?php echo $Page->start->cellAttributes() ?>>
<span<?php echo $Page->start->viewAttributes() ?>><?php echo $Page->start->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->finish->Visible) { ?>
		<td data-field="finish"<?php echo $Page->finish->cellAttributes() ?>>
<span<?php echo $Page->finish->viewAttributes() ?>><?php echo $Page->finish->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->dT->Visible) { ?>
		<td data-field="dT"<?php echo $Page->dT->cellAttributes() ?>>
<span<?php echo $Page->dT->viewAttributes() ?>><?php echo $Page->dT->getViewValue() ?></span></td>
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
<div id="gmp_Report2" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "Report2_pager.php" ?>
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
<!-- Bottom Container -->
<div class="row">
<div id="ew-bottom" class="<?php echo $Report2_summary->BottomContentClass ?>">
<?php } ?>
<?php
if (!$DashboardReport) {

// Set up page break
if (($Page->Export == "print" || $Page->Export == "pdf" || $Page->Export == "email" || $Page->Export == "excel" && $USE_PHPEXCEL || $Page->Export == "word" && $USE_PHPWORD) && $Page->ExportChartPageBreak) {

	// Page_Breaking server event
	$Page->Page_Breaking($Page->ExportChartPageBreak, $Page->PageBreakContent);
	$Report2->Chart1->PageBreakType = "before"; // Page break type
	$Report2->Chart1->PageBreak = $Table->ExportChartPageBreak;
	$Report2->Chart1->PageBreakContent = $Table->PageBreakContent;
}

// Set up chart drilldown
$Report2->Chart1->DrillDownInPanel = $Page->DrillDownInPanel;
$Report2->Chart1->render("ew-chart-bottom");
?>
<?php if ($Page->Export <> "email" && !$Page->DrillDown) { ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<a href="#" class="ew-top-link" onclick="$(document).scrollTop($('#top').offset().top); return false;"><?php echo $ReportLanguage->Phrase("Top") ?></a>
<?php } ?>
<?php } ?>
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
</div>
<!-- /#ew-bottom -->
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