<?php
  header('Content-type: text/js; charset:UTF-8');
?>
$(".c-link").on("click",function(){
    $(".login-box").toggleClass("showed");
  });
 
  $(".hide-login-btn").on("click",function(){
    $(".login-box").toggleClass("showed");
  });

  $(".but").on("click",function(){
    $(".login-box").toggleClass("showed");
  });