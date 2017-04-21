<?php
/* @var $this yii\web\View */
$baseUrl= Yii::$app->urlManager->baseUrl;
$this->title='Quản lý ảnh';
?>
<div class="file-index">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Hình ảnh</h3>
		</div>
		<div class="panel-body" style="min-height:400px">
			<iframe src='<?php echo $baseUrl;?>/filemanager/dialog.php' style='width:100%;height:400px;'></iframe>
		</div>
	</div>
</div>