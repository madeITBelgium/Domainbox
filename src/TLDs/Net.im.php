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
class Netim extends TLD
{
    protected $tld = '.net.im';
    protected $idnTLD = 'net.im';
    protected $dnsName = 'net.im';

    protected $periods = [1, 2];
    protected $fee_registry = 9;
    protected $fee_renew = 9;
    protected $fee_transfer = 9;
    protected $fee_domainbox = 2;
    protected $fee_icann = 0;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 11;
    protected $fee_restore = null;
    protected $fee_backorder = null;

    protected $type = 'ccTLD';

    protected $applyLock = true;
    protected $applyPrivacy = true;
    protected $numberOfNameServers = 13;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;

    protected $refund = false;
    protected $refundPeriodAdd = 30;
    protected $refundPeriodTransfer = 0;
    protected $refundPeriodRenew = 0;
    protected $refundLimit = 10;

    public function __construct()
    {
        parent::__construct();
    }
}
