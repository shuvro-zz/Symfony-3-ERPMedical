<?php
/* Indicamos el namespace del Bundle                     ******************************************************/
	namespace AppBundle\Controller;
/* COMPONENTES BÁSICOS DEL CONTROLADOR ************************************************************************/
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
/* COMPONENTES SESSIÓN ****************************************************************************************/
	use Symfony\Component\HttpFoundation\Session\Session;
/* Añadimos las ENTIDADES que usaremos ************************************************************************/
	use BackendBundle\Entity\Clinic;        		// Da acceso a la Entidad Clinica
/* Añadimos los FORMULARIOS que usaremos **********************************************************************/
	use AppBundle\Form\ClinicType;          // Da acceso al Formulario MedicalHistoryPatientType
/**************************************************************************************************************/
class ClinicController extends Controller {
/* OBJETO SESSIÓN - Para activar las sesiones inicializamos la variable e incluimos en ella el objeto Session()
 * No olvidar dar acceso al componenete de Symfony Session() permitirá usar los mensajes FLASHBAG             */
	private $session;
	public function __construct(){ $this->session = new Session(); }
/**************************************************************************************************************/
/* MÉTODO PARA CREAR CLÍNICA **********************************************************************************/
	public function clinicCreateAction(Request $request) {
		/* CARGA INICIAL **************************************************************************************/
		$em = $this->getDoctrine()->getManager();
		$userlogged = $this->getUser();	// extraemos el usuario de la sessión
		/* INTRODUCE INFORMACIÓN SESIÓN USUARIO  **************************************************************/
		$setUserInformation = $em->getRepository("BackendBundle:UserSession")->setUserInformation($userlogged, $request);
		/* EXTRAE PERMISOS DEL USUARIO  ***********************************************************************/
		$permissionLoggedUser = $em->getRepository("BackendBundle:UserPermission")->findOneByIdUser($userlogged);
		/******************************************************************************************************/
		$clinic = new Clinic();
		// Creamos el formulario
		$formClinicCreate = $this->createForm(ClinicType::class, $clinic);
		// Pasamos los datos de la petición del formulario y los pase a la entidad
		$formClinicCreate->handleRequest($request);
		if($formClinicCreate->isSubmitted()){
			if($formClinicCreate->isValid()){
				$em = $this->getDoctrine()->getManager();
				// Hacemos la consulta
				$name = $formClinicCreate->get("name")->getData();
				$clinic->setName($name);
				$clinic->setPhone($formClinicCreate->get("phone")->getData());
				$clinic->setAddress($formClinicCreate->get("address")->getData());
				$clinic->setIdUserRegisterer($user);
				$clinic->setRegistrationDate(new \DateTime("now"));
				$clinic->setIdUserModifier($user);
				$clinic->setModificationDate(new \DateTime("now"));
				/* Name URL ***********************************************************************************/
				$nameWithoutUpper = strtolower( $name );
				$nameWithoutSpaces = str_replace( " ", "_", $nameWithoutUpper );
				$clinic->setNameUrl($nameWithoutSpaces);
				/**********************************************************************************************/
				// persistimos los datos dentro de Doctirne
				$em->persist($clinic);
				// guardamos los datos persistidos dentro de la BD
				$flush = $em->flush();
				// Si se guardan correctamente los datos en la BD
				$status = [
					'type'=>'success',
					'description'=>'Se ha creado una nueva Clínica'];
			}else{
				$status = [
					'type'=>'danger',
					'description'=>'No se ha creado la nueva Clínica correctamente'];
			}
			// generamos los mensajes FLASH (necesario activar las sesiones)
			$this->session->getFlashBag()->add("status", $status);
			return $this->redirectToRoute('admin_home');
		}
		// Enviamos el formulario y su vista a la plantilla TWIG
		return $this->render('AppBundle:Clinic:clinic_Create.html.twig',
			array(
				'formClinicCreate'=>$formClinicCreate->createView(),
				'permissionLoggedUser'=>$permissionLoggedUser
				 )
		);
	}
/**************************************************************************************************************/
/* MÉTODO PARA VER CLINICA ************************************************************************************/
	public function clinicViewAction(Request $request, $clinicNameUrl = null){
		/* CARGA INICIAL **************************************************************************************/
		$em = $this->getDoctrine()->getManager();
		$userlogged = $this->getUser();	// extraemos el usuario de la sessión
		/* INTRODUCE INFORMACIÓN SESIÓN USUARIO  **************************************************************/
		$setUserInformation = $em->getRepository("BackendBundle:UserSession")->setUserInformation($userlogged, $request);
		/* EXTRAE PERMISOS DEL USUARIO  ***********************************************************************/
		$permissionLoggedUser = $em->getRepository("BackendBundle:UserPermission")->findOneByUser($userlogged);
		/******************************************************************************************************/
		$clinic_repo = $em->getRepository("BackendBundle:Clinic");
		$clinic = $clinic_repo->findOneByNameUrl($clinicNameUrl);
		$addressCity_repo = $em->getRepository("BackendBundle:AddressCity");
		$addressCity = $addressCity_repo->findOneById($clinic->getCity());
		$clinicUser_repo = $em->getRepository("BackendBundle:ClinicUser");
		$clinicUser = $clinicUser_repo->findByClinic($clinic);
		$medicalHistory_repo = $em->getRepository("BackendBundle:MedicalHistory");
		$medicalHistoryRatioSex = $medicalHistory_repo->getRatioGenderQuery($clinicNameUrl);
		/* Por terminar... Estadísticas consulta
		$newUsersPerMonth = $medicalHistory_repo->getMedicalHistoryPerMonthQuery( $clinicNameUrl );
		*/
		$totalUser = $medicalHistory_repo->getTotalNumberMedicalHistoriesQuery( $clinicNameUrl );
		return $this->render('AppBundle:Clinic:clinic_View.html.twig',
			array(
				'permissionLoggedUser'=>$permissionLoggedUser,
				'clinic' => $clinic,
				'addressCity' => $addressCity,
				'clinicUser' => $clinicUser,
				'medicalHistoryRatioSex' => $medicalHistoryRatioSex,
				/*
				'newUsersPerMonth' => $newUsersPerMonth,
				*/
				'totalUser'=>$totalUser
			)
		);
	}
/**************************************************************************************************************/
}