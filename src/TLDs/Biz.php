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
class Biz extends TLD
{
    protected $tld = '.biz';
    protected $idnTLD = 'biz';
    protected $dnsName = 'biz';

    protected $periods = null;
    protected $fee_registry = 11.48;
    protected $fee_renew = 11.48;
    protected $fee_transfer = 11.48;
    protected $fee_domainbox = 2;
    protected $fee_icann = 0.18;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 13.66;
    protected $fee_restore = 65;
    protected $fee_backorder = 40;

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

    public function __construct()
    {
        parent::__construct();
    }
}
