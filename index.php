<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<script type="text/javascript" src="js/jquery-1.4.4.js" ></script>
		<script type="text/javascript">
			function sendMsg(){
				var url = $("#url").val();
				var page = $("#page").val();


				for(var i=1;i<=page;i++){
					var new_url = url+"-"+i+"-1.html";
					//alert(new_url);
						$.ajax({
							type:"post",
							url:"./spider.php",
							data:"url="+new_url,
							dataType:"text",
							async:false,
							success:function(msg){
								$("#result").append(msg);
							}
						});
					

				}
				alert("获取完成");	
			}
			
			
			function dealMsg(){
				$("#result2").html($("#postlist").html());  
				$("#result3").append("<br />");
				$("#result3").append("标题：" + $("#thread_subject").html());
				$("#result3").append("<hr />")
				var floor = $("table[id*='pid']");
				//floor.$("#xw1")
				var floor_len = (floor.length > 10)?(floor.length - 10):(floor.length / 2);
				var louceng = 1;
				for (var i = 0; i < floor_len; i++) {
					$("#result3").append("<label><input type='checkbox' name='check' value="+ louceng +">");
					louceng++;
					$("#result3").append("楼层：" + $("[id^='postnum']")[i].innerHTML);
					$("#result3").append("<br />");
					$("#result3").append("用户名：" + $("table[id*='pid'] a.xw1")[i].innerHTML);
					$("#result3").append("<br />");
					$("#result3").append("内容：" + $("td[id^='postmessage_']")[i].innerHTML);
					$("#result3").append("<hr />");

					$("#result3").append("</label>");

					//console.log("用户名：" + $("table[id*='pid'] a.xw1")[i].innerHTML);
					//console.log("内容：" + $("td[id^='postmessage_']")[i].innerHTML);
					//console.log("1111111111111111111111111111111111111111111111111111111111111111111111111");
				}

			}

			function makeMsg(){
				console.log($(":checked"));
			}
		</script>
	</head>
	<body>
		<label for="url">网址:</label><input type="text" name="url" id="url" />
		<select name="page" id="page">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<input type="button" onclick="sendMsg()" value="获取"/>
		<input type="button"  onclick="dealMsg()" value="生成"/>
		<input type="button"  onclick="makeMsg()" value="制作"/>
		<div id="result" style="display: none;"></div>
		<div id="result2" style="display: none;"></div>
		<div id="result3" style="width: 50%;display: inline;"></div>
	</body>
</html>
