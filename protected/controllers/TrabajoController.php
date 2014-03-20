<?php

class TrabajoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
                'actions' => array('index', 'view', 'adminPlan', 'AdminOk', 'adminDesa', 'adminPend','SearchOT'),
                'users' => array('@'),
                'expression' => $isAnaliz
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'createDialog', 'save', 'masiva'),
                'users' => array('@'),
                'expression' => $isUser
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'save', 'masiva'),
                'users' => array('@'),
                'expression' => $isAdmin,
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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Uploads files submitted via CMultiFileUpload widget
     * Deletes all old files before uploading new files
     */ /*
      $images_path = realpath(Yii::app()->basePath . '/../images');

      $i = 1;
      foreach ($images as $image => $pic) {
      $path = $images_path . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
      $real_p= Yii::app()->baseUrl.'/images'. '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
      if ($pic->saveAs($path)) {
      switch ($i) {
      case 1:
      $model->ARCHIVO1 = $real_p;
      break;
     */


    public function actionMasiva() {
        $success = -1;
        $fallidos = -1;

        $excel = CUploadedFile::getInstancesByName('files');

        if (isset($excel) && count($excel) > 0) {
            Yii::import('ext.excelreader.JPhpExcelReader');
            // print_r($excel[0]->getTempName());
            //upload new files
            /*
              foreach($excel as $key=>$filename){
              //move_uploaded_file($_FILES['files']['tmp_name'][$key],Yii::app()->params['uploadDir'].$filename);

              $data=new JPhpExcelReader($filename);

              }

             */
            $data = new JPhpExcelReader($excel[0]->getTempName());
            $success = 0;
            $fallidos = 0;

            for ($i = 2; $i <= $data->rowcount(); $i++) {

                $model = new Trabajo('excel');

                if ($data->val($i, 1) != null) {
                    $tiempo = explode("/", $data->val($i, 1));
                    $model->FECHA = $tiempo[2] . '-' . $tiempo[0] . '-' . $tiempo[1];
                } else {
                    $model->FECHA = null;
                }

                if ($data->val($i, 2) != NULL)
                    $model->AVION_MATRICULA = $data->val($i, 2);
                else {
                    $model->AVION_MATRICULA = null;
                }

                if ($data->val($i, 3) != null && Aseo::model()->exists("TIPO_ASEO='" . $data->val($i, 3) . "'")) {
                    $id_aseo = Aseo::model()->findByAttributes(array('TIPO_ASEO' => $data->val($i, 3)))->ID_ASEO;
                    $model->ASEO_ID_ASEO = $id_aseo;
                } else {
                    $model->ASEO_ID_ASEO = null;
                }

                if ($data->val($i, 4) != null && Lugar::model()->exists("LUGAR='" . $data->val($i, 4) . "'")) {
                    $id_lugar = Lugar::model()->findByAttributes(array('LUGAR' => $data->val($i, 4)))->ID_LUGAR;
                    $model->LUGAR_ID_LUGAR = $id_lugar;
                } else {
                    $model->LUGAR_ID_LUGAR = null;
                }

                if ($data->val($i, 5) != NULL)
                    $model->PLAN_INICIO = $data->val($i, 5);
                else {
                    $model->PLAN_INICIO = null;
                }

                if ($data->val($i, 6) != NULL) {
                    $model->PLAN_TERMINO = $data->val($i, 6);
                    $model->PLANIFICADO = 1;
                    $model->ESTADO_ID_ESTADO = 2;
                    $model->USUARIO_BP = Yii::app()->user->getId();
                } else {
                    $model->PLAN_TERMINO = null;
                }


                if ($model->validate()) {
                    $model->save(false);
                    $success++;
                } else {
                    $error = CActiveForm::validate($model);
                    $fallidos++;
                }
            }
            $this->render('masiva', array(
                'success' => $success,
                'fallidos' => $fallidos,
            ));
        } else {

            $this->render('masiva', array(
                'success' => $success,
                'fallidos' => $fallidos,
            ));
        }
    }
    /*
     * param $id id trabajo
     */
    public function actionSave($id=false) {

        $valor_str= Trabajo::model()->findByPk($id);
        
        

        if (isset($_POST['Trabajo'], $_POST['Turno'])) {
            $model = new Trabajo('inicio');
            $modelT = new Turno;
            $this->performAjaxValidation(array($model, $modelT));
            $model->attributes = $_POST['Trabajo'];
            $modelT->attributes = $_POST['Turno'];
if($id != false){
    $model->ID_TRABAJO = $id;
}

            if ($model->ASEO_ID_ASEO === 8)
                $model->scenario = 'bano';
            else {
                switch ($model->ESTADO_ID_ESTADO) {
                    case 1:
                        $model->scenario = 'ok';
                        break;
                    case 2:
                        $model->scenario = 'pendiente';
                        break;
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                        $model->scenario = 'laneco';
                        break;
                    case 9:
                        $model->scenario = 'nula';
                        break;
                }
            }


            if ($model->validate() && $modelT->validate()) {

                if ($model->ESTADO_ID_ESTADO != 2 && $model->ESTADO_ID_ESTADO != 9) {
                    if (Trabajo::model()->exists("ASEO_ID_ASEO=" . $model->ASEO_ID_ASEO . " AND AVION_MATRICULA='" . $model->AVION_MATRICULA . "'")) {

                        $result = Trabajo::model()->findAllByAttributes(array("ASEO_ID_ASEO" => $model->ASEO_ID_ASEO, "AVION_MATRICULA" => $model->AVION_MATRICULA), array('order' => 'FECHA DESC', 'limit' => 1));
                        $date = new DateTime($result[0]['FECHA']);
                        $dateNow = new DateTime($model->FECHA);
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                    } else {
                        $date = new DateTime($model->FECHA);
                        $dateNow = new DateTime();
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                    }
                } else {
                    $model->ULTIMO_ASEO = 0;
                }

                $var = Turno::model()->findAll(array('condition' => 'FECHA=:date AND TIPO_TURNO_ID_TIPO_TURNO=:tt', 'order' => 'FECHA ASC', 'limit' => '1', 'params' => array(':date' => $modelT->FECHA, ':tt' => $modelT->TIPO_TURNO_ID_TIPO_TURNO)));
                $model->TURNO_ID_TURNO = $var[0]['ID_TURNO'];

                if ($model->ASEO_ID_ASEO == 5 || $model->ASEO_ID_ASEO == 7) {
                    if(!empty($_POST['Trabajo']['CALIFICACION'])){
                        #$model->save(false);
                    }
                    

                    $nota = new Nota;
                    $id_flota = Flota::model()->findByAttributes(array('NOMBRE_FLOTA' => $_POST['flotaId']))->ID_FLOTA;
                    $id_aseo = $model->ASEO_ID_ASEO;

                    $sql = Yii::app()->db->createCommand('SELECT evaluacion.id_evaluacion, evaluacion.nombre, ponderacion.ponderacion
                                                                                FROM evaluacion
                                                                                INNER JOIN ponderacion ON (ponderacion.evaluacion_id_evaluacion = evaluacion.id_evaluacion
                                                                                AND ponderacion.aseo_id_aseo=:id_aseo
                                                                                AND ponderacion.flota_id_flota =:id_flota )')->bindValues(array(':id_aseo' => $id_aseo,
                                ':id_flota' => $id_flota))->queryAll();


                    $sql2 = Yii::app()->db->createCommand('SELECT item_se_evalua.item_id_item,item.evaluacion_id_evaluacion, item.nombre
                                                                                FROM item_se_evalua
                                                                                INNER JOIN item ON ( item_se_evalua.item_id_item = item.id_item
                                                                                AND item_se_evalua.flota_id_flota =:id_flota
                                                                                AND item_se_evalua.aseo_id_aseo =:id_aseo )')->bindValues(array(':id_aseo' => $id_aseo,
                                ':id_flota' => $id_flota))->queryAll();

                    



                   $nota_real = $valor_str["CALIFICACION"];
                   


                    $this->renderPartial('createDialog', array('model' => $nota,
                        'id_aseo' => $id_aseo,
                        'nota_real' => $nota_real,
                        'id_trabajo' => $model->ID_TRABAJO,
                        'id_flota' => $id_flota,
                        'sql' => $sql,
                        'sql2' => $sql2), false, true);
                } else {
                    $model->save(false);
                }
            } else {
                $error = CActiveForm::validate(array($model, $modelT));
                if ($error != '[]')
                    echo $error;
                Yii::app()->end();
            }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {


        if (isset($_POST['update'], $_POST['Trabajo'], $_POST['Turno'])) {

            if (Trabajo::model()->exists(array('condition' =>
                        'AVION_MATRICULA=:amat AND ASEO_ID_ASEO=:aseoid',
                        'params' => array(':amat' => $_POST['Trabajo']['AVION_MATRICULA'],
                            ':aseoid' => $_POST['Trabajo']['ASEO_ID_ASEO']))))
                $returnId = Trabajo::model()->findAll(array('condition' =>
                    'AVION_MATRICULA=:amat AND ASEO_ID_ASEO=:aseoid', 'order' => 'ID_TRABAJO DESC',
                    'limit' => 1, 'params' => array(':amat' => $_POST['Trabajo']['AVION_MATRICULA'],
                        ':aseoid' => $_POST['Trabajo']['ASEO_ID_ASEO'])));

            $model = $this->loadModel($returnId[0]->ID_TRABAJO);
            $modelT = new Turno;
            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation(array($model, $modelT));

            $model->attributes = $_POST['Trabajo'];
            $modelT->attributes = $_POST['Turno'];

            if ($model->ASEO_ID_ASEO === 8)
                $model->scenario = 'bano';
            else {
                switch ($model->ESTADO_ID_ESTADO) {
                    case 1:
                        $model->scenario = 'ok';
                        break;
                    case 2:
                        $model->scenario = 'pendiente';
                        break;
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                        $model->scenario = 'laneco';
                        break;
                    case 9:
                        $model->scenario = 'nula';
                        break;
                }
            }

            if ($model->validate() && $modelT->validate()) {

                if ($model->ESTADO_ID_ESTADO != 2 && $model->ESTADO_ID_ESTADO != 9) {
                    if (Trabajo::model()->exists("ASEO_ID_ASEO=" . $model->ASEO_ID_ASEO . " AND AVION_MATRICULA='" . $model->AVION_MATRICULA . "'")) {

                        $result = Trabajo::model()->findAllByAttributes(array("ASEO_ID_ASEO" => $model->ASEO_ID_ASEO, "AVION_MATRICULA" => $model->AVION_MATRICULA), array('order' => 'FECHA DESC', 'limit' => 1));
                        $date = new DateTime($result[0]['FECHA']);
                        $dateNow = new DateTime($model->FECHA);
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                        //var_dump($date->format('Y-m-d H:i:s').":".$dateNow->format('Y-m-d H:i:s').":".$interval);
                    } else {
                        $date = new DateTime($model->FECHA);
                        $dateNow = new DateTime();
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                    }
                } else {
                    $model->ULTIMO_ASEO = 0;
                }

                if (!is_dir(Yii::getPathOfAlias('webroot') . '/images/')) {
                    mkdir(Yii::getPathOfAlias('webroot') . '/images/');
                    chmod(Yii::getPathOfAlias('webroot') . '/images/', 0755);
                    // the default implementation makes it under 777 permission, which you could possibly change recursively before deployment, but here's less of a headache in case you don't
                }

                $var = Turno::model()->findAll(array('condition' => 'FECHA=:date AND TIPO_TURNO_ID_TIPO_TURNO=:tt', 'order' => 'FECHA ASC', 'limit' => '1', 'params' => array(':date' => $modelT->FECHA, ':tt' => $modelT->TIPO_TURNO_ID_TIPO_TURNO)));

                $model->TURNO_ID_TURNO = $var[0]['ID_TURNO'];

                $images = CUploadedFile::getInstancesByName('imagen');

                if (isset($images) && count($images) > 0) {

                    $images_path = realpath(Yii::app()->basePath . '/../images');

                    $i = 1;
                    foreach ($images as $image => $pic) {
                        $path = $images_path . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
                        $real_p = Yii::app()->baseUrl . '/images' . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
                        if ($pic->saveAs($path)) {
                            switch ($i) {
                                case 1:
                                    $model->ARCHIVO1 = $real_p;
                                    break;
                                case 2:
                                    $model->ARCHIVO2 = $real_p;
                                    break;
                                case 3:
                                    $model->ARCHIVO3 = $real_p;
                                    break;
                            }
                        } else {
                            
                        }
                        // handle the errors here, if you want
                        $i++;
                    }
                    $model->save(false);
                    $this->render('create', array(
                        'model' => new Trabajo('inicio'),
                        'modelT' => new Turno,
                        'success' => true,
                    ));
                    exit;
                } else {

                    $model->save(false);
                    $this->render('create', array(
                        'model' => new Trabajo('inicio'),
                        'modelT' => new Turno,
                        'success' => true,
                    ));
                    exit;
                }
            }
        }

        $model = new Trabajo('inicio');
        $modelT = new Turno;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation(array($model, $modelT));


        if (isset($_POST['Trabajo'], $_POST['Turno'])) {

            $model->attributes = $_POST['Trabajo'];
            $modelT->attributes = $_POST['Turno'];

            if ($model->ASEO_ID_ASEO === 8)
                $model->scenario = 'bano';
            else {
                switch ($model->ESTADO_ID_ESTADO) {
                    case 1:
                        $model->scenario = 'ok';
                        break;
                    case 2:
                        $model->scenario = 'pendiente';
                        break;
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                        $model->scenario = 'laneco';
                        break;
                    case 9:
                        $model->scenario = 'nula';
                        break;
                }
            }

            if ($model->validate() && $modelT->validate() && isset($_POST['buttonSubmit'])) {

                if ($model->ESTADO_ID_ESTADO != 2 && $model->ESTADO_ID_ESTADO != 9) {
                    if (Trabajo::model()->exists("ASEO_ID_ASEO=" . $model->ASEO_ID_ASEO . " AND AVION_MATRICULA='" . $model->AVION_MATRICULA . "'")) {

                        $result = Trabajo::model()->findAllByAttributes(array("ASEO_ID_ASEO" => $model->ASEO_ID_ASEO, "AVION_MATRICULA" => $model->AVION_MATRICULA), array('order' => 'FECHA DESC', 'limit' => 1));
                        $date = new DateTime($result[0]['FECHA']);
                        $dateNow = new DateTime($model->FECHA);
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                    } else {
                        $date = new DateTime($model->FECHA);
                        $dateNow = new DateTime();
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                    }
                } else {
                    $model->ULTIMO_ASEO = 0;
                }

                if (!is_dir(Yii::getPathOfAlias('webroot') . '/images/')) {
                    mkdir(Yii::getPathOfAlias('webroot') . '/images/');
                    chmod(Yii::getPathOfAlias('webroot') . '/images/', 0755);
                    // the default implementation makes it under 777 permission, which you could possibly change recursively before deployment, but here's less of a headache in case you don't
                }


                $var = Turno::model()->findAll(array('condition' => 'FECHA=:date AND TIPO_TURNO_ID_TIPO_TURNO=:tt', 'order' => 'FECHA ASC', 'limit' => '1', 'params' => array(':date' => $modelT->FECHA, ':tt' => $modelT->TIPO_TURNO_ID_TIPO_TURNO)));

                $model->TURNO_ID_TURNO = $var[0]['ID_TURNO'];

                $images = CUploadedFile::getInstancesByName('imagen');

                if (isset($images) && count($images) > 0) {

                    $images_path = realpath(Yii::app()->basePath . '/../images');

                    $i = 1;
                    foreach ($images as $image => $pic) {
                        $path = $images_path . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
                        $real_p = Yii::app()->baseUrl . '/images' . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
                        if ($pic->saveAs($path)) {
                            switch ($i) {
                                case 1:
                                    $model->ARCHIVO1 = $real_p;
                                    break;
                                case 2:
                                    $model->ARCHIVO2 = $real_p;
                                    break;
                                case 3:
                                    $model->ARCHIVO3 = $real_p;
                                    break;
                            }
                        } else {
                            
                        }
                        // handle the errors here, if you want
                        $i++;
                    }
                    $model->save(false);
                    $this->render('create', array(
                        'model' => new Trabajo('inicio'),
                        'modelT' => new Turno,
                        'success' => true,
                    ));
                    exit;
                } else {

                    $model->save(false);
                    $this->render('create', array(
                        'model' => new Trabajo('inicio'),
                        'modelT' => new Turno,
                        'success' => true,
                    ));
                    exit;
                }
            }
        }


        if (!Yii::app()->request->isAjaxRequest) {
            $this->render('create', array(
                'model' => $model,
                'modelT' => $modelT,
                'success' => false,
            ));
        }
    }

    public function actionUpdate($id) {
        
        $model = $this->loadModel($id);
        if ($model->TURNO_ID_TURNO != null)
            $modelT = $this->loadModelT($model->TURNO_ID_TURNO);
        else
            $modelT = new Turno;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if ($model->HORA_INICIO != NULL) {
            $hinicio_array = explode(':', $model->HORA_INICIO);
            $model->HORA_INICIO = $hinicio_array[0] . ':' . $hinicio_array[1];
        }
        if ($model->HORA_TERMINO != NULL) {
            $htermino_array = explode(':', $model->HORA_TERMINO);
            $model->HORA_TERMINO = $htermino_array[0] . ':' . $htermino_array[1];
        }
        if ($model->PLAN_INICIO != NULL) {
            $hinicio_array = explode(':', $model->PLAN_INICIO);
            $model->PLAN_INICIO = $hinicio_array[0] . ':' . $hinicio_array[1];
        }
        if ($model->PLAN_TERMINO != NULL) {
            $htermino_array = explode(':', $model->PLAN_TERMINO);
            $model->PLAN_TERMINO = $htermino_array[0] . ':' . $htermino_array[1];
        }
        if (isset($_POST['Trabajo'], $_POST['Turno'])) {


            $model->attributes = $_POST['Trabajo'];
            $modelT->attributes = $_POST['Turno'];


            if ($model->ASEO_ID_ASEO === 8)
                $model->scenario = 'bano';
            else {
                switch ($model->ESTADO_ID_ESTADO) {
                    case 1:
                        $model->scenario = 'ok';
                        break;
                    case 2:
                        $model->scenario = 'pendiente';
                        break;
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                        $model->scenario = 'laneco';
                        break;
                    case 9:
                        $model->scenario = 'nula';
                        break;
                }
            }

            if ($model->validate() && $modelT->validate() && isset($_POST['buttonSubmit']) || isset($_POST['update'])) {

                if ($model->ESTADO_ID_ESTADO != 2 && $model->ESTADO_ID_ESTADO != 9) {
                    if (Trabajo::model()->exists("ASEO_ID_ASEO=" . $model->ASEO_ID_ASEO . " AND AVION_MATRICULA='" . $model->AVION_MATRICULA . "'")) {

                        $result = Trabajo::model()->findAllByAttributes(array("ASEO_ID_ASEO" => $model->ASEO_ID_ASEO, "AVION_MATRICULA" => $model->AVION_MATRICULA), array('order' => 'FECHA DESC', 'limit' => 1));
                        $date = new DateTime($result[0]['FECHA']);
                        $dateNow = new DateTime($model->FECHA);
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                        //var_dump($date->format('Y-m-d H:i:s').":".$dateNow->format('Y-m-d H:i:s').":".$interval);
                    } else {
                        $date = new DateTime($model->FECHA);
                        $dateNow = new DateTime();
                        $interval = $date->diff($dateNow)->d;
                        $model->ULTIMO_ASEO = $interval;
                    }
                } else {
                    $model->ULTIMO_ASEO = 0;
                }

                if (!is_dir(Yii::getPathOfAlias('webroot') . '/images/')) {
                    mkdir(Yii::getPathOfAlias('webroot') . '/images/');
                    chmod(Yii::getPathOfAlias('webroot') . '/images/', 0755);
                    // the default implementation makes it under 777 permission, which you could possibly change recursively before deployment, but here's less of a headache in case you don't
                }


                $var = Turno::model()->findAll(array('condition' => 'FECHA=:date AND TIPO_TURNO_ID_TIPO_TURNO=:tt', 'order' => 'FECHA ASC', 'limit' => '1', 'params' => array(':date' => $modelT->FECHA, ':tt' => $modelT->TIPO_TURNO_ID_TIPO_TURNO)));

                $model->TURNO_ID_TURNO = $var[0]['ID_TURNO'];

                $images = CUploadedFile::getInstancesByName('imagen');

                if (isset($images) && count($images) > 0) {

                    $images_path = realpath(Yii::app()->basePath . '/../images');

                    $i = 1;
                    foreach ($images as $image => $pic) {
                        $path = $images_path . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
                        $real_p = Yii::app()->baseUrl . '/images' . '/' . $model->AVION_MATRICULA . "-" . $model->FECHA . "-" . $model->ASEO_ID_ASEO . "-Foto" . $i . ".JPG";
                        if ($pic->saveAs($path)) {
                            switch ($i) {
                                case 1:
                                    $model->ARCHIVO1 = $real_p;
                                    break;
                                case 2:
                                    $model->ARCHIVO2 = $real_p;
                                    break;
                                case 3:
                                    $model->ARCHIVO3 = $real_p;
                                    break;
                            }
                        } else {
                            
                        }
                        // handle the errors here, if you want
                        $i++;
                    }
                }
                $model->save(false);
                $this->render('create', array(
                    'model' => new Trabajo('inicio'),
                    'modelT' => new Turno,
                    'success' => true,
                ));
                exit;
            }
        }

        $this->render('update', array(
            'model' => $model,
            'modelT' => $modelT,
            'success' => false,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        Nota::model()->deleteAll('TRABAJO_ID_TRABAJO=:id_trabajo', array(':id_trabajo' => $id));
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $dataProvider = new CActiveDataProvider('Trabajo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Trabajo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trabajo']))
            $model->attributes = $_GET['Trabajo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminPlan() {
        $model = new Trabajo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trabajo']))
            $model->attributes = $_GET['Trabajo'];
        $today = date('Y-m-d');
        $model->FECHA = $today;
        $model->PLANIFICADO = 1;
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminPend() {
        $model = new Trabajo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trabajo']))
            $model->attributes = $_GET['Trabajo'];
        /*
          $today= date('Y-m-d');
          $from= date('Y-m-d', strtotime($today . ' - 1 day'));
          $to= date('Y-m-d', strtotime($from . ' + 2 day'));
          $model->date_first=$from;
          $model->date_last=$to;
         */
        $model->ESTADO_ID_ESTADO = 2;
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminDesa() {
        $model = new Trabajo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trabajo']))
            $model->attributes = $_GET['Trabajo'];
        $today = date('Y-m-d');
        /*
          $from= date('Y-m-d', strtotime($today . ' - 1 day'));
          $to= date('Y-m-d', strtotime($from . ' + 2 day'));
          $model->date_first=$from;
          $model->date_last=$to;
         */
        $model->FECHA = $today;
        $model->ESTADO_ID_ESTADO = array(3, 4, 5, 6, 7, 8);
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminOk() {
        $model = new Trabajo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Trabajo']))
            $model->attributes = $_GET['Trabajo'];
        $today = date('Y-m-d');
        /*
          $from= date('Y-m-d', strtotime($today . ' - 1 day'));
          $to= date('Y-m-d', strtotime($from . ' + 2 day'));
          $model->date_first=$from;
          $model->date_last=$to;
         */
        $model->FECHA = $today;
        $model->ESTADO_ID_ESTADO = 1;
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Trabajo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Trabajo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelT($id) {
        $modelT = Turno::model()->findByPk($id);
        if ($modelT === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $modelT;
    }

    /**
     * Performs the AJAX validation.
     * @param Trabajo $model the model to be validated
     */
    protected function performAjaxValidation($models) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'trabajo-form') {
            echo CActiveForm::validate($models);
            Yii::app()->end();
        }
    }

    public function actionSearchOT()
        {   
                $regForm = $_POST["Trabajo"];
                $ot = $regForm["OT"];
                if($ot!='')
                    $dataTemp= Trabajo::model()->findAll('OT=:ot',array(':ot'=>$ot));
                else
                    $dataTemp=NULL;
                if(count($dataTemp)>0){
                    echo CJSON::encode('SI');
                }
                else
                    echo CJSON::encode('NO');
        }

}
