<html>
    <head>
        <title>Search_Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
          body{
               background:#111117;
               box-sizing:border-box;
               text-align:center;
               color:#fff;
              }
          #searchResult{
               position:absolute;
               top:10%;
               left:20%;
               padding:50px 60px;
               width:60%;
              }
            #searchResult table{
              width:100%;
            }
            #searchResult tr{
               width:100%;
               text-align:left;
              }
            #searchResult td{
              font-size:1.5rem;
              border-bottom:solid 1px #fff;
              padding:30px 40px;
              }
            a{
              text-decoration:none;
              color:#fff;
            }
            @media screen and (max-width:1280px){
              #searchResult td{
                font-size:1.2rem;
                padding:20px 30px;
              }
              h1{
                font-size:1.5rem;
              }
            }
            @media screen and (max-width:415px){
              #searchResult{
                width:95%;
                padding:0;
                position:unset;
                margin:50px auto 0 auto;
              }
              #searchResult table{
                margin-bottom:30px;
              }
              #searchResult p{
                margin-bottom:50px;
              }
            }

        </style>
    </head>

    <body>
      <h1>検索結果</h1>
      <div id="searchResult">
        <table>
          @if($items != null)
            @foreach($items as $item)
              <tr><td>{{$item->name}}</td></tr>
            @endforeach
          @endif
        </table>
        
        <form action="/base">
          @csrf
          <select name="Chat_Gym">
            @if($items != null)
              @foreach($items as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
              @endforeach
            @endif
          </select>
          <input type="submit" value="選択">
        </form>

        <p>通っているジムを選択してください！<br>
           そのジムの掲示板を見ることができます！</p>
        <a href="/base">トップページに戻る⇒</a>
      </div>

    </body>
</html>