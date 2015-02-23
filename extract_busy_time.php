
<?php
       // ====================== We retrieve data from the user =====================
      function loadUser($user, $password, $file){
              $ch = curl_init(); 

              curl_setopt($ch, CURLOPT_HTTPGET, true);
              curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

              $url = "https://staffmail.staff.ittralee.ie:443/home/" . $user . "/calendar?fmt=ifb&start=0d&end=+2week";
               $fp = fopen($file, "w"); 
              if($ch) 
              { 
                  // ================= Define settings of the connection ================= 
                  if( curl_setopt($ch, CURLOPT_URL, $url)){
                       if($fp) 
                            { 
                          //
                          curl_setopt($ch, CURLOPT_FILE, $fp);
                            //we execute    
                            $curl_response = curl_exec($ch);

                            if ($curl_response === false) {
                              $info = curl_getinfo($ch);
                              curl_close($ch);
                              die('error occured during curl exec. Additioanl info: ' . var_export($info));
                            }
                              $decoded = json_decode($curl_response);
                                if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                                    die('error occured: ' . $decoded->response->errormessage);
                                }
                              fclose($fp);
                              curl_close($ch);

                            }

                      
                    } 
            }

         else return curl_close(curl);"FAIL: curl_init()"; 
         }


  ?> 