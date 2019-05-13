<?php
namespace PHPMaker2019\pelindo_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(7, "mi_cf01_home", $MenuLanguage->MenuPhrase("7", "MenuText"), "cf01_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_kapal_all_20162018_vasa", $MenuLanguage->MenuPhrase("2", "MenuText"), "kapal_all_20162018_vasalist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mci_Setup", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(7, "mi_cf01_home", $MenuLanguage->MenuPhrase("7", "MenuText"), "cf01_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_kapal_all_20162018_vasa", $MenuLanguage->MenuPhrase("2", "MenuText"), "kapal_all_20162018_vasalist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mci_Setup", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
echo $sideMenu->toScript();
?>