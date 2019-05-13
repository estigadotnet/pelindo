<?php
namespace PHPMaker2019\project1;

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
$topMenu->addMenuItem(3, "mi_t0001_pelabuhan", $MenuLanguage->MenuPhrase("3", "MenuText"), "t0001_pelabuhanlist.php", 6, "", TRUE, FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t0002_jasa", $MenuLanguage->MenuPhrase("4", "MenuText"), "t0002_jasalist.php", 6, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(7, "mi_cf01_home", $MenuLanguage->MenuPhrase("7", "MenuText"), "cf01_home.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_kapal_all_20162018_vasa", $MenuLanguage->MenuPhrase("2", "MenuText"), "kapal_all_20162018_vasalist.php", -1, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mci_Setup", $MenuLanguage->MenuPhrase("6", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t0001_pelabuhan", $MenuLanguage->MenuPhrase("3", "MenuText"), "t0001_pelabuhanlist.php", 6, "", TRUE, FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t0002_jasa", $MenuLanguage->MenuPhrase("4", "MenuText"), "t0002_jasalist.php", 6, "", TRUE, FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>