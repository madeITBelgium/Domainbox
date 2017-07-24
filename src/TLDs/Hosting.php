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
class Hosting extends TLD
{
    protected $tld = '.hosting';
    protected $idnTLD = 'hosting';
    protected $dnsName = 'hosting';

    protected $periods = null;
    protected $fee_registry = 40;
    protected $fee_renew = 40;
    protected $fee_transfer = 40;
    protected $fee_domainbox = 7;
    protected $fee_icann = 0.18;
    protected $fee_setup = 0;
    protected $fee_application = 0;
    protected $fee_total = 47.18;
    protected $fee_restore = 90;
    protected $fee_backorder = null;

    protected $type = 'gTLD';

    protected $extension = [
        'ChallengeParameters' => [
            'ChallengeQuestion' => ['type' => 'string', 'required' => true],
            'ChallengeAnswer'   => ['type' => 'string', 'required' => true],
        ],
    ];
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
