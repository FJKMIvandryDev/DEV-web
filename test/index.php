<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

</head>

<body>

	<table id="table" style="width:100%">

        <tr >
            <td>label 1</td>
        </tr>
        <tr>
            <td>label 2</td>
        </tr>
        <tr>
            <td>label 3</td>
        </tr>

    </table>

	<!--<button onClick="openWindow()">button</button>-->


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	<script>

		var win;

		window.callTest = function(value, varTest)
		{
			console.log(varTest);
			varTest.text(value);
		}

		function openWindow()
		{
			var win = window.open('child.html', "Ratting", "width=550,height=300,left=150,top=200,toolbar=1,status=1");

			win.varTest = document.getElementById("demo");
		}


		$("#table tr").click(function(){

			if (win != null)
			{
				win.close();
			}
			
		  	win = window.open('child.html', "Ratting", "width=550,height=300,left=150,top=200,toolbar=1,status=1");

			win.varTest = $(this);
		});

	</script>
</body>
</html>