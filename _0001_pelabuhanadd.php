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
$_0001_pelabuhan_add = new _0001_pelabuhan_add();

// Run the page
$_0001_pelabuhan_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_0001_pelabuhan_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var f_0001_pelabuhanadd = currentForm = new ew.Form("f_0001_pelabuhanadd", "add");

// Validate form
f_0001_pelabuhanadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($_0001_pelabuhan_add->pelabuhan->Required) { ?>
			elm = this.getElements("x" + infix + "_pelabuhan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_0001_pelabuhan->pelabuhan->caption(), $_0001_pelabuhan->pelabuhan->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
f_0001_pelabuhanadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_0001_pelabuhanadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $_0001_pelabuhan_add->showPageHeader(); ?>
<?php
$_0001_pelabuhan_add->showMessage();
?>
<form name="f_0001_pelabuhanadd" id="f_0001_pelabuhanadd" class="<?php echo $_0001_pelabuhan_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($_0001_pelabuhan_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $_0001_pelabuhan_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="_0001_pelabuhan">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$_0001_pelabuhan_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($_0001_pelabuhan->pelabuhan->Visible) { // pelabuhan ?>
	<div id="r_pelabuhan" class="form-group row">
		<label id="elh__0001_pelabuhan_pelabuhan" for="x_pelabuhan" class="<?php echo $_0001_pelabuhan_add->LeftColumnClass ?>"><?php echo $_0001_pelabuhan->pelabuhan->caption() ?><?php echo ($_0001_pelabuhan->pelabuhan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $_0001_pelabuhan_add->RightColumnClass ?>"><div<?php echo $_0001_pelabuhan->pelabuhan->cellAttributes() ?>>
<span id="el__0001_pelabuhan_pelabuhan">
<input type="text" data-table="_0001_pelabuhan" data-field="x_pelabuhan" name="x_pelabuhan" id="x_pelabuhan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($_0001_pelabuhan->pelabuhan->getPlaceHolder()) ?>" value="<?php echo $_0001_pelabuhan->pelabuhan->EditValue ?>"<?php echo $_0001_pelabuhan->pelabuhan->editAttributes() ?>>
</span>
<?php echo $_0001_pelabuhan->pelabuhan->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$_0001_pelabuhan_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $_0001_pelabuhan_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $_0001_pelabuhan_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$_0001_pelabuhan_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$_0001_pelabuhan_add->terminate();
?>