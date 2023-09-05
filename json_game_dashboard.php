<?php
include "connection.php"; // Include your database connection script

$json = array();

$game_id = $_GET['game_id'];
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM added_game_components WHERE game_id = $game_id";
$result = $conn->query($sql);

while ($added_game_components = $result->fetch_assoc()) {
    $added_component_id = $added_game_components['added_component_id'];
    $component_id = $added_game_components['component_id'];

    $getAddedComponentName = "SELECT * FROM game_components WHERE component_id = $component_id";
    $sqlGetAddedComponentName = $conn->query($getAddedComponentName);
    $game_components = $sqlGetAddedComponentName->fetch_assoc();

    $component_name = $game_components['component_name'];
    $price = $game_components['price'];
    $category = $game_components['category'];

    $quantity = $added_game_components['quantity'];
    $color_id = $added_game_components['color_id'];
    $custom_design_file_path = $added_game_components['custom_design_file_path'];



    $edit_quantity = '
    <input 
        type="number" 
        class="quantity-input" 
        min="1" 
        max="99"

        data-gameid="' . $game_id . '" 
        data-componentid="' . $added_component_id . '"
        value="' . $quantity . '" 
    >
    ';

    $info = "";
    if ($added_game_components['custom_design_file_path']) {
        $info = basename($custom_design_file_path);
    } elseif ($added_game_components['color_id']) {
        $getColorName = "SELECT * FROM component_colors WHERE color_id = $color_id";
        $sqlGetColorName = $conn->query($getColorName);
        $fetchedColorName = $sqlGetColorName->fetch_assoc();
        $color_name = $fetchedColorName['color_name'];
        $color_code = $fetchedColorName['color_code'];

        $info = '
            <p
                style="color: '. $color_code .' ;"
            >
                '. $color_name .'
            </p>
        ';
    } else {
        $info = "N/A";
    }

    $modify = "";
    if ($added_game_components['custom_design_file_path']) {
        $modify = '
            <button
                class="update-design"
                data-gameid="' . $game_id . '"
                data-componentid="' . $added_component_id . '"
                data-componentname="' . $component_name . '"
                data-componentprice="' . $price . '"
                data-componentcategory="' . $category . '"
                data-filepath="' . $custom_design_file_path . '"
                data-addedcomponentid="' . $added_component_id . '"
            >
                Update Custom Design
            </button>
        ';
    } elseif ($added_game_components['color_id']) {
        $getColors = "SELECT * FROM component_colors WHERE component_id = '$component_id'";
        $sqlGetColors = $conn->query($getColors);

        $color_names = array();
        $color_ids = array();

        while ($fetchedColors = $sqlGetColors->fetch_assoc()) {
            $color_ids[] = $fetchedColors['color_id'];
            $color_names[] = $fetchedColors['color_name'];
            $color_codes[] = $fetchedColors['color_code'];
        }

        if (!empty($color_names) && !empty($color_ids)) {
            $buttons = array();

            foreach ($color_names as $index => $color_name) {
                $color_id = $color_ids[$index];
                $color_code = $color_codes[$index];

                $buttons[] = '
                    <button
                        type="button" 
                        class="color-link"
                        data-gameid="' . $game_id . '"
                        data-componentid="' . $component_id . '"
                        data-colorid="' . $color_id . '"
                        data-addedcomponentid="' . $added_component_id . '"

                        style="background-color: '. $color_code .' ;"
                    >
                        _
                    </button>
                ';
            }

            $modify = implode(" ", $buttons);
        }
    } else {
        $modify = "else";
    }

    $delete = '
        <button
            class="delete-component"
            data-gameid="' . $game_id . '"
            data-componentid= "' . $added_component_id . '"
        >
            Delete
        </button>
    ';


    $json[] = array(
        "added_component_id" => $added_component_id,
        "component_id" => $component_id,
        "component_name" => $component_name,
        "price" => $price,
        "category" => $category,
        "edit_quantity" => $edit_quantity,
        "info" => $info,
        "modify" => $modify,
        "delete" => $delete,
    );
}



echo json_encode($json);