<head>
<style>
    li ul {display:none;}
    li input:checked + ul {display:block;}
    body {background-color: linen;}
</style>
</head>
<div align="center">
<form action="?page=lisa" method="POST" enctype="multipart/form-data">
	<ul>
    <li><input type="text" name="mark" placeholder="mark" value="<?php if (isset($auto['mark'])) echo htmlspecialchars($auto['mark']); ?>"/></li>
	<li><input type="text" name="regnr" placeholder="regnr" value="<?php if (isset($auto['regnr'])) echo htmlspecialchars($auto['regnr']); ?>"/></li>
	<li><input type="number" name="kw" placeholder="kW arv" value="<?php if (isset($auto['kw'])) echo htmlspecialchars($auto['kw']); ?>"/></li>
    <li><input type="number" name="odo" placeholder="odom näit" value="<?php if (isset($auto['odo'])) echo htmlspecialchars($auto['odo']); ?>"/></li>
   
        <li>Järgmine ülevaatus<input type="month" name="yv" value="<?php if (isset($auto['yv'])) echo htmlspecialchars($auto['yv']); ?>"/></li>
        
        Kütus: 
        <li>bensiin<input type="radio" name="kytus" value="bensiin"></li>
        <li>diisel<input type="radio" name="kytus" value="diisel">
        <ul>
        <li>Tahmafilter: <input type="checkbox" name="tahmafilter" value="jah">
        <ul>
        <li>Järgmine tahmafiltri hooldus (odom näit): <input type="number" name="tfhooldus"></li>
        </ul>
        </li>
        </ul>
        </li>
        </ul>
	<input type="submit" value="Lisa"/>
</form>
</div>
<?php if (isset($errors)):?>
		<?php foreach($errors as $error):?>
			<div style="color:red;"><?php echo htmlspecialchars($error); ?></div>
		<?php endforeach;?>
	<?php endif;?>