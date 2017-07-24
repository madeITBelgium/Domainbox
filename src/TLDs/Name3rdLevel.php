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
class Name3rdLevel extends TLD
{
    protected $tld = '.name (3rd level)';
    protected $idnTLD = 'name (3rd level)';
    protected $dnsName = 'name (3rd level)';

    protected $periods = null;
    protected $fee_registry = 5.77;
    protected $fee_renew = 5.77;
    protected $fee_transfer = 5.77;
    protected $fee_domainbox = 2;
    protected $fee_icann = 0.18;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 7.95;
    protected $fee_restore = null;
    protected $fee_backorder = null;

    protected $type = 'gTLD';

    protected $applyLock = true;
    protected $applyPrivacy = true;
    protected $numberOfNameServers = 13;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;

    protected $refund = false;
    protected $refundPeriodAdd = 5;
    protected $refundPeriodTransfer = 5;
    protected $refundPeriodRenew = 5;
    protected $refundLimit = 10;

    public function __construct()
    {
        parent::__construct();
    }
}
