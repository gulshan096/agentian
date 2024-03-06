<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Website
$route['default_controller'] 				   =	'Frontend/home';
$route['delete_cache'] 					       =	'Frontend/delete_cache';
$route['home_test'] 					       =	'Frontend/home_test'; 


$route['get_more_property'] 				   =	'Frontend/getMoreProperty';
$route['property_details/(:any)'] 			   =	'Frontend/property_details/$1';
$route['post_property'] 					   =	'Frontend/post_property';
$route['post_property/sell'] 				   =	'Frontend/post_property_sell';
$route['post_property/buy'] 				   =	'Frontend/post_property_buy';
$route['post_property/landlord'] 			   =	'Frontend/post_property_landlord';
$route['post_property/lessee'] 				   =	'Frontend/post_property_lessee';
$route['post_property/lessor'] 				   =	'Frontend/post_property_lessor';
$route['post_property/tenant'] 				   =	'Frontend/post_property_tenant';

$route['about-us'] 					           =	'Frontend/about_us';
$route['privacy_policy'] 					   =	'Frontend/privacy_policy';
$route['terms_condition'] 					   =	'Frontend/terms_condition';
$route['help'] 					               =	'Frontend/help';
$route['contact'] 					           =	'Frontend/contact';

$route['account-delete'] 					   =	'Frontend/account_delete';
$route['delete_post'] 					       =	'Frontend/delete_post';

$route['user/property/for_buyer/(:any)'] 	   =	'Search/getPropertyByRequester/$1';
$route['user/property/for_seller/(:any)'] 	   =	'Search/getPropertyByRequester/$1';
$route['user/property/for_landlord/(:any)']    =	'Search/getPropertyByRequester/$1';
$route['user/property/for_lessor/(:any)'] 	   =	'Search/getPropertyByRequester/$1';
$route['user/property/for_lessee/(:any)'] 	   =	'Search/getPropertyByRequester/$1';
$route['user/property/for_tenant/(:any)'] 	   =	'Search/getPropertyByRequester/$1';


// Auth
$route['login'] 					           =	'Frontend/login';
$route['verify_otp'] 					       =	'Frontend/verify_otp';
$route['logout'] 					           =	'Authentication/user_logout';

$route['user/dashboard'] 					   =	'user/dashboard/dashboard';
$route['user/transaction'] 					   =	'user/dashboard/transaction';
$route['success'] 					           =	'user/dashboard/success';

// User Panel
$route['user/my_listing/looking_for/(:any)']   =	'user/MyListing/looking_for/$1';
$route['user/my_listing/available_for/(:any)'] =	'user/MyListing/available_for/$1';

// Update Post
$route['user/property/buy-property']          =  'user/Property/buy_property/0';
$route['user/property/buy-property/(:any)']   =  'user/Property/buy_property/$1';


$route['user/property/sell-property']         =  'user/Property/sell_property/0';
$route['user/property/sell-property/(:any)']  =  'user/Property/sell_property/$1';

$route['user/property/rent_out']              =  'user/Property/landlord_property/0';
$route['user/property/rent_out/(:any)']       =  'user/Property/landlord_property/$1';

$route['user/property/lease_out']             =  'user/Property/lessor_property/0';
$route['user/property/lease_out/(:any)']      =  'user/Property/lessor_property/$1';

$route['user/property/rent_in']               =  'user/Property/tenant_property/0';
$route['user/property/rent_in/(:any)']        =  'user/Property/tenant_property/$1';

$route['user/property/lease_in']              =  'user/Property/lessee_property/0';
$route['user/property/lease_in/(:any)']       =  'user/Property/lessee_property/$1';


//Chats
$route['user/my_chat'] 	=	'user/Chat_controller/my_chat';


// wishlist
$route['user/wishlist'] 	    =	'user/dashboard/wishlist/0';
$route['user/wishlist/(:any)'] 	=	'user/dashboard/wishlist/$1';

// Profile
$route['user/profile'] 	        =	'user/dashboard/my_profile';
$route['user/referal_code'] 	=	'user/dashboard/referal_code';

// Membership
$route['user/membership'] 	    =	'user/dashboard/membership';
$route['user/my_membership'] 	=	'user/dashboard/my_membership';


//for admin panel
$route['administrator']									 =	'Authentication/login';
$route['administrator/logout']							 =	'Authentication/admin_logout';
$route['administrator/updatestatus']					 =	'administrator/Master/updatestatus';
$route['administrator/updatefeaturestatus']				 =	'administrator/Master/updatefeaturestatus';
$route['administrator/dashboard']						 =	'Authentication/dashboard';
$route['administrator/manageemailtemplate']   	    	 =	'administrator/Email/listemailtemplate';
$route['administrator/enquire']   	    	             =	'administrator/Users/enquire';

// Wallet
$route['administrator/pages/wallet']				     =	'administrator/wallet/wallet/0';
$route['administrator/pages/wallet_edit/(:any)']		 =	'administrator/wallet/wallet/$1';
$route['administrator/wallet/manageWallet']              =	'administrator/wallet/manageWallet';


// Referal code

$route['administrator/referal_code']                     =   'administrator/wallet/referal_code/0';
$route['administrator/referal_code_edit/(:any)']         =   'administrator/wallet/referal_code/$1';
$route['administrator/manage_referal_code']              =   'administrator/wallet/manage_referal_code';

 //for admin panel
$route['administrator/users/view']     					 =	'administrator/users/view/0';
$route['administrator/users/view/(:any)']     			 =	'administrator/users/view/$1';

$route['administrator/pages/view']     				     =	'administrator/Pages/view/0';
$route['administrator/pages/view/(:any)']     		     =	'administrator/Pages/view/$1';

$route['administrator/traders/view']     				 =	'administrator/Traders/view/0';
$route['administrator/traders/view/(:any)']     		 =	'administrator/Traders/view/$1';

$route['administrator/traders/schemes']     			 =	'administrator/Traders/schemes/0';
$route['administrator/traders/schemes/(:any)']     		 =	'administrator/Traders/schemes/$1';

$route['administrator/traders/credits']     			 =	'administrator/Traders/credits/0';
$route['administrator/traders/credits/(:any)']     		 =	'administrator/Traders/credits/$1';

$route['administrator/catalogue/view']     				 =	'administrator/Catalogue/view/0';
$route['administrator/catalogue/view/(:any)']     		 =	'administrator/Catalogue/view/$1';

$route['administrator/orders/view']     				 =	'administrator/Orders/view/0';
$route['administrator/orders/view/(:any)']     		 	 =	'administrator/Orders/view/$1';

$route['administrator/invoice/view']     				 =	'administrator/Invoice/view/0';
$route['administrator/invoice/view/(:any)']     		 =	'administrator/Invoice/view/$1';

 
$route['administrator/all_activity']     				 =	'administrator/Activity/all_activity/admin';
$route['administrator/all_activity/(:any)']   			 =	'administrator/Activity/all_activity/$1';
 
$route['administrator/Activity/view']     				 =	'administrator/Activity/view/0';
$route['administrator/Activity/view/(:any)']   			 =	'administrator/Activity/view/$1';

// Transaction
$route['administrator/transaction']     				 =	'Authentication/transaction';
// Users

// Dashboard


// All

$route['administrator/users/allusers']                   =   'administrator/Users/allusers/0';
$route['administrator/users/allusers/(:any)']            =   'administrator/Users/allusers/$1';

// Buyer
$route['administrator/users/buyer']                      =   'administrator/Users/buyer/0';
$route['administrator/users/buyer/(:any)']               =   'administrator/Users/buyer/$1';

// seller
$route['administrator/users/seller']                     =   'administrator/Users/seller/0';
$route['administrator/users/seller/(:any)']              =   'administrator/Users/seller/$1';
              
// General setting

$route['administrator/generalsetting/social-network']           =   'administrator/Generalsetting/socialNetwork/0';
$route['administrator/generalsetting/social-network/(:any)']    =   'administrator/Generalsetting/socialNetwork/$1';

// Location
$route['administrator/location/state']           =   'administrator/Location/getState/0';
$route['administrator/location/state/(:any)']    =   'administrator/Location/getState/$1';


$route['administrator/location/city']            =   'administrator/Location/getCity/0';
$route['administrator/location/city/(:any)']     =   'administrator/Location/getCity/$1';


// Property Setting

// category
$route['administrator/category']                =   'administrator/PropertySetting/addCategory/0';
$route['administrator/category/(:any)']         =   'administrator/PropertySetting/addCategory/$1';
$route['administrator/delete_category/(:any)'] =   'administrator/PropertySetting/delete_category/$1';


// sub category
$route['administrator/subcategory']             =   'administrator/PropertySetting/addSubCategory/0';
$route['administrator/subcategory/(:any)']      =   'administrator/PropertySetting/addSubCategory/$1';
$route['administrator/delete_subcategory/(:any)'] =   'administrator/PropertySetting/delete_subcategory/$1';


//Child category
$route['administrator/childcategory']             =   'administrator/PropertySetting/addChildcategory/0';
$route['administrator/childcategory/(:any)']      =   'administrator/PropertySetting/addChildcategory/$1';
$route['administrator/delete_chid_category/(:any)'] =   'administrator/PropertySetting/delete_chid_category/$1';

//Form Fields
$route['administrator/form_field']             =   'administrator/PropertySetting/addForm_field/0';
$route['administrator/form_field/(:any)']      =   'administrator/PropertySetting/addForm_field/$1';
$route['administrator/delete_fields/(:any)']   =   'administrator/PropertySetting/delete_fields/$1';


// Filter category
$route['administrator/property-setting/filter-category']                =   'administrator/PropertySetting/addFilterCategory/0';
$route['administrator/property-setting/filter-category/(:any)']         =   'administrator/PropertySetting/addFilterCategory/$1';


// Filter sub category
$route['administrator/property-setting/filter-subcategory']             =   'administrator/PropertySetting/addFilterSubCategory/0';
$route['administrator/property-setting/filter-subcategory/(:any)']      =   'administrator/PropertySetting/addFilterSubCategory/$1';


// Filter Child Category
$route['administrator/property-setting/filter-childcategory']           =    'administrator/PropertySetting/addFilterChildCategory/0';
$route['administrator/property-setting/filter-childcategory/(:any)']    =    'administrator/PropertySetting/addFilterChildCategory/$1';


// ManagePropertylisting 

//All Property 
$route['administrator/request/all']            =    'administrator/Managelisting/propertyAll';


// sell property
$route['administrator/request/sell']           =    'administrator/Managelisting/propertySell';

// Buy property
$route['administrator/request/buy']            =    'administrator/Managelisting/propertyBuy';

// Rent property
$route['administrator/request/rent']           =    'administrator/Managelisting/propertyRent';

// Lessor property
$route['administrator/request/lessor']         =    'administrator/Managelisting/propertyLessor';

// Lease property
$route['administrator/request/lease']          =    'administrator/Managelisting/propertyLease';

// Landlord property
$route['administrator/request/landlord']       =    'administrator/Managelisting/propertyLandlord';


// Manage Membership
$route['administrator/membership']             =   'administrator/Membership_controller/membership_plan/0';
$route['administrator/membership/(:any)']      =   'administrator/Membership_controller/membership_plan/$1';


$route['administrator/property/add']           =    'administrator/Property/propertyadd';


$route['administrator/property/buy-property']          =  'administrator/Property/buy_property/0';
$route['administrator/property/buy-property/(:any)']   =  'administrator/Property/buy_property/$1';


$route['administrator/property/sell-property']         =  'administrator/Property/sell_property/0';
$route['administrator/property/sell-property/(:any)']  =  'administrator/Property/sell_property/$1';

$route['administrator/property/landlord']              =  'administrator/Property/landlord_property/0';
$route['administrator/property/landlord/(:any)']       =  'administrator/Property/landlord_property/$1';

$route['administrator/property/lessor']                =  'administrator/Property/lessor_property/0';
$route['administrator/property/lessor/(:any)']         =  'administrator/Property/lessor_property/$1';

$route['administrator/property/tenant']                =  'administrator/Property/tenant_property/0';
$route['administrator/property/tenant/(:any)']         =  'administrator/Property/tenant_property/$1';

$route['administrator/property/lessee']                =  'administrator/Property/lessee_property/0';
$route['administrator/property/lessee/(:any)']         =  'administrator/Property/lessee_property/$1';

// PAGE 

// FAQ
$route['administrator/pages/faq']                   =   'administrator/Pages/FAQ/0';
$route['administrator/pages/faq/(:any)']            =   'administrator/Pages/FAQ/$1';

// Help
$route['administrator/pages/help']                  =   'administrator/Pages/help/0';
$route['administrator/pages/help/(:any)']           =   'administrator/Pages/help/$1';

// About
$route['administrator/pages/about-us']              =   'administrator/Pages/about/0';
$route['administrator/pages/about-us/(:any)']       =   'administrator/Pages/about/$1';

// Term Condition
$route['administrator/pages/terms-condition']        =   'administrator/Pages/term_condition/0';
$route['administrator/pages/terms-condition/(:any)'] =   'administrator/Pages/term_condition/$1';

// Privacy Policy
$route['administrator/pages/privacy-policy']         =   'administrator/Pages/privacy_policy/0';
$route['administrator/pages/privacy-policy/(:any)']  =   'administrator/Pages/privacy_policy/$1';

// Banner
$route['administrator/pages/banner']                =   'administrator/Pages/banner/0';
$route['administrator/pages/banner/(:any)']         =   'administrator/Pages/banner/$1';


// Blog
$route['administrator/blog/list']                   =   'administrator/Posts/blog/0';
$route['administrator/blog/list/(:any)']            =   'administrator/Posts/blog/$1';

// Comment
$route['administrator/comments/list']               =   'administrator/Comments/list_all/0';
$route['administrator/comments/list/(:any)']        =   'administrator/Comments/list_all/$1';

$route['getCategory']          =  'Frontend/getCategory';
$route['getSubCategory']       =  'Frontend/getSubCategory';
$route['getField']             =  'Frontend/getField';
$route['getChildCategory']     =  'Frontend/getChildCategory';

$route['404_override'] 							    =	'Authentication/blank';
$route['translate_uri_dashes'] = FALSE;

