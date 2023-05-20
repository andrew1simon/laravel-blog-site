<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="/croppr/dist/croppr.css" rel="stylesheet"/>
    <script src="/croppr/dist/croppr.js"></script>
    <link href="/website/styles.css" rel="stylesheet">
    <title>All posts</title>
</head>
<body class="h-100 d-flex flex-column">
    <header class="p-3 bg-light text-dark header-upper">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/all-posts" class="d-flex align-items-center mb-2 mb-lg-0 me-auto ">
                <img src="{{asset('/img/logo.png')}}" class="header-logo">
            </a>

            <div class="text-end position-relative dropdown-upper-cont">
              @if (auth()->check())
              <div x-data="{ open: false }">
                <h6 @click="open = !open" class="fs-5" style="cursor: pointer;">Hello, {{auth()->user()->name}} <i class="fa-solid fa-caret-down"></i></h6>
                  <div x-show="open" @click.outside="open = false" x-cloak x-transition class="dropdown-content position-absolute w-100 mb-3">
                    <ul class="bg-light px-3 py-2 w-100" style="border: solid #eee 3px;">
                      <li class="user-menu-drop-text"><a href="/user/posts"><i class="fa-solid fa-file-lines"></i> Manage your posts</a></li>
                      <form action="/user/logout" method="Post">
                        @csrf
                        <li class="user-menu-drop-text"><button type="submit" class="user-menu-drop-text"><i class="fa-solid fa-door-closed"></i>Logout</button></li> 
                      </form>
                      
                    </ul>
                  </div>
                </div> 

              </div>
                 
              @else
              <a href="/user/login"><button type="button" class="btn btn-outline-dark me-2 btn-md"><i class="fa-solid fa-right-to-bracket"></i> Login</button></a>
              <a href="/user/new"><button type="button" class="btn btn-warning btn-md"><i class="fa-solid fa-user-plus"></i> Sign-up</button></a>
              @endif
            </div>
          </div>
        </div>
      </header>

      <main class="mb-5">
        {{$slot}}

      </main>

      <footer class="footer mt-auto py-3 bg-dark">
        <div class="container d-flex">
            <img src="/website/img/logo.png" class="header-logo me-auto">
            <span class="p-2 d-flex justify-content-center align-content-center flex-wrap"><h6 class="text-center text-light" style="height: fit-content;">All rights reserved | Designed by Andrew Simon 2023</h6></span>
        </div>
      </footer>