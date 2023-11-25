<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
</head>

<body>
<h2 align=center>動態下拉式選單：增加選項與刪除選項</h2>
<hr>

<script>
function deleteOption(list){
	var index=list.selectedIndex;
	if (index>=0)
		list.options[index]=null;
	else
		alert("無反白選項！");
}

function addOption(list, text, value){
	var index=list.options.length;
	list.options[index]=new Option(text, value);
	list.selectedIndex=index;
}
</script>

<form>
<select id=theList size=5>
	<option value=星期一>Monday
	<option value=星期三>Wednesday
	<option value=星期五>Friday
	<option value=星期日>Sunday
</select>
<p>
<input type="button" value="刪除反白選項" onclick="deleteOption(theList)"><br>
<input type="button" value="增加右列選項" onclick="addOption(theList, theText.value, theValue.value)">
Text: <input id=theText value="test">
Value: <input id=theValue value="test">
</form>

<hr>
</body>
</html>