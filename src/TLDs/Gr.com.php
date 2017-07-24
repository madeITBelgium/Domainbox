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
class Grcom extends TLD
{
    protected $tld = '.gr.com';
    protected $idnTLD = 'gr.com';
    protected $dnsName = 'gr.com';

    protected $periods = null;
    protected $fee_registry = 15;
    protected $fee_renew = 15;
    protected $fee_transfer = 15;
    protected $fee_domainbox = 5;
    protected $fee_icann = 0;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 20;
    protected $fee_restore = 25;
    protected $fee_backorder = 40;

    protected $type = 'pTLD';

    protected $applyLock = true;
    protected $applyPrivacy = true;
    protected $numberOfNameServers = 13;
    protected $dnssec = false;
    protected $ipv6 = true;
    protected $ipv4 = true;

    protected $refund = true;
    protected $refundPeriodAdd = 'END OF MONTH';
    protected $refundPeriodTransfer = 5;
    protected $refundPeriodRenew = 5;
    protected $refundLimit = 0;

    public function __construct()
    {
        parent::__construct();
    }
}