<?php

function my_database_migrate_finished_callback($success, $results, $operations) {
    // The 'success' parameter means no fatal PHP errors were detected. All
    // other error management should be handled using 'results'.
    if ($success) {
        $message = \Drupal::translation()->formatPlural(
            count($results),
            'One post created.', '@count posts created.'
        );
    }
    else {
        $message = t('Finished with an error.');
    }
    drupal_set_message($message);
    //$_SESSION['disc_migrate_batch_results'] = $results;
}



function generateRandomString($length = 10) {
    $characters = '012345 6789abc defghij klmnopqr stuvwxyz ABCDEFGHI JKLMNOPQ RSTUVWXYZ ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function my_database_change_date($type, &$context){

    if (empty($context['sandbox'])) {
        $context['sandbox'] = array();
        $context['sandbox']['progress'] = 0;
        $context['sandbox']['max'] = 10;
    }

    //for($i = 0; $i < 1; $i++){

        $randDate = rand(1452475369,1457475369);


        $record = array(
            'title' => generateRandomString(10),
            'created' => $randDate,
            'changed' => $randDate,
            'date' => $randDate,
            'description' => generateRandomString(20),
        );

        $context['results'][] = $record['title'];
        $context['message'] = $record['title'];

        db_insert('report')
            ->fields($record)
            ->execute();
        $context['sandbox']['progress']++;

    //}


    if ($context['sandbox']['progress'] != $context['sandbox']['max']) {
        $context['finished'] = ($context['sandbox']['progress'] >= $context['sandbox']['max']);
    }

    _batch_example_update_http_requests();
}

function _batch_example_update_http_requests() {
    $_SESSION['http_request_count']++;
}