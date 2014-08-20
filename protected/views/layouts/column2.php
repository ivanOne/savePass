<?php $this->beginContent('//layouts/main'); ?>
<div class="row">
<div class="col-md-8">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="col-md-4">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Операции',

		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
</div>
<?php $this->endContent(); ?>
