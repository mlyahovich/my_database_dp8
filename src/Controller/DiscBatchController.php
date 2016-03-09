<?php


/**
 * @file
 * Contains \Drupal\my_database\Controller\DiscBatchController.
 */




namespace Drupal\my_database\Controller;


class DiscBatchController {

    public function content() {

        $operations = array();
        for($i = 0; $i < 100; $i++) {
            $operations[] = array('my_database_change_date', array($i));
        }

        $batch = array(
            'title' => t('Exporting'),
            'operations' => $operations,
            'finished' => 'my_database_migrate_finished_callback',
            'file' => drupal_get_path('module', 'my_database') . '/migrate.inc',
        );

        batch_set($batch);
        return batch_process('/my_database_report/list');
    }

}
