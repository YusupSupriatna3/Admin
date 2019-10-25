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
$route['default_controller'] = 'dashboard/login';
$route['dashboard'] = 'dashboard';
$route['logout'] = 'dashboard/logout';

//users
$route['users'] = 'users';
$route['users-detail/(:any)'] = 'users/users_detail/$1';
$route['users-deactive'] = 'users/users_deactive';

//casters
$route['casters'] = 'users/casters';
$route['casters-detail/(:any)'] = 'users/casters_detail/$1';
$route['casters-deactive/(:any)/(:any)'] = 'users/casters_deactive/$1/$2';

//admin
$route['admin'] = 'users/admin';
$route['admin-add'] = 'users/admin_add';
$route['admin-edit/(:any)'] = 'users/admin_edit/$1';
$route['admin-detail/(:any)'] = 'users/admin_detail/$1';
$route['admin-deactive'] = 'users/admin_deactive';

//profile
$route['profile/(:any)'] = 'users/admin_detail/$1';

//setting
$route['setting'] = 'users/setting';

//game
$route['games'] = 'games/game_list';
$route['game-add'] = 'games/game_add';
$route['game-edit/(:any)'] = 'games/game_edit/$1';
$route['game-delete'] = 'games/game_delete';
$route['game-detail/(:any)'] = 'games/game_detail/$1';

//category
$route['category'] = 'games/category';
$route['category-add'] = 'games/category_add';
$route['category-deactive'] = 'games/category_deactive';

//platform
$route['platform'] = 'games/platform';
$route['platform-add'] = 'games/platform_add';
$route['platform-search'] = 'games/platform_search';

//tournament
$route['tournament'] = 'tournament';
$route['tournament-detail/(:any)'] = 'tournament/tournament_detail/$1';
$route['tournament-active'] = 'tournament/tournament_active';
$route['tournament-search'] = 'tournament/tournament_search';
$route['accept-tournament'] = 'tournament/accept';

//stream
$route['stream'] = 'stream';
$route['stream-add'] = 'stream/stream_add';
$route['stream-search'] = 'stream/stream_search';
$route['stream-detail'] = 'stream/stream_detail';
$route['stream-edit'] = 'stream/stream_edit';

//blog
$route['blog'] = 'blog';
$route['blog-add'] = 'blog/blog_add';
$route['blog-search'] = 'blog/blog_search';
$route['blog-detail'] = 'blog/blog_detail';
$route['blog-edit'] = 'blog/blog_edit';

//stream
$route['program'] = 'program';
$route['program-add'] = 'program/program_add';
$route['program-search'] = 'program/program_search';
$route['program-detail'] = 'program/program_detail';
$route['program-edit/(:any)'] = 'program/program_edit/$1';

//banner
$route['banner-add'] = 'banner/banner_add';
$route['banner-detail'] = 'banner/banner_detail';

//liveStream

$route['live-stream'] = 'live_stream';
$route['add_stream'] = 'liveStream/live_stream_add';

//about
$route['about'] = 'about';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
