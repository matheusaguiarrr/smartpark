<?php
    $errors = [];
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message']; ?>
            <div role="alert" class="alert alert-<?= $_SESSION['message']['type'] ?>">
                <?= $_SESSION['message']['message'] ?>
            </div>
        <?php
        unset($_SESSION['message']);
    }
    elseif(isset($exception)){
        $message = [
            'type' => 'error',
            'message' => $exception->getMessage()
        ];
        if(get_class($exception) === 'ValidationException'){
            $errors = $exception->getErrors();
        }
    }
    /* // $alertType = '';
    if(isset($message['type']) && $message['type'] === 'error'){
        $alertType = 'danger';
        $alertMessage = $message['message'];
    }
    else if(isset($message['type']) && $message['type'] === 'success'){
        $alertType = 'success';
        $alertMessage = $message['message'];
    }
?>
<?php if (isset($alertMessage)) : ?>
    <div role="alert" class="my-3 alert alert-<?= $alertType ?>">
        <?= $alertMessage ?>
    </div>
<?php endif */ ?>