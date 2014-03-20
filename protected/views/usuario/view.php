<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->BP,
);

$this->menu=array(
	array('label'=>'Listar usuarios', 'url'=>array('index')),
	array('label'=>'Crear usuarios', 'url'=>array('create')),
	array('label'=>'Actualizar usuarios', 'url'=>array('update', 'id'=>$model->BP)),
	array('label'=>'Eliminar usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BP),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar usuarios', 'url'=>array('admin')),
);
?>

<h1>Usuario BP: <?php echo $model->BP; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BP',
		'NOMBRE',
		'NIVEL_USUARIO',
                array(
                            'name'=> 'FILIAL_ID_FILIAL',
                            'header'=>'Filial',
                            'value'=>$model->fILIALIDFILIAL->NOMBRE_FILIAL, // this will access the current group's 1st member and give out the firstname of that member
                            'htmlOptions'=>array('style' => 'text-align: center;'),
                        ),
	),
)); ?>
