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
$t0002_jasa_add = new t0002_jasa_add();

// Run the page
$t0002_jasa_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0002_jasa_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ft0002_jasaadd = currentForm = new ew.Form("ft0002_jasaadd", "add");

// Validate form
ft0002_jasaadd.validate = function() {
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
		<?php if ($t0002_jasa_add->jasa->Required) { ?>
			elm = this.getElements("x" + infix + "_jasa");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0002_jasa->jasa->caption(), $t0002_jasa->jasa->RequiredErrorMessage)) ?>");
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
ft0002_jasaadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0002_jasaadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $t0002_jasa_add->showPageHeader(); ?>
<?php
$t0002_jasa_add->showMessage();
?>
<form name="ft0002_jasaadd" id="ft0002_jasaadd" class="<?php echo $t0002_jasa_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0002_jasa_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0002_jasa_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0002_jasa">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t0002_jasa_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t0002_jasa->jasa->Visible) { // jasa ?>
	<div id="r_jasa" class="form-group row">
		<label id="elh_t0002_jasa_jasa" for="x_jasa" class="<?php echo $t0002_jasa_add->LeftColumnClass ?>"><?php echo $t0002_jasa->jasa->caption() ?><?php echo ($t0002_jasa->jasa->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t0002_jasa_add->RightColumnClass ?>"><div<?php echo $t0002_jasa->jasa->cellAttributes() ?>>
<span id="el_t0002_jasa_jasa">
<input type="text" data-table="t0002_jasa" data-field="x_jasa" name="x_jasa" id="x_jasa" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t0002_jasa->jasa->getPlaceHolder()) ?>" value="<?php echo $t0002_jasa->jasa->EditValue ?>"<?php echo $t0002_jasa->jasa->editAttributes() ?>>
</span>
<?php echo $t0002_jasa->jasa->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t0002_jasa_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t0002_jasa_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t0002_jasa_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t0002_jasa_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t0002_jasa_add->terminate();
?>