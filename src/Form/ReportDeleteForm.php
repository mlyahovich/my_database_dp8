<?php

/**
 * @file
 * Contains \Drupal\my_database\Form\ReportDeleteForm.
 */

namespace Drupal\my_database\Form;

use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a form for deleting a my_database entity.
 *
 * @ingroup my_database
 */
class ReportDeleteForm extends ContentEntityConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {

    return $this->t('Are you sure you want to delete entity %title?', array('%title' => $this->entity->title->value));
  }

  /**
   * {@inheritdoc}
   *
   * If the delete command is canceled, return to the contact list.
   */
  public function getCancelUrl() {
    return new Url('entity.my_database_report.collection');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }

  /**
   * {@inheritdoc}
   *
   * Delete the entity and log the event. logger() replaces the watchdog.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->delete();

    $this->logger('my_database')->notice('deleted %title.',
      array(
//        '@type' => $this->entity->bundle(),
//        '%title' => $this->entity->label(),
        '%title' => $this->entity->title->value,
      ));
    $form_state->setRedirect('entity.my_database_report.collection');
  }

}
