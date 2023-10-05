<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('startbootstrap/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="sb-nav-fixed">

<div id="app">
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Работа с записной книжкой</div>

                    <router-link  class="nav-link "  :to="{name: 'notebook.index'}">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Записи
                    </router-link>
                    <router-link class="nav-link " :to="{name: 'notebook.create'}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Создать запись
                    </router-link>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>


            <div class="px-4">
                <index></index>
            </div>


        </main>
        <footer class="py-4 bg-light mt-auto">

        </footer>
    </div>
</div>
</div>
<script src="startbootstrap/https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('startbootstrap/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('startbootstrap/assets/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('startbootstrap/assets/demo/chart-bar-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="{{asset('startbootstrap/js/datatables-simple-demo.js')}}"></script>
</body>
</html>
