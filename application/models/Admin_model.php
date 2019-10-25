<?php  
/**
 * 
 */
class Admin_model extends CI_Model
{
	protected $table = 'user_toornament';
	private $db2;
	public function __construct()
	 {
	  parent::__construct();
	         $this->db2 = $this->load->database('db2', TRUE);
	 }

	function do_upload($images, $param)
	{
		// $config['upload_path']          = '/opt/rh/httpd24/root/var/www/html/assets/img/'.$param.'/';
		$config['upload_path']          = '/root/var/www/html/esport/admin/assets/img/'.$param.'/';
		// echo "<pre>";
		// 	echo $config['upload_path'];
		// echo "</pre>";
		// die();
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 10000;
		$config['max_width']            = 10024;
		$config['max_height']           = 7068; 

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload($images))
		{
			$data = array(
				'data' => '',
				'resp_msg' => $this->upload->display_errors(),
				'resp_code' => "99"
			);
		}
		else
		{
			$data = array(
				'data' => $this->upload->data(),
				'resp_msg' =>'Upload Sukses',
				'resp_code' => "00"
			);
		}

		
		return $data;

	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		return $query = $this->db->get_where('admin',array('email'=>$email,'password'=>$password))->result_array();
	}

	public function dashboard()
	{
		$hari_ini = gmdate("Y-m-d", time()+60*60*7);
		return $query = $this->db2->query("SELECT * FROM dashboard_main WHERE DATE(created_date)='$hari_ini'")->result_array();
	}
	public function userTournament()
	{
		$hasil = $this->db->query("SELECT COUNT(id_user_event_mapping) as jumlah FROM user_event_mapping");
		return $hasil->result_array();
	}

	public function Organizer()
	{
		$hasil = $this->db->query("SELECT DISTINCT COUNT(id_user) AS jumlah FROM toornaments;");
		return $hasil->result_array();	
	}

	public function Caster()
	{
		$hasil = $this->db->query("SELECT COUNT(id_user_spectator) as jumlah FROM user_spectator");
		return $hasil->result_array();
	}

	public function Toornament()
	{
		$hasil = $this->db->query("SELECT COUNT(tournament_id) as jumlah FROM toornaments");
		return $hasil->result_array();
	}

	public function popularGame()
	{
		$hasil = $this->db->query("SELECT COUNT(mst_game.`game_id`) AS 'jumlah', mst_game.`full_name`,mst_game.`logo` FROM (mst_game INNER JOIN toornaments ON toornaments.discipline = mst_game.`game_id`) WHERE toornaments.`published`='T' GROUP BY mst_game.`game_id` ORDER BY jumlah DESC LIMIT 5");
		return $hasil->result_array();	
	}

	public function newUser()
	{
		$hasil = $this->db->query("SELECT user_toornament.`first_name`,user_toornament.`country_name`,user_toornament.`created_date`
FROM user_toornament ORDER BY user_toornament.`created_date` DESC LIMIT 5");
		return $hasil->result_array();
	}

	public function newCaster()
	{
		$hasil = $this->db->query("SELECT user_spectator.`id_user_spectator`,user_spectator.`caster_name`, user_spectator.`caster_email`, user_spectator.`created_date`,user_spectator.`status_spectator`,user_spectator.`photo`, user_spectator.`domisili` FROM user_spectator, user_toornament
WHERE user_spectator.`id_user`=user_toornament.`id_user` ORDER BY user_spectator.`created_date` DESC LIMIT 5");
		return $hasil->result_array();
	}


	public function newToornament()
	{
		$hasil = $this->db->query("SELECT toornaments.`full_name`, toornaments.`country`, toornaments.`organization`, toornaments.`publish_date`
FROM toornaments WHERE toornaments.`published`='T' ORDER BY toornaments.`publish_date` DESC LIMIT 5");
		return $hasil->result_array();
	}

	public function getAllUsers()
	{
		$hasil = $this->db->query("SELECT * FROM user_toornament WHERE last_name !='' AND status_activation !='' AND country_name !='' ORDER BY created_date DESC");
		return $hasil->result_array();
	}

	public function updateStatus($email,$status)
	{
		$st='';
		if ($status=='active') {
			$st='inactive';
		}else{
			$st='active';
		}
		$hasil = $this->db->query("UPDATE user_toornament SET status_activation = '$st' WHERE email_user ='$email'");
		if ($hasil) {
			return true;
		}else{
			return false;
		}
	}

	public function getDetailUser($email)
	{
		$hasil = $this->db->query("SELECT * FROM user_toornament WHERE email_user ='$email'");
		return $hasil->result_array();	
	}

	public function jumlah_users()
	{
		return $this->db->get('user_toornament')->num_rows();
	}

	public function data_users($number,$offset)
	{
		return $query = $this->db->get_where('user_toornament',array('country_name !='=>''),$number,$offset)->result_array();
	}

	public function updateStatusCaster($email,$status)
	{
		$st='';
		if ($status=='active') {
			$st='inactive';
		}else if ($status=='inactive'){
			$st='active';
		}
		$hasil = $this->db->query("UPDATE user_spectator SET status_spectator = '$st' WHERE caster_email ='$email'");
		if ($hasil) {
			return true;
		}else{
			return false;
		}
	}

	public function getDetailCaster($email)
	{
		$hasil = $this->db->query("SELECT * FROM user_spectator WHERE caster_email ='$email'");
		return $hasil->result_array();	
	}

	public function jumlah_casters()
	{
		return $query = $this->db->get('user_spectator')->num_rows();
	}

	public function data_casters($number,$offset)
	{
		return $query = $this->db->get('user_spectator',$number,$offset)->result_array();
	}

	public function getDetailAdmin($idAdmin)
	{
		return $query = $this->db->get_where('admin',array('admin_id'=>$idAdmin))->result_array();	
	}

	public function jumlah_admin()
	{
		return $query = $this->db->get('admin')->num_rows();
	}

	public function data_admin($number,$offset)
	{
		return $query = $this->db->get('admin',$number,$offset)->result_array();
	}

	function do_upload_admin($images)
	  {
	    $config['upload_path']          = 'assets/img/upload/';
	    $config['allowed_types']        = 'gif|jpg|png|jpeg';
	    $config['max_size']             = 10000;
		$config['max_width']            = 10024;
		$config['max_height']           = 7068; 

	    $this->load->library('upload');
	    $this->upload->initialize($config);

	    if ( ! $this->upload->do_upload($images))
	    {
	      $data = array(
	        'data' => '',
	        'resp_msg' => $this->upload->display_errors(),
	        'resp_code' => "99"
	      );
	    }
	    else
	    {
	      $data = array(
	        'data' => $this->upload->data(),
	        'upload_path' => $config['upload_path'],
	        'resp_msg' =>'Upload Sukses',
	        'resp_code' => "00"
	      );
	    }

	    return $data;
	 }

	public function admin_add()
	{
		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload_admin('userfile');
	      if($images){
	        $photo = 'assets/img/upload/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
	    $data = array(
	    	'name'=>$this->input->post('name'),
	    	'username'=>$this->input->post('name'),
	    	'password'=>$this->input->post('password'),
	    	'status'=>'active',
	    	'logo'=>$photo,
	    	'email'=> $this->input->post('email')
	    );
	    return $query = $this->db->insert('admin',$data);
	}

	public function admin_edit($idAdmin)
	{
		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload_admin('userfile');
	      if($images){
	        $photo = 'assets/img/upload/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
	    $data = array(
	    	'name'=>$this->input->post('name'),
	    	'username'=>$this->input->post('name'),
	    	'password'=>$this->input->post('password'),
	    	'status'=>'active',
	    	'logo'=>$photo,
	    	'email'=> $this->input->post('email')
	    );
	    return $query = $this->db->update('admin',$data,array('admin_id'=>$idAdmin));
	}

	public function updateStatusAdmin($id,$status)
	{
		$st='';
		if ($status=='active') {
			$st='inactive';
		}else{
			$st='active';
		}

		return $query = $this->db->update('admin',array('status'=>$st),array('admin_id'=>$id));
	}

	public function jumlah_games()
	{
		return $query = $this->db->get('mst_game')->num_rows();
	}

	public function data_games($number,$offset)
	{
		return $query = $this->db->get('mst_game',$number,$offset)->result_array();
	}

	public function game_detail($idGame)
	{
		return $query = $this->db->query("SELECT * FROM mst_game WHERE game_id='$idGame'")->result_array();
	}

	public function game_edit($idGame)
	{
		return $query = $this->db->get_where('mst_game',array('game_id'=>$idGame))->result_array();
	}

	public function game_add()
	{
		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload('userfile','games');
	     echo "<pre>";
	     	print_r($images);
	     echo "</pre>";
	     die();
	      if($images){
	        $photo = 'assets/img/games/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
	    $data = array(
	    	'copyrights'=>$this->input->post('copyrights'),
	    	'full_name'=>$this->input->post('gameName'),
	    	'name'=>$this->input->post('name'),
	    	'short_name'=>$this->input->post('short'),
	    	'logo'=>$photo
	    );

	    $query = $this->db->insert('mst_game',$data);
	    $insert_id = $this->db->insert_id();
	    $data = array(
	    	'category_id'=>$this->input->post('category'),
	    	'game_id'=>$insert_id
	    );
	    $addCt = $this->db->insert('mst_category_detail',$data);
	    $result = $this->input->post('platform[]');
	    for ($i=0; $i < sizeof($result); $i++) { 
			$addPl = $this->db->insert('mst_game_detail',array('game_id'=>$insert_id,'platform_id'=>$result[$i]));
		}
		if ($query) {
			return true;
		}else{
			return false;
		}
	}

	public function game_edit_proses($idGame)
	{
		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload('userfile','games');
	      if($images){
	        $photo = 'assets/img/games/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
	    $data = array(
	    	'copyrights'=>$this->input->post('copyrights'),
	    	'full_name'=>$this->input->post('gameName'),
	    	'name'=>$this->input->post('name'),
	    	'short_name'=>$this->input->post('short'),
	    	'logo'=>$photo
	    );

	    return $query = $this->db->update('mst_game',$data,'game_id='.$idGame);
	}

	public function game_edit_category($idGame)
	{
		return $query = $this->db->update('mst_category_detail',array('category_id'=>$this->input->post('category')),'game_id='.$idGame);
	}

	public function game_edit_platform($idGame)
	{
		$query = $this->db->get_where('mst_game_detail',array('game_id'=>$idGame))->result_array();
		$result=array();
		$result=$this->input->post('platform[]');
		$query1 = $this->db->delete('mst_game_detail',array('game_id'=>$idGame));
		for ($i=0; $i < sizeof($result); $i++) { 
			$query2 = $this->db->insert('mst_game_detail',array('game_id'=>$idGame,'platform_id'=>$result[$i]));
		}
	}

	public function game_delete($idGame)
	{
		return $query = $this->db->delete('mst_game',array('game_id'=>$idGame));
	}

	public function game_delete_category($idGame)
	{
		return $query = $this->db->delete('mst_category_detail',array('game_id'=>$idGame));
	}

	public function game_delete_platform($idGame)
	{
		return $query = $this->db->delete('mst_game_detail',array('game_id'=>$idGame));
	}

	public function platform_game_id($idGame)
	{
		$this->db->select("*");
		$this->db->from('mst_platform');
		$this->db->join('mst_game_detail', 'mst_game_detail.platform_id = mst_platform.platform_id and mst_game_detail.game_id='.$idGame,'inner');
		return $query = $this->db->get()->result_array();	
	}

	public function platform_game()
	{
		return $query = $this->db->get('mst_platform')->result_array();
	}

	public function platform_game_detail($idGame)
	{
		return $query = $this->db->query("SELECT * FROM mst_game mg, mst_game_detail mgd, mst_platform mp WHERE mg.`game_id`=mgd.`game_id` AND mgd.`platform_id`=mp.`platform_id` HAVING mg.`game_id`='$idGame'")->result_array();
	}

	public function platform_add()
	{
		return $query = $this->db->insert('mst_platform', array('platform_name'=>$this->input->post('platform')));
	}

	public function jumlah_platform()
	{
		return $query = $this->db->get('mst_platform')->num_rows();
	}

	public function data_platform($number,$offset)
	{
		return $query = $this->db->get('mst_platform',$number,$offset)->result_array();
	}

	public function category_game()
	{
// 		return $query = $this->db->query("SELECT * FROM mst_game mg, mst_category_detail mcd, mst_category mc
// WHERE mg.`game_id`=mcd.`game_id` AND mcd.`category_id`=mc.`category_id` HAVING mg.`game_id`='$idGame'")->result_array();

		return $query = $this->db->get('mst_category')->result_array();
	}

	public function category_detail($idGame)
	{
		return $query = $this->db->get_where('mst_category_detail',array('game_id'=>$idGame))->result_array();
	}

	public function category_add()
	{
		return $query = $this->db->insert('mst_category',array('category_name'=>$this->input->post('category')));
	}

	public function jumlah_category()
	{
		return $query = $this->db->get('mst_category')->num_rows(); 
	}

	public function data_category($number,$offset)
	{
		return $query = $this->db->get('mst_category',$number,$offset)->result_array();
	}

	public function getAllToornaments()
	{
		$hasil = $this->db->query("SELECT * FROM toornaments ORDER BY tournament_id DESC");
		return $hasil->result_array();
	}

	public function tournament_detail($idTournament)
	{
		return $query = $this->db->get_where('toornaments',array('tournament_id'=>$idTournament))->result_array();
	}

	public function updateStatusToornaments($email,$status)
	{
		$st='';
		if ($status=='active') {
			$st='inactive';
		}else{
			$st='active';
		}
		$hasil = $this->db->query("UPDATE user_toornament SET status_activation = '$st' WHERE email_user ='$email'");
		if ($hasil) {
			return true;
		}else{
			return false;
		}
	}

	public function getDetailToornaments($email)
	{
		$hasil = $this->db->query("SELECT * FROM user_toornament WHERE email_user ='$email'");
		return $hasil->result_array();	
	}

	public function jumlah_tournaments()
	{
		return $this->db->get('toornaments')->num_rows();
	}

	public function data_tournaments($number,$offset)
	{
		return $query = $this->db->get('toornaments',$number,$offset)->result_array();
	}

	//Gian
	public function jumlah_stream()
	{
		return $this->db->get('streams')->num_rows();
	}
	
	public function getAllStream(){
		return $this->db->get('streams')->result_array();
	}

	public function getStreamById($idStreams){
		$hasil = $this->db->query("SELECT * FROM streams WHERE id_streams = $idStreams");
		return $hasil->result_array();
	}

	public function editStream($idStreams)
	{
		$param = 'videos';
		$stts = 0;
		$photo = $this->input->post('userfile');
		$photo2 = $this->input->post('imgs');

		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload('userfile',$param);
	      if($images){
	        $photo = $images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $photo2;
	      $stts = 1 ;
	    }

		$name_streams=$this->input->post('streamTitle');
		if ($stts == 1) {
			$thumbnail_streams=$photo;
		}
		else
		{
			$thumbnail_streams='assets/img/videos/'.$photo;
		}

		$url_streams=$this->input->post('url');
		$result = $this->db->query("UPDATE streams SET  name_streams = '$name_streams', thumbnail_streams = '$thumbnail_streams', url_streams = '$url_streams' WHERE id_streams = $idStreams ");
		if ($result) {
			return true;
		}
		else{
			return false;
		}

	}


	public function  prosesAddStream ()
	{
		$param = 'videos';
		// $photo = $this->input->post('userfile');
		if (!empty($_FILES['userfile']['name'])) {
	      $image = $this->do_upload('userfile',$param);
	      echo "<pre>";
	      	print_r($image);
	      echo "</pre>";
	      die();
	      if($image['resp_code']=='00'){
	        $photo = $image['data']['file_name'];
	      } else {
	        echo "error, please input the image";
	      }
	    }
	 
	    $title=$this->input->post('streamTitle');
		$thumbnail_streams='assets/img/videos/'.$photo;
		$chanel=$this->input->post('channelId');
		$url_streams = $this->input->post('url');
		$result = $this->db->query("INSERT INTO streams (name_streams, thumbnail_streams, chanel, url_streams) VALUES ('$title', '$thumbnail_streams', '$chanel', 'url_streams')");
		return $result;
	}

	public function get_stream_list($limit, $start){
        $query = $this->db->get('streams', $limit, $start)->result_array();
        return $query;
    }

	public function deleteStream($id)
	{
		return $this->db->delete('streams', array('id_streams' => $id));
	}
	public function get_blog_list($limit, $start){
        $query = $this->db->get('blog', $limit, $start)->result_array();
        return $query;
    }
    
	public function getAllBlogs(){
		return $this->db->get('blog')->result_array();
	}

	function jumlah_data(){
		return $this->db->get('blog')->num_rows();
	}

	public function getBlogById($id){
		$hasil = $this->db->query("SELECT * FROM blog WHERE id_blog = $id");
		return $hasil->result_array();
	}

	public function editBlog($id)
	{
		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload('userfile','blog');
	      if($images){
	        $photo = 'assets/img/blog/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
	    $data = array(
		'category'=>$this->input->post('category'),
		'desc_blog'=>$this->input->post('descriptions'),
	    	'url_blog'=>$photo
	    );

	    return $query = $this->db->update('blog',$data,'id_blog='.$id);
	}

	public function deactiveBlog($id, $status)
	{
		$result = $this->db->query("UPDATE blog SET status = '$status' WHERE id_blog = $id");

		return $result;
	}

	public function prosesAddBlog()
	{
		$param = 'blog';
		$photo = $this->input->post('userfile');
		if (!empty($_FILES['userfile']['name'])) {
	      $image = $this->do_upload('userfile',$param);
	      if($image['resp_code']=='00'){
	        $photo = $image['data']['file_name'];
	      } else {
	        echo "error, please input the image";
	      }
	    }

	    $title=$this->input->post('blogTitle');
		$url_blog='assets/img/blog/'.$photo;
		$category=$this->input->post('category');
		$desc=$this->input->post('description');
		$status='active';
		$result = $this->db->query("INSERT INTO blog (title, url_blog, category, desc_blog, status, created_date) VALUES ('$title', '$url_blog', '$category', '$desc', '$status', NOW())");

		return $result;
	}

	public function deleteBlog($id)
	{
		return $this->db->delete('blog', array('id_blog' => $id));
	}

	public function getAbout()
	{
		return $this->db->get('account')->result_array();
	}

	public function addAbout()
	{
		$phone=$this->input->post('phoneNumber');
		$email= $this->input->post('email');
		$address=$this->input->post('address');
		$youtube=$this->input->post('youtube');
		$nimo=$this->input->post('nimoTv');
		$twitch=$this->input->post('twitch');
		$twitter=$this->input->post('twitter');
		$facebook=$this->input->post('facebook');
		$instagram=$this->input->post('instagram');
		$result = $this->db->query("INSERT INTO account (phone_number, email, address, youtube, nimo_tv, twitch, twitter, facebook, instagram)VALUES   ('$phone', '$email', '$address', '$youtube', '$nimo', '$twitch', '$twitter', '$facebook', '$instagram' )");

		return $result;
	}

	public function updateAbout($id)
	{
		$phone=$this->input->post('phoneNumber');
		$email= $this->input->post('email');
		$address=$this->input->post('address');
		$youtube=$this->input->post('youtube');
		$nimo=$this->input->post('nimoTv');
		$twitch=$this->input->post('twitch');
		$twitter=$this->input->post('twitter');
		$facebook=$this->input->post('facebook');
		$instagram=$this->input->post('instagram');
		$result = $this->db->query("UPDATE account SET phone_number = '$phone', email = '$email', address = '$address', youtube = '$youtube', nimo_tv = '$nimo', twitch = '$twitch', twitter = '$twitter', facebook = '$facebook', instagram = '$instagram' WHERE id =  $id");

		return $result;
	}

	public function get_banner_list($limit, $start){
        $query = $this->db->get('banner', $limit, $start)->result_array();
        return $query;
    }

    public function getBannerById($id){
		$hasil = $this->db->query("SELECT * FROM banner WHERE banner_id = $id");
		return $hasil->result_array();
	}

	public function editBanner($id)
	{
		if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload('userfile','banner');
	      if($images){
	        $photo = 'assets/img/banner/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
	    $data = array(
		'rate'=>$this->input->post('rate'),
		'description'=>$this->input->post('description'),
	    	'banner_path'=>$photo
	    );

	    return $query = $this->db->update('banner',$data,'banner_id='.$id);
	}
	public function deactiveBanner($id, $status)
	{
		$result = $this->db->query("UPDATE banner SET status = '$status' WHERE banner_id = $id");
		return $result;
	}

	public function getAllBanner()
	{
		return $this->db->get('banner')->result_array();
	}

	public function prosesAddBanner()
	{
		$param = 'banner';
		$photo = $this->input->post('userfile');
		if (!empty($_FILES['userfile']['name'])) {
	      $image = $this->do_upload('userfile',$param);
	      if($image['resp_code']=='00'){
	        $photo = $image['data']['file_name'];
	      } else {
	        echo "error, please input the image";
	      }
	    }

	    $lastNum=$this->input->post('orderNumber')+1;
		$banner_path='assets/img/banner/'.$photo;
		$desc=$this->input->post('description');
		$status='active';
		$result = $this->db->query("INSERT INTO banner (banner_path, created_date, description, rate, status) VALUES ('$banner_path', NOW(), '$desc', '$lastNum', '$status')");

		return $result;
	}

	public function getChannelById($id)
	{
		$hasil = $this->db->query("SELECT * FROM chanel_stream WHERE id = '$id'");
		return $hasil->result_array();
	}

	public function get_chanel_list($limit, $start){
        $query = $this->db->get('chanel_stream', $limit, $start)->result_array();
        return $query;
    }

    public function prosesAddChanel()
	{
		$param = 'stream'; 
		if (!empty($_FILES['userfile']['name'])) {
	      $image = $this->do_upload('userfile',$param);
	      if($image['resp_code']=='00'){
	        $photo = $image['data']['file_name'];
	      } else {
	        echo "error, please input the image";
	      }
	    }

	    $timeStart = $this->input->post('timeStart');
	    $startDate = $this->input->post('startDate');
	    $timeEnd = $this->input->post('timeEnd');
	    $endDate = $this->input->post('endtDate');
	    $chanel_id=$this->input->post('chanel_id');
	    $name_stream=$this->input->post('name_stream');
	    $publisher=$this->input->post('publisher');
	    $start_date=$this->input->post('start_date');
	    $endDate=$this->input->post('endDate');
		$thumbnail='assets/img/stream/'.$photo;
		$contact_person=$this->input->post('contact');
		$status='active';
		$url = $this->input->post('url');
		$startDates = $startDate." ".$timeStart;
		$endDates = $endDate." ".$timeEnd;
		$result = $this->db->query("INSERT INTO chanel_stream (chanel_id, name_stream, publisher, start_date, end_date, contact_person, status, thumbnail, url_stream) VALUES ('$chanel_id', '$name_stream', '$publisher', '$startDates', '$endDates', '$contact_person', '$status', '$thumbnail', '$url')");

		return $result;
	}

	public function deactiveChanel($id, $status)
	{
		$result = $this->db->query("UPDATE chanel_stream SET status = '$status' WHERE chanel_id = '$id'");

		return $result;
	}

	public function editChannel($id)
	{
	    if (!empty($_FILES['userfile']['name'])) {
	      $images = $this->do_upload('userfile','stream');
	      if($images){
	        $photo = 'assets/img/stream/'.$images['data']['file_name'];
	      }else{
	        $photo="Error";
	      }
	    } else {
	      $photo = $this->input->post('imgs');
	    }
		$thumbnail = $photo;
	    	$timeStart = $this->input->post('timeStart');
	    	$startDate = $this->input->post('startDate');
	    	$timeEnd = $this->input->post('timeEnd');
	    	$endDate = $this->input->post('endtDate');
	    	$chanel_id=$this->input->post('chanel_id');
	   	$name_stream=$this->input->post('name_stream');
	    	$publisher=$this->input->post('publisher');
	    	$start_date=$this->input->post('start_date');
	    	$endDate=$this->input->post('endDate');
		$contact_person=$this->input->post('contact');
		$status='active';
		$url = $this->input->post('url');
		$startDates = $startDate." ".$timeStart;
		$endDates = $endDate." ".$timeEnd;

		$result = $this->db->query("UPDATE chanel_stream SET  chanel_id = '$chanel_id', name_stream = '$name_stream', publisher = '$publisher', start_date = '$startDates', end_date = '$endDates', contact_person = '$contact_person', thumbnail = '$thumbnail', url_stream = '$url' WHERE id =$id ");

		return $result;

	}

	public function data_program($number,$offset)
	{
		return $query = $this->db->get('mst_loyalty_program',$number,$offset)->result_array();
	}

	public function getDetailProgram($idProgram)
	{
		return $query = $this->db->get_where('mst_loyalty_program',array('program_id'=>$idProgram))->result_array();
	}

	public function getPayment()
	{
		return $query = $this->db->get('mst_payment_channel')->result_array();
	}

	public function addProgram()
	{
		$data = array(
			'program_name'=>$this->input->post('program_name'),
			'pic'=>$this->input->post('pic'),
			'is_payment_program'=>$this->input->post('is_payment'),
			'is_game_program'=>$this->input->post('is_game'),
			'is_event_program'=>$this->input->post('is_event'),
			'Description'=>$this->input->post('description')
		);
		$this->db->insert('mst_loyalty_program',$data);
		$insert_id = $this->db->insert_id();

		$data1 = array(
			'program_id'=>$insert_id,
			'payment_channel_code'=>$this->input->post('is_payment_program')
		);
		$this->db->insert('list_loyalty_payment_channel',$data1);

		$data2 = array(
			'program_id'=>$insert_id,
			'game_id'=>$this->input->post('is_game_program')
		);
		$this->db->insert('list_loyalty_game',$data2);

		$data3 = array(
			'program_id'=>$insert_id,
			'tournament_id'=>$this->input->post('is_event_program')
		);
		$this->db->insert('list_loyalty_toornament',$data3);
	}

	public function getGame()
	{
		return $query = $this->db->get('mst_game')->result_array();
	}

	public function getTournament()
	{
		return $query = $this->db->get('toornaments')->result_array();
	}

	public function accept_tournament()
	{
		return $this->db->update('toornaments',array('organizer_accept'=>$this->input->post('accept')),array('tournament_id'=>$this->input->post('id')));
	}

	public function get_data_list($idTournament,$limit, $start){	
		return $query = $this->db->query("SELECT P.ID_USER_EVENT_MAPPING, P.NICK_NAME, P.EMAIL_USER, R.TRN_STATUS, R.REGISTRATION_FEE FROM `user_event_mapping` P,`trn_reservation` R WHERE P.ID_USER_EVENT_MAPPING = R.ID_USER_EVENT_MAPPING AND P.ID_EVENT = ".$idTournament, $limit, $start)->result_array();
        // $query = $this->db->get('banner', $limit, $start)->result_array();
        return $query;
    }

 //    public function data_participants($idTournament, $number, $offset)
	// {
	// 	return $query = $this->db->query("SELECT P.ID_USER_EVENT_MAPPING, P.NICK_NAME, P.EMAIL_USER, R.TRN_STATUS, R.REGISTRATION_FEE FROM `user_event_mapping` P,`trn_reservation` R WHERE P.ID_USER_EVENT_MAPPING = R.ID_USER_EVENT_MAPPING AND P.ID_EVENT = ".$idTournament, $number, $offset)->result_array();
	// }

	public function data_participants($idTournament)
	{
		$hasil = $this->db->query("SELECT P.ID_USER_EVENT_MAPPING, P.NICK_NAME, P.EMAIL_USER, R.TRN_STATUS, R.REGISTRATION_FEE FROM `user_event_mapping` P,`trn_reservation` R WHERE P.ID_USER_EVENT_MAPPING = R.ID_USER_EVENT_MAPPING AND P.ID_EVENT = ".$idTournament);
		return $hasil->result_array();
	}


}?>