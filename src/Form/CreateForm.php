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
class CreateForm extends FormBase {
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

    $form['button'] = array(
        '#type' => 'button',
        '#value' => t('Ok'),

    );


    $form['#action'] = "/my_database_report/createyes";


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

    drupal_set_message($this->t('The configuration options have been saved.'));
  }

}
