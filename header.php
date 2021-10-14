<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      <?php
        if(!isset($page_title)){
          echo "Index";
        }else{
          echo $page_title;
        }
       ?>
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
      h1,h2,h3,h4{
        font-family: 'Roboto Slab', serif;
      }
      body{
        margin: 0;
        font-family: 'Montserrat', sans-serif;
      }
      a:visited,a:active,a:hover,a:link{
        outline: none;
        text-decoration: none;
      }
      .logo img{
        width: 8%;
        border-radius: 90px;
        z-index: 10;
        display: inline-block;
        position: fixed;
        top: 15px;
        left: 15px;
        min-width: 50px;
      }
      .top{
        margin: 0;
        padding: 12px;
        background-color: black;
        height: 50px;
        position: fixed;
        width: 100%;
        top: 0px;
        text-align: right;
        z-index: 100000;
      }
      .top,.logo{
        transition: box-shadow 0.5s ease-in-out;
      }
      .logo:hover{
        box-shadow:0px 3px 12px 2px green;
      }
      .top-btn{
        text-decoration: none;
        color: white;
        position: relative;
        top: 8px;
        right: 30px;
        padding: 8px 30px;
        border-radius: 50px;
        display: inline-block;
        background-color: #590995;
        font-size: 22px;
        margin: 0px 5px 0px;
        transition: transform 0.3s box-shadow 0.2s ease-in-out ;
      }
      .top-btn:hover{
          box-shadow: 0px 3px 15px 1px gray;
          transition: transform 0.3s box-shadow 0.2s ease-in-out ;
      }
      .top-btn:active{
          transform: translateY(0px);
          box-shadow: none;
          transition: transform 0.3s box-shadow 0.2s ease-in-out ;
      }
      #res-menu{
        display: none;
      }
      @media screen and (max-width: 850px){
        #res-menu{
          display: block;
          background-color: white;
          width: 45px;
          height: 45px;
          position: absolute;
          right: 35px;
          border-radius: 10px;
          top: 15px;
        }
        #res-menu:hover{
          box-shadow: 0px 0px 6px 1px #ddd;
        }
        .top-btn{
          display: block;
          width: 35%;
          position: relative;
          left: 55%;
          margin-left: 4px;
          background-color: #eee;
          border-radius: 0px;
          border-bottom: 2px dashed green;
          color: green;
        }
        .top-btn:hover{
          background-color: #ddd;
        }
        #top-option{
          margin-top: 53px;
        }
      }
    </style>
    <script>
    function shadow(x){
      x.setAttribute('style','box-shadow:0px 3px 12px 2px green;');
    }
    function no_shadow(x){
      x.setAttribute('style','box-shadow:none;');
    }
      window.addEventListener('scroll',function(){
        var a = document.querySelector('.top');
        var b = document.querySelector('.logo img');
        if(window.pageYOffset<=55){
          a.setAttribute('style','box-shadow:none;');
          b.setAttribute('style','box-shadow:none;');
        }else{
          a.setAttribute('style','box-shadow:0px 0px 10px 8px gray;');
          b.setAttribute('style','box-shadow:0px 3px 12px 2px green;');
        }
      });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script>
    $(document).ready(function(){
      $(window).resize(function(){
        let width = $(window).width();
        if(width>=850){
          // console.log(width);
          $(".top-btn").each(function(){
            $(this).show();
          });
        }else{
          $(".top-btn").each(function(){
            // console.log(width);
            $(this).hide();
          });
        };
      });
      $("#res-menu").click(function(){
        console.log("working");
        $(".top-btn").each(function(){
          $(this).toggle();
        });
      });
    });
    </script>
  </head>
  <body>
        <h1 class="top">
          <a class="logo" href="<?php echo url_for('/general/index.php'); ?>">
          <img class="logo" id="logo-img" onmouseover="shadow(this)" onmouseout="no_shadow(this)" src="<?php echo url_for('/images/logo.png'); ?>" alt="logo">
        </a>
          <img src="<?php echo url_for("/images/ham_burger.svg"); ?>" id="res-menu">
          <a class='top-btn' id='top-option' href="<?php echo url_for("/general/notice/notice.php"); ?>">Notice</a>
          <a class='top-btn' href="<?php echo url_for("/general/complain/complain.php"); ?>">Status</a>
          <a class='top-btn' href="<?php echo url_for('general/login_option.php'); ?>">Login</a>

        </h1>
