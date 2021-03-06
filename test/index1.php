<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Title of the document</title>
		<style type="text/css">
			#image {
			    width: 400px;
			    height: 300px;
			    overflow: hidden;
			    cursor: pointer;
			    background: #000;
			    color: #fff;
			}
			#image img {
			    visibility: hidden;
			}
		</style>
	</head>

	<body>
		<form action="#" method="POST">
			<h1>Birao</h1>
			<table>
				<tr>
					<td><label for="filoha">Filoha : </label></td>		
					<td><input type="text" id="filoha" name="filoha"></input></td>
				</tr>
				<tr>
					<td><label for="filoha_mlefitra">Filoha lefitra : </label></td>		
					<td><input type="text" id="filoha_mlefitra" name="filoha_mlefitra"></input></td>
				</tr>
				<tr>
					<td><label for="mpitan_tsoratra">Mpitan-tsoratra : </label></td>		
					<td><input type="text" id="mpitan_tsoratra" name="mpitan_tsoratra"></input></td>
				</tr>
				<tr>
					<td><label for="mpitahiry_vola">Mpitahiry vola : </label></td>		
					<td><input type="text" id="mpitahiry_vola" name="mpitahiry_vola"></input></td>
				</tr>
				<tr>
					<td><label for="mpitantsoratra_vola">Mpitan-tsoratry ny vola : </label></td>		
					<td><input type="text" id="mpitantsoratra_vola" name="mpitantsoratra_vola"></input></td>
				</tr>
				<tr>
					<td><label for="mpanolo_tsaina">Mpanolo-tsaina : </label></td>		
					<td><input type="text" id="mpanolo_tsaina" name="mpanolo_tsaina"></input></td>
				</tr>
			</table>

			<h1>Mombamomba ny sampana</h1>

			<table>
				<tr>
					<td><label for="anarana">Anarana : </label></td>		
					<td><input type="text" id="anarana" name="anarana"></input></td>
				</tr>

				<tr>
					<td colspan=2>
						<div id="image" onclick="openKCFinder(this)">
							<div style="margin:5px">Click here to choose an image</div>
						</div>
					</td>
				</tr>
				
				<td><input type="hidden" id="sary" value="" name="sary"></input></td>

				<tr>
					<td><label for="description">Description : </label></td>		
					<td><textarea id="description" name="description"></textarea></td>
				</tr>
				<tr>
					<td><label for="date">Daty niforonana : </label></td>		
					<td><input type="date" id="date" name="date"></input></td>
				</tr>
				<tr>
					<td><label for="isa">Isan'ny mpikambana : </label></td>		
					<td><input type="number" id="isa" name="isa"></input></td>
				</tr>
			</table>

			<input type="submit" value="Enregistrer"></input>

		</form>

		<script type="text/javascript" src="plugins\jQuery\jQuery-2.1.4.min.js"></script>
		<script type="text/javascript">
			function openKCFinder(elmt) {
				window.KCFinder = {
					callBack: function(url) {
					    window.KCFinder = null;
			            elmt.innerHTML = '<div style="margin:5px">Loading...</div>';
			            var texte = document.getElementById('sary');
			            texte.value = url;
			            var img = new Image();
			            img.src = url;
			            img.onload = function() {
			                elmt.innerHTML = '<img id="img" src="' + url + '" />';
			                var img = document.getElementById('img');
			                var o_w = img.offsetWidth;
			                var o_h = img.offsetHeight;
			                var f_w = elmt.offsetWidth;
			                var f_h = elmt.offsetHeight;
			                if ((o_w > f_w) || (o_h > f_h)) {
			                    if ((f_w / f_h) > (o_w / o_h))
			                        f_w = parseInt((o_w * f_h) / o_h);
			                    else if ((f_w / f_h) < (o_w / o_h))
			                        f_h = parseInt((o_h * f_w) / o_w);
			                    img.style.width = f_w + "px";
			                    img.style.height = f_h + "px";
			                } else {
			                    f_w = o_w;
			                    f_h = o_h;
			                }
			                img.style.marginLeft = parseInt((elmt.offsetWidth - f_w) / 2) + 'px';
			                img.style.marginTop = parseInt((elmt.offsetHeight - f_h) / 2) + 'px';
			                img.style.visibility = "visible";
	            			}
					    }
				};
				window.open('kcfinder/browse.php?type=files&dir=files/public', 'kcfinder_image',
				        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
				        'resizable=1, scrollbars=0, width=800, height=600'
				);
			}
				 

		</script>


	</body>

</html>