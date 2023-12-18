<?php
namespace App\Helpers;
 
class helper {

   public static function Alert($errors = '')
	{
		$alert = '';
		if (session('status')) {
			$alert .= '
         <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong><i class="icon fas fa-check"></i> Success</strong><br>
            ' . session('message') . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
         </div>
			';
		}

		if (session('fail')) {
			$alert .= '
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="icon fas fa-times"></i> Failed</strong><br>
            ' . session('message') . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
         </div>
			';
		}
		

		if ($errors && !$errors->isEmpty()) {
			$alert .= '
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong><i class="icon fas fa-ban"></i> Alert!</strong><br>';
			foreach ($errors->all() as $error) {
				$alert .= '<span>' . $error . '</span><br>';
			}
			$alert .= '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
				</div>
			';
		}
	// 	'<div class="alert alert-warning alert-dismissible fade show" role="alert">
	// 	<strong><i class="icon fas fa-ban"></i></strong> ' . session('message') . '
	// 	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	//   </div>'
		
		return $alert;
	}

   public static function hitungHariAktif($tgl_awal='',$tgl_akhir='')
	{
		//TANGGAL AWAL TIDAK MASUK HITUNGAN
		$date_start=date_create(date('Y-m-d', strtotime('-1 day', strtotime(date($tgl_awal))))); //mis. tgl chekin
		$date_end=date_create($tgl_akhir); //mis. tgl chekout
		$diff=date_diff($date_start,$date_end); //menyimpan didalam fungsi date_diff
		$jumlah_hari=$diff->days; //menampilkan jumlah hari

		return $jumlah_hari;
	}

	public static function jmlHariMinggu($tgl_awal='',$tgl_akhir=''){
		//tgl pertama dan terakhir tetap masuk hitungan
		if(empty($tgl_awal) && empty($tgl_akhir)){
			if(date("d",strtotime(date("Y-m-d"))) > 25){
				$tgl_aw = date('Y-m-26');
				$tgl_ak = date('Y-m-25', strtotime('+1 month', strtotime(date('Y-m-25'))));
			}else{
				// $b = date("m", strtotime("-1 month", strtotime(date("Y-m-d"))));
				$tgl_aw = date('Y-m-26', strtotime('-1 month', strtotime(date('Y-m-26'))));
				$tgl_ak = date('Y-m-25');
			}

			$date1 = date('d-m-Y',strtotime(date($tgl_aw)));
			$date2 = date('d-m-Y',strtotime(date($tgl_ak)));
		}else{
			$date1 = date('d-m-Y',strtotime(date($tgl_awal)));
			$date2 = date('d-m-Y',strtotime(date($tgl_akhir)));
		}

		// memecah bagian-bagian dari tanggal $date1
		$pecahTgl1 = explode("-", $date1);

		// membaca bagian-bagian dari $date1
		$tgl1 = $pecahTgl1[0];
		$bln1 = $pecahTgl1[1];
		$thn1 = $pecahTgl1[2];

		// counter looping
		$i = 0;
		// counter untuk jumlah hari minggu
		$minggu = 0;

		do{
			// mengenerate tanggal berikutnya
			$tanggal = date("d-m-Y", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1));
			// cek jika harinya minggu, maka counter $sum bertambah satu, lalu tampilkan tanggalnya
			if (date("w", mktime(0, 0, 0, $bln1, $tgl1+$i, $thn1)) == 0)
			{
				$minggu++;
			}     
			// increment untuk counter looping
			$i++;
		}while ($tanggal != $date2);
		return $minggu;
	}
	
	public static function RemoveSpecialChar($str)
	{
		$res = preg_replace('/[0-9\@\.\;\" "]+/', '', $str);
		return $res;
	}

	public static function remove_emoji($text){
		$text = str_replace('=',':',$text);
		$text = str_replace('"','',$text);
		$text = iconv('UTF-8', 'ISO-8859-15//IGNORE', $text);
		// $text = preg_replace('/\s+/', ' ', $text);
		return iconv('ISO-8859-15', 'UTF-8', $text);

		// return str_replace('=',':',$clean_text);
		// return preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
	}
	
	public static function potong_berita($text)
	{
		$explode = explode('</span>', $text);
		if(count($explode)>1){
			return $explode[0].'</span>';
		}else{
			$explode = explode('<div><br></div>', $text);
			if(count($explode)>1){
				return $explode[0].'<div><br></div>';
			}else{
				return $text;
			}
		}
	}

   public static function potong_text($text,$pan = 100, $strip=true){
		$data="";
		$kata="";
		if($strip){
			$text = strip_tags($text);
		}
		$data=$text;
		$pot=explode(" ",$data);
		$count=count($pot);

		$i = 0;
		foreach ($pot as $value) {
			if($i<$pan){
				$kata .= $pot[$i]." ";
			}
			$i++;
		}

		return $kata;
	}

   /*	-------------------------------------------------------------------------------
		Modul	: View Images | Delete Images
		Desc 	: Buat nampilkan images dan delete images
		Used	: Blade view
		Usage	: {!!\Helpers::viewPicture($id,$title,$images,$folder,$router,$file)!!}
		Note	: -
		Author	: Andri@April 9th, 2020 3:36pm
		-------------------------------------------------------------------------------
	*/
	public static function viewPicture($id,$title,$images,$folder,$router,$file){
		$picture = "";
		if(!empty($images)){
			$picture .='
			<a href="'.asset(env('IMAGE_PATH').$folder.'/'.$images).'" data-toggle="lightbox" data-title="'.$title.'">
			<img src="'.asset(env('IMAGE_PATH').$folder.'/'.$images).'" 
			class="img-responsive thumbnail imgpopup w30" 
			id="myImg'.$id.'" 
			alt="'.$title.'" 
			title="'.$title.'">
			</a>
			';
			$link = route(''.strtolower($router).'.destroy_picture',['id'=>$id,'images'=>$images,'file'=>$file]);
			$picture .=' <a href="javascript:void(0);" onclick="ConfirmDeletePicture(\''.$link.'\')" title="Delete" class="text-red">×</a>';
		}
		return $picture;
	}

	/*	-------------------------------------------------------------------------------
		Modul	: Change Active Status
		Desc 	: Buat ganti status aktif=1 dan tidak aktif=0
		Used	: Blade view
		Usage	: {!!\Helpers::isActive($id,1|0,$router)!!}
		Note	: -
		Author	: Andri@April 9th, 2020 3:36pm
		-------------------------------------------------------------------------------
	*/
	public static function isActive($id,$is_active,$router){
		$isactive="";
		$alert = ($is_active==1)?'Active':'Inactive';
		$class = ($is_active==1)?'fa-check text-green':'fa-times text-red';
		$isactive .='<a title="'.$alert.'" href="'.route(''.strtolower($router).'.status', $id).'"><i class="fas '.$class.'"></i></a>';
		return $isactive;
	}

   public static function formInput($type,$errors='',$detail,$caption,$name,$required='',$loaddata=array(),$optional='',$placeholder='',$constantvalue='',$ajakurl=array(),$attr='',$note=''){
		$inputform ="";
		$star = !empty($required)?'<code>*</code>':'';
		$required = !empty($required)?$required:'';
		if(!empty($errors)){
			if($type=='password'){ $value = ''; }elseif(!$errors->isEmpty()){ $value = old($name); }elseif(!empty($detail->id)){ $value = !empty($constantvalue)?$constantvalue:$detail->$name; }else{ $value=$constantvalue; }
		}
		$isinvalid = '';
		if(!empty($errors)) $isinvalid = ($errors->has($name))?'is-invalid':'';
		$alert = '';
		if(!empty($errors)) $alert = ($errors->has($name))?'<span class="invalid-feedback" role="alert">'.$errors->first($name).'</span>':'';
		$placeholder = !empty($placeholder)?$placeholder:'Enter '.str_replace('_',' ',$name);

		$type_text = array("text","email","password","number","color");
		if (in_array($type, $type_text)){
			$addSeparator = ($type=='number')?'onfocus="addSeparator(this)" onkeyup="addSeparator(this);"':'';
			$only_number = ($type=='number')?'input-number':'';
			$type = ($type=='number')?'text':$type;
											
			$icon = !empty($optional)?'<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-'.$optional.'"></i></span></div>':'';

			$inputform .='
			<div class="form-group">
				<label for="'.$name.'">'.$caption.' '.$star.'</label>
				<div class="input-group">
					'.$icon.'
					<input type="'.$type.'" id="'.$name.'" name="'.$name.'" class="form-control '.$isinvalid.' '.$only_number.'" placeholder="'.$placeholder.'" value="'.$value.'" '.$addSeparator.' '.$required.' '.$attr.'>
					'.$alert.'
				</div>
				<small>'.$note.'</small>
			</div>
			';
		}
		if($type=="textarea"){
			$icon = !empty($optional)?'<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-'.$optional.'"></i></span></div>':'';
			$inputform .='
			<div class="form-group">
				<label for="'.$name.'">'.$caption.' '.$star.'</label>
				<div class="input-group">
				'.$icon.'
					<textarea id="'.$name.'" name="'.$name.'" placeholder="'.$placeholder.'" rows="4" class="form-control" '.$required.' '.$attr.'>'.$value.'</textarea>
					'.$alert.'
				</div>';
				if($optional=="campaign"){
					$inputform .='<br/>
					<p> Tulis format pesan auto teks untuk WhatsApp, SMS, dan Messenger. Gunakan kode personalisasi berikut:<br>
						<ul><li>Nama Operator/CS: [name]</li></ul>
						Variable custom bisa disesuaikan dengan variable yang ada di URL. Contoh:<br>
						<span class="highlight-warning">https://cs.jujura.id/custom-variable?<b>product</b>=Pembersih Anti Nota&<b>promo</b>=FREE ONGKIR</span><br>
						Maka, ada 2 variable di URL:<br>
						<ul>
						<li>produk: masukkan kode [product]</li>
						<li>promo: masukkan kode [promo]</li>
						</ul>
					</p>';
				}
				if($optional=="fbpixel"){
					$inputform .='<em>Tulis 1 ID = 1 Baris</em>';
				}
			$inputform .='
				<small>'.$note.'</small>		
			</div>
			';
		}
		if($type=="phone"){
			$inputform .='
			<div class="form-group">
				<label for="'.$name.'">'.$caption.' '.$star.'</label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-phone"></i></span>
					</div>
					<input type="text" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'" '.$required.' placeholder="(62)896-1750-XXXX" data-inputmask=\'"mask": "(99)999-9999-99999"\' data-mask '.$attr.'>
					'.$alert.'
				</div>
				<small>'.$note.'</small>
			</div>
			';
		}
		if($type=="select"){
			$detailgetvalue=(!empty($detail->$name))?$detail->$name:'';
			$getvalid =(old($name))?old($name):$detailgetvalue;

			$geturl = !empty($ajakurl['url'])?$ajakurl['url']:'';
			$idform = !empty($ajakurl['idform'])?$ajakurl['idform']:'';
			$iddiv = !empty($ajakurl['iddiv'])?$ajakurl['iddiv']:'';
			$onchange = ($optional=="customindex")?'onchange="ajaxSendData(\''.$geturl.'\',\''.$idform.'\',\''.$iddiv.'\')"':'';
			$css = ($optional=="css")?$placeholder:'';

			$inputform .='
			<div class="form-group" '.$css.'>
				<label for="'.$name.'">'.$caption.' '.$star.'</label>
				<div class="input-group">';
				if(empty($constantvalue)){
					$inputform .='
					<div class="input-group-prepend '.$name.'">
						<i class="fas fa-calendar-check input-group-text"></i>
					</div>';
				}
					$nameArray = ($required=='multiple'|| $required=='multiple required')?'[]':'';
					$inputform .='
					<select name="'.$name.$nameArray.'" id="'.$name.'" class="form-control '.$isinvalid.' select2" '.$required.' '.$onchange.'>';
					
					$inputform .= ($required=='multiple'|| $required=='multiple required')?'':'<option value="" selected disabled>&mdash; '.$caption.' &mdash;</option>';

					if($optional=="customize"){
						foreach($loaddata as $ind=>$data){
							$selected =($data==$getvalid)?'selected':'';
							$inputform .='<option value="'.$data.'" '.$selected.'>'.$data.'</option>';
						}
					}elseif($optional=="customindex" || $optional=="index"){
						foreach($loaddata as $ind=>$data){
							$selected =($ind==$getvalid)?'selected':'';
							$inputform .='<option value="'.$ind.'" '.$selected.'>'.$data.'</option>';
						}
					}else{
						foreach($loaddata as $data){
							$selected = ((!empty($data->id) && $data->id==$getvalid) || (!empty($data->kd_cust) && $data->kd_cust==$getvalid))?'selected':'';
							// $selected = !empty($data->kd_cust)?'selected':'';
							$disabled = !empty($data->disabled)?'disabled':'';
							$inputform .='<option value="'.(!empty($data->kd_cust)?$data->kd_cust:$data->id).'" '.$selected.' '.$disabled.'>'.$data->name.'</option>';
						}
					}				
					$inputform .='
					</select>
					'.$alert.'
				</div>
				<small>'.$note.'</small>
			</div>
			';
		}
		if($type=="file"){
			$inputform .='
			<div class="form-group">
				<label for="'.$name.'">'.$caption.' '.$star.'</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="'.$name.'" name="'.$name.'" '.$required.'>
					<label class="custom-file-label" for="'.$name.'">'.(!empty($detail->$name)?$detail->$name:$caption).'</label>';
					if(!empty($detail->$name)){
						$inputform .='<img src="'.asset(env('IMAGE_PATH').$loaddata['folder'].'/'.$detail->$name).'" class="img-responsive thumbnail mt-2" style="height:80px">';
					}
			$inputform .='
				</div>
				<small>'.$note.'</small>
				'.$alert.'
			</div>';
		}
		if($type=="radio"){
			$detailgetvalue=(!empty($detail->$name))?$detail->$name:'0';
			$getvalid =(old($name))?old($name):$detailgetvalue;
			$inputform .='
			<div class="form-group">
				<label for="'.$name.'">'.$caption.' '.$star.'</label><br>';
			foreach($loaddata as $ind=>$data){
				$checked =($ind==$getvalid)?'checked':'';
				$inputform .='
					<div class="icheck-primary d-inline mr-4">
                        <input type="radio" id="'.$name.$ind.'" name="'.$name.'" value="'.$ind.'" alt="'.$data.'" '.$checked.' '.$required.' class="'.$optional.'">
                        <label for="'.$name.$ind.'" style="font-weight: normal;">'.$data.'</label>
                    </div>
				';
			}
			$inputform .='</div>';
		}

		if($type == "date"){
			$inputform .= '
			<div class="form-group">
				'.(!empty($caption)?'<label>'.$caption.' '.$star.'</label><br>':'').'
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<i class="far fa-calendar-alt hand" id="icon-daterange"></i>
						</span>
					</div>
					<input type="text" class="form-control input-number" id="'.$name.'" value="'.$value.'" name="'.$name.'" '.$required.' style="background-color:#fff;">
					'.$alert.'				
				</div>
			</div>
			';
		}
		if($type == "time"){
			$inputform .= '
				<div class="form-group">
				'.(!empty($caption)?'<label>'.$caption.' '.$star.'</label><br>':'').'
				<div class="input-group date" data-target-input="nearest">
					<div class="input-group-append" data-target="#'.$name.'" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="far fa-clock"></i></div>
					</div>
					<input type="text" id="'.$name.'" name="'.$name.'" class="form-control datetimepicker-input" data-target="#'.$name.'"  data-toggle="datetimepicker" '.$required.' style="background-color:#fff;"/>
					'.$alert.'
					</div>
				</div>
			';
		}

		return $inputform;
	}

   /*buang characcter tertentu*/
	public static function replaceChar($data,$spasi=''){
		if(empty($spasi)){
			$char	= array("(",")","'",'"',".","%",",","~","`","=","!","@","#","$","^","*","{","}","[","]","|",";",":",">","<","?","\\","-","_"," ");
		}else{
			$char	= array("(",")","'",'"',".","%",",","~","`","=","!","@","#","$","^","*","{","}","[","]","|",";",":",">","<","?","\\","-","_");
		}
		$data 	= str_replace($char,"", $data);
		return trim($data);	
	}

	//UNTUK AMBIL INTEGER DARI STRING
	public static function getInteger($data){ 
		$data = abs((int) $data);
		return $data;
	}

   /*Get IP*/
   public static function getClientIp(){
      $ipaddress = '';
      if (isset($_SERVER['HTTP_CLIENT_IP'])) {
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      } else if (isset($_SERVER['HTTP_FORWARDED'])) {
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
      } else if (isset($_SERVER['REMOTE_ADDR'])) {
         $ipaddress = $_SERVER['REMOTE_ADDR'];
      } else {
         $ipaddress = '';
      }

      return $ipaddress;
   }

   /*Get Location User Access*/
   public static function getGeoIP($ip = null, $jsonArray = false) {
      try {
         // If no IP is provided use the current users IP
         if($ip == null) {
            $ip   = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
         }
         // If the IP is equal to 127.0.0.1 (IPv4) or ::1 (IPv6) then cancel, won't work on localhost
         if($ip == "127.0.0.1" || $ip == "::1") {
            throw new Exception('You are on a local sever, this script won\'t work right.');
         }
         // Make sure IP provided is valid
         if(!filter_var($ip, FILTER_VALIDATE_IP)) {
            throw new Exception('Invalid IP address "' . $ip . '".');
         }
         if(!is_bool($jsonArray)) {
            throw new Exception('The second parameter must be a boolean - true (return array) or false (return JSON object); default is false.');
         }
         // Fetch JSON data with the IP provided
         $url  = "https://freegeoip.app/json/".$ip;
         // Return the contents, supress errors because we will check in a bit
         $json = @file_get_contents($url);
         // Did we manage to get data?
         if($json === false) {
            return false;
         }
         // Decode JSON
         $json = json_decode($json, $jsonArray);
         // If an error happens we can assume the JSON is bad or invalid IP
         if($json === null) {
            // Return false
            return false;
         } else {
            // Otherwise return JSON data
            return $json;
         }
      } catch(Exception $e) {
         return $e->getMessage();
      }
   }
   /*View location user access*/
   public static function getClientLocation(){
      $ip = self::getClientIp();
      $userGeoData = self::getGeoIP($ip);		
      $location  = "";
      $location .= !empty($userGeoData->city)?$userGeoData->city:'';
      $location .= !empty($userGeoData->region_name)?', '.$userGeoData->region_name:'';
      $location .= !empty($userGeoData->country_name)?', '.$userGeoData->country_name:'';
      return $location;
   }

   /*Get mobile device*/
   public static function mobileUserAgentSwitch(){
      $device = '';
      if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
         $device = "iPad";
      } else if( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
         $device = "iPhone";
      } else if( stristr($_SERVER['HTTP_USER_AGENT'],'blackberry') ) {
         $device = "Blackberry";
      } else if( stristr($_SERVER['HTTP_USER_AGENT'],'android') ) {
         $device = "Android";
      } else if( stristr($_SERVER['HTTP_USER_AGENT'],'linux') ) {
         $device = "Linux";
      } else if( stristr($_SERVER['HTTP_USER_AGENT'],'windows') ) {
         $device = "Windows";
      }else{
         $device = "Other";
      }
      if( $device ) {
         return $device; 
      } return false; {
         return false;
      }
   }

   
	public static function namaBulan($int) {
		$int = (int) $int;
		if(($int > 0 && $int < 13) == false) return null;
		$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
		return $bulan[$int-1];
	}

	public static function namaBulanEng($int) {
		$int = (int) $int;
		if(($int > 0 && $int < 13) == false) return null;
		$bulan = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		return $bulan[$int-1];
	}

	public static function namaBulanSingkat($int) {
		$int = (int) $int;
		if(($int > 0 && $int < 13) == false) return null;
		$bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sept', 'Okt', 'Nov', 'Des'];
		return $bulan[$int-1];
	}

	public static function namaBulanRomawi($int) {
		$int = (int) $int;
		if(($int > 0 && $int < 13) == false) return null;
		$bulan = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
		return $bulan[$int-1];
	}

	public static function namaHari($int) {
		$int = (int) $int;
		if(($int > 0 && $int < 8) == false) return null;
		$bulan = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
		return $bulan[$int-1];
	}
 
	
	public static function idr($number) {
		//$number = 100* round(($number/100.0));
		return 'Rp. ' . number_format($number, 0, ',', '.').',-';
	}

	
	public static function indo_number($number) {
		if (!empty($number)) {
			return number_format($number, 0, ',', '.');
		} else {
			return 0;
		}
	}

	public static function dateResolver($string) {
		$date = date_create_from_format('d-m-Y', $string);
		if(!$date) $date = date_create_from_format('Y-m-d', $string);
		if(!$date) return null;
		return $date->format('d-m-Y');
	}

	public static function dateCreate($string) {
		$date = date_create_from_format('Y-m-d', $string);
		if(!$date) $date = date_create_from_format('d-m-Y', $string);
		if(!$date) return null;
		return $date->format('Y-m-d');
	}
	
	public static function dateFormat($string) {
		$date_ex = explode('-', $string);
		$date = $date_ex[0]." ".Self::namaBulan($date_ex[1])." ".$date_ex[2];
		return $date;
	}

	public static function dateFormatSingkat($string) {
		$date_ex = explode('-', $string);
		$date = $date_ex[0]." ".Self::namaBulanSingkat($date_ex[1])." ".$date_ex[2];
		return $date;
	}

}