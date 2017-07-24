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
class Pl extends TLD
{
    protected $tld = '.pl';
    protected $idnTLD = 'pl';
    protected $dnsName = 'pl';

    protected $periods = null;
    protected $fee_registry = 4.5;
    protected $fee_renew = 13.5;
    protected $fee_transfer = 0;
    protected $fee_domainbox = 3;
    protected $fee_icann = 0;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 7.5;
    protected $fee_restore = 25;
    protected $fee_backorder = null;

    protected $type = 'ccTLD';

    protected $applyLock = true;
    protected $applyPrivacy = false;
    protected $numberOfNameServers = 10;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;
    
    protected $refund = true;
    protected $refundPeriodAdd = 0;
    protected $refundPeriodTransfer = 0;
    protected $refundPeriodRenew = 0;
    protected $refundLimit = 0;

    public function __construct()
    {
        parent::__construct();
    }
}