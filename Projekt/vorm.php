<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Autode lisamine</title>
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
    var kytus = document.forms["vorm"]["kytus"].value;
    var sparksOn = document.forms["vorm"]["sparks"].value;
    if (sparksOn == "" && kytus == "bensiin") {
        alert("Järgmine süüteküünalde vahetus peab olema täidetud");
        return false;
    }
    var pfilter = document.forms["vorm"]["tfhooldus"].value;
    var filterOn = document.forms["vorm"]["tahmafilter"].value;
    if (pfilter == "" && filterOn == "jah" && kytus == "diisel") {
        alert("Järgmine tahmafiltri hooldus peab olema täidetud");
        return false;
    }
}
</script>
</head>
<body>
    <p><a href="vaata.php">Vaata autosid</a></p>
    <form name="vorm" action="lisa.php" method="POST" enctype="multipart/form-data" onsubmit="return valideeri()">
	   <ul>
        <li>Mark<br/><input type="text" name="mark" placeholder="mark" required/></li>
	    <li>Reg nr<br/><input type="text" name="regnr" placeholder="regnr" title="Auto reg nr kujul 123ABC" pattern="[0-9][0-9][0-9][A-Z][A-Z][A-Z]" required/></li>
	    <li>kW arv<br/><input type="number" name="kw" placeholder="kW arv" required/></li>
        <li>Odomeetri hetknäit<br/><input type="number" name="odo" placeholder="odom näit" required/></li>
   
        <li>Järgmine ülevaatus<br/><input type="month" name="yv" required/></li>
        <li>Järgmine õlivahetus(odom näit)<br/><input type="number" name="oil" required/></li>
           
        <li>Kütus:</li> 
        <li>bensiin<input type="radio" name="kytus" value="bensiin" required>
        <ul>
           <li>Järgmine süüteküünalde vahetus (odom näit) <input type="number" name="sparks"/>
            </li>
            </ul>
           </li>
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