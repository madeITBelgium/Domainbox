<?php

namespace MadeITBelgium\Domainbox\TLDs;

/**
 * Domainbox API.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2017 Made I.T. (http://www.madeit.be)
 * @author     Made I.T. <info@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class Wien extends TLD
{
    protected $tld = '.wien';
    protected $idnTLD = 'wien';
    protected $dnsName = 'wien';

    protected $periods = null;
    protected $fee_registry = 24.46;
    protected $fee_renew = 24.46;
    protected $fee_transfer = 24.46;
    protected $fee_domainbox = 7;
    protected $fee_icann = 0.18;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 31.64;
    protected $fee_restore = 73.92;
    protected $fee_backorder = null;

    protected $type = 'gTLD';

    protected $applyLock = true;
    protected $applyPrivacy = true;
    protected $numberOfNameServers = 13;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;

    protected $refund = true;
    protected $refundPeriodAdd = 5;
    protected $refundPeriodTransfer = 5;
    protected $refundPeriodRenew = 5;
    protected $refundLimit = 10;

    protected $registerText = 'In the case of .WIEN domain names You understand and agree that the following persons are eligible for registration of a Registry TLD: any natural person, legal person, organization or association intending to show an economic, cultural, tourist, historical, social or other affinity with the Austrian federal capital: WIEN [Vienna]. There is no verification procedure carried out at the point of registration to verify whether You have the required relations to Vienna, however fulfilment of the nexus conditions can be reviewed by initiating alternative dispute resolution procedures ("Eligibility Requirements Dispute Resolution Policy", available at http://www.nic.wien/fileadmin/punktwien/policies/20140129_ERDRP-Rules_V1.pdf).';

    public function __construct()
    {
        parent::__construct();
    }
}