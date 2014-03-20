<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

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
                'actions' => array('index', 'bajar','bajarevaluaciones','ResumenCriticos',
                					'criticos','error','reporte','DownloadExcel',
                					'DownloadExcelEval','SendExcel','Logout','page','resumen','DownloadPlanFile'),
                'users' => array('@'),
                'expression'=>$isAnaliz
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('login'),
                'users' => array('*'),
            ),
/*
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
                'expression'=>$isAdmin,
            ),
*/
            array('deny', // deny all users
                'users' => array('@'),
            ),
        );
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}



	public function resumen(){

		$arreglo = array(array());

		$arreglo[0]['tipo']='Profundo';
		$arreglo[0]['flota']='A320F';
		$arreglo[0]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>1,"ASEO_ID_ASEO"=>5))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 1 or flota_id_flota =2 or flota_id_flota =3)
						and aseo_id_aseo=5
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[0]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[0]['cantidad'] = $list[0]['cuantos'];
		$arreglo[0]['promedio'] = (int)$list[0]['prom'];

		$arreglo[1]['tipo']='Profundo';
		$arreglo[1]['flota']='A340';
		$arreglo[1]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>4,"ASEO_ID_ASEO"=>5))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 4)
						and aseo_id_aseo=5
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[1]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[1]['cantidad'] = $list[0]['cuantos'];
		$arreglo[1]['promedio'] = (int)$list[0]['prom'];

		$arreglo[2]['tipo']='Profundo';
		$arreglo[2]['flota']='B787';
		$arreglo[2]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>9,"ASEO_ID_ASEO"=>5))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 9)
						and aseo_id_aseo=5
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[2]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[2]['cantidad'] = $list[0]['cuantos'];
		$arreglo[2]['promedio'] = (int)$list[0]['prom'];

		$arreglo[3]['tipo']='Profundo';
		$arreglo[3]['flota']='B767';
		$arreglo[3]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>6,"ASEO_ID_ASEO"=>5))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 6)
						and aseo_id_aseo=5
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[3]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[3]['cantidad'] = $list[0]['cuantos'];
		$arreglo[3]['promedio'] = (int)$list[0]['prom'];

		$arreglo[4]['tipo']='Fuselaje';
		$arreglo[4]['flota']='A320F';
		$arreglo[4]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>1,"ASEO_ID_ASEO"=>4))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 1 or flota_id_flota =2 or flota_id_flota =3)
						and aseo_id_aseo=4
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[4]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[4]['cantidad'] = $list[0]['cuantos'];
		$arreglo[4]['promedio'] = (int)$list[0]['prom'];

		$arreglo[5]['tipo']='Fuselaje';
		$arreglo[5]['flota']='A340';
		$arreglo[5]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>4,"ASEO_ID_ASEO"=>4))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 4)
						and aseo_id_aseo=4
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[5]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[5]['cantidad'] = $list[0]['cuantos'];
		$arreglo[5]['promedio'] = (int)$list[0]['prom'];

		$arreglo[6]['tipo']='Fuselaje';
		$arreglo[6]['flota']='B787';
		$arreglo[6]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>9,"ASEO_ID_ASEO"=>4))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 9)
						and aseo_id_aseo=4
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[6]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[6]['cantidad'] = $list[0]['cuantos'];
		$arreglo[6]['promedio'] = (int)$list[0]['prom'];

		$arreglo[7]['tipo']='Fuselaje';
		$arreglo[7]['flota']='B767';
		$arreglo[7]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>6,"ASEO_ID_ASEO"=>4))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 6)
						and aseo_id_aseo=4
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[7]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[7]['cantidad'] = $list[0]['cuantos'];
		$arreglo[7]['promedio'] = (int)$list[0]['prom'];

		$arreglo[8]['tipo']='Alfombra';
		$arreglo[8]['flota']='A320F';
		$arreglo[8]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>1,"ASEO_ID_ASEO"=>2))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 1 or flota_id_flota =2 or flota_id_flota =3)
						and aseo_id_aseo=2
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[8]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[8]['cantidad'] = $list[0]['cuantos'];
		$arreglo[8]['promedio'] = (int)$list[0]['prom'];

		$arreglo[9]['tipo']='Alfombra';
		$arreglo[9]['flota']='A340';
		$arreglo[9]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>4,"ASEO_ID_ASEO"=>2))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 4)
						and aseo_id_aseo=2
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[9]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[9]['cantidad'] = $list[0]['cuantos'];
		$arreglo[9]['promedio'] = (int)$list[0]['prom'];

		$arreglo[10]['tipo']='Alfombra';
		$arreglo[10]['flota']='B787';
		$arreglo[10]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>9,"ASEO_ID_ASEO"=>2))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 9)
						and aseo_id_aseo=2
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[10]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[10]['cantidad'] = $list[0]['cuantos'];
		$arreglo[10]['promedio'] = (int)$list[0]['prom'];

		$arreglo[11]['tipo']='Alfombra';
		$arreglo[11]['flota']='B767';
		$arreglo[11]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>6,"ASEO_ID_ASEO"=>2))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 6)
						and aseo_id_aseo=2
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[11]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[11]['cantidad'] = $list[0]['cuantos'];
		$arreglo[11]['promedio'] = (int)$list[0]['prom'];

		$arreglo[12]['tipo']='Tapiz';
		$arreglo[12]['flota']='A320F';
		$arreglo[12]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>1,"ASEO_ID_ASEO"=>6))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 1 or flota_id_flota =2 or flota_id_flota =3)
						and aseo_id_aseo=6
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[12]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[12]['cantidad'] = $list[0]['cuantos'];
		$arreglo[12]['promedio'] = (int)$list[0]['prom'];

		$arreglo[13]['tipo']='Baños';
		$arreglo[13]['flota']='A320F';
		$arreglo[13]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>1,"ASEO_ID_ASEO"=>8))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 1 or flota_id_flota =2 or flota_id_flota =3)
						and aseo_id_aseo=8
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[13]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[13]['cantidad'] = $list[0]['cuantos'];
		$arreglo[13]['promedio'] = (int)$list[0]['prom'];

		$arreglo[14]['tipo']='Baños';
		$arreglo[14]['flota']='A340';
		$arreglo[14]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>4,"ASEO_ID_ASEO"=>8))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 4)
						and aseo_id_aseo=8
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[14]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[14]['cantidad'] = $list[0]['cuantos'];
		$arreglo[14]['promedio'] = (int)$list[0]['prom'];

		$arreglo[15]['tipo']='Baños';
		$arreglo[15]['flota']='B787';
		$arreglo[15]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>9,"ASEO_ID_ASEO"=>8))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 9)
						and aseo_id_aseo=8
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[15]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[15]['cantidad'] = $list[0]['cuantos'];
		$arreglo[15]['promedio'] = (int)$list[0]['prom'];

		$arreglo[16]['tipo']='Baños';
		$arreglo[16]['flota']='B767';
		$arreglo[16]['limite'] = Criticos::model()->findByAttributes(array("FLOTA_ID_FLOTA"=>6,"ASEO_ID_ASEO"=>8))->LIMITE3;
		$sql = 'select count(DISTINCT AVION_MATRICULA) as cuantos, avg(DATEDIFF(NOW(),trabajo.FECHA)) as prom from trabajo
						where avion_matricula= ANY (
						select matricula from avion where flota_id_flota = 6)
						and aseo_id_aseo=8
						and DATEDIFF(NOW(),trabajo.FECHA) >'.$arreglo[16]['limite'];
		$list= Yii::app()->db->createCommand($sql)->queryAll();
		$arreglo[16]['cantidad'] = $list[0]['cuantos'];
		$arreglo[16]['promedio'] = (int)$list[0]['prom'];

		return $arreglo;
	}



    public function actionResumenCriticos(){


		$arreglo = $this->resumen();


		$this->render('resumencriticos',array(
			'arreglo'=>$arreglo,
            ));
        }


    public function actionCriticos(){

        $model=new Avion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Avion'])){
			$model->attributes=$_GET['Avion'];
		}
		else
			$model->MATRICULA='YYYY';

		$this->render('criticos',array(
			'model'=>$model,
        ));

    }

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
                            $this->redirect(array("site/index"));
                        }
				//$this->redirect(Yii::app()->user->returnUrl);
                }
                $this->layout=false;
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        public function actionBajar()
	{

                $model=new Trabajo('search');
		$model->unsetAttributes();  // clear any default values
                if(isset($_GET['avion']))
                    $model->AVION_MATRICULA=$_GET['avion'];
                if(isset($_GET['aseo']))
                    $model->ASEO_ID_ASEO=$_GET['aseo'];
		if(isset($_GET['Trabajo']))
                    $model->attributes=$_GET['Trabajo'];


		$this->render('bajardatos',array(
			'model'=>$model,
		));
	}
	public function actionBajarEvaluaciones(){
		$model = new Trabajo('searchItem');
		$model->unsetAttributes();
		if(isset($_GET['Trabajo']))
			$model->attributes=$_GET['Trabajo'];
		$this->render('bajarevaluaciones',array(
			'model'=>$model
		));
	}
    public function actionDownloadPlanFile()
	{
		$file = 'planilla/planificados.xls';

		if (file_exists($file)) {
		    header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename='.basename($file));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($file));
		    ob_clean();
		    flush();
		    readfile($file);
		    exit;
		}
	}
    public function actionReporte()
	{
    	$files = glob(getcwd().'\\temp\\*'); // get all file names
        foreach($files as $file){ // iterate files
        	if(is_file($file))
            	unlink($file); // delete file
        }
        $model=new Trabajo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Trabajo'])){
        	$model->attributes=$_GET['Trabajo'];
        }

		$this->render('reporte',array(
			'model'=>$model,
		));
	}

	public function actionResumen(){
		$model=new Avion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Avion'])){
        	$model->attributes=$_GET['Avion'];
        }

		$this->render('resumen',array(
			'model'=>$model,
		));
	}

	public function actionDownloadExcel(){
		 		set_time_limit(500);
		 		error_reporting(0);

        $d = $_SESSION['Lectivo-excel'];
        $i = 0;
        $data[$i]['FECHA'] = 'Fecha';
        $data[$i]['TURNO_ID_TURNO']='Turno';
        $data[$i]['AVION_MATRICULA'] = 'Matricula';
        $data[$i]['flota_grilla'] = 'Flota';
        $data[$i]['LUGAR_ID_LUGAR'] = 'Lugar';
        $data[$i]['ASEO_ID_ASEO'] = 'Aseo';
        $data[$i]['PLANIFICADO'] = 'Planificado';
        $data[$i]['ESTADO_ID_ESTADO'] = 'Estado';
        $data[$i]['HORA_INICIO'] = 'Hora inicio';
        $data[$i]['HORA_TERMINO'] = 'Hora termino';
        $data[$i]['PLAN_INICIO'] = 'Planificado inicio';
        $data[$i]['PLAN_TERMINO'] = 'Planificad termino';
        $data[$i]['CALIFICACION'] = 'Calificacion';
        $data[$i]['OT'] = 'OT';
        $data[$i]['COMENTARIO'] = 'Comentario';
        $data[$i]['USUARIO_BP'] = 'Usuario';
         $data[$i]['ARCHIVO1']='Foto';
        //$data[$i]['ULTIMO_ASEO'] = 'Días sin aseo';
        $i++;

        //populate data array with the required data elements
        foreach($d->data as $issue)
        {
             if($issue->FECHA!=NULL){
		        $temp_var= explode('-',$issue->FECHA);
	            $data[$i]['FECHA'] = $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0];
            }
            else
            	$data[$i]['FECHA']="";
            $temp_var=null;
           if($issue->TURNO_ID_TURNO!=NULL){
	            $temp_var= explode('-',$issue->tURNOIDTURNO->FECHA);
	            $data[$i]['TURNO_ID_TURNO']= $temp_var[2].'-'.$temp_var[1].
	            	'-'.$temp_var[0].' '.$issue->tURNOIDTURNO->tIPOTURNOIDTIPOTURNO->TIPO;
            }
            else
            	$data[$i]['TURNO_ID_TURNO']="";
            $data[$i]['AVION_MATRICULA'] = $issue['AVION_MATRICULA'];
            $data[$i]['flota_grilla'] = $issue['flota_grilla'];
            if($issue['LUGAR_ID_LUGAR']!=NULL)
                $data[$i]['LUGAR_ID_LUGAR']=$issue->lUGARIDLUGAR->LUGAR;
            else
                $data[$i]['LUGAR_ID_LUGAR']="";
            if($issue['ASEO_ID_ASEO']!=NULL)
                $data[$i]['ASEO_ID_ASEO']=$issue->aSEOIDASEO->TIPO_ASEO;
            else
                $data[$i]['ASEO_ID_ASEO']="";
            if($issue['PLANIFICADO']!=NULL)
                $data[$i]['PLANIFICADO']="Si";
            else
                $data[$i]['PLANIFICADO']="No";

            if($issue['ESTADO_ID_ESTADO']!=NULL)
            	$data[$i]['ESTADO_ID_ESTADO'] = $issue->eSTADOIDESTADO->NOMBRE_ESTADO;
            else
            	$data[$i]['ESTADO_ID_ESTADO'] ="";
            if($issue['HORA_INICIO']!=NULL)
            	$data[$i]['HORA_INICIO'] = $issue['HORA_INICIO'];
            else
            	$data[$i]['HORA_INICIO'] = "";
            if($issue['HORA_TERMINO']!=NULL)
            	$data[$i]['HORA_TERMINO'] = $issue['HORA_TERMINO'];
            else
            	$data[$i]['HORA_TERMINO'] = "";
            if($issue['PLAN_INICIO'])
            	$data[$i]['PLAN_INICIO'] = $issue['PLAN_INICIO'];
            else
            	$data[$i]['PLAN_INICIO'] = "";
            if($issue['PLAN_TERMINO']!=NULL)
            	$data[$i]['PLAN_TERMINO'] = $issue['PLAN_TERMINO'];
            else
            	$data[$i]['PLAN_TERMINO'] = "";

            //$data[$i]['ULTIMO_ASEO']=$issue['ULTIMO_ASEO'];
            $data[$i]['CALIFICACION'] = $issue['CALIFICACION'];
            $data[$i]['OT'] = $issue['OT'];
            $data[$i]['COMENTARIO'] = $issue['COMENTARIO'];
            $data[$i]['USUARIO_BP'] =$issue['USUARIO_BP'];

            if($issue['ARCHIVO1']!=NULL){
	            $data[$i]['ARCHIVO1']= 'http://localhost:8080/aseoscabina/index.php?r=trabajo/view&id='.$issue['ID_TRABAJO'];
            }
            else
            	$data[$i]['ARCHIVO1'] = "";

            $i++;
        }

            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'test');
            $xls->addArray($data);
            $fecha = new DateTime();
            $xls->generateXML('Resumen_Aseo-Cabina_'.$fecha->format('d-m-Y')); //export into a .xls file
        }




        public function actionDownloadExcelEval() {
         $d = $_SESSION['Lectivo-excel'];
         $i = 0;
         $dbCommand = Yii::app()->db->createCommand('select ID_ITEM,NOMBRE,EVALUACION_ID_EVALUACION from item');
         $items_sql = $dbCommand->queryAll();

        $data[$i]['FECHA'] = '';
        $data[$i]['flota'] = '';
        $data[$i]['AVION_MATRICULA'] = '';
        $data[$i]['aSEOIDASEO.TIPO_ASEO'] = '';
        $data[$i]['CALIFICACION'] = '';
        foreach($items_sql as $item){
	         $data[$i]['item_'.$item['ID_ITEM']] = Evaluacion::model()->findByPk($item['EVALUACION_ID_EVALUACION'])->NOMBRE;
        }
        $i++;

        $data[$i]['FECHA'] = 'Fecha';
        $data[$i]['flota'] = 'Flota';
        $data[$i]['AVION_MATRICULA'] = 'Matrícula';
        $data[$i]['aSEOIDASEO.TIPO_ASEO'] = 'Aseo';
        $data[$i]['CALIFICACION'] = 'Calificación';
        foreach($items_sql as $item){
	         $data[$i]['item_'.$item['ID_ITEM']] = $item['NOMBRE'];
        }
        $i++;

        //populate data array with the required data elements
        // var_dump($d->data);die;
        foreach($d->data as $issue)
        {
            if($issue['FECHA']!=NULL){
                $temp_var= explode('-',$issue['FECHA']);
                $data[$i]['FECHA'] = $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0];
            }
            else
                $data[$i]['FECHA'] = "";

            $data[$i]['flota'] = $issue['flota'];
            $data[$i]['AVION_MATRICULA'] = $issue['AVION_MATRICULA'];
            $data[$i]['aSEOIDASEO.TIPO_ASEO'] = $issue->aSEOIDASEO->TIPO_ASEO;
            $data[$i]['CALIFICACION'] = $issue['CALIFICACION'];


            foreach($items_sql as $item){
	         $data[$i]['item_'.$item['ID_ITEM']] = $issue['item_'.$item['ID_ITEM']];
	         }
            $i++;
        }


            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'test');
            $xls->addArray($data);
            $fecha = new DateTime();
            $xls->generateXML('Resumen_Evaluaciones_'.$fecha->format('d-m-Y')); //export into a .xls file
        }




   public function actionSendExcel(){

        $d = $_SESSION['Lectivo-excel'];
        $i = 0;
        $data[$i]['FECHA'] = 'Fecha';
        $data[$i]['TURNO_ID_TURNO']='Turno';
        $data[$i]['AVION_MATRICULA'] = 'Matricula';
        $data[$i]['flota_grilla'] = 'Flota';
        $data[$i]['LUGAR_ID_LUGAR'] = 'Lugar';
        $data[$i]['ASEO_ID_ASEO'] = 'Aseo';
        $data[$i]['PLANIFICADO'] = 'Planificado';
        $data[$i]['ESTADO_ID_ESTADO'] = 'Estado';
        $data[$i]['HORA_INICIO'] = 'Hora inicio';
        $data[$i]['HORA_TERMINO'] = 'Hora termino';
        $data[$i]['PLAN_INICIO'] = 'Planificado inicio';
        $data[$i]['PLAN_TERMINO'] = 'Planificad termino';
        $data[$i]['CALIFICACION'] = 'Calificacion';
        $data[$i]['OT'] = 'OT';
        $data[$i]['COMENTARIO'] = 'Comentario';
        $data[$i]['USUARIO_BP'] = 'Usuario';
        //$data[$i]['ARCHIVO1']='Foto';
        //$data[$i]['ULTIMO_ASEO'] = 'Días sin aseo';


        $i++;
        $planificados=0;
        $realizados=0;
        $realizadosNR=0;
        $desLan=0;
        $desLanNR=0;
        $desEco =0 ;
        $desEcoNR=0;
        //populate data array with the required data elements
        foreach($d->data as $issue)
        {
            if($issue->FECHA!=NULL){
		        $temp_var= explode('-',$issue->FECHA);
	            $data[$i]['FECHA'] = $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0];
            }
            else
            	$data[$i]['FECHA']="";
            $temp_var=null;
            if($issue->TURNO_ID_TURNO!=NULL){
	            $temp_var= explode('-',$issue->tURNOIDTURNO->FECHA);
	            $data[$i]['TURNO_ID_TURNO']= $temp_var[2].'-'.$temp_var[1].'-'.$temp_var[0].' '.$issue->tURNOIDTURNO->tIPOTURNOIDTIPOTURNO->TIPO;
            }
            else
            	$data[$i]['TURNO_ID_TURNO']="";
            $data[$i]['AVION_MATRICULA'] = $issue['AVION_MATRICULA'];
            $data[$i]['flota_grilla'] = $issue['flota_grilla'];
                        if($issue['LUGAR_ID_LUGAR']!=NULL)
                $data[$i]['LUGAR_ID_LUGAR']=$issue->lUGARIDLUGAR->LUGAR;
            else
                $data[$i]['LUGAR_ID_LUGAR']="";
            if($issue['ASEO_ID_ASEO']!=NULL)
                $data[$i]['ASEO_ID_ASEO']=$issue->aSEOIDASEO->TIPO_ASEO;
            else
                $data[$i]['ASEO_ID_ASEO']="";
            if($issue['PLANIFICADO']!=NULL){
                if($issue['PLANIFICADO'])
                	$data[$i]['PLANIFICADO']="Si";
                else
                	$data[$i]['PLANIFICADO']="No";
                $planificados = $planificados + (int) $issue['PLANIFICADO'];
            }
            else
                $data[$i]['PLANIFICADO']="";

            if($issue['ESTADO_ID_ESTADO']!=NULL){
            	$data[$i]['ESTADO_ID_ESTADO'] = $issue->eSTADOIDESTADO->NOMBRE_ESTADO;
            	if(!strcmp($issue->eSTADOIDESTADO->NOMBRE_ESTADO,"Ok")){
            		$realizados=$realizados + 1;
            		if($issue['PLANIFICADO']==0)
            			$realizadosNR = $realizadosNR +1;
            	}
            	if(substr($issue->eSTADOIDESTADO->NOMBRE_ESTADO, 0, 3 ) === "LAN" && strcmp($issue->aSEOIDASEO->TIPO_ASEO,"Terminal")!=0){
            		$desLan=$desLan + 1;
            		if($issue['PLANIFICADO']==0)
            			$desLanNR = $desLanNR +1;
            	}
            	if(substr($issue->eSTADOIDESTADO->NOMBRE_ESTADO, 0, 8 ) === "Ecoblanc" && strcmp($issue->aSEOIDASEO->TIPO_ASEO,"Terminal")!=0){
            		$desEco=$desEco + 1;
            		if($issue['PLANIFICADO']==0)
            			$desEcoNR = $desEcoNR +1;
            	}
            }
            else
            	$data[$i]['ESTADO_ID_ESTADO'] = "";

            if($issue['HORA_INICIO']!=NULL)
            	$data[$i]['HORA_INICIO'] = $issue['HORA_INICIO'];
            else
            	$data[$i]['HORA_INICIO'] = "";
            if($issue['HORA_TERMINO']!=NULL)
            	$data[$i]['HORA_TERMINO'] = $issue['HORA_TERMINO'];
            else
            	$data[$i]['HORA_TERMINO'] = "";
            if($issue['PLAN_INICIO'])
            	$data[$i]['PLAN_INICIO'] = $issue['PLAN_INICIO'];
            else
            	$data[$i]['PLAN_INICIO'] = "";
            if($issue['PLAN_TERMINO']!=NULL)
            	$data[$i]['PLAN_TERMINO'] = $issue['PLAN_TERMINO'];
            else
            	$data[$i]['PLAN_TERMINO'] = "";

            //$data[$i]['ULTIMO_ASEO']=$issue['ULTIMO_ASEO'];
            $data[$i]['CALIFICACION'] = $issue['CALIFICACION'];
            $data[$i]['OT'] = $issue['OT'];
            $data[$i]['COMENTARIO'] = $issue['COMENTARIO'];
            $data[$i]['USUARIO_BP'] =$issue['USUARIO_BP'];

/*
            if($issue['ARCHIVO1']!=null){
	            $data[$i]['ARCHIVO1']= 'http://localhost:8080/aseoscabina/
	            .php?r=trabajo/view&id='.$issue['ID_TRABAJO'];
            }
            else
            	$data[$i]['ARCHIVO1'] = "";
*/

            $i++;
        }

            Yii::import('application.extensions.phpexcel.JPhpExcel');
            $xls = new JPhpExcel('UTF-8', false, 'test');
            $xls->addArray($data);
            $fecha = new DateTime();

            $out = '';
            ob_start();
            $xls->generateXML('Resumen_Aseo-Cabina_'.
            			$fecha->format('d-m-Y'));
            $out .= ob_get_contents();
            ob_end_flush();


            Yii::import('ext.yii-mail.YiiMailMessage');
            $message = new YiiMailMessage;

            $arreglo = $this->resumen();

            $string = 'Resumen Informe de Turno: <br/><br/>
            				   Aseos Planificados: '.$planificados.'<br/>
            				   Aseos Realizados: '.$realizados.' (NR: '.$realizadosNR.') <br/>
            				   Desasignados LAN: '.$desLan.' (NR: '.$desLanNR.') <br/>
            				   Desasignados Ecoblanc: '.$desEco.' (NR: '.$desEcoNR.') <br/><br/>
            				   No se consideran aseos Terminales desasignados <br/> <br/>

            				   Resumen de Críticos <br/> <br/>
            				   <table border="1" style="margin:1px;padding:0px;border:1px solid #ffffff;">
								<tr style="background-color:#002955;border:0px solid #ffffff;	text-align:center;
										border-width:0px 0px 1px 1px;
										font-size:12px;
										font-family:Arial;
										font-weight:normal;
										color:#ffffff;">
									<th>
										Tipo de Aseo
									</th>
									<th>
										Flota
									</th>
									<th>
										Límite de días
									</th>
									<th>
										Cantidad de AC Críticos
									</th>
									<th>
										Promedio de días Críticos
									</th>
								</tr>';

			foreach($arreglo as $value)
				{
				$string .= '<tr>
						 		<td>
									'.$value['tipo'].'
								</td>
								<td>
									'.$value['flota'].'
								</td>
								<td>
									'.$value['limite'].'
								</td>
								<td>
									'.$value['cantidad'].'
								</td>
								<td>
									'.$value['promedio'].'
								</td>
							</tr>';
				}
				$string .= '</table>';

            $message->setBody($string, 'text/html');

            $message->subject = 'Informe de Turno Aseos: '.$fecha->format('d-m-Y').
            			': '.Usuario::model()->FindByPk(Yii::app()->user->getId())->NOMBRE;



            $addTo=array();
	        $mails = simplexml_load_file('mail_contacts.xml');
		    foreach($mails as $mail){
			        $addTo[] =(string)$mail->email;
		     }
		    $to=implode(", ",$addTo);


            $message->addTo('reportes.mejora.continua@gmail.com');

            foreach($addTo as $value){
            	$message->addCC(trim($value));
            }


            $message->from = Yii::app()->params['adminEmail'];

            $filename='Resumen_Aseos_Cabina_'.$fecha->format('d-m-Y');
                        // check that something was actually written to the buffer
            if (strlen($out) > 0) {
             $file = 'temp/Resumen_Aseos_Cabina_'.$fecha->format('d-m-Y'). '.xls';
             touch($file);
             $fh = fopen($file, 'w');
             fwrite($fh, $out);
             fclose($fh);
            }
            $message->attach(Swift_Attachment::fromPath($file), $filename, "xls");

            Yii::app()->mail->send($message);


        }

        public function actionIndex(){

        $model=new Trabajo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Trabajo']))
			$model->attributes=$_GET['Trabajo'];



		$this->render('index',array(
			'model'=>$model
            ));
        }
}