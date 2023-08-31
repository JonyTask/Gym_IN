function generate_year_range(start, end) {
    var years = "";

    //選択した年を一覧で選択できるようにする
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
  }
  
  //Dateオブジェクトを取得
  var today = new Date();

  //日付の月、日付の年を取得し、セレクトタグで指定した月、年も取得　getMonthはインデックス番号が注意
  var currentMonth = today.getMonth(); 
  var currentYear = today.getFullYear();  

  

  
  //1970年から2200年までを取得
  var createYear = generate_year_range(1970, 2200);
  
  //#yearに上で取得した1970-2200の<option>を入れる
  document.getElementById("year").innerHTML = createYear;

  //#calendarの要素を取得、data-lang属性値を取得
  var calendar = document.getElementById("calendar");
  var lang = calendar.getAttribute('data-lang');

  var months = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];
  var days = ["日", "月", "火", "水", "木", "金", "土"];

  //テーブルの行のタグを代入、曜日ごとで繰り返し処理、繰り返し処理後で行の閉じタグ
  var dayHeader = "<tr>";
  for (day in days) {
  dayHeader += "<th data-days='" + days[day] + "'>" + days[day] + "</th>";
  }
  dayHeader += "</tr>";

  //テーブルのhead部分に、上で繰り返し処理した曜日を代入する
  document.getElementById("thead-month").innerHTML = dayHeader;


  //showCalendar
  function showCalendar(month, year) {

    //Dateオブジェクトを生成し、曜日を0から6で取得
    var firstDay = ( new Date( year, month ) ).getDay();

    $("#year option").attr("selected", false);
    $("#month option").attr("selected", false);
    
    //42行目で取得した年月に、月の配列に年を足す
    const monthAndYear = document.getElementById("monthAndYear");
    monthAndYear.innerHTML = months[month] + " " + year;


    const selectYear = document.getElementById("year");
    const selectMonth = document.getElementById("month");
    selectYear.options[year - 1970].setAttribute("selected", "selected");
    selectMonth.options[month].setAttribute("selected", "selected");
    selectYear.value = year;
    selectMonth.value = month;

    console.log(currentMonth);
    console.log(selectMonth.value);
    console.log(currentYear);
    console.log(selectYear.value);

    //テーブルのbody部分を取得
    tbl = document.getElementById("calendar-body");
  
    //これに空のHTMLを代入
    tbl.innerHTML = "";
    

    // テーブルの全てのセルを作る
  var date = 1;
  for ( var i = 0; i < 6; i++ ) {
      //繰り返し処理で「行をつくる」
      var row = document.createElement("tr");

      //繰り返し処理で1週間分の日をつくる
      for ( var j = 0; j < 7; j++ ) {
          //行の繰り返し処理が1周目で、尚且つ、次の最初の日よりも前だったら、そのセルを空にする
          if ( i === 0 && j < firstDay ) {
              //セルを作成、セルにテキストを入れ、行にセルを入れる
              cell = document.createElement( "td" );
              cellText = document.createTextNode("");
              cell.appendChild(cellText);
              row.appendChild(cell);
          } else if (date > daysInMonth(month, year)) {
              //その月の日数よりも86行目で決めた1が大きかったら終了？
              break;
          } else {
              //セルを作成、それぞれの属性値を設定
              cell = document.createElement("td");
              cell.setAttribute("data-date", date);
              cell.setAttribute("data-month", month + 1);
              cell.setAttribute("data-year", year);
              cell.setAttribute("data-month_name", months[month]);
              cell.className = "date-picker";
              cell.innerHTML = "<span>" + date + "</span>";

              //もし、本日の年月日が一緒ならば、クラスを付与する
              if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                cell.className = "date-picker selected";
            }
            //行にセルを入れていき、1つずつ足していく
            row.appendChild(cell);
            date++;

        }
    }


    tbl.appendChild(row);
  }

}


  showCalendar(currentMonth, currentYear);

  
  function next() {
    //現在の月から次の月へ進むとき、年の更新、月の更新をする
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
  }
  
  function previous() {
    //現在の月から前の月へ戻るとき、年の更新、月の更新をする
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
  }

  function jump() {
    //タグにある数字を、整数型に変換、代入
    const jump_year = document.getElementById("year").value;
    const jump_month = document.getElementById("month").value;
    currentYear = parseInt(jump_year);
    currentMonth = parseInt(jump_month);
    showCalendar(currentMonth, currentYear);
  }

  

function daysInMonth(iMonth, iYear) {
  return 32 - new Date(iYear, iMonth, 32).getDate();
}
    

function select_Date(){
  var monthBox = document.getElementById("month-selection");
  document.getElementById("date-selection").innerHTML = '';

  
    const selectDom = document.getElementById("month-selection").value;
    var days ='';
  if( selectDom == 4 || selectDom == 6 || selectDom == 9 || selectDom == 11){
    for(var day = 1; day <= 30; day++){
      days += "<option value='" + day + "'>" + day + "</option>";
    }
    document.getElementById("date-selection").innerHTML = days;
  }if(selectDom == 2){
    for(var day = 1; day <= 29; day++){
      days += "<option value='" + day + "'>" + day + "</option>";
    }
    document.getElementById("date-selection").innerHTML = days;
  }
  if(selectDom == 1 || selectDom == 3 || selectDom == 5 || selectDom == 7 || selectDom== 8 || selectDom == 10 || selectDom == 12){
    
    for(var day = 1; day <= 31; day++){
      days += "<option value='" + day + "'>" + day + "</option>";
    }
    document.getElementById("date-selection").innerHTML = days;
  }   
   
}


function jump2(){
  const selected_month = document.getElementById("month-selection").value;
  currentMonth = parseInt(selected_month);
  showCalendar(currentMonth, 2023);
}

function addClick(){
  const selected_date = document.getElementById("date-selection").value; 
  const calendar_cells = document.getElementsByClassName('date-picker');
  
  const Gym_day =  calendar_cells[selected_date - 1];
  Gym_day.classList.add('WorkOut');
  
}

function deleteClick(){
  const selected_date = document.getElementById("date-selection").value; 
  const calendar_cells = document.getElementsByClassName("date-picker");
  
  const Gym_day =  calendar_cells[selected_date - 1];
  Gym_day.classList.remove('WorkOut');
}

function FadeIn(){
  $(".modal").css({display:"unset", opacity: "1"});
}

function FadeOut(){
  $(".modal").css({display:"none", opacity:"0"});
  
  let object_date = document.getElementById("date-selection");
  let object_month = document.getElementById("month-selection");

  object_date.selectedIndex = -1;
  object_month.selectedIndex = -1;
  
}

