<?php
function pr($arr) {
    echo '<pre>';
    print_r($arr);
}

function prx() {
    echo '<pre>';
    print_r($arr);
    die();
}
function get_safe_value($con,$str) {
    if($str!="") {
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }

    
}
function encrypt($string, $keyhash){
    $plaintext = $string;
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
    return $ciphertext;
}
function decrypt($string, $keyhash){
    $c = base64_decode($string);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
        }
}
function get_product($con, $type='',$limit='',$speech,$categories,$productid) {
    $sql="select * from products";
    if($speech!=null){
        $sql.=" where title like '%$speech%'";
    }
    if($productid!=null){
        $sql.=" where productid = $productid";
    }
    if($categories!=null){
        if($speech!=null){
            $sql.=" and category = $categories";
        }
        else {
            $sql.=" where category = $categories";
        }
    }
    if($type=='latest'){
        $sql.=" order by productid desc";
    }
    if($limit!=null){
        $sql.=" limit $limit";
    }
    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res)) {
        $data[]=$row;
    }
    return $data;
}
?>