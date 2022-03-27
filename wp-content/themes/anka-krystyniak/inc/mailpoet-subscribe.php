<?php

/**
 * Mailpoet subscribe handler
 *
 * @package anka-krystyniak
 */

function mailpoet_subscribe_handler()
{
    if (class_exists(\MailPoet\API\API::class)) {
        // Get MailPoet API instance
        $mailpoet_api = \MailPoet\API\API::MP('v1');

        // Fill subscribed data from $_POST (for simplicity it expects that subscriber field ids are used as input names)
        $subscriber = [];
        $subscriber_form_fields = $mailpoet_api->getSubscriberFields();
        foreach ($subscriber_form_fields as $field) {
            if (!isset($_POST[$field['id']])) {
                continue;
            }
            $subscriber[$field['id']] = $_POST[$field['id']];
        }
        // CHANGE LIST ID HERE
        $list_ids = array(4);

        // Check if subscriber exists. If subscriber doesn't exist an exception is thrown
        try {
            $get_subscriber = $mailpoet_api->getSubscriber($subscriber['email']);
        } catch (\Exception $e) {
        }

        try {
            if (!$get_subscriber) {
                // Subscriber doesn't exist let's create one
                $mailpoet_api->addSubscriber($subscriber, $list_ids);
            } else {
                // In case subscriber exists just add him to new lists
                $mailpoet_api->subscribeToLists($subscriber['email'], $list_ids);
            }
            echo json_encode(array('success' => true));
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            $error_code = $e->getCode();
            echo json_encode(array('success' => false, 'message' => $error_message, 'error' => $error_code));
        }
    }

    wp_reset_postdata();
    wp_die();
}

add_action('wp_ajax_newslettersubscribe', 'mailpoet_subscribe_handler');
add_action('wp_ajax_nopriv_newslettersubscribe', 'mailpoet_subscribe_handler');
