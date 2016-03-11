var p = document.getElementById("p");
var h1 = document.getElementById("h1");
var h2 = document.getElementById("h2");
var h3 = document.getElementById("h3");
var h4 = document.getElementById("h4");
var div = document.getElementById("div");

var p_c = 0;
var h1_c = 0;
var h2_c = 0;
var h3_c = 0;
var h4_c = 0;
var div_c = 0;

var eleTable = [];
var eleTabRowNum = 0;

var eachElement = "";
var eachElementStyle = "style = '";

var elementID = 0;
var eleName = "";
var currElement = 0;

window.onload = init;

$(document).ready(function(){
	$("#p").click(function(){
			elementID = 1;
			createElement(elementID);
	});
});

$(document).ready(function(){
	$("#h1").click(function(){
			elementID = 2;
			createElement(elementID);
	});
});

$(document).ready(function(){
	$("#h2").click(function(){
			elementID = 3;
			createElement(elementID);
	});
});

$(document).ready(function(){
	$("#h3").click(function(){
			elementID = 4;
			createElement(elementID);
	});
});

$(document).ready(function(){
	$("#h4").click(function(){
			elementID = 5;
			createElement(elementID);
	});
});

$(document).ready(function(){
	$("#div").click(function(){
			elementID = 6;
			createElement(elementID);
	});
});

/*$(document).ready(function(){
	$("#body").click(function(){
		showPropEdit();
	});
});*/

$(document).ready(function(){
	$("#edit_button").click(function(){
		evalPropEdit();
	});
});

// init function

function init(){

console.log("Init");
	createElement(0);
}

// createElement function

function createElement(elementID){

console.log("Create Element");

	switch(elementID){
		case 0: eleName = "body";
				currElement = "body";
				break;
		case 1: ++p_c;
				eleName = "p_" + p_c;
				currElement = "p";
				break;
		case 2: ++h1_c;
				eleName = "h1_" + h1_c;
				currElement = "h1";
				break;
		case 3: ++h2_c;
				eleName = "h2_" + h2_c;
				currElement = "h2";
				break;
		case 4: ++h3_c;
				eleName = "h3_" + h3_c;
				currElement = "h3";
				break;
		case 5: ++h4_c;
				eleName = "h4_" + h4_c;
				currElement = "h4";
				break;
		case 6: ++div_c;
				eleName = "div_" + div_c;
				currElement = "div";
				break;
	};

if(eleName != "body")
	showPropEdit();
}

// showPropEdit function

function showPropEdit(){

console.log("showPropEdit");

$(document).ready(function(){
	$("#style_wrapper").show();
});
}

//closePropEdit function

function closePropEdit(){

console.log("closePropEdit");

$(document).ready(function(){
	$("#style_wrapper").hide();
});
}

//evalPropEdit function

function evalPropEdit(){

var eleToAdd = [];

console.log("evalPropEdit");

/*get all values*/

var inputs = document.getElementsByClassName("each_style_input");

for (var i = 0; i < inputs.length; i++) {
	if(!inputs[i].value){
		eleToAdd.push("UD"); // UD stands for undefined
	}else{
		eleToAdd.push(inputs[i].value);
	}
};

var text_v = eleToAdd[0];
var position_v = eleToAdd[1];
var top_v = eleToAdd[2];
var left_v = eleToAdd[3];
var width_v = eleToAdd[4];
var height_v = eleToAdd[5];
var title_v = eleToAdd[6];
var background_v = eleToAdd[7];
var color_v = eleToAdd[8];
var padding_v = eleToAdd[9];
var margin_v = eleToAdd[10];
var border_top_v = eleToAdd[11];
var border_right_v = eleToAdd[12];
var border_bottom_v = eleToAdd[13];
var border_left_v = eleToAdd[14];
var text_align_v = eleToAdd[15];
var font_family_v = eleToAdd[16];
var font_size_v = eleToAdd[17];
var font_weight_v = eleToAdd[18];
var cursor_v = eleToAdd[19];
var text_decoration_v = eleToAdd[20];

closePropEdit();
showOverlay(elementID);

// adding an element

eleTable.push([eleName,text_v,position_v,top_v,left_v,width_v,height_v,title_v,background_v,color_v,padding_v,margin_v,border_top_v,border_right_v,border_bottom_v,border_left_v,text_align_v,font_family_v,font_size_v,font_weight_v,cursor_v,text_decoration_v]);

/*for (var i = 0; i < 23; i++) {
	console.log(eleTable[eleTabRowNum][i]);
};*/

var hr = document.getElementById("hr");
var hr_text = hr.innerHTML;

/* Update hr section */

if(eleName != "body"){
	var hr_content = "<li class = 'hr_li' id = '" + eleName + "'>" + eleName + " <span title = 'Delete this element' onclick = 'removeElement(&quot;" + eleName + "&quot;);'>&times;</spam></li>";

	hr_text+=hr_content;

	hr.innerHTML = hr_text;
}

/* hr section update ends*/

++eleTabRowNum;

/* update design canvas */

if(position_v == "UD"){
	eachElementStyle += "position: absolute;";
}
else{
	eachElementStyle += "position: "+position_v;
}

if(top_v == "UD"){
	eachElementStyle += "top: 0;";
}
else{
	eachElementStyle += "top: "+top_v+";";
}

if(left_v == "UD"){
	eachElementStyle += "left: 0;";
}
else{
	eachElementStyle += "left: "+left_v+";";
}

if(width_v == "UD"){
	eachElementStyle += "width: 0;";
}
else{
	eachElementStyle += "width: "+width_v+";";
}

if(height_v == "UD"){
	eachElementStyle += "height: 0;";
}
else{
	eachElementStyle += "height: "+height_v+";";
}

if(title_v == "UD"){
	eachElementStyle += "";
}
else{
	eachElementStyle += "title: "+title_v+";";
}

if(background_v == "UD"){
	eachElementStyle += "background: #FFFFFF;";
}
else{
	eachElementStyle += "background: "+background_v+";";
}

if(color_v == "UD"){
	eachElementStyle += "color: #000000;";
}
else{
	eachElementStyle += "color: "+color_v+";";
}

if(padding_v == "UD"){
	eachElementStyle += "padding: 0;";
}
else{
	eachElementStyle += "padding: "+padding_v+";";
}

if(margin_v == "UD"){
	eachElementStyle += "margin: 0;";
}
else{
	eachElementStyle += "margin: "+margin_v+";";
}

if(border_top_v == "UD"){
	eachElementStyle += "border-top: 0;";
}
else{
	eachElementStyle += "border-top: "+border_top_v+";";
}

if(border_right_v == "UD"){
	eachElementStyle += "border-right: 0;";
}
else{
	eachElementStyle += "border-right: "+border_right_v+";";
}

if(border_bottom_v == "UD"){
	eachElementStyle += "border-bottom: 0;";
}
else{
	eachElementStyle += "border-bottom: "+border_bottom_v+";";
}

if(border_left_v == "UD"){
	eachElementStyle += "border-left: 0;";
}
else{
	eachElementStyle += "border-left: "+border_left_v+";";
}

if(text_align_v == "UD"){
	eachElementStyle += "text-align: left;";
}
else{
	eachElementStyle += "text-align: "+text_align_v+";";
}

if(font_family_v == "UD"){
	eachElementStyle += "font-family: Arial;";
}
else{
	eachElementStyle += "font-family: "+font_family_v+";";
}

if(font_size_v == "UD"){
	eachElementStyle += "font-size: 16px;";
}
else{
	eachElementStyle += "font-size: "+font_size_v+";";
}

if(font_weight_v == "UD"){
	eachElementStyle += "font-weight: normal;";
}
else{
	eachElementStyle += "font-weight: "+font_weight_v+";";
}

if(cursor_v == "UD"){
	eachElementStyle += "";
}
else{
	eachElementStyle += "cursor: "+cursor_v+";";
}

if(text_decoration_v == "UD"){
	eachElementStyle += "";
}
else{
	eachElementStyle += "text-decoration: "+text_decoration_v+";";
}

if(text_v == "UD"){
	text_v = "";
}

eachElementStyle+="'";

eachElement += "<" + currElement + " id = 'd_" + eleName + "'" + eachElementStyle + ">"+ text_v +"</" + currElement + ">";

//console.log(eachElement);

document.getElementById("des_canvas").innerHTML=eachElement;

eachElementStyle = "style = '";

/* update design canvas ends */

/* reset arrays */

for (var i = 0; i < inputs.length; i++) {
	inputs[i].value = "";
};

/* reset arrays ends */

closeOverlay();
}

//showOverlay function

function showOverlay(elementID){

console.log("showOverlay");

	switch(elementID){
		case 0: eleName = "body";
				break;
		case 1: eleName = "p_" + p_c;
				break;
		case 2: eleName = "h1_" + h1_c;
				break;
		case 3: eleName = "h2_" + h2_c;
				break;
		case 4: eleName = "h3_" + h3_c;
				break;
		case 5: eleName = "h4_" + h4_c;
				break;
		case 6: eleName = "div_" + div_c;
				break;
	};

	var o_content = document.getElementById("o_content");
	var overlay = document.getElementById("overlay");

	o_content.innerHTML = "Creating element: " + eleName + " <span style = 'position: absolute;right: 10px;cursor: pointer;'>&times</span>";
	$(document).ready(function(){
		$("#overlay").show();
	});
}

//closeOverlay function

function closeOverlay(){

console.log("closeOverlay");

	$(document).ready(function(){
		$("#overlay").hide();
	});
}

// removeElement function

function removeElement(eleName){

	console.log("removeElement");

	var hrele = document.getElementById(eleName);
	var dele = document.getElementById("d_"+eleName);
	var hr = document.getElementById("hr");
	var des_canvas = document.getElementById("des_canvas");

	hr.removeChild(hrele);
	des_canvas.removeChild(dele);
	console.log(des_canvas.innerHTML);
}

// save button operations

$(document).ready(function(){
	$("#save").click(function(){
		console.log("Saving...");
		$("#o_content").html("Saving...");
		$("#overlay").show();

		loadXMLDoc();
	});
});

function loadXMLDoc()
{
var content = "<!DOCTYPE html><html lang = 'en'><head><meta charset = 'utf-8'><title>Title goes here</title></head><body>" + document.getElementById("des_canvas").innerHTML + "</body></html>";
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   		document.getElementById("o_content").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","../Design/saveFile.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("content="+content);
}

function redir(){
   window.location = "profile.php";
}	