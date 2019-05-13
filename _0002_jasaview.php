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
$_0002_jasa_view = new _0002_jasa_view();

// Run the page
$_0002_jasa_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_0002_jasa_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$_0002_jasa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var f_0002_jasaview = currentForm = new ew.Form("f_0002_jasaview", "view");

// Form_CustomValidate event
f_0002_jasaview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_0002_jasaview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$_0002_jasa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $_0002_jasa_view->ExportOptions->render("body") ?>
<?php $_0002_jasa_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $_0002_jasa_view->showPageHeader(); ?>
<?php
$_0002_jasa_view->showMessage();
?>
<form name="f_0002_jasaview" id="f_0002_jasaview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_0002_jasa_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_0002_jasa_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_0002_jasa">
<input type="hidden" name="modal" value="<?php echo (int)$_0002_jasa_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($_0002_jasa->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $_0002_jasa_view->TableLeftColumnClass ?>"><span id="elh__0002_jasa_id"><?php echo $_0002_jasa->id->caption() ?></span></td>
		<td data-name="id"<?php echo $_0002_jasa->id->cellAttributes() ?>>
<span id="el__0002_jasa_id">
<span<?php echo $_0002_jasa->id->viewAttributes() ?>>
<?php echo $_0002_jasa->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($_0002_jasa->jasa->Visible) { // jasa ?>
	<tr id="r_jasa">
		<td class="<?php echo $_0002_jasa_view->TableLeftColumnClass ?>"><span id="elh__0002_jasa_jasa"><?php echo $_0002_jasa->jasa->caption() ?></span></td>
		<td data-name="jasa"<?php echo $_0002_jasa->jasa->cellAttributes() ?>>
<span id="el__0002_jasa_jasa">
<span<?php echo $_0002_jasa->jasa->viewAttributes() ?>>
<?php echo $_0002_jasa->jasa->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$_0002_jasa_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$_0002_jasa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$_0002_jasa_view->terminate();
?>