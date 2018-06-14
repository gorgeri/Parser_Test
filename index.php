<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style type="text/css">
        .block{
            width: 500px;
            text-align: center;
            margin: auto;
        }
        .result{
            border: 1px solid black;
            width: 500px;
            text-align: center;
            margin: auto;
        }
        table{
            text-align: center;
            margin: auto;
            padding: 0px;
        }
        .number {
            width: 50px;
            border: 1px solid black;
        }
        .CheckName {
            width: 450px;
            border: 1px solid black;
        }
        .status {
            width: 100px;
            border: 1px solid black;
        }
        .state {
            width: 400px;
            border: 1px solid black;
        }
        .empty {
            width: 150px;
            border: 1px solid black;
        }
        .head{
            background-color: #a2c4c9;
        }
        .statusErr {
            background-color: #e06666;
        }
        .statusOk {
            background-color: #93c47d;
        }
        .emptyString {
            height: 10px;
        }
        .save {
            margin: auto;
        }
    </style>
</head>
<body>
<div class="block">
	<?php require('function.php');?>
    <form class="navbar-form " method="post">
        <div class="form-group">
            <input  class="form-control" type="text"  placeholder="http://example.com" name="url"></br>
            <input type="submit" class="btn btn-default" name="check" value="check">
        </div>
    </form>
    <br>
	<?php if (isset($table)):?>
        <form action="download.php" method="POST">
            <input type="hidden" name="url" value="--><?php //echo $url;?><!--">
            <input type="submit" class="btn btn-success" value="Сохранить в excel">
        </form>
	<?php endif;?>
    <br>
	<?php echo isset($url) ? $url : false;?>
</div>
<div class="container">
	<?php if (isset($table)):?>
    <table class="table" border="1px" cellpadding="0" cellspacing="0">
        <tr class="head">
            <td class="number">№</td>
            <td class="CheckName">Название проверки</td>
            <td class="status">Статус</td>
            <td class="empty"></td>
            <td class="state">Текущее состояние</td>
        </tr>
		<?php for ($i=0; $i < count($table); $i++):?>
            <tr><td colspan="5"  class="emptyString"></td></tr><!--empty string-->

            <tr>
                <td class="number" rowspan="2"><?php echo $i+1;?></td>
                <td class="CheckName" rowspan="2"><?php echo $table[$i][0];?></td>
				<?php if ($table[$i][1] == "Ok") {
					?>
                    <td class="statusOk" rowspan="2"><?php echo $table[$i][1]; ?></td>
					<?php
				} else {
					; ?>
                    <td class="statusErr" rowspan="2"><?php echo $table[$i][1]; ?></td>
					<?php
				};?>
                <td class="empty">Состояние
                <td><?php echo $table[$i][2];?></td>
            <tr>
                <td>Рекомендации</td>
                <td><?php echo $table[$i][3];?></td>
            </tr>
            </td>
            </tr>
		<?php endfor;?>
		<?php endif;?>
    </table>
</div>
</body>
</html>
