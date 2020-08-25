<?php   

##UPDATE INSERTED CONTACTS
function update_contacts()
{

    $db = Database::getInstance();
    
    $account_id = Auth::get('user')->id;

    $customers = $this->customer->getAccountCustomers($account_id);

    foreach($customers as $key => $row) 
    {
        foreach($row->contacts as $contact) 
        {
            $newVal = $contact->value;
            $type   = $contact->type;

            if($type == 'mobile') {
                $newVal = str_to_mobile($newVal);
            }

            if($type == 'email') {
                $newVal = str_to_email($newVal);
            }
            
            if($type == 'tel') {
                $newVal = trim($newVal);
            }

            $db->query(
                "UPDATE cb_customer_contacts set value = '{$newVal}'
                    WHERE id = '{$contact->id}'"
            );

            $db->execute();
        }
    }
}
?>