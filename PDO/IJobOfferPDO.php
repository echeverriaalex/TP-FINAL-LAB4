<?php
    namespace PDO;

    use Models\JobOffer as JobOffer;

    interface IJobOfferPDO
    {
        function Add(JobOffer $jobOffer);
        function GetAll();
    }
?>