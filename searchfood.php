<?php
  header('content-type:text/html;charset=utf-8');
  
  $query = $_GET['query'];
  
  echo $query;
  
  $params = array(
    "appId" => "b871bf7e",
    "appKey" => "8aa879546b2064de87ebc15334754bab",
    "fields" => ["item_name",
              "nf_calories"],
    "query" => $query
  );
  
  $header = array(
    "content-type" => "application/json"" 
  );
  
  $data = http("https:\/\/api.nutritionix.com/v1_1/search?",$params,'POST',$header);
  
  echo $data;

  protected function http($url, $params, $method = 'GET', $header = array(), $multi = false) {
        $opts = array(CURLOPT_TIMEOUT => 30, 
                      CURLOPT_RETURNTRANSFER => 1, 
                      CURLOPT_SSL_VERIFYPEER => false, 
                      CURLOPT_SSL_VERIFYHOST => false, 
                      CURLOPT_HTTPHEADER => $header);

        /* 根据请求类型设置特定参数 */
        switch(strtoupper($method)) {
            case 'GET' :
                $opts[CURLOPT_URL] = $url . '&' . http_build_query($params);
                dump($opts[CURLOPT_URL]);
                break;
            case 'POST' :
                //判断是否传输文件
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                
                dump($opts[CURLOPT_URL]);
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default :
                throw new Exception('不支持的请求方式！');
        }

        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error)
            throw new Exception('请求发生错误：' . $error);
        return $data;
    }
?>
