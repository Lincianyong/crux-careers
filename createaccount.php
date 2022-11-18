<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $first_name = $_POST["first name"];
  $last_name = $_POST["last name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  // var_dump($duplicate);
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user (username, first_name, last_name, email, password ) VALUES('$username', '$first_name', '$last_name', '$email', '$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
              theme: {
                extend: {
                  colors: { 
                  },
                  fontFamily: {
                    fontone: ['Emberly'],
                    fonttwo: ['Playfair Display'],
                    fontthree: ['Beth Ellen'],
                    fontfour: ['VCR OSD Mono'],
                    fontfive: ['Hanson'],
                    fontsix: ['Arcadia']
                  },
                  animation: {
                    'spin-slow': 'spin 98s linear infinite',
                    'wiggle': 'wiggle 1s ease-in-out infinite',
                  }
                }
            }
        }
    
          </script>
          <style>
            @font-face {
        font-family: 'Emberly';
        src: url('./Emberly-Bold.ttf') format('truetype');
        font-weight: 700;
        font-style: normal;
        }
    
        @font-face {
        font-family: 'Emberly';
        src: url('./Emberly-Black.ttf') format('truetype');
        font-weight: 900;
        font-style: bold;
        }
    
        @font-face {
        font-family: 'Beth Elen';
        src: url('./BethEllen-Regular.ttf') format('truetype');
        font-weight: 900;
        font-style: normal;
        }

        @font-face {
        font-family: 'VCR OSD Mono';
        src: url('./VCR_OSD_MONO_1.001.ttf') format('truetype');
        font-weight: 900;
        font-style: normal;
        }

        @font-face {
        font-family: 'Hanson';
        src: url('./Hanson-Bold.ttf') format('truetype');
        font-weight: 900;
        font-style: normal;
        }

        @font-face {
        font-family: 'Arcadia';
        src: url('./Arcadia-SVG.ttf') format('truetype');
        font-weight: 900;
        font-style: normal;
        }
        </style>
    
        <title>Document</title>
    </head>
    <body>
        <section id="NAVIGATION">
            <nav class="p-3 bg-black md:flex md:items-center md:justify-between z-0">
                <div>
                    <a href="IO HOMEPAGE.html" class="text-white font-medium text-4xl z-0 font-fontsix">CRUXCAREER</a>
                </div>
                <ul class="text-white md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-black w-full left-0 md:py-0 md:pl-0 pl-7 md:opacity md:flex justify-end flex-wrap">
                    <li class="m-3 md:my-0">
                        <a href="IO HOMEPAGE.html" class="hover:text-gray-600 duration-500 ">Home</a>
                    </li>
                    <li class="m-3 md:my-0">
                        <a href="Contact.html" class="hover:text-gray-600 duration-500">Contact</a>
                    </li>
                    <li class="m-3 md:my-0">
                        <a href="About.html" class="hover:text-gray-600 duration-500">About Us</a>
                    </li>
                    <li class="m-3 md:my-0">
                        <a href="profile.html" class="hover:text-gray-600 duration-500">Profile</a>
                    </li>
                    <li class="m-3 md:my-0">
                        <a href="login.html" class="border-solid border-2 border-slate-400 py-2 px-12 rounded-xl hover:bg-gray-800 duration-200 hover:text-red-500">
                            Login
                        </a>
                    </li>
                    <li class="m-3 md:my-0">
                        <a class="py-2 px-4 bg-slate-400 rounded-xl hover:bg-gray-800 duration-200 hover:text-red-500">
                            Create Account
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
        <section class="h-screen w-full bg-cover bg-center overflow-x-hidden relative flex-wrap flex justify-end"
        style="background-image: url(./img/Spacebackground\ copy.jpg)">
        <div class="w-[56rem] h-full bg-gray-800 flex-col p-10 flex justify-center opacity-95">
            <div>
                <p class="text-white text-5xl font-medium -mt-8">Create an account</p>
            </div>
            <div class="mt-10">
                <div class="pr-10">                        
                    <p class="text-lg font-normal text-white mb-1">Create a username</p>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Enter username" 
                        class="w-[22.5rem] bg-slate-800 py-4 px-5 border hover: border-white rounded-lg shadow text-base font-sans text-white"/>                            
                </div>
            </div>
            <div class="mt-3 flex justify-between">
                <div class="pr-10 justify-between">                        
                    <p class="text-lg font-normal text-white mb-1">First name</p>
                    <input 
                        type="text" 
                        name="first name" 
                        placeholder="Enter first name" 
                        class="w-[22.5rem] bg-slate-800 py-4 px-5 border hover: border-white rounded-lg shadow text-base font-sans text-white"/>                            
                </div>
                <div class="pr-10">                        
                    <p class="text-lg font-normal text-white mb-1">Last name</p>
                    <input 
                        type="text" 
                        name="last name" 
                        placeholder="Enter last name" 
                        class="w-[22.5rem] bg-slate-800 py-4 px-5 border hover: border-white rounded-lg shadow text-base font-sans text-white"/>                            
                </div>
            </div>
            <div class="mt-3">
                <div class=" pr-10">                        
                    <p class="text-lg font-normal text-white mb-1">Enter email</p>
                    <input 
                        type="text" 
                        name="email" 
                        placeholder="Enter email 'example@gmail.com'" 
                        class="w-full bg-slate-800 py-4 px-5 border hover: border-white rounded-lg shadow text-base font-sans text-white"/>                            
                </div>
            </div>
            <div class="mt-3 flex justify-between">
                <div class="pr-10 justify-between">                        
                    <p class="text-lg font-normal text-white mb-1">Create a password</p>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Enter password" 
                        class="w-[22.5rem] bg-slate-800 py-4 px-5 border hover: border-white rounded-lg shadow text-base font-sans text-white"/>                            
                </div>
                <div class="pr-10">                        
                    <p class="text-lg font-normal text-white mb-1">Confirm password</p>
                    <input 
                        type="password" 
                        name="confirmation password" 
                        placeholder="Reconfirm password" 
                        class="w-[22.5rem] bg-slate-800 py-4 px-5 border hover: border-white rounded-lg shadow text-base font-sans text-white"/>                            
                </div>
            </div>
            <div class="mt-12">
                <div class="h-[3.8rem] w-[24rem] rounded-xl px-6 bg-slate-600 flex justify-center items-center mt-1 hover:bg-black duration-300">
                    <p class="text-xl text-white font-medium">Create account</p>
                </div>
            </div>
        </div>
        </section>

</html>