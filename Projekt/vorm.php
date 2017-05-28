<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<style>
    li ul {display:none;}
    li input:checked + ul {display:block;}
    body {background-color: linen;}
</style>
<script>
function valideeri() {
    var x = document.forms["vorm"]["mark"].value;
    if (x == "") {
        alert("Mark peab olema täidetud");
        return false;
    }
    var z = document.forms["vorm"]["regnr"].value;
    if (z == "") {
        alert("Reg nr peab olema täidetud");
        return false;
    }
    var y = document.forms["vorm"]["kw"].value;
    if (y == "") {
        alert("kW arv peab olema täidetud");
        return false;
    }
    var t = document.forms["vorm"]["odo"].value;
    if (t == "") {
        alert("Odomeetri näit peab olema täidetud");
        return false;
    }
    var oil = document.forms["vorm"]["oil"].value;
    if (oil == "") {
        alert("Järgmine õlivahetus peab olema täidetud");
        return false;
    }
    var pfilter = document.forms["vorm"]["tfhooldus"].value;
    var filterOn = document.forms["vorm"]["tahmafilter"].value;
    if (pfilter == "" && filterOn == "jah") {
        alert("Järgmine tahmafiltri hooldus peab olema täidetud");
        return false;
    }
}
</script>
</head>
<body>
    <form name="vorm" action="lisa.php" method="POST" enctype="multipart/form-data" onsubmit="return valideeri()">
	   <ul>
        <li><input type="text" name="mark" placeholder="mark" value="<?php if (isset($auto['mark'])) echo htmlspecialchars($auto['mark']); ?>"/></li>
	    <li><input type="text" name="regnr" placeholder="regnr" title="Auto reg nr kujul 123ABC" pattern="[0-9][0-9][0-9][A-Z][A-Z][A-Z]" value="<?php if (isset($auto['regnr']))  echo htmlspecialchars($auto['regnr']); ?>"/></li>
	    <li><input type="number" name="kw" placeholder="kW arv" value="<?php if (isset($auto['kw'])) echo htmlspecialchars($auto['kw']); ?>"/></li>
        <li><input type="number" name="odo" placeholder="odom näit" value="<?php if (isset($auto['odo'])) echo htmlspecialchars($auto['odo']); ?>"/></li>
   
        <li>Järgmine ülevaatus<input type="month" name="yv" value="<?php if (isset($auto['yv'])) echo htmlspecialchars($auto['yv']); ?>"/></li>
        <li>Järgmine õlivahetus (odom näit)<input type="number" name="oil" value="<?php if (isset($auto['oil'])) echo htmlspecialchars($auto['oil']); ?>"/></li>
           
        <li>Kütus:</li> 
        <li>bensiin<input type="radio" name="kytus" value="bensiin"></li>
        <li>diisel<input type="radio" name="kytus" value="diisel">
        <ul>
        <li>Tahmafilter: JAH <input type="radio" name="tahmafilter" value="jah">
        <ul>
        <li>Järgmine tahmafiltri hooldus (odom näit): <input type="number" name="tfhooldus"></li>
        </ul>
         EI <input type="radio" name="tahmafilter" value="ei">
        </li>
        </ul>
        </li>
        
        
        </ul>
	<input type="submit" value="Lisa"/>
</form>
</body>
</html>
<?php if (isset($errors)):?>
		<?php foreach($errors as $error):?>
			<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
		<?php endforeach;?>
	<?php endif;?>