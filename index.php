<?php

include_once './env.php';
include_once './utils/utils.php';
include_once './View/View.php';
include_once './View/ViewHome.php';
include_once './Model/Model.php';
include_once './Model/ModelPlayer.php';
include_once './Controller/Controller.php';
include_once './Controller/ControllerHome.php';

$controller = new ControllerHome(new ModelPlayer(), new ViewHome());

$controller->registerPlayer();
$controller->displayPlayers();
$controller->render();