<?php
    namespace App\Enums;

    enum OrderStatusEnum{
        const ACCEPT        = 'accept';
        const CANCEL        = 'cancel';
        const PENDING       = 'pending';
        const DELIVERED     = 'delivered';
    }
?>