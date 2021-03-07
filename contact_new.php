<?php
    // 外部ファイル読込
    require_once 'contact_dao.php';
    // var_dump($_POST);
    
    $name= $_POST['name'];
    $subject = $_POST['subject'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];

    $contacts = new Contact($name, $subject, $contact, $email_address);
    ContactDAO::insert($contacts);
    var_dump($contacts);
    

    
?>