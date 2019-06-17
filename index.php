
    
<?php
/*
Author  : Honest Kudzai Masukume
Title   : Front-End Engineer
Finish Time : Sunday 11:52 AM.
*/
// Using the hard coded json data of target case-1
$json = file_get_contents('http://142.93.203.254:4200/test-case-3');
 //= "";//142.93.203.254:4200/test-case-1';
/*$json = '{"target":4,
    "data":[{
    "id":1,
    "displayName":"OPD",
    "fullName":"Out Patient Diagnosis",
    "category":"Clinical",
    "parentId":0}
    ,{"id":2,
    "displayName":"IPD",
    "fullName":"In-Patient Diagnosis",
    "category":"Clinical",
    "parentId":0},
    {"id":3,"displayName":"IMCI",
    "fullName":"Integrated Management of Child Illnesses",
    "category":"Clinical",
    "parentId":0},
    {"id":4,
    "displayName":"ARI",
    "fullName":"Out Patient Diagnosis",
    "category":"Clinical",
    "parentId":3}
    ,{"id":5,"displayName":"Pnemuenia Treatment",
    "fullName":"Pnemuenia Treatment",
    "category":"Clinical",
    "parentId":4},
    {"id":6,"displayName":"Treatment of Severe Pnemuenia",
    "fullName":"Treatment of Severe Pnemuenia",
    "category":"Clinical",
    "parentId":4},
    {"id":7,"displayName":"Diarrheal Diseases",
    "fullName":"Diarrheal Diseases",
    "category":"Clinical","parentId":3}
    ]}
  ';
*/
    // Decoding data from json file
$obj = json_decode($json, TRUE);
// Fetching the target value per assigned case
$target = $obj['target'];
// A variable that contains "==", these are demarkaters of each parent service to child service
$indexMarker = '============================================================================================================
=====================================================================================================================';
// Looping through the data array of services
for($i=0; $i<count($obj['data']); $i++) {
// Nested if statements to iterate through values of array of services.
    if($target == 0 && $obj['data'][$i]["id"] >= $target  || $obj['data'][$i]["parentId"] == $obj['data'][$i]["id"] ){
        
        $targets = ($obj['data'][$i]["parentId"])*3;
        $index = substr("$indexMarker",$targets,$targets);
        
            if($obj['data'][$i]["parentId"]== 0){
                
                echo "==";
// Assigning 2 "==" to the parent service.
            echo $obj['data'][$i]["displayName"]."<BR>";
            }else{  
                echo $index."".$obj['data'][$i]["displayName"]."<BR>";
    }
//when target value is greater than 0 , this elseif statements condition is executed. 
}elseif( $target >= 0 && $obj['data'][$i]["parentId"] == ($obj['data'][$i]["parentId"] >= $target) || ($obj['data'][$i]["id"]== $target) ){
    
//Another if statement to further iterate through the array of services.    
    if($target >= 0 && $obj['data'][$i]["parentId"] == ($obj['data'][$i]["parentId"] <= $target) || ($obj['data'][$i]["id"]== $target) ){
        $targets = $obj['data'][$i]["parentId"];
// Using substr() to trim number of "==" depending on the value of parent id.
        $index = substr("$indexMarker",$targets,$targets);
        
        if($obj['data'][$i]["parentId"]== 0){
            //echo '<strong>'.$obj['data'][$i]["category"]. '</strong>'."<BR>";
            echo "==";
           
           echo $obj['data'][$i]["displayName"]."<BR>";
        } else{
                    
                    //echo $index;
                    //$targets = $obj['data'][$i]["parentId"]
                    echo $index."".$obj['data'][$i]["displayName"]."<BR>";
                   }
                   
    }else{
         //die ('<script type="type/javascript">Alert("Could not find Specified Target!!!");</script>');
        }
}
}
// End of code.
?>
