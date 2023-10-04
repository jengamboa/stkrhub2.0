<?php
include "connection.php"; // Include your database connection script

$json = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM cart WHERE user_id = $user_id AND is_visible = 1";
$result = $conn->query($sql);

while ($fetched = $result->fetch_assoc()) {
    $cart_id = $fetched['cart_id'];
    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $added_component_id = $fetched['added_component_id'];
    $ticket_id = $fetched['ticket_id'];
    $quantity = $fetched['quantity'];
    $price = $fetched['price'];
    $is_active = $fetched['is_active'];

    $total_price = $quantity * $price;

    $item = '
    <div class="card-header py-1" style="margin-left:10px;">';
    if ($published_game_id) {
        $item .= 'PUBLISHED GAME';
    } elseif ($built_game_id) {
        $item .= 'BUILT GAME';
    } elseif ($added_component_id) {
        $item .= 'GAME COMPONENT';
    } elseif ($ticket_id) {
        $item .= 'GAME TICKET';
    }
    $item .= '        
    </div>

    <div class="card-body p-0">
    <div class="row d-flex justify-content-between align-items-center">

        <div class="col" style="display: flex; justify-content: center; align-items:center;">
        <input 
            class="form-check-input form-check-input-lg" 
            type="checkbox" 
            value="" 
            data-cart_id="' . $cart_id . '"
            id="checkbox-active"';

            if ($is_active) {
                $item .= 'checked'; 
            } else {
                $item .= ''; 
            }
            
            $item .= ' 
        />
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3">';

        if ($published_game_id) {

            $sqlImgPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
            $queryImgPublished = $conn->query($sqlImgPublished);
            while ($fetchedImgPublished = $queryImgPublished->fetch_assoc()) {
                $logo_path = $fetchedImgPublished['logo_path'];
                $category = $fetchedImgPublished['category'];
                $edition = $fetchedImgPublished['edition'];
                $marketplace_price = $fetchedImgPublished['marketplace_price'];

            $item .= '
                <div 
                    style="
                        overflow: hidden;
                        width: 100%;
            
            
                        position: relative;
                        padding-top: 45.25%;
                ">                                                                    
                    <img src="'.$logo_path.'" 
                        style="
                            position: absolute;
                            top: 0;
                            left: 0;
                
                            height: 100%;
                            width: 100%;
                            object-fit: cover;
                        "/>
                </div>
            ';

            }
        } elseif ($built_game_id) {

            $sqlConstantBuiltG = "SELECT * FROM constants";
            $queryConstantBuiltG = $conn->query($sqlConstantBuiltG);
            while ($fetchedConstantBuiltG = $queryConstantBuiltG->fetch_assoc()) {
                $constant_id = $fetchedConstantBuiltG['constant_id'];
                $image_path = $fetchedConstantBuiltG['image_path'];

                $item .= '
                    <img src="'.$image_path.'" 
                    style="
                        height: 100%;
                        width: 50%;
                        object-fit: cover;
                    "/>
                ';

            }
        } elseif ($added_component_id) {

                $item .= '
                    <img src="" 
                        style="
                            height: 100%;
                            width: 50%;
                            object-fit: cover;
                        "/>
                ';
    
        } elseif ($ticket_id) {

            $sqlConstantBuiltG = "SELECT * FROM constants WHERE constant_id = 1";
            $queryConstantBuiltG = $conn->query($sqlConstantBuiltG);
            while ($fetchedConstantBuiltG = $queryConstantBuiltG->fetch_assoc()) {
                $constant_id = $fetchedConstantBuiltG['constant_id'];
                $image_path = $fetchedConstantBuiltG['image_path'];

                $item .= '
                    <img src="'.$image_path.'" 
                    style="
                        height: 100%;
                        width: 50%;
                        object-fit: cover;
                    "/>
                ';

            }
        }

        $item .= ' 
        </div>


        <div class="col-md-3 col-lg-3 col-xl-3">';

            if ($published_game_id) {
                $sqlGetTitle = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
                $queryGetTitle = $conn->query($sqlGetTitle);
                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                    $fetched_title = $fetchedGetTitle['game_name'];

                    $item .= '  
                        <h5>'.$fetched_title.'</h5>
                    ';
                }
            } elseif ($built_game_id) {
                $sqlGetTitle = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
                $queryGetTitle = $conn->query($sqlGetTitle);
                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                    $fetched_title = $fetchedGetTitle['name'];

                    $item .= '                                                                   
                        <h5>'.$fetched_title.'</h5>
                    ';
                }
            } elseif ($added_component_id) {
                $sqlGetComponentID = "SELECT * FROM added_game_components WHERE added_component_id = $added_component_id";
                $queryGetComponentID = $conn->query($sqlGetComponentID);
                while ($fetchedGetComponentID = $queryGetComponentID->fetch_assoc()) {
                    $fetched_component_id = $fetchedGetComponentID['component_id'];

                    $sqlGetTitle = "SELECT * FROM game_components WHERE component_id = $fetched_component_id";
                    $queryGetTitle = $conn->query($sqlGetTitle);
                    while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                        $fetched_title = $fetchedGetTitle['component_name'];
                        $fetched_category = $fetchedGetTitle['category'];
                        $fetched_size = $fetchedGetTitle['size'];

                        $item .= '                                                                   
                            <h5>'.$fetched_title.'</h5>
                        ';
                    }
                }
            } elseif ($ticket_id) {
                $sqlGetTitle = "SELECT * FROM tickets WHERE ticket_id = $ticket_id";
                $queryGetTitle = $conn->query($sqlGetTitle);
                while ($fetchedGetTitle = $queryGetTitle->fetch_assoc()) {
                    $fetched_game_id = $fetchedGetTitle['game_id'];

                    $getGameName = "SELECT * FROM games WHERE game_id = $fetched_game_id";
                    $queryGetName = $conn->query($getGameName);
                    while ($fetchedGetTitleA = $queryGetName->fetch_assoc()) {
                        $fetched_game_name = $fetchedGetTitleA['name'];
                        $item .= '                                                                   
                            <h5>Game Name:'.$fetched_game_name.'</h5>
                        ';
                    }
                }
            }


            if ($published_game_id){        

                $item .= '
                <div class="mt-1 mb-0 text-muted">
                    <span>Game Category: '.$category.'</span>
                </div>

                <div class="mt-1 mb-0 text-muted">
                    <span>Game Edition: '.$edition.'</span>
                </div>

                ';
            }  elseif ($built_game_id){
                $item .= '

                ';

            } elseif ($added_component_id){
                $item .= '
                <div class="mt-1 mb-0 text-muted">
                    <span>Category: Game Component Title</span>
                </div>

                <div class="mt-1 mb-0 text-muted">
                    <span>Size: Size</span>
                </div>

                <div class="mt-1 mb-0 text-muted">
                    <span>Custom Design: ';

                        $item .= '<a href="" download=""><i class="fa-solid fa-download"></i></a>';
                        
                    $item .= '
                    </span>
                </div>
                ';

            } elseif ($ticket_id){
                $item .= '
                    Please Buy this so that you can Admin Review the Game
                ';

            }
        $item .= '
        </div>



        <div class="col">
            <h5 class="mb-0">P' . $price . '</h5>
        </div>';

        if ($ticket_id){        

            $item .= '
            <div class="col">
                <input min="1" max="99" data-cart_id="' . $cart_id . '" value="' . $quantity . '" type="number" class="form-control-sm quantity-input" readonly/>
            </div>

            ';
        } else {
            $item .= '
            <div class="col">
                <input min="1" max="99" data-cart_id="' . $cart_id . '" value="' . $quantity . '" type="number" class="form-control-sm quantity-input" />
            </div>

            ';
        }

        $item .= '


        <div class="col">
            <h5 class="mb-0">P' . $total_price . '</h5>
        </div>

        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
            <button class="text-danger delete-cart-item" data-cart_id="' . $cart_id . '"><i class="fas fa-trash fa-lg"></i></button>
        </div>






    </div>
    </div>


    ';



    $json[] = array(
        "item" => $item,
    );
}



echo json_encode($json);
