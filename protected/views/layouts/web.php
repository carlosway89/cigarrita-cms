
<?php include(Yii::app()->request->baseUrl."assets/init_config.php"); ?>

<?php echo $content; ?>
<?php 
    if ($this->editor) {
        include_once(Yii::app()->request->baseUrl."assets/css_editor.php"); 
        include_once(Yii::app()->request->baseUrl."assets/js_editor.php");
    }else{
        include_once(Yii::app()->request->baseUrl."assets/js_index.php");
    }
                 
?>