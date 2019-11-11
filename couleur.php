<!-- Ce code permet de changer de couleur à chaque clic sur une cellule du tableau -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <title>Changer la couleur de fond par JS</title>
    <style type="text/css">
	/*<![CDATA[*/
		table {border:none;}
        td {background-color:#fff;cursor:pointer;}
    /*]]>*/
    </style>
    <script type="text/javascript">
	//<![CDATA[
    function changeColor(elm){
        var el = elm.style;
        if(el.backgroundColor == '' || el.backgroundColor == '#ffffff')
        {
          el.backgroundColor = '#ff0000';
        }else{
          el.backgroundColor = '#ffffff';
        }
    }
    //]]>
    </script>
  </head>
  <body>
    <table border="1" cellpadding="30">
      <tr>
        <td onclick="changeColor(this)"></td>
        <td onclick="changeColor(this)"></td>
      </tr>
      <tr>
        <td onclick="changeColor(this)"></td>
        <td onclick="changeColor(this)"></td>
      </tr>
    </table>
  </body>
</html>