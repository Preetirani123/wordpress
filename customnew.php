<?php /* Template Name: CustomPageT1 */ ?>
 
<?php get_header(); ?>

<!DOCTYPE html>
<html lang="en">
<body>
<div class="container donate-page support-center">
<div class="donate-inner">
<p class="donate-heading">Support Centre</p>
<p class="donate-des">Canadian Caremongers Society is ..... This is filler text. The European languages are members of the same family. This is filler text. The European languages are members of the same family. This is filler text. The European languages are members of the same family.</p>

<div class="Geenees-platform">
<p class="heading">GeeNees Gifting Platform</p>
<div class="Geenees-platform-1">
<p class="image"><img src="/wp-content/uploads/2020/06/logo-g.jpg" alt="" class="wp-image-1316"></p>
</div>
<div class="Geenees-platform-2">
<p>Geenees is a free gifting platform that connects donors like you to families in need. Geenees has
partnered with the Canadian Caremongering Society to offer their platform for our members </p>
<p>Sign up and create your persnal wishlist of producrts you are currently in need of. Those that are in
a position to donate will see your wishlist, using the Geenees app, and puchase/donate those items
to you. You can choose products from Amazon.ca or just add a name of a product/service to your
wishlist.</p>
<p> Submit the form below to receive a persnal access code to the Geenees app.</p>
<p> The form information below is needed to connect wishlist to you, and to ensure the items arrive at
your proper address.</p>
<p> The Canadian Caremongering Society is thrilled to partner with Geenees!
Geenees is a free online gifting platform that helps families like you get the items and services you
truly need.</p>
<div class="funding-need">
<h4>How does GeeNees work?</h4>
<p>- You create a wishlist of the items or services you need on the Geenees app. You can choose
specific products from Amazon.ca or simply add an item or service.</p>
<p>- Donors will see your wishlist and can purchase items for you within the app.</p>
<p>- Your items will be sent directly to you.</p>
<h4>Ready to sign-up?</h4>
<p>Fill out the form below to receive a personal access code to the Geenees app. This information is
required to set up your wishlist and delivery address.</p>
<div class="G-form">
	   <p>All required fields</p>
	   <form method="post" action="#">
        <p><span><label for="fname">Email</label></span>        
         <input type="email" id="email" name="email"></p>

        <p><span><label>City</label></span>
        <input type="text" id="city" name="city" ></p>

	    <p><span><label>Street</label></span>
          <input type="text" id="street" name="street"></p>

        <p><span><label>Country</label></span>
        <input type="text" id="country" name="country"></p>

       <p><span><label>Province</label></span>
        <input type="text" id="province" name="province"></p>
    
        <p><span><label>Postal code</label></span>
        <input type="text" id="postal_code" name="postal_code"></p>

          <button type="submit" id="submit">Submit</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html><!-- .content-area -->

<?php

//set empty variable placeholders
$email = $city = $street = $country = $province = $postal_code = "";

//Get data from Form
$email = secure_data($_POST['email']);
$city = secure_data($_POST['city']);
$street = secure_data($_POST['street']);
$country = secure_data($_POST['country']);
$province = secure_data($_POST['province ']);
$postal_code = secure_data($_POST['postal_code']);


//Set API Key
$apiKey = "6e740921-32bc-48e6-b4c8-647388195be1";

//Strip html and slashes etc
function secure_data($data){
    $Sdata = trim($data);
    $Sdata = stripslashes($data);
    $Sdata = htmlspecialchars($data);
    //var_dump($Sdata);
    return $Sdata;
}

//Set up POST array
$array = array (
    "email " => $email ,
    "city " => $city ,
    "street " => $street ,
    "country " => $country ,
    "province " => $province ,
    "postal_code" => $postal_code,
    "apiKey" => $apiKey,
);

$data_string = json_encode($array);

//var_dump ($data_string);

$url = 'https://api.geenees.co';

//Create cURL connection
$curl = curl_init($url);

//set cURL options
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))
);

//Execute cURL
$curl_response = curl_exec($curl);

//Output server response
//print_r($curl_response);

//Close cURL connection
curl_close($curl);

?>

 
<?php get_sidebar(); ?>
<?php get_footer(); ?>