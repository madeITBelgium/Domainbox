<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Response;
use MadeITBelgium\Domainbox\Domainbox;
use MadeITBelgium\Domainbox\Object\Contact;
use MadeITBelgium\Domainbox\Object\Domain;

class DomainTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    //checkDomainAvailability
    public function testUnavailableDomain()
    {
        $domainbox = new Domainbox('reseller', 'username', 'password', false);

        // Create a mock and queue two responses.

        $stream = Psr7\stream_for('{"d": {"AvailabilityStatus": 1, "AvailabilityStatusDescr": "Unavailable", "LaunchPhase": "GA", "DropDate": "2017-01-01", "BackOrderAvailable": false, "AdditionalResults": {}, "LaunchStep": "", "ResultCode": 100, "ResultMsg": "Command Successful", "TxID": "1b68172f-ca79-4fc4-9a04-f15a17b6abfc"}}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $domainbox->setClient($client);
        $domain = $domainbox->domain();
        $response = $domain->checkDomainAvailability('madeit.be', 'GA');

        $this->assertEquals('Unavailable', $response->getStatus());
        $this->assertEquals(false, $response->isAvailable());
        $this->assertEquals(false, $response->canBackOrder());
        $this->assertEquals('2017-01-01', $response->getDropDate());
        $this->assertEquals('GA', $response->getLaunchPhase());
    }

    public function testUnavailableBackOrderDomain()
    {
        $domainbox = new Domainbox('reseller', 'username', 'password', false);

        // Create a mock and queue two responses.

        $stream = Psr7\stream_for('{"d": {"AvailabilityStatus": 1, "AvailabilityStatusDescr": "Unavailable", "LaunchPhase": "GA", "DropDate": "", "BackOrderAvailable": true, "AdditionalResults": {}, "LaunchStep": "", "ResultCode": 100, "ResultMsg": "Command Successful", "TxID": "1b68172f-ca79-4fc4-9a04-f15a17b6abfc"}}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $domainbox->setClient($client);
        $domain = $domainbox->domain();
        $response = $domain->checkDomainAvailability('madeit.be', 'GA');

        $this->assertEquals('Unavailable', $response->getStatus());
        $this->assertEquals(false, $response->isAvailable());
        $this->assertEquals(true, $response->canBackOrder());
    }

    public function testUnavailableOfflineDomain()
    {
        $domainbox = new Domainbox('reseller', 'username', 'password', false);

        // Create a mock and queue two responses.

        $stream = Psr7\stream_for('{"d": {"AvailabilityStatus": 8, "AvailabilityStatusDescr": "UnavailableUsingOfflineLookup", "LaunchPhase": "GA", "DropDate": "", "BackOrderAvailable": true, "AdditionalResults": {}, "LaunchStep": "", "ResultCode": 100, "ResultMsg": "Command Successful", "TxID": "1b68172f-ca79-4fc4-9a04-f15a17b6abfc"}}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $domainbox->setClient($client);
        $domain = $domainbox->domain();
        $response = $domain->checkDomainAvailability('madeit.be', 'GA', true);

        $this->assertEquals('UnavailableOfflineLookup', $response->getStatus());
        $this->assertEquals(false, $response->isAvailable());
        $this->assertEquals(true, $response->canBackOrder());
    }

    public function testAvailableOfflineDomain()
    {
        $domainbox = new Domainbox('reseller', 'username', 'password', false);

        // Create a mock and queue two responses.

        $stream = Psr7\stream_for('{"d": {"AvailabilityStatus": 7, "AvailabilityStatusDescr": "AvailableUsingOfflineLookup", "LaunchPhase": "GA", "DropDate": "", "BackOrderAvailable": false, "AdditionalResults": {}, "LaunchStep": "", "ResultCode": 100, "ResultMsg": "Command Successful", "TxID": "1b68172f-ca79-4fc4-9a04-f15a17b6abfc"}}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $domainbox->setClient($client);
        $domain = $domainbox->domain();
        $response = $domain->checkDomainAvailability('madeit.be', 'GA', true);

        $this->assertEquals('AvailableOfflineLookup', $response->getStatus());
        $this->assertEquals(true, $response->isAvailable());
        $this->assertEquals(false, $response->canBackOrder());
    }

    public function testAvailableDomain()
    {
        $domainbox = new Domainbox('reseller', 'username', 'password', false);

        // Create a mock and queue two responses.

        $stream = Psr7\stream_for('{"d": {"AvailabilityStatus": 0, "AvailabilityStatusDescr": "Available", "LaunchPhase": "GA", "DropDate": "", "BackOrderAvailable": false, "AdditionalResults": {}, "LaunchStep": "", "ResultCode": 100, "ResultMsg": "Command Successful", "TxID": "1b68172f-ca79-4fc4-9a04-f15a17b6abfc"}}');
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $domainbox->setClient($client);
        $domain = $domainbox->domain();
        $response = $domain->checkDomainAvailability('madeit.be', 'GA', true);

        $this->assertEquals('Available', $response->getStatus());
        $this->assertEquals(true, $response->isAvailable());
        $this->assertEquals(false, $response->canBackOrder());
    }

    //checkDomainAvailabilityPlus
    public function testUnavailableDomainPlus()
    {
        $domainbox = new Domainbox('reseller', 'username', 'password', false);

        // Create a mock and queue two responses.

        $stream = Psr7\stream_for('{
  "d": {
    "DomainCheck": {
      "ResultCode": 100,
      "ResultMsg": "Domain Check completed successfully",
      "Domains": [
        {
          "ResultCode": 100,
          "ResultMsg": "Command Successful",
          "DomainName": "madeit.be",
          "AvailabilityStatus": 1,
          "AvailabilityStatusDescr": "Unavailable",
          "LaunchPhase": "GA",
          "DropDate": "",
          "BackOrderAvailable": false,
          "LaunchStep": "",
          "AdditionalResults": {}
        },
        {
          "ResultCode": 100,
          "ResultMsg": "Command Successful",
          "DomainName": "madeit.com",
          "AvailabilityStatus": 1,
          "AvailabilityStatusDescr": "Unavailable",
          "LaunchPhase": "GA",
          "DropDate": "",
          "BackOrderAvailable": true,
          "LaunchStep": "",
          "AdditionalResults": {}
        },
        {
          "ResultCode": 100,
          "ResultMsg": "Command Successful",
          "DomainName": "madeit.nl",
          "AvailabilityStatus": 0,
          "AvailabilityStatusDescr": "Available",
          "LaunchPhase": "GA",
          "DropDate": "",
          "BackOrderAvailable": false,
          "LaunchStep": "",
          "AdditionalResults": {}
        }
      ]
    },
    "NameSuggestions": {
      "ResultCode": 500,
      "ResultMsg": "Name Suggestions failed. Unable to get name Suggestions"
    },
    "TypoSuggestions": {
      "ResultCode": 500,
      "ResultMsg": "Typo Suggestions failed. Unable to get Typo Suggestions"
    },
    "PrefixSuffixSuggestions": {
      "ResultCode": 500,
      "ResultMsg": "Suffix/Prefix Suggestions failed. Unable to get Suffix/Prefix Suggestions"
    },
    "PremiumDomains": {
      "ResultCode": 100,
      "ResultMsg": "Command Successful",
      "Domains": [
        {
          "DomainName": "madeitmine.com",
          "Price": "1495.00",
          "FastTransfer": true
        },
        {
          "DomainName": "madeitup.com",
          "Price": "6099.00",
          "FastTransfer": true
        },
        {
          "DomainName": "madeitmatter.com",
          "Price": "1895.00",
          "FastTransfer": true
        },
        {
          "DomainName": "madeiteasy.com",
          "Price": "3599.00",
          "FastTransfer": true
        },
        {
          "DomainName": "madeityet.com",
          "Price": "349.00",
          "FastTransfer": true
        },
        {
          "DomainName": "madeitfunny.com",
          "Price": "250.00",
          "FastTransfer": false
        },
        {
          "DomainName": "MadeItHappen.com",
          "Price": "2288.00",
          "FastTransfer": true
        },
        {
          "DomainName": "madeitright.com",
          "Price": "2695.00",
          "FastTransfer": false
        },
        {
          "DomainName": "madeitsimple.com",
          "Price": "899.00",
          "FastTransfer": false
        },
        {
          "DomainName": "madeitdesign.com",
          "Price": "877.00",
          "FastTransfer": false
        }
      ]
    },
    "ResultCode": 100,
    "ResultMsg": "The following items failed (Name Suggestions, Typo Suggestions, Suffix/Prefix Suggestions)",
    "TxID": "9fb8f585-c43e-4d29-8fae-86110cd89adc"
  }
}'); //ResultCode changed from 210
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $stream),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $domainbox->setClient($client);
        $domain = $domainbox->domain();
        $response = $domain->checkDomainAvailabilityPlus('madeit.be');

        $this->assertEquals(3, count($response));

        $this->assertEquals('madeit.be', $response[0]->getDomainName());
        $this->assertEquals('Unavailable', $response[0]->getStatus());
        $this->assertEquals(false, $response[0]->isAvailable());
        $this->assertEquals(false, $response[0]->canBackOrder());

        $this->assertEquals('madeit.com', $response[1]->getDomainName());
        $this->assertEquals('Unavailable', $response[1]->getStatus());
        $this->assertEquals(false, $response[1]->isAvailable());
        $this->assertEquals(true, $response[1]->canBackOrder());

        $this->assertEquals('madeit.nl', $response[2]->getDomainName());
        $this->assertEquals('Available', $response[2]->getStatus());
        $this->assertEquals(true, $response[2]->isAvailable());
        $this->assertEquals(false, $response[2]->canBackOrder());
    }
    
    //register
    public function testRegisterGenerateDomainboxCommand() {
        //UK Domains
        $contact = new Contact("Tjebbe Lievens", "Made I.T.", "Somewhere in belgium", null, null, "Geel", "Antwerp", "2440", "BE", "+32.123456789", null, null, "info@madeit.be");
        
        $registerDomain = new Domain();
        $domainName = "maideit.co.uk";
        $launchPhase = "GA";
        $period = 1;
        $applyLock = true;
        $autoRenew = true;
        $autoRenewDays = 7;
        $applyPrivacy = false;
        $acceptTerms = true;
        $nameServers = ['ns1.madeit.be', 'ns2.madeit.be'];
        $glueRecords = [];
        $registrant = $contact;
        $admin = $contact;
        $tech = $contact;
        $billing = $contact;
        $trademark = null;
        $extension = null;
        $sunriseData = null;
        $commandOptions = null;
        $registerDomain->create($domainName, $launchPhase, $period, $applyLock, $autoRenew, $autoRenewDays, $applyPrivacy, $acceptTerms, $nameServers, $glueRecords, $registrant, $admin, $tech, $billing, $trademark, $extension, $sunriseData, $commandOptions);
        
        $this->assertEquals([
            'DomainName' => 'maideit.co.uk',
            'LaunchPhase' => "GA",
            'Period' => 1,
            'ApplyLock' => false,
            'AutoRenew' => true,
            'AutoRenewDays' => 7,
            'AcceptTerms' => true,
            'ApplyPrivacy' => false,
            'Contacts' => [
                'Registrant' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be',
                    'AdditionalData' => ['UKAdditionalData' => ''],
                ],
                'Admin' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be'
                ],
                'Billing' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be'
                ],
                'Tech' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be'
                ],
            ],
            'Extension' => ['UKDirectData' => ['RelatedDomainId' => 0]],
            'Nameservers' => [
                'NS1' => 'ns1.madeit.be',
                'NS2' => 'ns2.madeit.be',
                'NS3' => '',
                'NS4' => '',
                'NS5' => '',
                'NS6' => '', 
                'NS7' => '',
                'NS8' => '',
                'NS9' => '',
                'NS10' => '',
                'NS11' => '',
                'NS12' => '',
                'NS13' => '',
                'GlueRecords' =>[]
            ]
        ], $registerDomain->generateDomainboxCommand());
        
        
        
        
        
        $contact = new Contact("Tjebbe Lievens", "Made I.T.", "Somewhere in belgium", null, null, "Geel", "Antwerp", "2440", "BE", "+32.123456789", null, null, "info@madeit.be");
        
        $registerDomain = new Domain();
        $domainName = "maideit.be";
        $launchPhase = "GA";
        $period = 1;
        $applyLock = false;
        $autoRenew = true;
        $autoRenewDays = 7;
        $applyPrivacy = false;
        $acceptTerms = true;
        $nameServers = ['ns1.madeit.be', 'ns2.madeit.be'];
        $glueRecords = [];
        $registrant = $contact;
        $admin = $contact;
        $tech = $contact;
        $billing = $contact;
        $trademark = null;
        $extension = null;
        $sunriseData = null;
        $commandOptions = null;
        $registerDomain->create($domainName, $launchPhase, $period, $applyLock, $autoRenew, $autoRenewDays, $applyPrivacy, $acceptTerms, $nameServers, $glueRecords, $registrant, $admin, $tech, $billing, $trademark, $extension, $sunriseData, $commandOptions);
        
        $this->assertEquals([
            'DomainName' => 'maideit.be',
            'LaunchPhase' => "GA",
            'Period' => 1,
            'ApplyLock' => false,
            'AutoRenew' => true,
            'AutoRenewDays' => 7,
            'AcceptTerms' => true,
            'ApplyPrivacy' => false,
            'Contacts' => [
                'Registrant' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be',
                ],
                'Admin' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be'
                ],
                'Billing' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be'
                ],
                'Tech' => [
                    'Name' => 'Tjebbe Lievens',
                    'Organisation' => 'Made I.T.',
                    'Street1' => 'Somewhere in belgium',
                    'Street2' => "",
                    'Street3' => "",
                    'City' => 'Geel',
                    'State' => 'Antwerp',
                    'Postcode' => '2440',
                    'CountryCode' => 'BE',
                    'Telephone' => '+32.123456789',
                    'TelephoneExtension' => "",
                    'Fax' => "",
                    'Email' => 'info@madeit.be'
                ],
            ],
            //'Extension' => null,
            'Nameservers' => [
                'NS1' => 'ns1.madeit.be',
                'NS2' => 'ns2.madeit.be',
                'NS3' => '',
                'NS4' => '',
                'NS5' => '',
                'NS6' => '', 
                'NS7' => '',
                'NS8' => '',
                'NS9' => '',
                'GlueRecords' => []
            ]
        ], $registerDomain->generateDomainboxCommand());
    
    }
}