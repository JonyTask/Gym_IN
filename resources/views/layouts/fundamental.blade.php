<html>

    <head>
        <title>Gym_IN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_pub/Gym_IN.css">
        <link rel="stylesheet" href="css_pub/Gym_IN_responsive.css">
        <link rel="stylesheet" href="css_pub/Gym_IN_Training_Record.css">
        <link rel="stylesheet" href="css_pub/magic.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    </head>

    <body>
       @section('headerLogo')
       <img src="img/Gym_IN_logo_edit.png" alt="ロゴ" class="site-title">
       @show

    
      <label for="menu_checkbox" id="menu_label" onclick="hamburgerClick()">
        <span class="menu_btn">
        <span></span>
        <span></span>
        <span></span>
        </span>
      </label>

    <div id="Vue_1">

       @section('sidebar')
         <div class="side-bar">
           <div class="side-content LogIn">{{$UserName}}<br>ログイン中</div>
           <span id="close" onclick="hamburgerClose()">×</span>
           <div class="side-content" @click="select('1')" v-bind:class="{'active': show == '1'}" onclick="hamburgerClose()">マイページ</div>
           <div class="side-content" @click="select('2')" v-bind:class="{'active': show == '2'}" onclick="hamburgerClose()">グループチャット</div>
           <div class="side-content" @click="select('3')" v-bind:class="{'active': show == '3'}" onclick="hamburgerClose()">トレーニング記録</div>
           <div class="side-content" @click="select('4')" v-bind:class="{'active': show == '4'}" onclick="hamburgerClose()">ユーザー情報閲覧</div>
           <div class="side-content" onclick="SlideUpReturn()">ログアウト</div>
           <div class="side-content" id="LogoutArea">
             <span onclick="RotateDown()">×</span>
             <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウトする</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
             </form>
           </div>
         </div>
       @show

       <div class="main-area">
        @yield('mainArea')
       </div>

    </div>

    <script src="js_pub/Gym_IN.js"></script>
    <script src="js_pub/Vue.js"></script>
    </body>

</html>
