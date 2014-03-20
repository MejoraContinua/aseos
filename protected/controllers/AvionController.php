<?php

class AvionController extends Controller
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
                'actions' => array('index', 'view','GetMatByFlota','LoadMat'),
                'users' => array('@'),
                'expression'=>$isAnaliz
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
                'expression'=>$isUser
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
		$model=new Avion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Avion']))
		{
			$model->attributes=$_POST['Avion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->MATRICULA));
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

		if(isset($_POST['Avion']))
		{
			$model->attributes=$_POST['Avion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->MATRICULA));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Avion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Avion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Avion']))
			$model->attributes=$_GET['Avion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Avion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Avion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Avion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='avion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	        public function actionGetMatByFlota()
        {   
            $dataTemp = Avion::model()->findAll('matricula=:matricula', array(':matricula'=> $_POST['matricula']));
            $dataTemp = CHtml::listData($dataTemp,'FLOTA_ID_FLOTA','MATRICULA');
            
            foreach($dataTemp as $value=>$name)
                $flotaid=$value;
                
            $data['flota']= Flota::model()->findAll('id_flota=:id_flota',array(':id_flota'=> $flotaid));
            
            
                
            echo CJSON::encode($data);
            

        }
        
     
        public function actionLoadMat()
        {   
        
			if(isset($_POST['Avion']['FLOTA_ID_FLOTA'])){
				$flotasReg = implode('|',$_POST['Avion']['FLOTA_ID_FLOTA']);
				
			    $dbCommand = Yii::app()->db->createCommand('select MATRICULA from avion where FLOTA_ID_FLOTA = ANY(select id_flota
			    				from flota where nombre_flota REGEXP "'.$flotasReg.'")');
			    $mats = $dbCommand->queryAll();

			    foreach($mats as $id=>$value){

				    $optionTags[$value['MATRICULA']] = CHtml::tag('option',
                               array('value'=>$value['MATRICULA']),CHtml::encode($value["MATRICULA"]),true);
				//$optionTags[]= $value['matricula'];
			    }
			    print_r($optionTags);
			    //echo json_encode($optionTags);
		}
/*
            $dataTemp = Avion::model()->findAll('matricula=:matricula', array(':matricula'=> $_POST['matricula']));
            $dataTemp = CHtml::listData($dataTemp,'FLOTA_ID_FLOTA','MATRICULA');
            
            foreach($dataTemp as $value=>$name)
                $flotaid=$value;
                
            $data['flota']= Flota::model()->findAll('id_flota=:id_flota',array(':id_flota'=> $flotaid));
            
            
                
            echo CJSON::encode($data);
*/
            

        }
        
        
	
}
