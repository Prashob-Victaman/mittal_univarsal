var checkflag = "false";
function check(field) 
{
	if (checkflag == "false") 
	{
		for (i = 0; i < field.length; i++) 
		{
			field[i].checked = true;
		}
		checkflag = "true";
		return "Uncheck All"; 
	}
	else 
	{
		for (i = 0; i < field.length; i++) 
		{
			field[i].checked = false; 
		}
		checkflag = "false";
		return "Check All"; 
	}
}