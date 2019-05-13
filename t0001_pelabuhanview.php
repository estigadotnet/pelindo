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
$t0001_pelabuhan_view = new t0001_pelabuhan_view();

// Run the page
$t0001_pelabuhan_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0001_pelabuhan_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0001_pelabuhan->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0001_pelabuhanview = currentForm = new ew.Form("ft0001_pelabuhanview", "view");

// Form_CustomValidate event
ft0001_pelabuhanview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0001_pelabuhanview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0001_pelabuhan->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0001_pelabuhan_view->ExportOptions->render("body") ?>
<?php $t0001_pelabuhan_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0001_pelabuhan_view->showPageHeader(); ?>
<?php
$t0001_pelabuhan_view->showMessage();
?>
<form name="ft0001_pelabuhanview" id="ft0001_pelabuhanview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0001_pelabuhan_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0001_pelabuhan_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0001_pelabuhan">
<input type="hidden" name="modal" value="<?php echo (int)$t0001_pelabuhan_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0001_pelabuhan->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t0001_pelabuhan_view->TableLeftColumnClass ?>"><span id="elh_t0001_pelabuhan_id"><?php echo $t0001_pelabuhan->id->caption() ?></span></td>
		<td data-name="id"<?php echo $t0001_pelabuhan->id->cellAttributes() ?>>
<span id="el_t0001_pelabuhan_id">
<span<?php echo $t0001_pelabuhan->id->viewAttributes() ?>>
<?php echo $t0001_pelabuhan->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0001_pelabuhan->pelabuhan->Visible) { // pelabuhan ?>
	<tr id="r_pelabuhan">
		<td class="<?php echo $t0001_pelabuhan_view->TableLeftColumnClass ?>"><span id="elh_t0001_pelabuhan_pelabuhan"><?php echo $t0001_pelabuhan->pelabuhan->caption() ?></span></td>
		<td data-name="pelabuhan"<?php echo $t0001_pelabuhan->pelabuhan->cellAttributes() ?>>
<span id="el_t0001_pelabuhan_pelabuhan">
<span<?php echo $t0001_pelabuhan->pelabuhan->viewAttributes() ?>>
<?php echo $t0001_pelabuhan->pelabuhan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0001_pelabuhan_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0001_pelabuhan->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0001_pelabuhan_view->terminate();
?>