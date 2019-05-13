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
$_0002_jasa_delete = new _0002_jasa_delete();

// Run the page
$_0002_jasa_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_0002_jasa_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var f_0002_jasadelete = currentForm = new ew.Form("f_0002_jasadelete", "delete");

// Form_CustomValidate event
f_0002_jasadelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_0002_jasadelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $_0002_jasa_delete->showPageHeader(); ?>
<?php
$_0002_jasa_delete->showMessage();
?>
<form name="f_0002_jasadelete" id="f_0002_jasadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_0002_jasa_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_0002_jasa_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_0002_jasa">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($_0002_jasa_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($_0002_jasa->id->Visible) { // id ?>
		<th class="<?php echo $_0002_jasa->id->headerCellClass() ?>"><span id="elh__0002_jasa_id" class="_0002_jasa_id"><?php echo $_0002_jasa->id->caption() ?></span></th>
<?php } ?>
<?php if ($_0002_jasa->jasa->Visible) { // jasa ?>
		<th class="<?php echo $_0002_jasa->jasa->headerCellClass() ?>"><span id="elh__0002_jasa_jasa" class="_0002_jasa_jasa"><?php echo $_0002_jasa->jasa->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$_0002_jasa_delete->RecCnt = 0;
$i = 0;
while (!$_0002_jasa_delete->Recordset->EOF) {
	$_0002_jasa_delete->RecCnt++;
	$_0002_jasa_delete->RowCnt++;

	// Set row properties
	$_0002_jasa->resetAttributes();
	$_0002_jasa->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$_0002_jasa_delete->loadRowValues($_0002_jasa_delete->Recordset);

	// Render row
	$_0002_jasa_delete->renderRow();
?>
	<tr<?php echo $_0002_jasa->rowAttributes() ?>>
<?php if ($_0002_jasa->id->Visible) { // id ?>
		<td<?php echo $_0002_jasa->id->cellAttributes() ?>>
<span id="el<?php echo $_0002_jasa_delete->RowCnt ?>__0002_jasa_id" class="_0002_jasa_id">
<span<?php echo $_0002_jasa->id->viewAttributes() ?>>
<?php echo $_0002_jasa->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($_0002_jasa->jasa->Visible) { // jasa ?>
		<td<?php echo $_0002_jasa->jasa->cellAttributes() ?>>
<span id="el<?php echo $_0002_jasa_delete->RowCnt ?>__0002_jasa_jasa" class="_0002_jasa_jasa">
<span<?php echo $_0002_jasa->jasa->viewAttributes() ?>>
<?php echo $_0002_jasa->jasa->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$_0002_jasa_delete->Recordset->moveNext();
}
$_0002_jasa_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $_0002_jasa_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$_0002_jasa_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$_0002_jasa_delete->terminate();
?>