
<?php
	
// http://unitstep.net/blog/2009/05/05/using-curl-in-php-to-access-https-ssltls-protected-sites/
function cURLcheckBasicFunctions() 
{ 
  if( !function_exists("curl_init") && 
      !function_exists("curl_setopt") && 
      !function_exists("curl_exec") && 
      !function_exists("curl_close") ) return false; 
  else return true; 
} 

/* 
* Returns string status information. 
* Can be changed to int or bool return types. 
*/ 
function cURLdownload($url) 
{ 
  if( !cURLcheckBasicFunctions() ) return "UNAVAILABLE: cURL Basic Functions"; 
  $curl = curl_init(); 
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  if($curl) 
  { 
  		// ================= Define settings of the connection ================= 
      if( curl_setopt($curl, CURLOPT_URL, $url)){
      	// ================= display content of the page ================= 
      	$resp = curl_exec($curl);
      	 return  "it's working ! with the URL " . $url;
     }
    
  } 
  else return "FAIL: curl_init()"; 
   curl_close(curl);

} 

// {protocol}://{host}:{port}/home/{user}/{object}?{params} 
function loadUser($user, $password, $object, $params){
	 if( !cURLcheckBasicFunctions() ) return "UNAVAILABLE: cURL Basic Functions"; 
  $curl = curl_init(); 


	$postData = array(
	    'username' => $user,
	    'password' => $password
	);
  curl_setopt($curl, CURLOPT_GET, true);	
  curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

  $url = "https://studentmail.students.ittralee.ie:443/home/" . $user . "/" . $object . $params;
  if($curl) 
  { 
  		// ================= Define settings of the connection ================= 
      if( curl_setopt($curl, CURLOPT_URL, $url)){
      	// ================= display content of the page ================= 
      	$resp = curl_exec($curl);
      		return $resp;
      //	return  "it's working ! with the URL " . $url;
     }
    
  } 
  else return "FAIL: curl_init()"; 
   curl_close(curl);
}

// Download from 'example.com' to 'example.txt' 
//http://studentmail.students.ittralee.ie:443/home/aurelien.bigois@z3students.ittralee.ie/inbox.rss
//https://studentmail.students.ittralee.ie/
echo loadUser("angele.demeurant", "erd6uy8r", "inbox.rss", "?auth=ba" ); 
//echo cURLdownload("https://example.com/");

?> 

<!DOCTYPE html>
<html>
	<head>
		<title>Student Application : Appointment</title>
	</head>
	<body>

	</body>
	
</html>
