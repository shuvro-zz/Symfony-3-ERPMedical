<?php
/* Indicamos el namespace del Bundle                     ******************************************************/
	namespace AppBundle\Form;
/**************************************************************************************************************/
	use Symfony\Component\Form\AbstractType;                // Clase necesario para AbstractType
	use Symfony\Component\Form\FormBuilderInterface;        // Clase necesario para AbstractType
	use Symfony\Component\OptionsResolver\OptionsResolver;  // Clase necesario para AbstractType
/**************************************************************************************************************/
/* Añadimos los componentes que permitirán el uso de EntityField **********************************************/
	/*
	 * EntityType permite mostrar en el formulario un listado de opciones procedente
	 * de otro formulario
	 */
/* Añadimos los componentes que permitirán el uso de nuevas clases ********************************************/
	use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
	use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
/**************************************************************************************************************/
class UserPermissionType extends AbstractType {
/* CONSTRUCTOR DEL FORMULARIO *********************************************************************************/
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
		/* ADMIN **********************************************************************************************/
			->add('adminSectionAccess', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('adminGeneralDataAccess', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/			
		/* USER ***********************************************************************************************/
			->add('userCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('userEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('userRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('userDumpView', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('userPermission', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* CLINIC *********************************************************************************************/
			->add('clinicViewOther', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('clinicCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('clinicEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('clinicRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* MEDICAL HISTORY ************************************************************************************/
			->add('medicalHistoryCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryRegistrationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryUserRegistererEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryModificationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryUserModifierEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* MEDICAL HISTORY DOC ********************************************************************************/
			->add('medicalHistoryDocCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryDocEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryDocRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryDocRegistrationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryDocUserRegistererEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryDocModificationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('medicalHistoryDocUserModifierEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* ORTHOPODOLOGY HISTORY ******************************************************************************/
			->add('orthopodologyHistoryCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryRegistrationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryUserRegistererEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryModificationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryUserModifierEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* ORTHOPODOLOGY HISTORY DOC **************************************************************************/
			->add('orthopodologyHistoryDocCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryDocEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryDocRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryDocRegistrationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryDocUserRegistererEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryDocModificationDateEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('orthopodologyHistoryDocUserModifierEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* TRACING ********************************************************************************************/
			->add('tracingCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('tracingEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('tracingRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/
		/* SERVICE ********************************************************************************************/
			->add('serviceCreate', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('serviceEdit', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
			->add('serviceRemove', CheckboxType::class, array(
				'required'=>true,
				'value'=>true,
				'attr'=>array('class'=>'js-switch', 'style' => 'display:none', 'data-sqitchery'=>true)
			))
		/******************************************************************************************************/		
			->add('Editar',SubmitType::class, array(
				'attr'=>array('class'=>'form-submit btn btn-success')
			));
	}
/**************************************************************************************************************/
/* DEFINIMOS LA ENTIDAD DONDE SE INCLUIRAN LOS DATOS EN LA BD *************************************************/
	public function configureOptions(OptionsResolver $resolver)    {
		$resolver->setDefaults(array('data_class' => 'BackendBundle\Entity\UserPermission'));
	}
/**************************************************************************************************************/
}
