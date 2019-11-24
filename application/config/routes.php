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
$route['varify'] = 'profile/profile/varify';

///ces Route set
$route['pub/add'] = 'public_web/publicweb/index';
$route['pub/viewedit'] = 'public_web/publicweb/viewForEdit';
$route['pub/details'] = 'public_web/publicweb/view';
$route['pub/edit'] = 'public_web/publicweb/edit';
///private_web Route set
$route['pri/add'] = 'private_web/Privateweb/index';
$route['pri/viewedit'] = 'private_web/Privateweb/viewForEdit';
$route['pri/details/(:any)'] = 'private_web/Privateweb/view/$1';
$route['pri/edit'] = 'private_web/Privateweb/edit';
$route['pri/search'] = 'private_web/Privateweb/search';

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
$route['article'] = 'blog/Postlist';
$route['article/(:any)'] = 'blog/Postlist/singlepost/$1';
$route['article/(:any)/(:any)'] = 'blog/Postlist/singlepost1/$1/$2';

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
$route['classifieds/search'] = 'classifieds/classifieds/search';
$route['classifieds/layoutfull/(:any)'] = 'classifieds/classifieds/layoutfull/$1';
$route['classifieds/edit/(:any)'] = 'classifieds/classifieds/edit/$1';

//events
$route['event/add'] = 'event/event/index';
$route['event/viewall'] = 'event/event/viewall';
$route['event/myevent'] = 'event/event/myevent';
$route['event/search'] = 'event/event/search';
$route['event/edit/(:any)'] = 'event/event/edit/$1';
$route['event/layoutfull/(:any)'] = 'event/event/layoutfull/$1';

//group
$route['group/add'] = 'group/group/index';
$route['group/viewall'] = 'group/group/viewall';
$route['group/mygroup'] = 'group/group/mygroup';
$route['group/search'] = 'group/group/search';
$route['group/edit/(:any)'] = 'group/group/edit/$1';
$route['group/layoutfull/(:any)'] = 'group/group/layoutfull/$1';



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
$route['forum/listcat/(:any)'] = 'forum/forum/listcat/$1';
$route['forum/discuss/(:any)'] = 'forum/forum/discuss/$1';
$route['forum/editPost/(:any)'] = 'forum/forum/editPost/$1';
$route['forum/editComment/(:any)'] = 'forum/forum/editComment/$1';

//products
$route['product/add'] = 'product/products/add';
$route['product/all'] = 'product/products/allProductGrid';
$route['product/list'] = 'product/products/myproduct';
$route['product/search'] = 'product/products/search';
$route['product/details/(:any)'] = 'product/products/layoutfull/$1';
$route['product/edit/(:any)'] = 'product/products/edit/$1';


//Advertse
$route['advertise/add'] = 'advertise/Advertise/add';
$route['advertise/list'] = 'advertise/Advertise/myadd';
$route['advertise/edit/(:any)'] = 'advertise/Advertise/edit/$1';




///search profile detail
$route['showProfile/(:any)'] = 'profile/Profile/showThisProfile/$1';


///profile verifty stage 1
$route['step1'] = 'profile/Profile/user_varify_1';


///Flip profile
$route['flip'] = 'flip/Flip/index';
$route['FlipDashboard'] = 'flip/FlipDashboard';
$route['profile/flipprofile'] = 'flip/Flip/viewProfile';
$route['profile/flipupdate'] = 'flip/Flip/update';
$route['flipshowProfile/(:any)'] = 'flip/Flip/showThisProfile/$1';
$route['flipprofile/search'] = 'flip/Flip/search';


//// flip blog
$route['flipblog/add'] = 'flip/Flipblog/create';
$route['flipblog/bloglist'] = 'flip/Flipblog/bloglist';
$route['flipblog/mybloglist'] = 'flip/Flipblog/insideblogmylist';
$route['flipblog/edit/(:any)'] = 'flip/Flipblog/edit/$1';
$route['flipblog/details/(:any)'] = 'flip/Flipblog/insideblogsinglepost/$1';




//classified
$route['flipclassifieds/add'] = 'flip/Flipclassifieds/add';
$route['flipclassifieds/viewmyclassfied'] = 'flip/flipclassifieds/viewmyclassfied';
$route['flipclassifieds/all'] = 'flip/flipclassifieds/viewall';
$route['flipclassifieds/search'] = 'flip/flipclassifieds/search';
$route['flipclassifieds/layoutfull/(:any)'] = 'flip/flipclassifieds/layoutfull/$1';
$route['flipclassifieds/edit/(:any)'] = 'flip/flipclassifieds/edit/$1';


//personals
$route['flippersonal/add'] = 'flip/FlipPersonal/add';
$route['flippersonal/all'] = 'flip/FlipPersonal/grid';
$route['flippersonal/list'] = 'flip/FlipPersonal/all';
$route['flippersonal/search'] = 'flip/FlipPersonal/search';
$route['flippersonal/detail/(:any)'] = 'flip/FlipPersonal/detail/$1';
$route['flippersonal/edit/(:any)'] = 'flip/FlipPersonal/edit/$1';


//events
$route['flipevent/add'] = 'flip/FlipEvent/index';
$route['flipevent/viewall'] = 'flip/FlipEvent/viewall';
$route['flipevent/myevent'] = 'flip/FlipEvent/myevent';
$route['flipevent/search'] = 'flip/FlipEvent/search';
$route['flipevent/edit/(:any)'] = 'flip/FlipEvent/edit/$1';
$route['flipevent/layoutfull/(:any)'] = 'flip/FlipEvent/layoutfull/$1';


//group
$route['FlipGroup/add'] = 'flip/FlipGroup/index';
$route['FlipGroup/viewall'] = 'flip/FlipGroup/viewall';
$route['FlipGroup/mygroup'] = 'flip/FlipGroup/mygroup';
$route['FlipGroup/search'] = 'flip/FlipGroup/search';
$route['FlipGroup/edit/(:any)'] = 'flip/FlipGroup/edit/$1';
$route['FlipGroup/layoutfull/(:any)'] = 'flip/FlipGroup/layoutfull/$1';

//forum
$route['FlipForum/board'] = 'flip/FlipForum/index';
$route['FlipForum/posts'] = 'flip/FlipForum/allmypostlist';
$route['FlipForum/comments'] = 'flip/FlipForum/allmycomments';
$route['FlipForum/addCategory'] = 'flip/FlipForum/addcat';
$route['FlipForum/listcat/(:any)'] = 'flip/FlipForum/listcat/$1';
$route['FlipForum/discuss/(:any)'] = 'flip/FlipForum/discuss/$1';
$route['FlipForum/editPost/(:any)'] = 'flip/FlipForum/editPost/$1';
$route['FlipForum/editComment/(:any)'] = 'flip/FlipForum/editComment/$1';

////msg


$route['FlipMessage'] = 'flip/FlipMessage';
$route['FlipMessage/compose'] = 'flip/FlipMessage/compose';
$route['FlipMessage/sentMessages'] = 'flip/FlipMessage/sentMessages';
$route['FlipMessage/read/(:any)'] = 'flip/FlipMessage/read/$1';
$route['FlipMessage/reply/(:any)'] = 'flip/FlipMessage/reply/$1';

$route['Search_Appointment'] = 'Search/Search_Appointment';
