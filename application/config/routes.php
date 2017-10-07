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


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['dashboard'] = 'profile/dashboard';
/// Profle Route Set
$route['profile/myprofile'] = 'profile/profile/viewProfile';
$route['profile/update'] = 'profile/profile/index';
$route['profile/search'] = 'profile/profile/search';

///ces Route set
$route['pub/add'] = 'public_web/publicweb/index';
$route['pub/viewedit'] = 'public_web/publicweb/viewForEdit';
$route['pub/details'] = 'public_web/publicweb/view';
$route['pub/edit'] = 'public_web/publicweb/edit';


///ces Route set
$route['ces/add'] = 'ces/ces_controller/index';
$route['ces/create'] = 'ces/ces_controller/create';
$route['ces/allces'] = 'ces/ces_controller/allces';
$route['ces/edit/(:any)'] = 'ces/ces_controller/edit/$1';
$route['ces/updateCES'] = 'ces/ces_controller/updateCES';
$route['ces/grid'] = 'ces/ces_controller/grid';
$route['ces/search'] = 'ces/ces_controller/search/$1';
$route['ces/detail/(:any)'] = 'ces/ces_controller/detail/$1';



///front blog route
$route['blog'] = 'blog/Postlist';
$route['blog/(:any)'] = 'blog/Postlist/singlepost/$1';
$route['blog/(:any)/(:any)'] = 'blog/Postlist/singlepost1/$1/$2';

//Public Search
$route['publicsearch'] = 'doctor/DocController/publicSearch';
$route['publicsearch/detail/(:any)'] = 'doctor/DocController/details_profile/$1';


//personals
$route['personal/add'] = 'personal/Personal/add';
$route['personal/all'] = 'personal/Personal/grid';
$route['personal/list'] = 'personal/Personal/all';
$route['personal/search'] = 'personal/Personal/search';
$route['personal/detail/(:any)'] = 'personal/Personal/detail/$1';
$route['personal/edit/(:any)'] = 'personal/Personal/edit/$1';

//classified
$route['classifieds/add'] = 'classifieds/classifieds/add';
$route['classifieds/viewmyclassfied'] = 'classifieds/classifieds/viewmyclassfied';
$route['classifieds/all'] = 'classifieds/classifieds/viewall';
$route['classifieds/layoutfull/(:any)'] = 'classifieds/classifieds/layoutfull/$1';
$route['classifieds/edit/(:any)'] = 'classifieds/classifieds/edit/$1';

//events
$route['event/add'] = 'event/event/index';
$route['event/viewall'] = 'event/event/viewall';
$route['event/myevent'] = 'event/event/myevent';
$route['event/edit/(:any)'] = 'event/event/edit/$1';
$route['event/layoutfull/(:any)'] = 'event/event/layoutfull/$1';

//group
$route['group/add'] = 'group/group/index';
$route['group/viewall'] = 'group/group/viewall';
$route['group/mygroup'] = 'group/group/mygroup';
$route['group/edit/(:any)'] = 'group/group/edit/$1';

///inside blog
$route['insideblog/create'] = 'insideblog/insideblog/insideblogcreate';
$route['insideblog/all'] = 'insideblog/insideblog/insidebloglist';
$route['insideblog/list'] = 'insideblog/insideblog/insideblogmylist';
$route['insideblog/edit/(:any)'] = 'insideblog/Insideblog/edit/$1';
$route['insideblog/details/(:any)'] = 'insideblog/Insideblog/insideblogsinglepost/$1';

//forum
$route['forum/board'] = 'forum/forum/index';
$route['forum/posts'] = 'forum/forum/allmypostlist';
$route['forum/comments'] = 'forum/forum/allmycomments';
$route['forum/addCategory'] = 'forum/forum/addcat';
$route['forum/listcat/(:any)'] = 'Forum/forum/listcat/$1';
$route['forum/discuss/(:any)'] = 'Forum/forum/discuss/$1';
$route['forum/editPost/(:any)'] = 'forum/forum/editPost/$1';
$route['forum/editComment/(:any)'] = 'forum/forum/editComment/$1';

//products
$route['product/add'] = 'product/products/add';
$route['product/all'] = 'product/products/allProductGrid';
$route['product/list'] = 'product/products/myproduct';
$route['product/details/(:any)'] = 'product/products/layoutfull/$1';
$route['product/edit/(:any)'] = 'product/products/edit/$1';







