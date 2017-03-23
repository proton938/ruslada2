

<select id = "name_company">
	<option selected = "selected" >список производителей</option>
	<option>t543262346</option>
	<option>tre3w546</option>
	<option>tujytru76546</option>
</select>

<input type="button" onclick="f()" value="ok">


<input id = "copy_name_company" name = "copy_name_company" type = "text" value = "" style = "position: relative; z-index: 6;">


<script>
function f()
	{		
		var copy_name_company = document.getElementById('name_company').value;
		document.getElementById('copy_name_company').value = copy_name_company;
	}
</script>