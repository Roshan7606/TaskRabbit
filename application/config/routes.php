<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//VISOTOR ROUTES
$route['Home'] = "Pages/index";
$route['Terms-condition'] = "Pages/terms";
$route['Log-in'] = "Pages/login";
$route['Sign-up'] = "Pages/signup";
$route['About-us'] = "Pages/aboutus";
$route['Contact-us'] = "Pages/contactus";
$route['Privacy-policy'] = "Pages/privacypolicy";
$route['Restaurant/(:any)'] = "Pages/restaurant/$2";
$route['Restaurant-Details/(:any)'] = "Pages/restaurantdetails/$2";
$route['City'] = "Pages/city";
$route['Profile'] = "Pages/userprofile";
$route['User-Shipment'] = "Pages/usershipment";
$route['User-Setting'] = "Pages/usersetting";
$route['User-Favourite'] = "Pages/userfavourite";
$route['User-Order'] = "Pages/userorder";
$route['User-Review'] = "Pages/userreview";
$route['Packages'] = "Pages/packages";
$route['Order-Detail/(:any)'] = "Pages/orderdetail/$2";
$route['Order-review'] = "Pages/orderreview";
$route['Confirm-order-detail'] = "Pages/confirmorderdetails";
$route['Feedback'] = "Pages/feedback";
$route['Payment-Complete'] = "Pages/payment_successful";
$route['Payment-Fail'] = "Pages/payment_fail";
$route['Payment-Notify'] = "Pages/payment_notify";
$route['Payment-Succes/(:any)/(:any)/(:any)/(:any)'] = "Pages/payment_success/$2/$3/$4/$5";
$route['User-Logout'] = "Pages/logout";
$route['Menu'] = "Pages/Menu";
$route['User-Editprofile'] = "Pages/editprofile";
$route['Remove-Visitor/(:any)/(:any)'] = "Pages/delete/$2/$3";
$route['Insert-billing-information/(:any)'] = "Backend/insert_bill/$2";
$route['User-Bill/(:any)/(:any)'] = "Pages/userbill/$2/$3";
$route['addtocart'] = 'cart/addtocart';



//ADMIN ROUTESs
$route['Admin-Resume-Demo'] = "Authorization/demoresume";
$route['Admin-Authentication'] = "Authorization/index";
$route['Admin-Home'] = "Authorization/home";
$route['Admin-Manage-Contact'] = "Authorization/managecontact";
$route['Admin-Manage-Feedback'] = "Authorization/managefeedback";
$route['Admin-Manage-Email'] = "Authorization/manageemail";
$route['Admin-Manage-User'] = "Authorization/manageuser";
$route['Admin-Manage-State'] = "Authorization/managestate";
$route['Admin-Manage-City'] = "Authorization/managecity";
$route['Admin-Manage-Area'] = "Authorization/managearea";
$route['Admin-Manage-Active-Stores'] = "Authorization/manageactivestores";
$route['Admin-Manage-Deactive-Stores'] = "Authorization/managedeactivestores";
$route['Admin-Manage-Active-Users'] = "Authorization/manageactiveusers";
$route['Admin-Manage-Deactive-Users'] = "Authorization/managedeactiveusers";
$route['Admin-Manage-Banner'] = "Authorization/managebanner";
$route['Admin-Manage-Subscriber'] = "Authorization/managesubscriber";
$route['Admin-Active-Request'] = "Authorization/request";
$route['Admin-Main-Category'] = "Authorization/maincategory";
$route['Edit-Main-Category/(:any)'] = "Edit/maincat/$2";

//$route['Admin-Manage-Main-Category']="Authorization/maincategory";
//$route['Admin-Manage-Food-Category']="Authorization/managefoodcategory";
//$route['Admin-Manage-Dishes']="Authorization/managedishes";
$route['Admin-Manage-Packages'] = "Authorization/managepackages";
$route['Admin-Manage-Promocode'] = "Authorization/managepromocode";
$route['Admin-Edit-Profile'] = "Authorization/changepassword";
$route['Remove/(:any)/(:any)'] = "Authorization/delete/$2/$3";
$route['Active-Deactive/(:any)/(:any)'] = "Authorization/activedeactive/$2/$3";
$route['Admin-Logout'] = "Authorization/logout";
$route['Edit-State/(:any)'] = "Edit/state/$2";
$route['Edit-City/(:any)'] = "Edit/city/$2";
$route['Edit-Area/(:any)'] = "Edit/area/$2";
$route['Edit-Package/(:any)'] = "Edit/packages/$2";
$route['Edit-Promocode/(:any)'] = "Edit/promocode/$2";


//SELLER ROUTESS
$route['Restaurant-Sign-In'] = "Restaurant/index";
$route['Restaurant-Sign-Up'] = "Restaurant/signup";
$route['Restaurant-Sign-Up-Details'] = "Restaurant/signupdetail";
$route['Restaurant-Logout'] = "Restaurant/logout";
$route['Restaurant-Forgot-Password'] = "Restaurant/forgotpassword";
$route['Restaurant-Home'] = "Restaurant/home";
$route['Restaurant-Edit-Profile'] = "Restaurant/editprofile";
$route['Restaurant-Change-Password'] = "Restaurant/changepassword";
$route['Restaurant-Sub-Category'] = "Restaurant/subcategory";
//$route['Restaurant-Peta-Category']="Restaurant/petacategory";
$route['Restaurant-Add-Items'] = "Restaurant/additems";
$route['Restaurant-Manage-Items'] = "Restaurant/manageitems";
$route['Restaurant-Manage-Schedule'] = "Restaurant/manageschedule";
$route['Restaurant-View-Item/(:any)'] = "Restaurant/itemdetail/$2";
$route['Restaurant-Item-Review-Rating'] = "Restaurant/itemreviewrating";
$route['Restaurant-Menu'] = "Restaurant/Menu";
$route['Restaurant-Order'] = "Restaurant/Order";
$route['Restaurant-Manage-Bill-Payment'] = "Restaurant/managebillpayment";
$route['Restaurant-Reports'] = "Restaurant/reports";
$route['Restaurant-Remove/(:any)/(:any)'] = "Restaurant/delete/$2/$3";
$route['Restaurant-Item-Edit/(:any)'] = "Restaurant_edit/edit_item/$2";
$route['Edit-Restaurant-Account'] = "Restaurant_edit/editaccount";
$route['Edit-Restaurant-Bank-Details'] = "Restaurant_edit/editbankdetails";
$route['Edit-Restaurant-Location-Info'] = "Restaurant_edit/editlocationinfo";
$route['Edit-Sub-Category/(:any)'] = "Restaurant_edit/subcat/$2";

$route['Restaurant-Active-Request'] = "Restaurant/activestatus";
//Backend related routes
$route['Package-Update/(:any)/(:any)'] = "Backend/package_update/$2/$3";

