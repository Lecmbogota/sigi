<?php
require '../header.php';
require '../config/Conexion.php';
/*
 * Example PHP implementation used for the index.html example
 */

// Alias Editor classes so they are easy to use
use DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst($sigi, 'asignacionestudio')
    ->fields(
        Field::inst('id_asig')->validator(
            Validate::notEmpty(
                ValidateOptions::inst()->message('A first name is required')
            )
        ),
        Field::inst('agente_asig')->validator(
            Validate::notEmpty(
                ValidateOptions::inst()->message('A last name is required')
            )
        ),
        Field::inst('fecha_asig')->validator(
            Validate::notEmpty(
                ValidateOptions::inst()->message('A last name is required')
            )
        ),
        Field::inst('hora_asig')->validator(
            Validate::notEmpty(
                ValidateOptions::inst()->message('A last name is required')
            )
        )
    )
    ->debug(true)
    ->process($_POST)
    ->json();
