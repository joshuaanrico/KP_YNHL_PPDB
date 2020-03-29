<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">

<title></title>

<style type="text/css">
input {
width:240px;
margin-top:10px;
}
</style>

<script type="text/javascript">
if(window.addEventListener){
 window.addEventListener('load',switchme,false);
 }
else { 
if(window.attachEvent){
 window.attachEvent('onload',switchme);
 }
 }

function switchme(){

df=document.forms[0];

df[0].onchange=function(){

switch(this.value) {
 case '1':
 df[1].value='Basic features:- frame- wheels glass';
 break;

 case '2':
 df[1].value='Basic features:- for asdf2';
 break;

 case '3':
 df[1].value='Basic features:- for asdf3';
 break;

 default:
 df[1].value='';
 break;
 }
 }
 }
</script>

</head>
<body>

<form action="#" method="get">
<div>
<select name="selection">
<option value="Choose One" selected="selected">Choose One</option>
<option value="1">asdf1</option>
<option value="2">asdf2</option>
<option value="3">asdf3</option>
</select>
</div><div>
<input name="TextField1" type="text">
</div>
</form> 

</body>
</html>