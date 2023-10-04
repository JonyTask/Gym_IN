
    var wdWidth  = $(window).width();
    var wdHeight = $(window).height();

    function RegHei(){
        $('.side-bar').css({height: wdHeight});
    }
    RegHei();

    function RegMain(){
        if(wdWidth >= 1280){
          $('.main-area').css({height: wdHeight - 220});
          $('.main-area').css({width: wdWidth - 300});
          $('.main-area').css({top:220});
          $('.main-area').css({left:300});
        }else if(wdWidth>=416 && 1280>wdWidth){
          $('.main-area').css({height: wdHeight - 180});
          $('.main-area').css({width: wdWidth - 250});
          $('.main-area').css({top:220});
          $('.main-area').css({left:250});
        }else if(416>wdWidth){
            $('.main-area').css({height: wdHeight - 110});
        }else{

        }
    }
    RegMain();

    function RegTitle(){
        if(wdWidth>415){
          var MainWid = wdWidth - 300;
          var HalfMain = MainWid / 2 - 200;
          $('.site-title').css({marginLeft: 300 + HalfMain});
        }else{
          $('.site-title').css({width:200});
        }
    }
    RegTitle();

    function motivation_up(){
      const motivationComments = [
        "人事を尽くして天命を待つ。",
        "努力する人は希望を語り、怠ける人は不満を語る。",
        "「最も難しいこと」は「自分を乗り越えること」。",
        "一度諦めると習慣になる。",
        "敵はいつだって自分。",
        "お前らは無理かもしれないけど、俺ならできる。",
        "本気でやれ、もっと欲張れ。",
        "できることは時間をかけることだけ。",
        "自分に明日があると思うな、今しかない。",
        "明日死ぬと思え。",
        "人間の素晴らしさは勇気の素晴らしさ。",
        "「マイナス」から「ゼロ」に向かっていく。",
        "何かを変える人間は大事なものを捨てる人間。",
        "黙ってやれ。",
        "やることやってる人間にだけ、根拠のない自信が身に付く。",
       ];
      var random = Math.floor(Math.random() * motivationComments.length);
      const commentArea = document.getElementById("motivation-comment");
      commentArea.textContent = motivationComments[random];
}

function ComeIn(){
    $('#motivation-wrapper').css({'display':'block'});
    $('#motivation-wrapper').addClass('vanishIn magictime');
}

function GoOut(){
    $('#motivation-wrapper').removeClass('vanishIn magictime');
    $('#motivation-wrapper').fadeOut(500);
}

function ComeIn_pro(){
    $('#proEdit').css({'display':'block'});
    $('#proEdit').addClass('vanishIn magictime');
}

function GoOut_pro(){
    $('#proEdit').removeClass('vanishIn magictime');
    $('#proEdit').fadeOut(500);
}

function EditPage_Come(){
    $('#EditPage').css({'display':'block'})
    $('#EditPage').FadeIn(500);
}

function GoOut_edit(){
    $('#EditPage').fadeOut(500);
}

function ComeIn_search(){
    $('#GymSearch').css({'display':'block'});
    $('#GymSearch').addClass('vanishIn magictime');
}

function GoOut_search(){
    $('#GymSearch').removeClass('vanishIn magictime');
    $('#GymSearch').fadeOut(500);
}

function SlideUpReturn(){
    $('#LogoutArea').css({'display':'block'});
    $('#LogoutArea').addClass('slideUpReturn magictime');
}

function RotateDown(){
    $('#LogoutArea').removeClass('slideUpReturn');
    $('#LogoutArea').addClass('rotateDown');
}

function ChatScroll(){
    var MainWidth = $('.main-area').innerWidth();
    var MainHeight = $('.main-area').innerHeight();
    var TypeHeight = $('#TypeArea').innerHeight();

    $('#ChatArea').css({'width':MainWidth-100});
    $('#ChatArea').css({'height':MainHeight-TypeHeight-60});

    for(let i=3; i<$('.CommentArea').length+3;i++){
      var CommentHeight = $('#'+i).find('.CommentMessage').innerHeight();
      $('#'+i).find('.right-box').css({marginTop:CommentHeight+15});
      
    }
}
ChatScroll();

function hamburgerClick(){
    $('.side-bar').css({top:0});
}

function hamburgerClose(){
    if(wdWidth<=415){
        $('.side-bar').css({top:"-100%"});
    }
}

function validation(){
    var prefectureText = document.getElementById("prefectureText").value;
    var cityText = document.getElementById("cityText").value;

    if(prefectureText == "" | cityText == ""){
        var errorArea = document.getElementById("errorArea");
        errorArea.textContent = "入力してください";
        $("#submit_search").css({'display':'none'});
    }else{
        errorArea.textContent = "";
        $("#submit_search").css({'display':'block'});
    }
}