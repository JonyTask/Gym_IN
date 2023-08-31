<html>
    <head>
      <title>プロフィール検索</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        body{
          margin:0;
          background:#111117;
          text-align:center;
        }
        a{
          text-decoration:none;
          color:#fff;
        }
        a:hover{
          border-bottom:solid 1px #fff;
        }
        .profile-section{
          width:900px;
          margin:100px auto 0 auto;
          display:flex;
          flex-wrap: wrap;
          margin-bottom:50px;
          background:linear-gradient(45deg, #B67B03 0%, #DAAF08 45%, #FEE9A0 70%, #DAAF08 85%, #B67B03 90% 100%);
          color:#111117;
          font-size:1.2rem;
          font-weight:bold;
          border-radius:40px;
        }
        .problock{
          width:50%;
          margin:0 auto;
          padding:10px 60px;
          display:flex;
          border-right:solid 5px #111117;
          border-left:solid 5px #111117;
        }

        .proItem{
          width:30%;
        }
        .proContent{
          width:70%;
        }
        @media screen and (max-width:415px){
          .profile-section{
            margin-top:150px;
            font-size:1.0rem;
            width:350px;
            padding: 30px 0;
          }
          .problock{
            border:none;
            width:100%;
            padding:10px 20px;
          }
          .proItem{
            border-right:solid 3px #111117 ;
          }
        }
      </style>
      
    </head>
    
    <body>
      <div class="profile-section">

      <div class="problock">
        <p class="proItem">名前</p>
       <p class="proContent">{{$item->name}}</p>
      </div>

      <div class="problock">
        <p class="proItem">年齢</p>
        <p class="proContent">{{$item->age}}</p>
      </div>

      <div class="problock">
        <p class="proItem">性別</p>
        <p class="proContent">{{$item->gender}}</p>
      </div>

      <div class="problock">
        <p class="proItem">プロテイン</p>
        <p class="proContent">{{$item->protein}}</p>
      </div>

      <div class="problock">
        <p class="proItem">好きな部位</p>
        <p class="proContent">{{$item->mustle}}</p>
      </div>


      <div class="problock">
        <p class="proItem">自己紹介</p>
        <p class="proContent">{{$item->PR}}</p>
      </div>

    </div>
      <a href="/base">トップページに戻る⇒</a>

    </body>
    
</html>