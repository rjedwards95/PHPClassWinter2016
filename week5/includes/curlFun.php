<?php

/*
 * Get Curl Data from URL.
 * 
 * Taken from Week 5 functions.
 * 
 * @return CURL data.
 */
 function getCurl($url){
        $curl = curl_init(); 

        // set url 
        curl_setopt($curl, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($curl); 
        
        // close curl resource to free up system resources 
        curl_close($curl);
        
        //Returns output to file.
        return $output;
}
/*
 * Function to find Links in website.
 * 
 * @return Array of links.
 */
function matchURL($results){
            $urlRegex = ' /(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/';
            $urlMatches = array();
        
            preg_match_all($urlRegex, $results, $urlMatches);
            
            return array_unique($urlMatches[0]);
}