<?php
/*
Author: Osman Çakmak
Skype: oxcakmak
Email: oxcakmak@hotmail.com
Website: http://oxcakmak.com/
Country: Turkey [TR]
*/
$fileName = $_FILES['news_thumbnail']['name'];
$fileSize = $_FILES['news_thumbnail']['size'];
$fileTmpName = $_FILES['news_thumbnail']['tmp_name'];
$fileType = $_FILES['news_thumbnail']['type'];
/*
[An array of extensions that the file has to be uploaded - pgn, jpg, jpeg, gif]
*/
$fileExtensions = ['jpeg','jpg','png'];
$fileExtension = strtolower(end(explode('.',$fileName)));
$fileNameEncoded = hash("sha1", basename($fileName)."-".bin2hex(openssl_random_pseudo_bytes(32))).".".$fileExtension; //
$uploadPath = "upload/".$fileNameEncoded;
if (!in_array($fileExtension,$fileExtensions)) {
    /*
    [error message if the loaded file does not have any extension in the array]
    */
    echo "extension";
}else{
    if ($fileSize > 5000000) { 
      /* 
      File Size Large 5 MBit Then & File Size must be in bytes ( MB to B )
      [if the uploaded file is larger than the specified byte type]
      */
        echo "limit";
    }else{
    //Success Then
       move_uploaded_file($fileTmpName, $uploadPath);
    }
}
?>
