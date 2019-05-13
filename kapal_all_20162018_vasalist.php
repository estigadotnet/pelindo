<?php
namespace PHPMaker2019\pelindo_prj;

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
$kapal_all_20162018_vasa_list = new kapal_all_20162018_vasa_list();

// Run the page
$kapal_all_20162018_vasa_list->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$kapal_all_20162018_vasa_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$kapal_all_20162018_vasa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fkapal_all_20162018_vasalist = currentForm = new ew.Form("fkapal_all_20162018_vasalist", "list");
fkapal_all_20162018_vasalist.formKeyCountName = '<?php echo $kapal_all_20162018_vasa_list->FormKeyCountName ?>';

// Form_CustomValidate event
fkapal_all_20162018_vasalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fkapal_all_20162018_vasalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fkapal_all_20162018_vasalist.lists["x_MA_PELB"] = <?php echo $kapal_all_20162018_vasa_list->MA_PELB->Lookup->toClientList() ?>;
fkapal_all_20162018_vasalist.lists["x_MA_PELB"].options = <?php echo JsonEncode($kapal_all_20162018_vasa_list->MA_PELB->lookupOptions()) ?>;
fkapal_all_20162018_vasalist.lists["x_JASA"] = <?php echo $kapal_all_20162018_vasa_list->JASA->Lookup->toClientList() ?>;
fkapal_all_20162018_vasalist.lists["x_JASA"].options = <?php echo JsonEncode($kapal_all_20162018_vasa_list->JASA->lookupOptions()) ?>;
fkapal_all_20162018_vasalist.lists["x_PERIODE"] = <?php echo $kapal_all_20162018_vasa_list->PERIODE->Lookup->toClientList() ?>;
fkapal_all_20162018_vasalist.lists["x_PERIODE"].options = <?php echo JsonEncode($kapal_all_20162018_vasa_list->PERIODE->lookupOptions()) ?>;

// Form object for search
var fkapal_all_20162018_vasalistsrch = currentSearchForm = new ew.Form("fkapal_all_20162018_vasalistsrch");

// Validate function for search
fkapal_all_20162018_vasalistsrch.validate = function(fobj) {
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
fkapal_all_20162018_vasalistsrch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fkapal_all_20162018_vasalistsrch.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fkapal_all_20162018_vasalistsrch.lists["x_MA_PELB"] = <?php echo $kapal_all_20162018_vasa_list->MA_PELB->Lookup->toClientList() ?>;
fkapal_all_20162018_vasalistsrch.lists["x_MA_PELB"].options = <?php echo JsonEncode($kapal_all_20162018_vasa_list->MA_PELB->lookupOptions()) ?>;
fkapal_all_20162018_vasalistsrch.lists["x_JASA"] = <?php echo $kapal_all_20162018_vasa_list->JASA->Lookup->toClientList() ?>;
fkapal_all_20162018_vasalistsrch.lists["x_JASA"].options = <?php echo JsonEncode($kapal_all_20162018_vasa_list->JASA->lookupOptions()) ?>;
fkapal_all_20162018_vasalistsrch.lists["x_PERIODE"] = <?php echo $kapal_all_20162018_vasa_list->PERIODE->Lookup->toClientList() ?>;
fkapal_all_20162018_vasalistsrch.lists["x_PERIODE"].options = <?php echo JsonEncode($kapal_all_20162018_vasa_list->PERIODE->lookupOptions()) ?>;

// Filters
fkapal_all_20162018_vasalistsrch.filterList = <?php echo $kapal_all_20162018_vasa_list->getFilterList() ?>;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$kapal_all_20162018_vasa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($kapal_all_20162018_vasa_list->TotalRecs > 0 && $kapal_all_20162018_vasa_list->ExportOptions->visible()) { ?>
<?php $kapal_all_20162018_vasa_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa_list->ImportOptions->visible()) { ?>
<?php $kapal_all_20162018_vasa_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa_list->SearchOptions->visible()) { ?>
<?php $kapal_all_20162018_vasa_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa_list->FilterOptions->visible()) { ?>
<?php $kapal_all_20162018_vasa_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$kapal_all_20162018_vasa_list->renderOtherOptions();
?>
<?php if (!$kapal_all_20162018_vasa->isExport() && !$kapal_all_20162018_vasa->CurrentAction) { ?>
<form name="fkapal_all_20162018_vasalistsrch" id="fkapal_all_20162018_vasalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($kapal_all_20162018_vasa_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fkapal_all_20162018_vasalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="kapal_all_20162018_vasa">
	<div class="ew-basic-search">
<?php
if ($SearchError == "")
	$kapal_all_20162018_vasa_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$kapal_all_20162018_vasa->RowType = ROWTYPE_SEARCH;

// Render row
$kapal_all_20162018_vasa->resetAttributes();
$kapal_all_20162018_vasa_list->renderRow();
?>
<div id="xsr_1" class="ew-row d-sm-flex">
<?php if ($kapal_all_20162018_vasa->MA_PELB->Visible) { // MA_PELB ?>
	<div id="xsc_MA_PELB" class="ew-cell form-group">
		<label for="x_MA_PELB" class="ew-search-caption ew-label"><?php echo $kapal_all_20162018_vasa->MA_PELB->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MA_PELB" id="z_MA_PELB" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="kapal_all_20162018_vasa" data-field="x_MA_PELB" data-value-separator="<?php echo $kapal_all_20162018_vasa->MA_PELB->displayValueSeparatorAttribute() ?>" id="x_MA_PELB" name="x_MA_PELB"<?php echo $kapal_all_20162018_vasa->MA_PELB->editAttributes() ?>>
		<?php echo $kapal_all_20162018_vasa->MA_PELB->selectOptionListHtml("x_MA_PELB") ?>
	</select>
</div>
<?php echo $kapal_all_20162018_vasa->MA_PELB->Lookup->getParamTag("p_x_MA_PELB") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_2" class="ew-row d-sm-flex">
<?php if ($kapal_all_20162018_vasa->MKPL_JENIS->Visible) { // MKPL_JENIS ?>
	<div id="xsc_MKPL_JENIS" class="ew-cell form-group">
		<label for="x_MKPL_JENIS" class="ew-search-caption ew-label"><?php echo $kapal_all_20162018_vasa->MKPL_JENIS->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_MKPL_JENIS" id="z_MKPL_JENIS" value="LIKE"></span>
		<span class="ew-search-field">
<input type="text" data-table="kapal_all_20162018_vasa" data-field="x_MKPL_JENIS" name="x_MKPL_JENIS" id="x_MKPL_JENIS" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($kapal_all_20162018_vasa->MKPL_JENIS->getPlaceHolder()) ?>" value="<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->EditValue ?>"<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->editAttributes() ?>>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_3" class="ew-row d-sm-flex">
<?php if ($kapal_all_20162018_vasa->JASA->Visible) { // JASA ?>
	<div id="xsc_JASA" class="ew-cell form-group">
		<label for="x_JASA" class="ew-search-caption ew-label"><?php echo $kapal_all_20162018_vasa->JASA->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("LIKE") ?><input type="hidden" name="z_JASA" id="z_JASA" value="LIKE"></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="kapal_all_20162018_vasa" data-field="x_JASA" data-value-separator="<?php echo $kapal_all_20162018_vasa->JASA->displayValueSeparatorAttribute() ?>" id="x_JASA" name="x_JASA"<?php echo $kapal_all_20162018_vasa->JASA->editAttributes() ?>>
		<?php echo $kapal_all_20162018_vasa->JASA->selectOptionListHtml("x_JASA") ?>
	</select>
</div>
<?php echo $kapal_all_20162018_vasa->JASA->Lookup->getParamTag("p_x_JASA") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_4" class="ew-row d-sm-flex">
<?php if ($kapal_all_20162018_vasa->PERIODE->Visible) { // PERIODE ?>
	<div id="xsc_PERIODE" class="ew-cell form-group">
		<label for="x_PERIODE" class="ew-search-caption ew-label"><?php echo $kapal_all_20162018_vasa->PERIODE->caption() ?></label>
		<span class="ew-search-operator"><?php echo $Language->phrase("=") ?><input type="hidden" name="z_PERIODE" id="z_PERIODE" value="="></span>
		<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="kapal_all_20162018_vasa" data-field="x_PERIODE" data-value-separator="<?php echo $kapal_all_20162018_vasa->PERIODE->displayValueSeparatorAttribute() ?>" id="x_PERIODE" name="x_PERIODE"<?php echo $kapal_all_20162018_vasa->PERIODE->editAttributes() ?>>
		<?php echo $kapal_all_20162018_vasa->PERIODE->selectOptionListHtml("x_PERIODE") ?>
	</select>
</div>
<?php echo $kapal_all_20162018_vasa->PERIODE->Lookup->getParamTag("p_x_PERIODE") ?>
</span>
	</div>
<?php } ?>
</div>
<div id="xsr_5" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php $kapal_all_20162018_vasa_list->showPageHeader(); ?>
<?php
$kapal_all_20162018_vasa_list->showMessage();
?>
<?php if ($kapal_all_20162018_vasa_list->TotalRecs > 0 || $kapal_all_20162018_vasa->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($kapal_all_20162018_vasa_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> kapal_all_20162018_vasa">
<form name="fkapal_all_20162018_vasalist" id="fkapal_all_20162018_vasalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($kapal_all_20162018_vasa_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $kapal_all_20162018_vasa_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="kapal_all_20162018_vasa">
<div id="gmp_kapal_all_20162018_vasa" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($kapal_all_20162018_vasa_list->TotalRecs > 0 || $kapal_all_20162018_vasa->isGridEdit()) { ?>
<table id="tbl_kapal_all_20162018_vasalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$kapal_all_20162018_vasa_list->RowType = ROWTYPE_HEADER;

// Render list options
$kapal_all_20162018_vasa_list->renderListOptions();

// Render list options (header, left)
$kapal_all_20162018_vasa_list->ListOptions->render("header", "left");
?>
<?php if ($kapal_all_20162018_vasa->MA_PELB->Visible) { // MA_PELB ?>
	<?php if ($kapal_all_20162018_vasa->sortUrl($kapal_all_20162018_vasa->MA_PELB) == "") { ?>
		<th data-name="MA_PELB" class="<?php echo $kapal_all_20162018_vasa->MA_PELB->headerCellClass() ?>"><div id="elh_kapal_all_20162018_vasa_MA_PELB" class="kapal_all_20162018_vasa_MA_PELB"><div class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->MA_PELB->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MA_PELB" class="<?php echo $kapal_all_20162018_vasa->MA_PELB->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $kapal_all_20162018_vasa->SortUrl($kapal_all_20162018_vasa->MA_PELB) ?>',1);"><div id="elh_kapal_all_20162018_vasa_MA_PELB" class="kapal_all_20162018_vasa_MA_PELB">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->MA_PELB->caption() ?></span><span class="ew-table-header-sort"><?php if ($kapal_all_20162018_vasa->MA_PELB->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($kapal_all_20162018_vasa->MA_PELB->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa->MKPL_JENIS->Visible) { // MKPL_JENIS ?>
	<?php if ($kapal_all_20162018_vasa->sortUrl($kapal_all_20162018_vasa->MKPL_JENIS) == "") { ?>
		<th data-name="MKPL_JENIS" class="<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->headerCellClass() ?>"><div id="elh_kapal_all_20162018_vasa_MKPL_JENIS" class="kapal_all_20162018_vasa_MKPL_JENIS"><div class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->MKPL_JENIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MKPL_JENIS" class="<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $kapal_all_20162018_vasa->SortUrl($kapal_all_20162018_vasa->MKPL_JENIS) ?>',1);"><div id="elh_kapal_all_20162018_vasa_MKPL_JENIS" class="kapal_all_20162018_vasa_MKPL_JENIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->MKPL_JENIS->caption() ?></span><span class="ew-table-header-sort"><?php if ($kapal_all_20162018_vasa->MKPL_JENIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($kapal_all_20162018_vasa->MKPL_JENIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa->JASA->Visible) { // JASA ?>
	<?php if ($kapal_all_20162018_vasa->sortUrl($kapal_all_20162018_vasa->JASA) == "") { ?>
		<th data-name="JASA" class="<?php echo $kapal_all_20162018_vasa->JASA->headerCellClass() ?>"><div id="elh_kapal_all_20162018_vasa_JASA" class="kapal_all_20162018_vasa_JASA"><div class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->JASA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="JASA" class="<?php echo $kapal_all_20162018_vasa->JASA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $kapal_all_20162018_vasa->SortUrl($kapal_all_20162018_vasa->JASA) ?>',1);"><div id="elh_kapal_all_20162018_vasa_JASA" class="kapal_all_20162018_vasa_JASA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->JASA->caption() ?></span><span class="ew-table-header-sort"><?php if ($kapal_all_20162018_vasa->JASA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($kapal_all_20162018_vasa->JASA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa->PERIODE->Visible) { // PERIODE ?>
	<?php if ($kapal_all_20162018_vasa->sortUrl($kapal_all_20162018_vasa->PERIODE) == "") { ?>
		<th data-name="PERIODE" class="<?php echo $kapal_all_20162018_vasa->PERIODE->headerCellClass() ?>"><div id="elh_kapal_all_20162018_vasa_PERIODE" class="kapal_all_20162018_vasa_PERIODE"><div class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->PERIODE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PERIODE" class="<?php echo $kapal_all_20162018_vasa->PERIODE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $kapal_all_20162018_vasa->SortUrl($kapal_all_20162018_vasa->PERIODE) ?>',1);"><div id="elh_kapal_all_20162018_vasa_PERIODE" class="kapal_all_20162018_vasa_PERIODE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->PERIODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($kapal_all_20162018_vasa->PERIODE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($kapal_all_20162018_vasa->PERIODE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa->TGL_MULAI_REA->Visible) { // TGL_MULAI_REA ?>
	<?php if ($kapal_all_20162018_vasa->sortUrl($kapal_all_20162018_vasa->TGL_MULAI_REA) == "") { ?>
		<th data-name="TGL_MULAI_REA" class="<?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->headerCellClass() ?>"><div id="elh_kapal_all_20162018_vasa_TGL_MULAI_REA" class="kapal_all_20162018_vasa_TGL_MULAI_REA"><div class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TGL_MULAI_REA" class="<?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $kapal_all_20162018_vasa->SortUrl($kapal_all_20162018_vasa->TGL_MULAI_REA) ?>',1);"><div id="elh_kapal_all_20162018_vasa_TGL_MULAI_REA" class="kapal_all_20162018_vasa_TGL_MULAI_REA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->caption() ?></span><span class="ew-table-header-sort"><?php if ($kapal_all_20162018_vasa->TGL_MULAI_REA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($kapal_all_20162018_vasa->TGL_MULAI_REA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($kapal_all_20162018_vasa->TGL_SELESAI_REA->Visible) { // TGL_SELESAI_REA ?>
	<?php if ($kapal_all_20162018_vasa->sortUrl($kapal_all_20162018_vasa->TGL_SELESAI_REA) == "") { ?>
		<th data-name="TGL_SELESAI_REA" class="<?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->headerCellClass() ?>"><div id="elh_kapal_all_20162018_vasa_TGL_SELESAI_REA" class="kapal_all_20162018_vasa_TGL_SELESAI_REA"><div class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TGL_SELESAI_REA" class="<?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $kapal_all_20162018_vasa->SortUrl($kapal_all_20162018_vasa->TGL_SELESAI_REA) ?>',1);"><div id="elh_kapal_all_20162018_vasa_TGL_SELESAI_REA" class="kapal_all_20162018_vasa_TGL_SELESAI_REA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->caption() ?></span><span class="ew-table-header-sort"><?php if ($kapal_all_20162018_vasa->TGL_SELESAI_REA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($kapal_all_20162018_vasa->TGL_SELESAI_REA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$kapal_all_20162018_vasa_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($kapal_all_20162018_vasa->ExportAll && $kapal_all_20162018_vasa->isExport()) {
	$kapal_all_20162018_vasa_list->StopRec = $kapal_all_20162018_vasa_list->TotalRecs;
} else {

	// Set the last record to display
	if ($kapal_all_20162018_vasa_list->TotalRecs > $kapal_all_20162018_vasa_list->StartRec + $kapal_all_20162018_vasa_list->DisplayRecs - 1)
		$kapal_all_20162018_vasa_list->StopRec = $kapal_all_20162018_vasa_list->StartRec + $kapal_all_20162018_vasa_list->DisplayRecs - 1;
	else
		$kapal_all_20162018_vasa_list->StopRec = $kapal_all_20162018_vasa_list->TotalRecs;
}
$kapal_all_20162018_vasa_list->RecCnt = $kapal_all_20162018_vasa_list->StartRec - 1;
if ($kapal_all_20162018_vasa_list->Recordset && !$kapal_all_20162018_vasa_list->Recordset->EOF) {
	$kapal_all_20162018_vasa_list->Recordset->moveFirst();
	$selectLimit = $kapal_all_20162018_vasa_list->UseSelectLimit;
	if (!$selectLimit && $kapal_all_20162018_vasa_list->StartRec > 1)
		$kapal_all_20162018_vasa_list->Recordset->move($kapal_all_20162018_vasa_list->StartRec - 1);
} elseif (!$kapal_all_20162018_vasa->AllowAddDeleteRow && $kapal_all_20162018_vasa_list->StopRec == 0) {
	$kapal_all_20162018_vasa_list->StopRec = $kapal_all_20162018_vasa->GridAddRowCount;
}

// Initialize aggregate
$kapal_all_20162018_vasa->RowType = ROWTYPE_AGGREGATEINIT;
$kapal_all_20162018_vasa->resetAttributes();
$kapal_all_20162018_vasa_list->renderRow();
while ($kapal_all_20162018_vasa_list->RecCnt < $kapal_all_20162018_vasa_list->StopRec) {
	$kapal_all_20162018_vasa_list->RecCnt++;
	if ($kapal_all_20162018_vasa_list->RecCnt >= $kapal_all_20162018_vasa_list->StartRec) {
		$kapal_all_20162018_vasa_list->RowCnt++;

		// Set up key count
		$kapal_all_20162018_vasa_list->KeyCount = $kapal_all_20162018_vasa_list->RowIndex;

		// Init row class and style
		$kapal_all_20162018_vasa->resetAttributes();
		$kapal_all_20162018_vasa->CssClass = "";
		if ($kapal_all_20162018_vasa->isGridAdd()) {
		} else {
			$kapal_all_20162018_vasa_list->loadRowValues($kapal_all_20162018_vasa_list->Recordset); // Load row values
		}
		$kapal_all_20162018_vasa->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$kapal_all_20162018_vasa->RowAttrs = array_merge($kapal_all_20162018_vasa->RowAttrs, array('data-rowindex'=>$kapal_all_20162018_vasa_list->RowCnt, 'id'=>'r' . $kapal_all_20162018_vasa_list->RowCnt . '_kapal_all_20162018_vasa', 'data-rowtype'=>$kapal_all_20162018_vasa->RowType));

		// Render row
		$kapal_all_20162018_vasa_list->renderRow();

		// Render list options
		$kapal_all_20162018_vasa_list->renderListOptions();
?>
	<tr<?php echo $kapal_all_20162018_vasa->rowAttributes() ?>>
<?php

// Render list options (body, left)
$kapal_all_20162018_vasa_list->ListOptions->render("body", "left", $kapal_all_20162018_vasa_list->RowCnt);
?>
	<?php if ($kapal_all_20162018_vasa->MA_PELB->Visible) { // MA_PELB ?>
		<td data-name="MA_PELB"<?php echo $kapal_all_20162018_vasa->MA_PELB->cellAttributes() ?>>
<span id="el<?php echo $kapal_all_20162018_vasa_list->RowCnt ?>_kapal_all_20162018_vasa_MA_PELB" class="kapal_all_20162018_vasa_MA_PELB">
<span<?php echo $kapal_all_20162018_vasa->MA_PELB->viewAttributes() ?>>
<?php echo $kapal_all_20162018_vasa->MA_PELB->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($kapal_all_20162018_vasa->MKPL_JENIS->Visible) { // MKPL_JENIS ?>
		<td data-name="MKPL_JENIS"<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->cellAttributes() ?>>
<span id="el<?php echo $kapal_all_20162018_vasa_list->RowCnt ?>_kapal_all_20162018_vasa_MKPL_JENIS" class="kapal_all_20162018_vasa_MKPL_JENIS">
<span<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->viewAttributes() ?>>
<?php echo $kapal_all_20162018_vasa->MKPL_JENIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($kapal_all_20162018_vasa->JASA->Visible) { // JASA ?>
		<td data-name="JASA"<?php echo $kapal_all_20162018_vasa->JASA->cellAttributes() ?>>
<span id="el<?php echo $kapal_all_20162018_vasa_list->RowCnt ?>_kapal_all_20162018_vasa_JASA" class="kapal_all_20162018_vasa_JASA">
<span<?php echo $kapal_all_20162018_vasa->JASA->viewAttributes() ?>>
<?php echo $kapal_all_20162018_vasa->JASA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($kapal_all_20162018_vasa->PERIODE->Visible) { // PERIODE ?>
		<td data-name="PERIODE"<?php echo $kapal_all_20162018_vasa->PERIODE->cellAttributes() ?>>
<span id="el<?php echo $kapal_all_20162018_vasa_list->RowCnt ?>_kapal_all_20162018_vasa_PERIODE" class="kapal_all_20162018_vasa_PERIODE">
<span<?php echo $kapal_all_20162018_vasa->PERIODE->viewAttributes() ?>>
<?php echo $kapal_all_20162018_vasa->PERIODE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($kapal_all_20162018_vasa->TGL_MULAI_REA->Visible) { // TGL_MULAI_REA ?>
		<td data-name="TGL_MULAI_REA"<?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->cellAttributes() ?>>
<span id="el<?php echo $kapal_all_20162018_vasa_list->RowCnt ?>_kapal_all_20162018_vasa_TGL_MULAI_REA" class="kapal_all_20162018_vasa_TGL_MULAI_REA">
<span<?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->viewAttributes() ?>>
<?php echo $kapal_all_20162018_vasa->TGL_MULAI_REA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($kapal_all_20162018_vasa->TGL_SELESAI_REA->Visible) { // TGL_SELESAI_REA ?>
		<td data-name="TGL_SELESAI_REA"<?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->cellAttributes() ?>>
<span id="el<?php echo $kapal_all_20162018_vasa_list->RowCnt ?>_kapal_all_20162018_vasa_TGL_SELESAI_REA" class="kapal_all_20162018_vasa_TGL_SELESAI_REA">
<span<?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->viewAttributes() ?>>
<?php echo $kapal_all_20162018_vasa->TGL_SELESAI_REA->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$kapal_all_20162018_vasa_list->ListOptions->render("body", "right", $kapal_all_20162018_vasa_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$kapal_all_20162018_vasa->isGridAdd())
		$kapal_all_20162018_vasa_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$kapal_all_20162018_vasa->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($kapal_all_20162018_vasa_list->Recordset)
	$kapal_all_20162018_vasa_list->Recordset->Close();
?>
<?php if (!$kapal_all_20162018_vasa->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$kapal_all_20162018_vasa->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($kapal_all_20162018_vasa_list->Pager)) $kapal_all_20162018_vasa_list->Pager = new PrevNextPager($kapal_all_20162018_vasa_list->StartRec, $kapal_all_20162018_vasa_list->DisplayRecs, $kapal_all_20162018_vasa_list->TotalRecs, $kapal_all_20162018_vasa_list->AutoHidePager) ?>
<?php if ($kapal_all_20162018_vasa_list->Pager->RecordCount > 0 && $kapal_all_20162018_vasa_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($kapal_all_20162018_vasa_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $kapal_all_20162018_vasa_list->pageUrl() ?>start=<?php echo $kapal_all_20162018_vasa_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($kapal_all_20162018_vasa_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $kapal_all_20162018_vasa_list->pageUrl() ?>start=<?php echo $kapal_all_20162018_vasa_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $kapal_all_20162018_vasa_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($kapal_all_20162018_vasa_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $kapal_all_20162018_vasa_list->pageUrl() ?>start=<?php echo $kapal_all_20162018_vasa_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($kapal_all_20162018_vasa_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $kapal_all_20162018_vasa_list->pageUrl() ?>start=<?php echo $kapal_all_20162018_vasa_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $kapal_all_20162018_vasa_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($kapal_all_20162018_vasa_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $kapal_all_20162018_vasa_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $kapal_all_20162018_vasa_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $kapal_all_20162018_vasa_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $kapal_all_20162018_vasa_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($kapal_all_20162018_vasa_list->TotalRecs == 0 && !$kapal_all_20162018_vasa->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $kapal_all_20162018_vasa_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$kapal_all_20162018_vasa_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$kapal_all_20162018_vasa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$kapal_all_20162018_vasa_list->terminate();
?>