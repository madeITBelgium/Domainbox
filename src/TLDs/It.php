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
class It extends TLD
{
    protected $tld = '.it';
    protected $idnTLD = 'it';
    protected $dnsName = 'it';

    protected $periods = [1];
    protected $fee_registry = 6.9;
    protected $fee_renew = 6.9;
    protected $fee_transfer = 6.9;
    protected $fee_domainbox = 5;
    protected $fee_icann = 0;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 11.9;
    protected $fee_restore = 35;
    protected $fee_backorder = null;

    protected $type = 'ccTLD';

    protected $applyLock = true;
    protected $applyPrivacy = false;
    protected $numberOfNameServers = 6;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;

    protected $dnsVerification = true;

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
