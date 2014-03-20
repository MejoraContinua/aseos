<?php

class NotaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
    
    	$isAdmin = "isset(Yii::app()->user->role) && (Yii::app()->user->role==='admin')";
		$isUser = "isset(Yii::app()->user->role) && ((Yii::app()->user->role==='user') ||
					 (Yii::app()->user->role==='admin'))";
		$isAnaliz = "isset(Yii::app()->user->role) && ((Yii::app()->user->role==='analiz') ||
														 (Yii::app()->user->role==='user') || 
														 (Yii::app()->user->role==='admin'))";
		 
		   
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
                'expression'=>$isAnaliz
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','Addnewevaluacion'),
                'users' => array('@'),
                'expression'=>$isUser
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','Addnewevaluacion', 'Deletess'),
                'users' => array('@'),
                'expression'=>$isAdmin,
            ),
            array('deny', // deny all users
                'users' => array('@'),
            ),
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Nota;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_NOTA));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Nota']))
		{
			$model->attributes=$_POST['Nota'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_NOTA));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	public function actionDeletess($id)
	{
		
		# Elimino evaluacion tabla nota
		Nota::model()->deleteAll('TRABAJO_ID_TRABAJO ='.$id);
		# Actualizo tabla trabajo, valor CALIFICACION
		Trabajo::model()->updateAll(array( 'CALIFICACION' => NULL ), 'ID_TRABAJO ='.$id );

		$this->redirect(array('trabajo/update&id='.$id));

		# UPDATE  `bd_aseo`.`trabajo` SET  `CALIFICACION` = NULL WHERE  `trabajo`.`ID_TRABAJO` =8411;
		#$trabajo= Trabajo::model()->findByPk($id);
		#$modell=Trabajo::model()->findByPk($id);
		#echo ($modell->attributes=["CALIFICACION"]); exit();
/*
		$qu = Trabajo::model()->update(
							'trabajo', 
							array('CALIFICACION'=>NULL),
							'ID_TRABAJO=:ID_TRABAJO', array(':ID_TRABAJO'=>$id));
		print_r($qu);	*/				


		
	}





	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Nota');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Nota('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Nota']))
			$model->attributes=$_GET['Nota'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Nota the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Nota::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Nota $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='nota-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionAddnewevaluacion() {
            
            $flag=true;

                 

  
            if(isset($_POST['NOTA']) )
            {   
                
                $flag = false;
                 foreach($_POST['NOTA'] as $verif)
                {
                    if($verif['NOTA']==""){
                         $error = CActiveForm::validate(Nota::model());
                         if($error!='[]')
                            echo $error;
                         Yii::app()->end();
                    
                    }
                }
                
                foreach($_POST['NOTA'] as $item)
                {
                    $model=new Nota;
                    $model->attributes=$item;
                     if($model->validate()){
                        $model->save(false);
                     }
                     else
                     {
                         $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                Yii::app()->end();
                     }
                }

             }

            if ($flag)
            {            
                $model=new Nota;
                $id_flota=Flota::model()->findByAttributes(array('NOMBRE_FLOTA'=>$_POST['id_flota']))->ID_FLOTA;
                $id_aseo=$_POST['id_aseo'];

                $sql= Yii::app()->db->createCommand('SELECT evaluacion.id_evaluacion, evaluacion.nombre, ponderacion.ponderacion
                                                    FROM evaluacion
                                                    INNER JOIN ponderacion ON (ponderacion.evaluacion_id_evaluacion = evaluacion.id_evaluacion
                                                    AND ponderacion.aseo_id_aseo=:id_aseo
                                                    AND ponderacion.flota_id_flota =:id_flota )')->bindValues(array(':id_aseo'=>$id_aseo,
                                                                                                                    ':id_flota'=>$id_flota))->queryAll();


                $sql2= Yii::app()->db->createCommand('SELECT item_se_evalua.item_id_item,item.evaluacion_id_evaluacion, item.nombre
                                                    FROM item_se_evalua
                                                    INNER JOIN item ON ( item_se_evalua.item_id_item = item.id_item
                                                    AND item_se_evalua.flota_id_flota =:id_flota
                                                    AND item_se_evalua.aseo_id_aseo =:id_aseo )')->bindValues(array(':id_aseo'=>$id_aseo,
                                                                                                                    ':id_flota'=>$id_flota))->queryAll();


                    Yii::app()->clientScript->scriptMap['jquery.js'] = false;   
                    $this->renderPartial('createDialog', array('model'=>$model,
                                                                      'id_aseo'=>$id_aseo,
                                                                      'id_trabajo'=>$_POST['id_trabajo'],
                                                                      'id_flota'=>$id_flota,
                                                                      'sql'=>$sql,      
                                                                      'sql2'=>$sql2 ),false, true);

            }
        
    }
        
        
}
