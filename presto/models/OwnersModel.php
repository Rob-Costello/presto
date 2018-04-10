<?php
class ownersModel extends CI_Model{

    function getOwners( $where = array(), $request = null,  $limit = null, $offset = null ) {

        $owners = array();

        $where['role'] = 'customer';

        if( $limit )
            $where['number'] = $limit;

        if( $offset )
            $where['offset'] = $offset;

        $customers = get_users($where);

        foreach ( $customers as $customer ) {
            $owners[] = (object) array(
                'id' => $customer->ID,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'email_address' => $customer->user_email,
                'phone_number' => get_user_meta( $customer->ID, 'billing_phone', true ),
                'postcode' => get_user_meta( $customer->ID, 'billing_postcode', true ),
                );
        }

        return array( 'data' => $owners, 'count' => count_users()['avail_roles']['customer'] );

    }

}