<?php
    include('simple_html_dom.php');

    
    // $html = file_get_html('https://www.w3schools.com/php/default.asp');
    $html = file_get_html('https://piratebay.works/');
    

    //get title of the page
    // echo $html->find('title', 0)->plaintext;


    // $list = $html->find('div[class="w3-bar w3-left]',0);
    // $list = $html->find('div[class="w3-bar w3-left]',0);

    // $list_array = $list->find('a');

    // for($i = 0; $i <sizeof($list_array); $i++){
    //     echo $list_array[$i]->plaintext;
    //     echo "<br>";
    // }


    $list = $html->find('tbody', 0);

    $list_array = $list->find('tr');

  
    // for($i = 0; $i <sizeof($list_array); $i++){
    //     echo $list_array[$i]->plaintext;
    //     echo "<br>";

    // }


    $arrpirate = array();

    for($i = 0; $i <sizeof($list_array); $i++){

        $piratemirror =$list_array[$i]->find('a', 0)->plaintext;
        $country =$list_array[$i]->find('td[title=\'TPB Proxy Country\']', 0)->plaintext;
        $status =$list_array[$i]->find('td[title=\'TPB Proxy Status\']', 0)->plaintext;
        // $country =$list_array[$i]->find('td[title=\'TPB Proxy Country\']', 0)->plaintext;
        $ssl =$list_array[$i]->find('td[title=\'TPB Proxy SSL Status\']', 0)->plaintext;
        // $country =$list_array[$i]->find('td:nth-child(4)', 0)->plaintext;

        array_push($arrpirate, $piratemirror, $country, $status, $ssl);
    }

    if( isset($_POST['tag']) && $_POST['tag']!='' ){
        $tag=$_POST['tag'];
        $response=array("tag"=>$tag, "success"=>0, "error"=>0);
    
        if($tag=="get*mirrors"){
            // print_r( $arrpirate);
           return $json_data =  json_encode($arrpirate);
            // echo $json_data;
        }

    }
    else{
        echo 'without tag';
    }



?>