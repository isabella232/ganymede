var ajaxObject = AjaxObject();

function AjaxObject () {
	if (window.XMLHttpRequest)
		return new XMLHttpRequest();
	else if (window.ActiveXObject)
		return new ActiveXObject('Microsoft.XMLHTTP');
	else 
		alert ("Error Creating AjaxObject");
		return false;		
}


function updateTable(e)
{
	var url = "fetch/" + e + ".php";
	var exdate = new Date();
	exdate.setDate(exdate.getDate()+7);
	document.cookie = "activeTabGanymede=" + escape(e) + ((7==null) ? "" : ";expires="+exdate.toGMTString());
	ajaxObject.open("GET", url, true);
	ajaxObject.onreadystatechange = updatePage;
	ajaxObject.send(null);
	
}

function SetActive(e,f)
{
	var x = document.getElementById(e);
	var y = document.getElementById(f);
	
	x.className = ("active");
	y.className = ("");
	
}

function updatePage()
{
	var v = document.getElementById('tabData');
    if (ajaxObject.readyState == 4){
    	response = ajaxObject.responseText;
		v.innerHTML = response;    	
    }
}