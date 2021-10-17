<?php
  header('Content-type: text/css; charset:UTF-8');
?>
header{
    position:fixed;
    width:100%;
  }
  
  html,body{
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
  .m-left{
      float:left;
  }
  .m-right{
    margin-top: 7px;
      float: right;
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
  .m-link{
      font-size: 20px;
      text-decoration: none;
      color:#fff;
      padding: 0;
      font-weight: 900;
      margin: 0 15px;
      transition:all 0.3s ease-in-out;
      border-bottom:transparent solid 1px;
      padding-bottom:3px;
  }
  .c-link{
    font-size: 20px;
    text-decoration: none;
    color:#fff;
    padding: 0;
    font-weight: 900;
    margin: 0 9px;
    transition:all 0.3s ease-in-out;
    border-bottom:transparent solid 1px;
    padding-bottom:3px;
  }
  a:hover{
      color:  #ff8f00;
  }
  .m-link:hover{
      border-color: #ff8f00;
  
  }
  .c-link:hover{
    border-color: #ff8f00;
  }
  .header-searchbar{
  margin-top:7px;
  }
  .header-searchbar input[type=text]{
    height: 40px;
    margin-left: 10%;
    width: 400px;
    font-size: 15px;
    border-radius: 20px;
    border: none;
    padding: 10px;
    outline: none;
  }
  
  .header-searchbar .btn{
      background-color: black;
      border:none;
      color:#fff;
      font-size: 18px;
      border-radius:30px;
      cursor: pointer;
      outline: none;
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
  .navmenu ul ul{
    position: absolute;
      top: 60px;
      display: none;
  }
  .navmenu ul li:hover > ul{
    display: block;
  }
  .navmenu ul ul li{
    width: 285px;
    float: none;
    display: list-item;
    position: relative;
  }
  .navmenu ul ul ul li{
    position: relative;
    top: -60px;
    left: 260px;
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
  /*---------------mini menu header----------*/
  .m-nav-toggle{
          width:40px;
          height:66px;
          display:none;
          align-items:center;
          float:right;
          cursor: pointer;
  }
  span.m-toggle-icon, span.m-toggle-icon:before, span.m-toggle-icon:after{
      content: "";
      display: block;
      width: 100%;
      height: 2px;
      background: #fff;
      position: relative;
      transition: all 0.3s ease-in-out;
  }
  span.m-toggle-icon:before{top: 12px;}
  span.m-toggle-icon:after{top: -15px}
  
  .m-right.is-open{
    transform :translateX(0);
  }
  .m-nav-toggle.is-open span.m-toggle-icon{
      background: transparent;
  }
  .m-nav-toggle.is-open span.m-toggle-icon:before, .m-nav-toggle.is-open span.m-toggle-icon:after{
      transform-origin: center;
      transform: rotate(45deg);
      top:0; 
  }
  .m-nav-toggle.is-open span.m-toggle-icon:before{
      transform: rotate(-45deg);
  }
  /*--------------searchbar------------------*/
  @media only screen and (max-width:1285px){
      .header-searchbar input[type=text]{
        margin-left: 160px;
      }
      
  }
  @media only screen and (max-width:1270px){
    .header-searchbar input[type=text]{
      margin-left: 130px;
    }
    
  }
  @media only screen and (max-width:1220px){
    .header-searchbar input[type=text]{
      margin-left: 100px;
    }
    
  }
  @media only screen and (max-width:1185px){
    .header-searchbar input[type=text]{
      margin-left: 70px;
    }
    
  }
  @media only screen and (max-width:1155px){
    .header-searchbar input[type=text]{
      margin-left: 40px;
    }
    
  }
  @media only screen and (max-width:1130px){
    .header-searchbar input[type=text]{
      margin-left: 10px;
    }
    
  }
  @media only screen and (max-width:1090px){
    .header-searchbar input[type=text]{
      display:none;
    }
    .btn {
      float:right;
      margin:20px 15px 0 0;
    }
    .btn i{
      font-size: 25px;
    }
    
  }
  /*----------------fin searchbar------------*/ 
  @media only screen and (max-width:645px){
      .m-right{
          position: absolute;
          top:142px;
          right:0;
          width:45%;
          height: 600px;
          background: black;
          transform: translateX(100%);
          transition:all 0.3s ease-in-out;
      }
      
      .m-link{
          display:block;
          text-align: center;
          padding:0;
          margin:0 28px;
          height:55px;
         
      }
      .c-link{
        display:block;
        text-align: center;
        padding:0;
        margin:0 28px;
        height:55px;
       
    }
      .m-nav-toggle{
        margin-top:8px;
          display: flex;
      }
  }
  /*--------------------------end of mini menu header-------------*/
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
  /*--------------------------end of header-----------------------*/
  .banner{
      width: 100%;
      height: 650px;
      background-image: url(4.jpg);
      animation: slide 20s infinite;
      background-position:center;
      background-repeat: none;
      min-height: 300px;
      text-align:bottem;
  }
  .banner p{
      padding-top:25%;
    text-align:center;
    font-size:50px;
    color: #fff;

  }
  @keyframes slide{
      25%{
          background:url(4.jpg);
      }
      50%{
          background:url(1.jpg);
          background-position: bottom center;
      }
      75%{
          background:url(10.jpg);
          background-position: bottom right;
  
      }
      100%{
          background:url(2.jpg);
          background-position: center;
      }
  }
  /*-----------------CONNEXION-------------------*/
  .login-box{
    position: absolute;
    top:0;
    left: -100%;
    width: 50%;
    height: 100vh;
    background:black;
    transition:0.4s;
    margin-top: 150px;
    
  }
  .login-form{
    position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      color: white;
      text-align: center;
  }
  .login-form h2{
    font-size: 35px;
    margin-top: 0;
    margin-bottom: 30px;
  }
  .textb{
    display: block;
    box-sizing: border-box;
    width:240px;
    background: #ffffff28;
    border:1px solid white;
    padding: 10px 20px;
    color:white;
    outline:none;
    margin: 10px 0;
    border-radius: 15px;
    text-align:center;
  }
  .textc{
    margin-left: 10px;
    float: left;
    color: #ffffff;
    margin-top: 7px;
    transition:all 0.3s ease-in-out;
    border-bottom:transparent solid 1px;
    padding-bottom:3px;
  }
  .textc:hover{
    border-color: #ff8f00;
  
  }
  .login-btn{
    width:240px;
    background: #bdc3c7;
    border:0;
    color: white;
    padding: 10px;
    border-radius: 15px;
    cursor: pointer;
    outline: none;
  }
  .hide-login-btn{
    color: white;
    position: absolute;
    top:40px;
    right:40px;
    cursor: pointer;
    font-size: 24px;
  }
  .showed{
    left:0;
  }
  .login-box #error_message{
    margin-bottom: 20px;
      padding: 0px;
      background: #FF8F00;
      text-align: center;
      font-size:14px;
      transition: all 0.5s ease;
  }
  
  /*---------------------------------------------*/
  .pill-nav a:hover {
    background-color:   #FF8F00;
    color: black;
  }
  
  
  .pill-nav a.active {
    background-color:  #FF8F00  ;
    color: black;
  }
  
  
  .button:hover {
    background-color: #555;
  }
  
  * {
    box-sizing: border-box;
  
  }
  
  body {
    background-color: white;
    padding: 20px;
    font-family: Arial;
   
  }
  
  
  .main {
    max-width: 80%;
    margin: auto;
    
  }
  
  h1 {
    font-size: 50px;
    word-break: break-all;
  
  
  }
  .row {
  color: white;
  margin: 8px -16px;
    
  }
  
  
  .row,
  .row > .column {
    padding: 8px;
    color: #F43A10;
   
  }
  
  /* Create four equal columns that floats next to each other */
  .column {
    float: left;
    width: 25%;
   
  }
  
  
  .row:after {
    content: "";
    display: table;
    clear: both;
  
  }
  
  /* Content */
  .content {
    background-color: #F8EFE8;
    padding: 10px;
    border-radius: 20px;
    
  }
  
  
  
  .fav {
    background-color:  #F8EFE8; 
    border: none; 
    color: black; 
    padding: 12px 16px; 
    font-size: 16px; 
    margin-left: 170px;
    border-radius: 20%;
    outline: none;
   cursor:pointer;
  }
 
  


.modele-container {
    text-align: center;
    position:fixed;
    background-color:#fff;
    width:100%;
    height:100%;
    max-width:400px;
    left:50%;
    padding:20px;
    border-radius:5px;
    visibility:hidden;

    
    transform:translate(-50%,-50%);

    
    transition: transform 200ms ease-out;

}

.modele:before{
    content: "";
    position: fixed;
    display: none;
    background-color: rgba(0, 0, 0, .8);
    top:0;
    left:0;
    height:100%;
    width:100%;
}
.modele:target:before {
    display: block;
}
.modele:target .modele-container{
    top:2%;
    visibility: visible;
    -webkit-transform:translate(-50%,0);
    -ms-transform:translate(-50%,0);
    transform:translate(-50%,0);
}

    .fav:hover {
    background-color: #FF8F00;
  }
  .consulter{
    background-color: black;
    border: none; 
    color: white; 
    padding: 12px 16px; 
    margin: 5px 0;
    font-size: 16px; 
    cursor: pointer; 
    border-radius: 40px;
    outline: none;
    text-decoration: none;

  }
  .consulter a{
    color: #fff;
    text-decoration: none;
  }
  .consulter:hover {
    background-color: #FF8F00;
  }
  .content table tr td{
    color:rgb(26, 24, 24);
  }
  
  .but {
      background-color: black;
    border: none; 
    color: white; 
    padding: 12px 16px; 
    font-size: 16px; 
    cursor: pointer; 
    border-radius: 40px;
    outline: none;
  }
  .but:hover {
    background-color: #FF8F00;
  }
  
  
  .voir  {
      background-color:  black;
    border: none;
    color: white; 
    padding: 12px 16px; 
    font-size: 16px; 
    cursor: pointer; 
    border-radius: 40px;
    outline: none;
    
  }
  
  
  .voir:hover {
    background-color: #FF8F00;
  border-radius: 40px;
  }
  
  
  
  
  @media screen and (max-width: 900px) {
    .column {
      width: 50%;
    }
  }
  
  
  @media screen and (max-width: 600px) {
    .column {
      width: 100%;
    }
  }
  body {
      margin: 0;
      padding: 0;
  }
  
  footer{
      
      bottom: 0;
  }
  .footer-distributed{
      background-color: black;
      box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
      box-sizing: border-box;
      width: 100%;
      text-align: left;
      font: bold 16px sans-serif;
   
      padding: 55px 50px;
      margin-top: 80px;
  }
   
  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right{
      display: inline-block;
      vertical-align: top;
  }
   
  .footer-distributed .footer-left{
      width: 40%;
  }
   
  .footer-distributed h3{
      color:  #ffffff;
      font: normal 40px 'Cookie', cursive;
      margin: 0;
  }
   
  .footer-distributed h3 span{
      color:  #5383d3;
  }
   
   
  .footer-distributed .footer-links{
      color:  #ffffff;
      margin: 20px 0 12px;
      padding: 0;
  }
   
  .footer-distributed .footer-links a{
      display:inline-block;
      line-height: 1.8;
      text-decoration: none;
      color:  inherit;
  }
   
  .footer-distributed .footer-company-name{
      color:  #8f9296;
      font-size: 14px;
      font-weight: normal;
      margin: 0;
  }
   
   
  .footer-distributed .footer-center{
      width: 35%;
  }
   
  .footer-distributed .footer-center i{
      background-color:  #33383b;
      color: #ffffff;
      font-size: 25px;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      text-align: center;
      line-height: 42px;
      margin: 10px 15px;
      vertical-align: middle;
  }
   
  .footer-distributed .footer-center i.fa-envelope {
      font-size: 17px;
      line-height: 38px;
  
  }
   
  .footer-distributed .footer-center p{
      display: inline-block;
      color: #ffffff;
      vertical-align: middle;
      margin:0;
  }
   
  .footer-distributed .footer-center p span{
      display:block;
      font-weight: normal;
      font-size:14px;
      line-height:2;
  }
   
  .footer-distributed .footer-center p a{
      color:  #5383d3;
      text-decoration: none;;
  }
   
  .footer-distributed .footer-right{
      width: 20%;
  }
   
  .footer-distributed .footer-company-about{
      line-height: 20px;
      color:  #92999f;
      font-size: 13px;
      font-weight: normal;
      margin: 0;
  }
   
  .footer-distributed .footer-company-about span{
      display: block;
      color:  #ffffff;
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 20px;
  }
   
  .footer-distributed .footer-icons{
      margin-top: 25px;
  }
   
  .footer-distributed .footer-icons a{
      display: inline-block;
      width: 35px;
      height: 35px;
      cursor: pointer;
      background-color:  blue;
      border-radius: 12px;
      font-size: 20px;
      color: #ffffff;
      text-align: center;
      line-height: 35px;
      margin-right: 3px;
      margin-bottom: 5px;
  }
   
   
  @media (max-width: 880px) {
   
      .footer-distributed{
          font: bold 14px sans-serif;
      
      }
   
      .footer-distributed .footer-left,
      .footer-distributed .footer-center,
      .footer-distributed .footer-right{
          display: block;
          width: 100%;
          margin-bottom: 40px;
          text-align: center;
      }
   
      .footer-distributed .footer-center i{
          margin-left: 0;
      }
      .main {
          line-height: normal;
          font-size: auto;
      }
   
  }
  .inscription{
    background: #ecf0f1;
    margin-top: 200px;
  }
  .inscription h2{
    font-size: 50px;
  }
  .inscription form table tr td{
    padding:10px;
    text-align: left;
    border-radius: 10px;
    
  }
  .inscription form table tr td input{
    padding:10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
  
  }
  .inscription form table tr td label{
    font-size: 17.5px;
  }
  .inscription form table tr td input[type=submit]{
    background-color: #636e72;
    padding:12px 30px;
    font-size: 17px;
    color: #fff;
    
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
  .quantiteproduit{

    max-width: 80%;
    margin:15% 0% 10% 10%;
  }
  .quantiteproduit h2{
    font-size: 50px;
    word-break: break-all;
  }
  .quantite table tr td{
    padding:10px;
    text-align: left;
  }
  .quantite table tr td p input[type='text']{
    padding:10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
  }
  
  .quantite table tr td p{
    font-size:17.5px;
  }
  .quantiteproduit p input[type='submit']{
    background-color: #636e72;
    padding:10px 30px;
    font-size: 17px;
    color: #fff;
    border-radius: 20px;
    outline:none;
    cursor: pointer;
    border-width: 1px;
  }
  .panier{

    max-width: 80%;
    margin:15% 10% 30% 10%;
  }
  .panier h2{
    font-size: 50px;
    word-break: break-all;
  }
  .panier table{
    background:#fff;
  }
  .panier p{
    font-size:22px;
  }
  .panier table tr td{
    padding:10px;
    font-size:17.5px;
  }
  .panier table tr td a{
      font-size: 18px;
      color:#2f3233;
      padding:0;
      text-decoration: none;
      transition:all 0.3s ease-in-out;
      border-bottom:transparent solid 1px;
      padding-bottom:3px;
  }
  .panier table tr td a:hover{
    border-color: #2f3233;
  }
  .minichat{
    max-width: 80%;
    margin:15% 0% 10% 10%;
  }
  .minichat h2{
    font-size: 50px;
    word-break: break-all;
  }
  .minichat form table tr td{
    padding:10px;
    text-align: left;
    border-radius: 10px;
  }
  .minichat form table tr td input[id='pseudo']{
    padding:10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
  
  }
  .minichat form table tr td input[id='message']{
    padding:20px 10px 50px 10px;
    border-radius: 30px;
    outline: none;
    border-width: 1px;
    border-color: #a59d9d;
  

  }
  .minichat form table tr td label{
    font-size: 17.5px;
  }
  .minichat form input[type='submit']{
    background-color: #636e72;
    padding:10px 30px;
    font-size: 17px;
    color: #fff;
    border-radius: 20px;
    outline:none;
    cursor: pointer;
    border-width: 1px;
  }
  .message{
    padding: 10px;
    border-radius: 30px;
    margin-left: 5%;
    font-size: 17.5px;
    border:1px solid  #636e72;
}
.pc_bureau{
max-width: 80%;
    margin:15% 0% 40% 10%;
  }
  .pc_bureau h2{
  font-size: 45px;
    word-break: break-all;
  }
  .kat button{
    padding:10px;
    background-color:#636e72;
    cursor:pointer;
    border-radius:7px;
  }
  .kat a button{
    color:#fff;
    font-size:17px;
   
  }
  .coor{
    width:80%;
    position:center;
  }
  .coor h2{
    font-size:28px;
  }
  .coor table tr td{
    padding:15px;
   

  }
  .coor table tr td input{
    padding:10px;
    margin:5px;
    border-radius:15px;
    outline: none;
  }
  .minichat h2{
    font-size:28px;
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

  
  .espace{
    margin-top:15%;
    padding: 10%;
  }
  .espace h1{
    font-size:40px;
  }
  .minichat{
    max-width: 80%;
    margin:16% 0% 10% 10%;
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
    margin:16% 0% 10% 10%;
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
    margin:16% 0% 10% 10%;
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
    margin:16% 0% 10% 10%;
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
    .btn_msg button{
      float:right;
    padding:10px;
    background-color:#636e72;
    cursor:pointer;
    border-radius:7px;
  }
  .btn_msg button{
    color:#fff;
    font-size:17px;
  }
  .gestion_commande{
    max-width: 80%;
    margin:16% 0% 10% 10%;
  }
  .gestion_commande h2{
    font-size: 40px;
    word-break: break-all;
  }
  .gestion_commande table{
    background:#fff;
    border-width:1px 
    
  }
  .gestion_commande table tr td{
    padding:10px;
    font-size:17.5px;
    text-align:center;
  }
  .gestion_commande table tr td strong{
    color:#fff;
    
  }
  .btn_commande{
    padding:10px;
    background-color: #636e72;
    border-radius:7px;
    color:#fff;
    font-size:17px;
    cursor:pointer;
    outline:none;
  }
  .rpns{
    max-width: 80%;
    margin:16% 0% 10% 10%;
    padding:0;
  }
  .rpns h2{
    font-size: 40px;
    word-break: break-all;
  }
  .rpns form textarea{
    width:60%;
    border-radius:10px;
    outline:none;
  }
  .rpns form input[type="submit"]{
    padding:10px;
    background-color: #636e72;
    border-radius:7px;
    color:#fff;
    font-size:17px;

  }
  .mod_pan{
    padding:5px;
    outline:none;
    border-radius:7px;
  }
  .mod_pan_btn{
    padding:5px;
    background-color: #636e72;
    border-radius:7px;
    color:#fff;
    font-size:17px;
    cursor:pointer;
  }
  .voir_msg{
    max-width: 80%;
    margin: 5px 0% 10% 10%;
  }
  .voir_msg h2{
    font-size:28px;
  }
  .voir_commande{
    max-width: 80%;
    margin:5px 0% 10% 10%;
  }
  .voir_commande table tr td{
    padding:10px;
    font-size:17.5px;
    text-align:center;
  }
  .voir_commande table tr td strong{
    color:#fff;
    
  }
  .btn_voir_commande{
    padding:7px;
    background-color: #636e72;
    border-radius:7px;
    color:#fff;
    font-size:15px;
  }
  .gestion_categorie{
    max-width: 80%;
    margin:16% 0% 10% 10%;
  }
  .gestion_categorie h2{
    font-size: 40px;
    word-break: break-all;
  }
  .gestion_categorie table tr td{
    padding:10px;
    font-size:17.5px;
  }
  .gestion_categorie table tr td a{
    font-size: 18px;
      color:#2f3233;
      padding:0;
      text-decoration: none;
      transition:all 0.3s ease-in-out;
      border-bottom:transparent solid 1px;
      padding-bottom:3px;
  }
  .gestion_categorie table tr td a:hover{
    border-color: #2f3233;
  }
  .s_c{
    max-width: 80%;
    margin:16% 0% 10% 10%;
  }
  .s_c{
    font-size: 40px;
    word-break: break-all;
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
 