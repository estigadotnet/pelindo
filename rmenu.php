<?php
namespace PHPReportMaker12\pelindo_prj;
?>
<?php
namespace PHPReportMaker12\pelindo_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(8, "mi_Report2", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("8", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "Report2smry.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_Report2_Chart1", $ReportLanguage->phrase("ChartReportMenuItemPrefix") . $ReportLanguage->menuPhrase("9", "MenuText") . $ReportLanguage->phrase("ChartReportMenuItemSuffix"), "Report2smry.php#cht_Report2_Chart1", 8, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_Report1", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("6", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "Report1smry.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(8, "mi_Report2", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("8", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "Report2smry.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_Report2_Chart1", $ReportLanguage->phrase("ChartReportMenuItemPrefix") . $ReportLanguage->menuPhrase("9", "MenuText") . $ReportLanguage->phrase("ChartReportMenuItemSuffix"), "Report2smry.php#cht_Report2_Chart1", 8, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_Report1", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("6", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "Report1smry.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>