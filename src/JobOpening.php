<?php
    class JobOpening {
        private $title;
        private $description;
        private $contact_info;

        function __construct($title, $description, $contact_info)
        {
            $this->title = $title;
            $this->description = $description;
            $this->contact_info = $contact_info;
        }

        function getTitle()
        {
            return $this->title;
        }

        function getDescription()
        {
            return $this->description;
        }

        function getContact()
        {
            return $this->contact_info;
        }
    }
?>
