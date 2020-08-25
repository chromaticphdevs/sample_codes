<?php   
    $module = [];
    /**
     * COMPANY MODULE
     */
    
     $module['order'] = [
         'status' => [
             'delivered',
             'pending',
             'cancelled',
             'finished'
         ]
     ];


     $module['courier'] = [
         'list' => [
             'LBC',
             'BG-Courier',
             'Go Go Express'
         ]
     ];

     $module['payroll'] = [
        'types' => [
            'G-CASH',
            'BANK',
            'REMITTANCE'
        ]
     ];
    return $module;