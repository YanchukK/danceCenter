<?php
/**
 * Created by PhpStorm.
 * User: марк
 * Date: 01.05.2018
 * Time: 10:14
 */

namespace App\Traits;


trait GroupsForOneCustomer
{
    public function customerGroups($allGroups, $email) {
//        $email = Auth::user()->email;

        foreach ($allGroups->all() as $groupItems)
        { // SEARCH CURRENT CUSTOMER ID

            if ($groupItems->customers->where('email', $email))
            {
                $customerId = $groupItems->customers->where('email', $email)->first()->id; // todo maybe must be array
                break;
            }
        }

        foreach ($allGroups->all() as $groupItems) {
            $pivots[] = $groupItems->customers->first()->pivot;
        }
//todo Найти пользователей с пивот айди
//todo написать метод для вывода пользователей без форИч
//todo Возможно создать колонку в юзерах з кастомер айди или тичер айди, скорее всего нужно создать, лучше создать отдельный метод

        foreach ($pivots as $pivot) {  // SEARCH GROUPS with CUSTOMERS ids
            if ($customerId == $pivot->customer_id) {
                $groupsArray[] = $allGroups->where('id', $pivot->group_id)->get();
            }
        }

        foreach ($groupsArray as $groups) { // collection in collection TO collection
            $groupsToCollect[] = $groups->first();
        }

        return $groups = collect($groupsToCollect);
    }

}