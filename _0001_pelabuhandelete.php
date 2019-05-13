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
$_0001_pelabuhan_delete = new _0001_pelabuhan_delete();

// Run the page
$_0001_pelabuhan_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_0001_pelabuhan_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var f_0001_pelabuhandelete = currentForm = new ew.Form("f_0001_pelabuhandelete", "delete");

// Form_CustomValidate event
f_0001_pelabuhandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_0001_pelabuhandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $_0001_pelabuhan_delete->showPageHeader(); ?>
<?php
$_0001_pelabuhan_delete->showMessage();
?>
<form name="f_0001_pelabuhandelete" id="f_0001_pelabuhandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_0001_pelabuhan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_0001_pelabuhan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_0001_pelabuhan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($_0001_pelabuhan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($_0001_pelabuhan->id->Visible) { // id ?>
		<th class="<?php echo $_0001_pelabuhan->id->headerCellClass() ?>"><span id="elh__0001_pelabuhan_id" class="_0001_pelabuhan_id"><?php echo $_0001_pelabuhan->id->caption() ?></span></th>
<?php } ?>
<?php if ($_0001_pelabuhan->pelabuhan->Visible) { // pelabuhan ?>
		<th class="<?php echo $_0001_pelabuhan->pelabuhan->headerCellClass() ?>"><span id="elh__0001_pelabuhan_pelabuhan" class="_0001_pelabuhan_pelabuhan"><?php echo $_0001_pelabuhan->pelabuhan->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$_0001_pelabuhan_delete->RecCnt = 0;
$i = 0;
while (!$_0001_pelabuhan_delete->Recordset->EOF) {
	$_0001_pelabuhan_delete->RecCnt++;
	$_0001_pelabuhan_delete->RowCnt++;

	// Set row properties
	$_0001_pelabuhan->resetAttributes();
	$_0001_pelabuhan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$_0001_pelabuhan_delete->loadRowValues($_0001_pelabuhan_delete->Recordset);

	// Render row
	$_0001_pelabuhan_delete->renderRow();
?>
	<tr<?php echo $_0001_pelabuhan->rowAttributes() ?>>
<?php if ($_0001_pelabuhan->id->Visible) { // id ?>
		<td<?php echo $_0001_pelabuhan->id->cellAttributes() ?>>
<span id="el<?php echo $_0001_pelabuhan_delete->RowCnt ?>__0001_pelabuhan_id" class="_0001_pelabuhan_id">
<span<?php echo $_0001_pelabuhan->id->viewAttributes() ?>>
<?php echo $_0001_pelabuhan->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_0001_pelabuhan->pelabuhan->Visible) { // pelabuhan ?>
		<td<?php echo $_0001_pelabuhan->pelabuhan->cellAttributes() ?>>
<span id="el<?php echo $_0001_pelabuhan_delete->RowCnt ?>__0001_pelabuhan_pelabuhan" class="_0001_pelabuhan_pelabuhan">
<span<?php echo $_0001_pelabuhan->pelabuhan->viewAttributes() ?>>
<?php echo $_0001_pelabuhan->pelabuhan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$_0001_pelabuhan_delete->Recordset->moveNext();
}
$_0001_pelabuhan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $_0001_pelabuhan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$_0001_pelabuhan_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$_0001_pelabuhan_delete->terminate();
?>