<?php
/**
 * @file
 * Contains Drupal\my_database\Form\ReportForm.
 */

namespace Drupal\my_database\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the my_database entity edit forms.
 *
 * @ingroup content_entity_example
 */
class ReportForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\my_database\Entity\Report */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $form_state->setRedirect('entity.my_database_report.collection');
    $entity = $this->getEntity();
    $entity->save();
  }


}
