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
class Coza extends TLD
{
    protected $tld = '.co.za';
    protected $idnTLD = 'co.za';
    protected $dnsName = 'co.za';

    protected $periods = [1];
    protected $fee_registry = 8.5;
    protected $fee_renew = 8.5;
    protected $fee_transfer = 8.5;
    protected $fee_domainbox = 3;
    protected $fee_icann = 0;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 11.5;
    protected $fee_restore = 35;
    protected $fee_backorder = null;

    protected $type = 'ccTLD';

    protected $applyLock = false;
    protected $applyPrivacy = false;
    protected $numberOfNameServers = 5;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;

    protected $refund = true;
    protected $refundPeriodAdd = 7;
    protected $refundPeriodTransfer = 0;
    protected $refundPeriodRenew = 0;
    protected $refundLimit = 10;

    public function __construct()
    {
        parent::__construct();
    }
}
