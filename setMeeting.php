<?php

function setMeeting(){
    $to = 'aurelien.bigois@outlook.com';
    $subject = "Meeting";

    $organizer          = 'Aurelien Bigois';
    $organizer_email    = 'shift976@gmail.com';

    $participant_name_1 = 'Aurelien Bigois';
    $participant_email_1= 'aurelien.bigois@outlook.com';

    $location           = "Cube";
    $date               = '20131026';
    $startTime          = '0800';
    $endTime            = '0900';
    $subject            = 'Meeting';
    $desc               = 'Test meeting';

    $headers = 'Content-Type:text/calendar; Content-Disposition: inline; charset=utf-8;\r\n';
    $headers .= "Content-Type: text/plain;charset=\"utf-8\"\r\n"; #EDIT: TYPO

    $message = "BEGIN:VCALENDAR\r\n
    VERSION:2.0\r\n
    PRODID:-//Deathstar-mailer//theforce/NONSGML v1.0//EN\r\n
    METHOD:REQUEST\r\n
    BEGIN:VEVENT\r\n
    UID:" . md5(uniqid(mt_rand(), true)) . "example.com\r\n
    DTSTAMP:" . gmdate('Ymd').'T'. gmdate('His') . "Z\r\n
    DTSTART:".$date."T".$startTime."00Z\r\n
    DTEND:".$date."T".$endTime."00Z\r\n
    SUMMARY:".$subject."\r\n
    ORGANIZER;CN=".$organizer.":mailto:".$organizer_email."\r\n
    LOCATION:".$location."\r\n
    DESCRIPTION:".$desc."\r\n
    ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN".$participant_name_1.";X-NUM-GUESTS=0:MAILTO:".$participant_email_1."\r\n
    END:VEVENT\r\n
    END:VCALENDAR\r\n";

    $headers .= $message;
    mail($to, $subject, $message, $headers);  
}

if(setMeeting()){echo "email sent";}else{echo "fail";}	




?>