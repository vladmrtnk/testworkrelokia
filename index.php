<?php
require "vendor/autoload.php";
use App\Insert;
use App\Query;

$titles = [
    'Ticket ID', 'Description', 'Status', 'Priority', 'Agent', 'ID', 'Agent Name', 'Agent Email',
    'Contact ID', 'Contact Name', 'Contact Email', 'Group ID', 'Group Name', 'Company ID',
    'Company Name', 'Comments'
];
//Викликається метод для запису тайтлів в файл
Insert::InsertTitlesToFile($titles);

for($id = 1; ; $id++){
    $tickets = Query::GetTickets($id);

    if($tickets != 404){
        $users = Query::GetUsers($tickets['requester_id']);
        $agents = Query::GetUsers($tickets['assignee_id']);
        $groups = Query::GetGroups($tickets['group_id']);
        $organization = Query::GetOrganizations($tickets['organization_id']);
        $values = [
            $tickets['id'],
            $tickets['description'],
            $tickets['status'],
            $tickets['priority'],
            $agents['role'],
            $tickets['assignee_id'],
            $agents['name'],
            $agents['email'],
            $tickets['requester_id'],
            $users['name'],
            $users['email'],
            $tickets['group_id'],
            $groups,
            $tickets['organization_id'],
            $organization,
            $tickets['coment']['body']
        ];

        Insert::InsertValuesToFile($values);
    }

}
