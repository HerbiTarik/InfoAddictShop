<?php
  header('Content-type: text/css; charset:UTF-8');
?>
 html,body{
  background: #ecf0f1;
      margin:0;
      padding:0;
      font-family: Arial, Helvetica, sans-serif;
      line-height: 1.6em;
      overflow-x: hidden;
      
  }
  .inner{
      width:95%;
      margin:auto;
      overflow: hidden;
     
  }
  .menu{
      background-color: black;
      width: 100%;
      height: 90px;
      line-height: 76px;
  }
  .logo{
      color:#ffffff;
      font:normal 50px 'cookie',cursive;
      margin:0;
      padding: 15px;
  }
  .logo span{
      color:#5383d3;
  }
  .cnx_admin{
    max-width: 80%;
    margin:5% 0% 10% 10%;
  }
  .cnx_admin h2{
      font-size:25px;
      word-break: break-all;
  }
  .cnx_admin table tr td {
    padding:5px;
    text-align: left;
  }
  .cnx_admin form table tr td input{
    padding:10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
    
  }
  .cnx_admin form table tr td label{
    font-size: 17.5px;
  }
  .erreur{
    font-size: 19px;
  }
  .bouton{
    background-color: #636e72;
    padding:10px 30px;
    font-size: 17px;
    color: #fff;
    border-radius: 20px;
    outline:none;
    cursor: pointer;
    border-width: 1px;
  }
  .navmenu{
    width: 100%;
      height: 60px;
      background: #636e72;
      box-shadow: 0 10px 15px rgba(0,0,0,0.1);
  }
  .navmenu ul{
    text-align:center;
      padding: 0;
      margin: 0;
  }
  .navmenu ul li{
      background: #636e72;
      
    position: relative;
    list-style: none;
    display: inline-block;
  }
  .navmenu ul li a{
    display: block;
    padding: 0 15px;
    line-height: 59px;
    font-size: 19px;
  }
  .n-link{
    text-decoration: none;
    color:#fff;
    font-weight: 900;
    padding: 0;
    margin: 0 30px;
    transition:all 0.3s ease-in-out;
    border-bottom:transparent solid 1px;
    padding-bottom:3px;
  }
  .n-link:hover{
    border-color: #ff8f00;
  
  }
  a:hover{
      color:  #ff8f00;
  }
  .m-right{
    margin-top: 7px;
      float: right;
  }
  .c-link{
    font-size: 20px;
    text-decoration: none;
    color:#fff;
    padding: 0;
    font-weight: 900;
    margin: 0 13px;
    transition:all 0.3s ease-in-out;
    border-bottom:transparent solid 1px;
    padding-bottom:3px;
  }
  .c-link:hover{
      border-color: #ff8f00;
  }
  .m-left{
      float:left;
  }
  .espace{
    padding: 10%;
  }
  .espace h1{
    font-size:40px;
  }
  .minichat{
    max-width: 80%;
    margin:3% 0% 10% 10%;
  }
  .minichat h2{
    font-size: 40px;
    word-break: break-all;
  }
  .message{
    padding: 10px;
    border-radius: 30px;
    margin-left: 5%;
    font-size: 17.5px;
    border:1px solid  #636e72;
}
.gestion_client{
    max-width: 80%;
    margin:3% 0% 10% 10%;
  }
  .gestion_client h2{
    font-size: 40px;
    word-break: break-all;
  }
  .gestion_client table{
    background:#fff;
    border-width:1px 
    
  }
  .gestion_client table tr td{
    padding:10px;
    font-size:17.5px;
  }
  .gestion_client table tr td a{
      font-size: 18px;
      color:#2f3233;
      padding:0;
      text-decoration: none;
      transition:all 0.3s ease-in-out;
      border-bottom:transparent solid 1px;
      padding-bottom:3px;
  }
  .gestion_client table tr td a:hover{
    border-color: #2f3233;
  }
  .gestion_produit{
    max-width: 80%;
    margin:3% 0% 10% 10%;
  }
  .gestion_produit h2{
    font-size: 40px;
    word-break: break-all;
  }
  .gestion_produit table{
    background:#fff;
    border-width:1px 
    
  }
  .gestion_produit table tr td{
    padding:10px;
    font-size:17.5px;
  }
  .gestion_produit table tr td a{
      font-size: 18px;
      color:#2f3233;
      padding:0;
      text-decoration: none;
      transition:all 0.3s ease-in-out;
      border-bottom:transparent solid 1px;
      padding-bottom:3px;
  }
  .gestion_produit table tr td a:hover{
    border-color: #2f3233;
  }
  .gestion_produit form input[type="submit"]{
    float:right;
    background-color: #636e72;
    padding:10px 30px;
    font-size: 17px;
    color: #fff;
    border-radius: 20px;
    outline:none;
    cursor: pointer;
    border-width: 1px;
  }
  .ajouter_panier{
    max-width: 80%;
    margin:3% 0% 10% 10%;
  }
  .ajouter_panier h2{
    font-size: 40px;
    word-break: break-all;
  }
  .formajouter table tr td{
    padding:10px;
    text-align: left;
  }
  .formajouter form table tr td input{
    padding:10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
  }
  .formajouter form table tr td select{
    padding:10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
  }
  .formajouter form input[type='submit']{
    background-color: #636e72;
    padding:10px 30px;
    font-size: 17px;
    color: #fff;
    border-radius: 20px;
    outline:none;
    cursor: pointer;
    border-width: 1px;
  }
  
  /*--------------------------mini menu navbar--------------------*/
  
  
  @media only screen and (max-width:880px){
    .navmenu ul li a{
      padding:0 14px;
    }
    .n-link{
      margin: 0 2px;
    }
  }
  @media only screen and (max-width:700px){
    .navmenu ul li a{
      padding:0 12px;
    }
    .n-link{
      margin: 0 2px;
    }
  }
  @media only screen and (max-width:650px){
    .navmenu ul li a{
      padding:0 10px;
    }
    .n-link{
      margin: 0 2px;
    }
    }
    @media only screen and (max-width:570px){
      .navmenu ul li a{
        padding:0 5px;
      }
      .n-link{
        margin: 0 2px;
      }
    }
  @media only screen and (max-width:530px){
    .navmenu ul li a{
      padding:0 2px;
    }
    .n-link{
      margin: 0 2px;
    }
  }
  @media only screen and (max-width:500px){
    .navmenu ul li a{
      padding:0 0px;
    }
    .n-link{
      margin: 0 2px;
    }
  }
  /*--------------------------end of mini menu navbar-------------*/
 