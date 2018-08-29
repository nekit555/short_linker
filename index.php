<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Сокращатель ссылок</title>
	<link rel="stylesheet" href="app/css/style.css">
</head>
<body>
	<div class="main">

		<h1>Сокращатель ссылок</h1>

		<form action="shorter.php" method="post">

			<input class="input-link" type="text" name="url" placeholder="Введите текст ссылки">

			<span class="error"></span>

			<input type="submit" name="sumbit" value="Сократить">

			<div class="result">
				<div class="result-caption">
					Сокращенная ссылка:
				</div>

				<div class="result-link"></div>
				
			</div>

		</form>
		
	</div>
</body>
<script src="app/js/jquery-3.3.1.min.js"></script>
<script src="app/js/common.js"></script>
</html>