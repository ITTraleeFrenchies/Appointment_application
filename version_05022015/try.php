
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


//* Returns string status information. 
//* Can be changed to int or bool return types. 
  
    function cURLdownload($url) 
  { 
    if( !cURLcheckBasicFunctions() ) return "UNAVAILABLE: cURL Basic Functions"; 
    $curl = curl_init(); 
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
  $ch = curl_init(); 

  curl_setopt($ch, CURLOPT_HTTPGET, true);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  $url = "https://studentmail.students.ittralee.ie:443/home/" . $user . "/" . $object . $params;

  if($ch) 
  { 
      // ================= Define settings of the connection ================= 
      if( curl_setopt($ch, CURLOPT_URL, $url)){
        // ================= display content of the page ================= 
          
      $curl_response = curl_exec($ch);
      if ($curl_response === false) {
        $info = curl_getinfo($ch);
        curl_close($ch);
        die('error occured during curl exec. Additioanl info: ' . var_export($info));
      }
      curl_close($ch);
      $decoded = json_decode($curl_response);
      if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
        die('error occured: ' . $decoded->response->errormessage);
      }
      echo 'response ok!';
      echo var_dump($curl_response);
      //var_export($decoded->response);
     }
    
  } 
  else return 
   curl_close(curl);"FAIL: curl_init()"; 
}

// Download from 'example.com' to 'example.txt' 
//http://studentmail.students.ittralee.ie:443/home/aurelien.bigois@z3students.ittralee.ie/inbox.rss
//https://studentmail.students.ittralee.ie/
echo loadUser("t00178747", "erd6uy8r", "calendar", "?fmt=ifb" ); 
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
