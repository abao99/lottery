<!DOCTYPE html>
<html>
<head>
	<title>足球天天竞猜 - 参加足球竞猜游戏赢好礼 | 酷发巴巴彩票网</title>
  <link rel="stylesheet" type="text/css" href="./mycss.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body onload ="qry();"><!-- qry():第一次執行，搜尋今天資料 -->
  <div class="contentWrap">

    <form id="search"><!-- 搜尋表單 -->
      日期(起):
        <input type="date" name="dateStart">&nbsp;&nbsp;~
      日期(迄):
        <input type="date" name="dateEnd"><br>
      賽事:
        <select name="race">
          <option value="">---請選擇---</option>
          <option value="阿根廷杯">阿根廷杯</option>
          <option value="国际赛">国际赛</option>
          <option value="世界杯预">世界杯预</option>
          <option value="巴西甲">巴西甲</option>
          <option value="世青赛">世青赛</option>
          <option value="J2联赛">J2联赛</option>
          <option value="美职">美职</option>
        </select>&nbsp;&nbsp;
      主隊:
        <input type="text" name="host">&nbsp;&nbsp;
      客隊:
        <input type="text" name="visite">&nbsp;&nbsp;
      <input type="hidden" name="hide" value="qry">   <!-- 判斷有沒有搜尋條件 -->
      <input type="button"  value="查詢"  onclick="Submit();">&nbsp;    <!-- Submit():搜尋條件抓資料 -->
      <button type="button" onclick="alz();">分析</button>  <!-- alz():分析資料 -->
      
    </form>

    <table class="gameTable">
      <thead>
        <tr>
          <th width="100" class="bl3">赛事</th>
          <th width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主队&nbsp;&nbsp;&nbsp;vs&nbsp;&nbsp;&nbsp;客队&nbsp;&nbsp;</th>
          <th width="80">截止</th>
          <th>让球</th>
          <th width="300">主胜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平局&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客胜</th>
          <th width="150" class="br3">竞猜人数</th>
        </tr>
     </thead>
      <tbody id = "msg">
        
      </tbody>
    </table>
  </div>
</body>
</html>
<script>
  //切換顯示隱藏
  function clickMore(id){
    $(".more"+id).toggle( );
    $("#arrow"+id).toggleClass( "arrow1" ); 
  }

  //分析資料
  function alz(){
    $.ajax({
      type:"POST",
      url:"./alz.php",
      dataType:"json",
      success:showval,
      error:function(data){
        alert("error");
      },
    });
  }

  //第一次執行，搜尋當天資料
  function qry(){
    $.ajax({
      type:"POST",
      url:"./qry.php",
      dataType:"json",
      success:showval,
      error:function(data){
        alert("error");
      },
    });
  }

  //送出搜尋條件抓資料
  function Submit(){
    $.ajax({
      type:"POST",
      url:"./qry.php",
      data: $('#search').serialize(),  //id = search : 搜尋表單，送出搜尋條件
      dataType:"json",
      success:showval,
      error:function(data){
        alert("error");
      },
    });
  }

  //顯示資料
  function showval(data){
    
    var more = 0;
    var nowPrintDate = "";
    var info = "";
    
    for(i=0;i<data.length;i++){
  
      if(nowPrintDate == "" || nowPrintDate != data[i]["date"]){
        more++;
        info += '<tr class="more expanded" id="more'+ more +'" style="border-top: 0;" onclick="clickMore('+ more +')">'+
                  '<td colspan="6" class = "pointer">'+
                    '<span id="arrow'+ more +'" class="arrow">'+
                   ' </span>'+
                       data[i]["date"] +'每次竞猜选择一个选项下注'+
                    '</td>'+
                  '</tr>';
        nowPrintDate = data[i]["date"];  
      }
      
      info += ' <tr class="moreContent more'+ more +'" style="display: table-row">'+
                  '<td><span class="leagueName" style="background-color:#336699 '+
                  '; color: #ffffff">'+ data[i]["race"] +'</span></td>'+
                 ' <td class="name"><span class="ht">'+ data[i]["host"] +' </span>'+
                                   '<span class="vs">vs</span>'+
                                   '<span class="at">'+ data[i]["visite"] +'</span>'+
                 '</td>'+
                  '<td ><span class="time">'+data[i]["time"] +'</span></td>'+
                  '<td>'+
                                    
                    '<span class="rq1">0</span>'+
                                    
                    '<span class="rq2" style="color:'; 
      
      if(data[i]["concede"] > 0){     //判斷讓分正負顏色
        info += ' green ';
      }              
      else{
        info += ' #ed3a37 ';
      }
      
      info += '">'+ data[i]["concede"] +'</span>'+               
                  '</td>'+
                  '<td class="odds" width="300">';
      
      if(data[i]["victory"] != " "){
        
        info +='<span>胜 '+ data[i]["victory"] +'</span>'+
                  '<span>平 '+data[i]["draw"] +'</span>'+
                  '<span>负 '+ data[i]["defeat"] +'</span>';
      }
                            
      info +='<span>胜 '+ data[i]["victory1"] +'</span>'+
                '<span>平 '+ data[i]["draw1"] +' </span>'+
                '<span>负 '+ data[i]["defeat1"] +'</span>'+                  
               '</td>'+
               '<td class="num">'+ data[i]["num"] +'人竞猜</td>'+
              '</tr>';    
    } 
    document.getElementById("msg").innerHTML = info;
  }

//document.getElementById("msg").innerHTML = data[0]["race"];
</script>