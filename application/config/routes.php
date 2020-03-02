<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'user/Layout_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
				//User//
$route['index'] = 'user/Layout_controller';
//Gioi Thieu
$route['gioi-thieu'] = 'user/Intro_controller';
$route['chi-tiet-trang/(:num)'] = 'user/Intro_controller/detail_intro/$1';
//San Pham
$route['san-pham'] = 'user/Product_controller';
$route['san-pham/page/(:num)'] = 'user/Product_controller/view_product/page/$1';
//San Pham Theo Loại
$route['sanpham-theoloai/(:num)'] = 'user/Product_controller/view_product_type/$1';
//San Pham Theo Thương Hiệu
$route['sanpham-theothuonghieu/(:num)'] = 'user/Product_controller/view_product_brand/$1';
//Gio Hang
$route['gio-hang'] = 'user/Cart_controller/cart';
$route['them-gio-hang'] = 'user/Cart_controller/addToCart';
$route['xoa-gio-hang/(:num)'] = 'user/Cart_controller/remove/$1';
//Đặt Xe
$route['dat-xe/(:num)'] = 'user/BookCar_controller/book_car/$1';
$route['xuly-datxe/(:num)'] = 'user/BookCar_controller/process_book_car/$1';
$route['book-success'] = 'user/BookCar_controller/book_success';
//Bill
$route['donhang'] = 'user/Bill_controller/bill';
$route['don-hang/(:num)'] = 'user/Bill_controller/bill_detail/$1';
$route['huy-don/(:num)'] = 'user/Bill_controller/cancel_bill/$1';
$route['huy-don-hang/(:num)'] = 'user/Bill_controller/cancel_bill_detail/$1';
$route['cancel-success'] = 'user/Bill_controller/cancel_success';
$route['cancel-failed'] = 'user/Bill_controller/cancel_failed';
//Search
$route['process-search'] = 'user/Search_controller/process_search';
$route['search/(:any)'] = 'user/Search_controller/search/$1';
$route['search/(:any)/page/(:num)'] = 'user/Search_controller/search/$1/page/$2';

$route['lien-he'] = 'user/Contact_controller';
$route['xuly-lien-he'] = 'user/Contact_controller/xuly_lienhe';
$route['dang-ky'] = 'user/Register_controller';
$route['xuly-dangky'] = 'user/Register_controller/xuly_dangky';
$route['success'] = 'user/Register_controller/success';
$route['dang-nhap'] = 'user/Login_controller';
$route['quen-matkhau'] = 'user/Login_controller/quen_matkhau';
$route['tim-matkhau'] = 'user/Login_controller/tim_matkhau';
$route['capnhat-matkhau'] = 'user/Login_controller/capnhat_matkhau';
$route['matkhau-moi'] = 'user/Login_controller/matkhau_moi';
$route['xuly-dangnhap'] = 'user/Login_controller/xuly_dangnhap';
$route['dang-xuat'] = 'user/Login_controller/dang_xuat';
$route['capnhat-taikhoan/(:num)'] = 'user/User_controller/capnhat_taikhoan/$1';
$route['xuly-capnhat-taikhoan/(:num)'] = 'user/User_controller/xuly_capnhat_taikhoan/$1';
//Vehicle
$route['vehicle-detail'] = 'user/Vehicle_controller';
$route['vehicle-detail/(:num)'] = 'user/Vehicle_controller/vehicle_detail/$1';

				//Admin//
$route['admin'] = 'admin/Layout_controller';
$route['login'] = 'admin/Login_controller';
$route['process-login'] = 'admin/Login_controller/process_login';
$route['logout'] = 'admin/Login_controller/logout';
//Booking
$route['booking'] = 'admin/Booking_controller/list_booking';
$route['booking-cancel'] = 'admin/Booking_controller/list_booking_cancel';
$route['booking-confirm/(:num)'] = 'admin/Booking_controller/booking_confirm/$1';
$route['page-cancel/(:num)'] = 'admin/Booking_controller/page_cancel/$1';
$route['process-page-cancel/(:num)'] = 'admin/Booking_controller/process_page_cancel/$1';
//Vehicle Type
$route['vehicle-type'] = 'admin/Vehicle_Type_controller/vehicle_type';
$route['insert-vehicle-type'] = 'admin/Vehicle_Type_controller/insert_vehicle_type';
$route['process-insert-vehicle-type'] = 'admin/Vehicle_Type_controller/process_insert_vehicle_type';
$route['update-vehicle-type/(:num)'] = 'admin/Vehicle_Type_controller/update_vehicle_type/$1';
$route['process-update-vehicle-type/(:num)'] = 'admin/Vehicle_Type_controller/process_update_vehicle_type/$1';
$route['process-delete-vehicle-type/(:num)'] = 'admin/Vehicle_Type_controller/process_delete_vehicle_type/$1';
//Vehicle Brand
$route['vehicle-brand'] = 'admin/Vehicle_Brand_controller/vehicle_brand';
$route['insert-vehicle-brand'] = 'admin/Vehicle_Brand_controller/insert_vehicle_brand';
$route['process-insert-vehicle-brand'] = 'admin/Vehicle_Brand_controller/process_insert_vehicle_brand';
$route['update-vehicle-brand/(:num)'] = 'admin/Vehicle_Brand_controller/update_vehicle_brand/$1';
$route['process-update-vehicle-brand/(:num)'] = 'admin/Vehicle_Brand_controller/process_update_vehicle_brand/$1';
$route['process-delete-vehicle-brand/(:num)'] = 'admin/Vehicle_Brand_controller/process_delete_vehicle_brand/$1';
//Vehicle
$route['vehicle'] = 'admin/Vehicle_controller/vehicle';
$route['insert-vehicle'] = 'admin/Vehicle_controller/insert_vehicle';
$route['process-insert-vehicle'] = 'admin/Vehicle_controller/process_insert_vehicle';
$route['update-vehicle/(:num)'] = 'admin/Vehicle_controller/update_vehicle/$1';
$route['process-update-vehicle/(:num)'] = 'admin/Vehicle_controller/process_update_vehicle/$1';
$route['process-delete-vehicle/(:num)'] = 'admin/Vehicle_controller/process_delete_vehicle/$1';
//Contact //Guest-User
$route['contact'] = 'admin/Contact_controller';
$route['contact-examined'] = 'admin/Contact_controller/list_contact_examined';
$route['contact-details/(:num)'] = 'admin/Contact_controller/contact_details/$1';
$route['process-contact-details/(:num)'] = 'admin/Contact_controller/process_contact_details/$1';
$route['process-delete-contact/(:num)'] = 'admin/Contact_controller/process_delete_contact/$1';
//User-Admin
$route['user-admin'] = 'admin/User_admin_controller/user_admin';
$route['user-admin-deleted'] = 'admin/User_admin_controller/user_admin_deleted';
$route['insert-user-admin'] = 'admin/User_admin_controller/insert_user_admin';
$route['process-insert-user-admin'] = 'admin/User_admin_controller/process_insert_user_admin';
$route['update-user-admin-userrole/(:num)'] = 'admin/User_admin_controller/update_user_admin_userrole/$1';
$route['process-update-user-admin-userrole/(:num)'] = 'admin/User_admin_controller/process_update_user_admin_userrole/$1';
$route['update-user-admin/(:num)'] = 'admin/User_admin_controller/update_user_admin/$1';
$route['process-update-user-admin/(:num)'] = 'admin/User_admin_controller/process_update_user_admin/$1';
$route['process-delete-user-admin/(:num)'] = 'admin/User_admin_controller/process_delete_user_admin/$1';
$route['process-reset-user-admin/(:num)'] = 'admin/User_admin_controller/process_reset_user_admin/$1';
$route['process-remove-user-admin/(:num)'] = 'admin/User_admin_controller/process_remove_user_admin/$1';
//User-Role
$route['user-role'] = 'admin/User_role_controller/user_role';
$route['insert-user-role'] = 'admin/User_role_controller/insert_user_role';
$route['process-insert-user-role'] = 'admin/User_role_controller/process_insert_user_role';
$route['update-user-role/(:num)'] = 'admin/User_role_controller/update_user_role/$1';
$route['process-update-user-role/(:num)'] = 'admin/User_role_controller/process_update_user_role/$1';
$route['process-delete-user-role/(:num)'] = 'admin/User_role_controller/process_delete_user_role/$1';
//Member Register User
$route['user'] = 'admin/User_controller/user';
$route['user-deleted'] = 'admin/User_controller/user_deleted';
$route['update-user/(:num)'] = 'admin/User_controller/update_user/$1';
$route['process-update-user/(:num)'] = 'admin/User_controller/process_update_user/$1';
$route['process-restore-user/(:num)'] = 'admin/User_controller/process_restore_user/$1';
$route['process-delete-user/(:num)'] = 'admin/User_controller/process_delete_user/$1';
$route['process-remove-user/(:num)'] = 'admin/User_controller/process_remove_user/$1';
//Subscriber
$route['sub'] = 'admin/Sub_controller/sub';
$route['process-subscribe'] = 'admin/Sub_controller/process_sub_user';
$route['process-unsubscribe/(:num)'] = 'admin/Sub_controller/process_unsub_user/$1';
//Page
$route['list-page'] = 'admin/Page_controller/list_page';
$route['insert-page'] = 'admin/Page_controller/insert_page';
$route['process-insert-page'] = 'admin/Page_controller/process_insert_page';
$route['update-page/(:num)'] = 'admin/Page_controller/update_page/$1';
$route['process-update-page/(:num)'] = 'admin/Page_controller/process_update_page/$1';
$route['process-delete-page/(:num)'] = 'admin/Page_controller/process_delete_page/$1';

