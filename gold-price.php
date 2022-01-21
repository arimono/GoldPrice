<?php

/**
* Plugin Name:       ရွှေဈေး
* Plugin URI:        
* Description:       For Personal and team use
* Version:           1.3
* Author:            Soung Oo Paing, Swe Swe Nyein   
* Author URI:        
* License:           
* License URI:       
* Text Domain:       my-textdomain
* Domain Path:       /languages
*/

//Admin-dashboard-ui
function GoldPriceMenu() {
    add_menu_page(
        __( 'ရွှေဈေး', 'my-textdomain' ),
        __( 'ရွှေဈေး', 'my-textdomain' ),
        'manage_options',
        'ရွှေဈေး',
        'GoldPricePageMenu',
        'dashicons-superhero-alt',
        3
    );
}
add_action( 'admin_menu', 'GoldPriceMenu' );



//weight
//ရွေး
// Add a yway field to product in backend
add_action( 'woocommerce_product_options_pricing', 'add_field_product_options_yway' );
function add_field_product_options_yway() {
    global $post;

    echo '<div class="options_group show_if_simple">';

    woocommerce_wp_text_input( array(
        'id'            => '_yway_gold',
        'label'         => __('ရွေး', 'woocommerce'),
        'description'   => __('yway', 'woocommerce'),
        'desc_tip'      => 'true',
    ));

    echo '</div>';
}
// Save product yway field to database when submitted in Backend
add_action( 'woocommerce_process_product_meta', 'save_product_options_yway', 30, 1 );
function save_product_options_yway( $post_id ){
    // Saving yway field value
    if( isset( $_POST['_yway_gold'] ) ){
        update_post_meta( $post_id, '_yway_gold', sanitize_text_field( $_POST['_yway_gold'] ) );
    }
}
//ရွေး end

//ပဲ
// Add a weight field to product in backend
add_action( 'woocommerce_product_options_pricing', 'add_field_product_options_petha' );
function add_field_product_options_petha() {
    global $post;

    echo '<div class="options_group show_if_simple">';

    woocommerce_wp_text_input( array(
        'id'            => '_petha_gold',
        'label'         => __('ပဲ', 'woocommerce'),
        'description'   => __('petha', 'woocommerce'),
        'desc_tip'      => 'true',
    ));

    echo '</div>';
}
// Save product petha field to database when submitted in Backend
add_action( 'woocommerce_process_product_meta', 'save_product_options_petha', 30, 1 );
function save_product_options_petha( $post_id ){
    // Saving petha field value
    if( isset( $_POST['_petha_gold'] ) ){
        update_post_meta( $post_id, '_petha_gold', sanitize_text_field( $_POST['_petha_gold'] ) );
    }
}
//ပဲ end

//ကျပ်
// Add a kyattha field to product in backend
add_action( 'woocommerce_product_options_pricing', 'add_field_product_options_kyattha' );
function add_field_product_options_kyattha() {
    global $post;

    echo '<div class="options_group show_if_simple">';

    woocommerce_wp_text_input( array(
        'id'            => '_kyattha_gold',
        'label'         => __('ကျပ်', 'woocommerce'),
        'description'   => __('kyattha', 'woocommerce'),
        'desc_tip'      => 'true',
    ));

    echo '</div>';
}
// Save product kyattha field to database when submitted in Backend
add_action( 'woocommerce_process_product_meta', 'save_product_options_kyattha', 30, 1 );
function save_product_options_kyattha( $post_id ){
    // Saving kyattha field value
    if( isset( $_POST['_kyattha_gold'] ) ){
        update_post_meta( $post_id, '_kyattha_gold', sanitize_text_field( $_POST['_kyattha_gold'] ) );
    }
}
//ကျပ် end
//weight end

//Service Fee
// Add a Service Fee field to product in backend
add_action( 'woocommerce_product_options_pricing', 'add_field_product_options_service_fees' );
function add_field_product_options_service_fees() {
    global $post;

    echo '<div class="options_group show_if_simple">';

    woocommerce_wp_text_input( array(
        'id'            => '_service_fees_for_gold',
        'label'         => __('လက်ခ', 'woocommerce'),
        'description'   => __('Service Fee', 'woocommerce'),
        'desc_tip'      => 'true',
    ));

    echo '</div>';
}
// Save product Service Fee field to database when submitted in Backend
add_action( 'woocommerce_process_product_meta', 'save_product_options_service_fees', 30, 1 );
function save_product_options_service_fees( $post_id ){
    // Saving Service Fee field value
    if( isset( $_POST['_service_fees_for_gold'] ) ){
        update_post_meta( $post_id, '_service_fees_for_gold', sanitize_text_field( $_POST['_service_fees_for_gold'] ) );
    }
}
//Service Fee end
//‌‌ရွှေ
// Add a ‌‌ရွှေ field to product in backend
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_jewellery_field' );
function woo_add_jewellery_field(){
    
    $field = array(
        'id' => 'jewellery_field',
        'label' => __( 'Select ‌‌ရွှေ / ငွေ / ပလက်တီနမ်', 'store' ),
        'desc_tip' => true,
        'description' => __( 'Select ‌‌ရွှေ / ငွေ / ပလက်တီနမ်', 'ctwc' ),
        'options'     => array(
            '0'        => __( 'Select Option', 'woocommerce' ),
            '1'       => __('‌‌ရွှေ', 'woocommerce' ),
            '2'       => __('ငွေ', 'woocommerce' ),
            '3'       => __('ပလက်တီနမ်', 'woocommerce' ),
        ),
    ); 
    woocommerce_wp_select( $field );
}
//save ‌‌ရွှေ
add_action( 'woocommerce_process_product_meta', 'woo_add_jewellery_field_save' );
function woo_add_jewellery_field_save( $post_id ){

  $jewellery_field  = $_POST['jewellery_field'];
  if( !empty( $jewellery_field ) )
      update_post_meta( $post_id, 'jewellery_field', esc_attr( $jewellery_field ) );
  else {
      update_post_meta( $post_id, 'jewellery_field',  '' );
  }
}

function GoldPricePageMenu() {
    $metal_api_url = 'https://www.metals-api.com/api/latest?access_key=n3ac58707qw5hg2wiu447mwpltupjb0qeh81m598grne37l68k88gvq604k4&base=USD&symbols=XAU%2CXAG%2CXPD%2CXPT%2CXRH';
    // Read JSON file
    $metal_json_data = file_get_contents($metal_api_url);
    // Decode JSON data into PHP array
    $metal_response_data = json_decode($metal_json_data);
    $metal_response_rate = $metal_response_data->rates->XAU;
    

    $usd_api_url = 'https://openexchangerates.org/api/latest.json?app_id=371703ed6c664d2cb32e44eabdc0724d';
    // Read JSON file
    $usd_json_data = file_get_contents($usd_api_url);
    // Decode JSON data into PHP array
    $usd_response_data = json_decode($usd_json_data);
    $usd_response_rate = $usd_response_data->rates->MMK;
    $gold_price_in_usd = 1/$metal_response_rate;
    $gold_price_in_mmk = $gold_price_in_usd*$usd_response_rate/1.875;
    print_r("useful reference rates");
    echo "<br/>";
    echo "<br/>";
    print_r("gold: ".$gold_price_in_usd);
    echo "<br/>";
    echo "<br/>";
    print_r("USD-MMK: ".$usd_response_rate);
    echo "<br/>";
    echo "<br/>";
    print_r("estimated gold price in mmk: ".$gold_price_in_mmk);
    ?>
    <style>
        .gold-main {
            max-width: 1032px;
            margin: 0 auto;
        }
        .gold-main .container {
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            margin-bottom: 24px;
            background: rgb(255, 255, 255);
            box-sizing: border-box;
            border-radius: 3px;
            border: 1px solid rgb(226, 228, 231);
        }
        .gold-main h1 {
            padding: 10px 24px 30px;
            border-bottom: 1px solid rgb(226, 228, 231);
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 0;
            font-size: 1.3rem;
        }
        .gold-main h2 {
            display: none;
        }
        .gold-main table {
            margin-top: 0;
        }
        .gold-main tr {
            height: 5em;
            border-bottom: 1px solid #e7e7e7;
        }
        .gold-main th {
            padding: 20px 0 20px 27px; 
            color: #707070;
        }
        .gold-main td {
            padding-left: 0;
            padding-bottom: 0;
        }
        .gold-main td input{
            color: #707070;
            width: 80% !important;
            margin: 0 20px 20px;
        }
        .gold-main .submit {
            margin-left: 25px;
        }
    </style>
    <div class="gold-main">
    <div class="container">
    <h1 >ယနေ့ ‌‌ရွှေ ငွေ ပလက်တီနမ်ပေါက်ဈေး ထည့်ရန်</h1>
    
    <form  method="POST" action="options.php">
    <?php
    settings_fields( 'gold-price' );
    do_settings_sections( 'gold-price' );
    submit_button();
    ?>
    </form>
    </div>
    </div>
    <?php
}

add_action( 'admin_init', 'GoldPriceInit' );

function GoldPriceInit() {

    add_settings_section(
        'gold_price_setting_section',
        __( "‌‌", 'my-textdomain' ),
        'GoldPriceCBFun',
        'gold-price'
    );
    add_settings_field( 
        '‌‌ရွှေ',
        '‌‌ရွှေ ပေါက်ဈေး (Ks)', 
        'GoldPriceSetting', 
        'gold-price', 
        'gold_price_setting_section', 
        array( 
            '‌‌ရွှေ' 
        )  
    ); 
    add_settings_field( 
        'ငွေ', 
        'ငွေ ပေါက်ဈေး (Ks)',
        'GoldPriceSetting',
        'gold-price', 
        'gold_price_setting_section', 
        array( 
            'ငွေ' 
        )  
    ); 
    add_settings_field( 
        'ပလက်တီနမ်', 
        'ပလက်တီနမ် ပေါက်ဈေး (Ks)',
        'GoldPriceSetting',
        'gold-price', 
        'gold_price_setting_section', 
        array( 
            'ပလက်တီနမ်' 
        )  
    ); 
    register_setting('gold-price','‌‌ရွှေ', 'esc_attr');
    register_setting('gold-price','ငွေ', 'esc_attr');
    register_setting('gold-price','ပလက်တီနမ်', 'esc_attr');
}
function GoldPriceCBFun() {
    esc_html_e( '', 'my-textdomain' );
}
function GoldPriceSetting($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

function GoldPriceCalc($metals) {
    if($metals == '1'){
        return get_option('‌‌ရွှေ');
    }
    if($metals == '2'){
        return get_option('ငွေ');
    }
     if($metals == '3'){
        return get_option('ပလက်တီနမ်');
    }
}
//‌‌ရွှေ end
// Simple, grouped and external products
add_filter('woocommerce_product_get_price', 'GoldPrice', 99, 2 );
add_filter('woocommerce_product_get_regular_price', 'GoldPrice', 99, 2 );

// Variations
add_filter('woocommerce_product_variation_get_regular_price', 'GoldPrice', 99, 2 );
add_filter('woocommerce_product_variation_get_price', 'GoldPrice', 99, 2 );
function GoldPrice( $price, $product ) {
    $yway = (get_post_meta( $product->get_id(), '_yway_gold', true ));
    $petha = (get_post_meta( $product->get_id(), '_petha_gold', true ));
    $kyattha = (get_post_meta( $product->get_id(), '_kyattha_gold', true ));
    $serviceFees = get_post_meta( $product->get_id(), '_service_fees_for_gold', true );
    

    $prices = '';
    $data_value = '';
    $data = $product->get_data();
    $meta_value=$meta = get_post_meta($data['id'], '', true);
    foreach ($meta_value as $key => $value) {
       if($key == 'jewellery_field'){
            $data_value = $value[0];
       }  
    }
    $ywayFloat = (float) $yway;
    $pethaFloat = (float) $petha;
    $kyatthaFloat = (float) $kyattha;
    $weightFloat = (float) (((($ywayFloat/8)+$pethaFloat)/16)+$kyatthaFloat);
    
    $serviceFeesFloat = (float) $serviceFees;
    if($weightFloat!=0){
        if($data_value == 1 || $data_value == 2 || $data_value == 3){
            return (float) (($weightFloat * GoldPriceCalc($data_value)) + $serviceFeesFloat);
        }
    }
    else{
        return (float)  $price; 
        
    }
}



