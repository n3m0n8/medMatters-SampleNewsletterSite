<?php
function subscriptionError($subscribeError)
{
    $_SESSION['_subscription_error'] = $subscribeError;

    header('Location: '.$_SERVER['HTTP_REFERER'].'#status');
    //echo $subscribeError;
    die();
}

function subscriptionSuccess()
{
    $_SESSION['_subscription_success'] = true;

    header('Location: '.$_SERVER['HTTP_REFERER'].'#status');
    die();
}
?>