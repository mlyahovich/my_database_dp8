<?php
/**
 * @file
 * Contains Drupal\content_entity_example\Form\ContactSettingsForm.
 */

namespace Drupal\my_database\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Component\Serialization\Json;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;

/**
 * Class ContentEntityExampleSettingsForm.
 *
 * @package Drupal\content_entity_example\Form
 *
 * @ingroup content_entity_example
 */
class AllDeleteForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'my_database.report_delete';
  }


  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['report_settings']['link'] =  array(
        '#type' => 'submit',
        '#value' => 'Delete',
        '#attributes' => array(
            'class' => array('use-ajax'),
            'href' => '/my_database_report/alldeleteyes',
            'data-dialog-type' => 'modal',
            'data-dialog-options' => Json::encode(array(
                'width' => 400,
                'height' => 200,
            )),
        ),
    );

    $form['actions']['cancel'] = array(
      '#markup' => "<a href='/my_database_report/list'>".t('Cancel')."</a>",
    );

    return $form;

  }

  public function validateForm(array &$form, FormStateInterface $form_state){
    //drupal_set_message($this->t('Saved'));
  }


  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }

}
