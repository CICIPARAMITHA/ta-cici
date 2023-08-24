<!doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    @include('admin.template.section.assets')
    <link href="{{url('public/assets')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{url('public/assets')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('public/assets')}}/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <div class="avatar-dropdown" id="icon">
                <span>Admin</span>
                <img src="{{url('public')}}/dist/images/Icon_header.png">
            </div>
            <!-- Account dropdawn-->
            <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                for="icon">
                <li class="mdl-list__item mdl-list__item--two-line">
                    <span class="mdl-list__item-primary-content">
                        <span class="material-icons mdl-list__item-avatar"></span>
                        <span>Admin</span>
                        <span class="mdl-list__item-sub-title">{{Auth::user()->username}}</span>
                    </span>
                </li>
                <li class="list__item--border-top"></li>
                
            </ul>


          
        </div>
    </header>

    <div class="mdl-layout__drawer">
        <header>SMART PLANT</header>
        <div class="scroll__wrapper" id="scroll__wrapper">
            <div class="scroller" id="scroller">
                <div class="scroll__container" id="scroll__container">
                    @include('admin.template.section.sidebar')
                </div>
            </div>
            <div class='scroller__bar' id="scroller__bar"></div>
        </div>
    </div>

    <main class="mdl-layout__content">

       @yield('content')
    </main>
</div>

<!-- inject:js -->
@include('admin.template.section.js')
<!-- endinject -->

</body>
</html>
