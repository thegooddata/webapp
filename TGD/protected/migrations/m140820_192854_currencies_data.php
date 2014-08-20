<?php

class m140820_192854_currencies_data extends CDbMigration {

    public function up() {
        $stripe_currencies = array(
            0 =>
            array(
                'code' => 'AED',
                'name' => 'United Arab Emirates Dirham',
                'exchange_rate' => 6.09748000000000001108446667785756289958953857421875,
            ),
            1 =>
            array(
                'code' => 'AFN',
                'name' => 'Afghan Afghani',
                'exchange_rate' => 92.33220000000000027284841053187847137451171875,
            ),
            2 =>
            array(
                'code' => 'ALL',
                'name' => 'Albanian Lek',
                'exchange_rate' => 174.171999999999997044142219237983226776123046875,
            ),
            3 =>
            array(
                'code' => 'AMD',
                'name' => 'Armenian Dram',
                'exchange_rate' => 676.98900000000003274180926382541656494140625,
            ),
            4 =>
            array(
                'code' => 'ANG',
                'name' => 'Netherlands Antillean Gulden',
                'exchange_rate' => 2.9725500000000000255795384873636066913604736328125,
            ),
            5 =>
            array(
                'code' => 'AOA',
                'name' => 'Angolan Kwanza',
                'exchange_rate' => 162.275000000000005684341886080801486968994140625,
            ),
            6 =>
            array(
                'code' => 'ARS',
                'name' => 'Argentine Peso',
                'exchange_rate' => 13.751599999999999823785401531495153903961181640625,
            ),
            7 =>
            array(
                'code' => 'AUD',
                'name' => 'Australian Dollar',
                'exchange_rate' => 1.7870200000000000528643795405514538288116455078125,
            ),
            8 =>
            array(
                'code' => 'AWG',
                'name' => 'Aruban Florin',
                'exchange_rate' => 2.9725500000000000255795384873636066913604736328125,
            ),
            9 =>
            array(
                'code' => 'AZN',
                'name' => 'Azerbaijani Manat',
                'exchange_rate' => 1.302280000000000104165565062430687248706817626953125,
            ),
            10 =>
            array(
                'code' => 'BAM',
                'name' => 'Bosnia & Herzegovina Convertible Mark',
                'exchange_rate' => 2.44808000000000003382183422218076884746551513671875,
            ),
            11 =>
            array(
                'code' => 'BBD',
                'name' => 'Barbadian Dollar',
                'exchange_rate' => 3.321289999999999853486087886267341673374176025390625,
            ),
            12 =>
            array(
                'code' => 'BDT',
                'name' => 'Bangladeshi Taka',
                'exchange_rate' => 128.741999999999990222931955941021442413330078125,
            ),
            13 =>
            array(
                'code' => 'BGN',
                'name' => 'Bulgarian Lev',
                'exchange_rate' => 2.44831000000000020833113012486137449741363525390625,
            ),
            14 =>
            array(
                'code' => 'BIF',
                'name' => 'Burundian Franc',
                'exchange_rate' => 2548.9499999999998181010596454143524169921875,
            ),
            15 =>
            array(
                'code' => 'BMD',
                'name' => 'Bermudian Dollar',
                'exchange_rate' => 1.66063999999999989398702382459305226802825927734375,
            ),
            16 =>
            array(
                'code' => 'BND',
                'name' => 'Brunei Dollar',
                'exchange_rate' => 2.0780300000000000437694325228221714496612548828125,
            ),
            17 =>
            array(
                'code' => 'BOB',
                'name' => 'Bolivian Boliviano',
                'exchange_rate' => 11.474399999999999266719896695576608180999755859375,
            ),
            18 =>
            array(
                'code' => 'BRL',
                'name' => 'Brazilian Real',
                'exchange_rate' => 3.75037999999999982492226990871131420135498046875,
            ),
            19 =>
            array(
                'code' => 'BSD',
                'name' => 'Bahamian Dollar',
                'exchange_rate' => 1.66063999999999989398702382459305226802825927734375,
            ),
            20 =>
            array(
                'code' => 'BWP',
                'name' => 'Botswana Pula',
                'exchange_rate' => 14.6959999999999997299937604111619293689727783203125,
            ),
            21 =>
            array(
                'code' => 'BZD',
                'name' => 'Belize Dollar',
                'exchange_rate' => 3.31280000000000018900436771218664944171905517578125,
            ),
            22 =>
            array(
                'code' => 'CAD',
                'name' => 'Canadian Dollar',
                'exchange_rate' => 1.8207500000000000905941988094127736985683441162109375,
            ),
            23 =>
            array(
                'code' => 'CDF',
                'name' => 'Congolese Franc',
                'exchange_rate' => 1534.079999999999927240423858165740966796875,
            ),
            24 =>
            array(
                'code' => 'CHF',
                'name' => 'Swiss Franc',
                'exchange_rate' => 1.5160199999999999231903302643331699073314666748046875,
            ),
            25 =>
            array(
                'code' => 'CLP',
                'name' => 'Chilean Peso',
                'exchange_rate' => 969.9869999999999663486960344016551971435546875,
            ),
            26 =>
            array(
                'code' => 'CNY',
                'name' => 'Chinese Renminbi Yuan',
                'exchange_rate' => 10.1910000000000007247535904753021895885467529296875,
            ),
            27 =>
            array(
                'code' => 'COP',
                'name' => 'Colombian Peso',
                'exchange_rate' => 3171.71999999999979991116560995578765869140625,
            ),
            28 =>
            array(
                'code' => 'CRC',
                'name' => 'Costa Rican Colón',
                'exchange_rate' => 899.4550000000000409272615797817707061767578125,
            ),
            29 =>
            array(
                'code' => 'CVE',
                'name' => 'Cape Verdean Escudo',
                'exchange_rate' => 135.980999999999994543031789362430572509765625,
            ),
            30 =>
            array(
                'code' => 'CZK',
                'name' => 'Czech Koruna',
                'exchange_rate' => 34.94749999999999801048033987171947956085205078125,
            ),
            31 =>
            array(
                'code' => 'DJF',
                'name' => 'Djiboutian Franc',
                'exchange_rate' => 300.8509999999999990905052982270717620849609375,
            ),
            32 =>
            array(
                'code' => 'DKK',
                'name' => 'Danish Krone',
                'exchange_rate' => 9.33333999999999974761522025801241397857666015625,
            ),
            33 =>
            array(
                'code' => 'DOP',
                'name' => 'Dominican Peso',
                'exchange_rate' => 72.2271999999999962938090902753174304962158203125,
            ),
            34 =>
            array(
                'code' => 'DZD',
                'name' => 'Algerian Dinar',
                'exchange_rate' => 133.138000000000005229594535194337368011474609375,
            ),
            35 =>
            array(
                'code' => 'EEK',
                'name' => 'Estonian Kroon',
                'exchange_rate' => 19.585699999999999221245161606930196285247802734375,
            ),
            36 =>
            array(
                'code' => 'EGP',
                'name' => 'Egyptian Pound',
                'exchange_rate' => 11.8742000000000000881072992342524230480194091796875,
            ),
            37 =>
            array(
                'code' => 'ETB',
                'name' => 'Ethiopian Birr',
                'exchange_rate' => 32.9455999999999988858689903281629085540771484375,
            ),
            38 =>
            array(
                'code' => 'EUR',
                'name' => 'Euro',
                'exchange_rate' => 1.251700000000000034816594052244909107685089111328125,
            ),
            39 =>
            array(
                'code' => 'FJD',
                'name' => 'Fijian Dollar',
                'exchange_rate' => 3.062910000000000021458390619955025613307952880859375,
            ),
            40 =>
            array(
                'code' => 'FKP',
                'name' => 'Falkland Islands Pound',
                'exchange_rate' => 1,
            ),
            41 =>
            array(
                'code' => 'GBP',
                'name' => 'British Pound',
                'exchange_rate' => 1,
            ),
            42 =>
            array(
                'code' => 'GEL',
                'name' => 'Georgian Lari',
                'exchange_rate' => 2.8640699999999998937028067302890121936798095703125,
            ),
            43 =>
            array(
                'code' => 'GIP',
                'name' => 'Gibraltar Pound',
                'exchange_rate' => 1,
            ),
            44 =>
            array(
                'code' => 'GMD',
                'name' => 'Gambian Dalasi',
                'exchange_rate' => 65.82179999999999608917278237640857696533203125,
            ),
            45 =>
            array(
                'code' => 'GNF',
                'name' => 'Guinean Franc',
                'exchange_rate' => 11692.629999999999199644662439823150634765625,
            ),
            46 =>
            array(
                'code' => 'GTQ',
                'name' => 'Guatemalan Quetzal',
                'exchange_rate' => 12.989699999999999135980033315718173980712890625,
            ),
            47 =>
            array(
                'code' => 'GYD',
                'name' => 'Guyanese Dollar',
                'exchange_rate' => 341.53100000000000591171556152403354644775390625,
            ),
            48 =>
            array(
                'code' => 'HKD',
                'name' => 'Hong Kong Dollar',
                'exchange_rate' => 12.8693000000000008498091119690798223018646240234375,
            ),
            49 =>
            array(
                'code' => 'HNL',
                'name' => 'Honduran Lempira',
                'exchange_rate' => 34.9849999999999994315658113919198513031005859375,
            ),
            50 =>
            array(
                'code' => 'HRK',
                'name' => 'Croatian Kuna',
                'exchange_rate' => 9.5404099999999996128963175578974187374114990234375,
            ),
            51 =>
            array(
                'code' => 'HTG',
                'name' => 'Haitian Gourde',
                'exchange_rate' => 75.2857999999999947249307297170162200927734375,
            ),
            52 =>
            array(
                'code' => 'HUF',
                'name' => 'Hungarian Forint',
                'exchange_rate' => 393.78100000000000591171556152403354644775390625,
            ),
            53 =>
            array(
                'code' => 'IDR',
                'name' => 'Indonesian Rupiah',
                'exchange_rate' => 19482.610000000000582076609134674072265625,
            ),
            54 =>
            array(
                'code' => 'ILS',
                'name' => 'Israeli New Sheqel',
                'exchange_rate' => 5.880720000000000169393388205207884311676025390625,
            ),
            55 =>
            array(
                'code' => 'INR',
                'name' => 'Indian Rupee',
                'exchange_rate' => 100.69499999999999317878973670303821563720703125,
            ),
            56 =>
            array(
                'code' => 'ISK',
                'name' => 'Icelandic Króna',
                'exchange_rate' => 193.210000000000007958078640513122081756591796875,
            ),
            57 =>
            array(
                'code' => 'JMD',
                'name' => 'Jamaican Dollar',
                'exchange_rate' => 186.671999999999997044142219237983226776123046875,
            ),
            58 =>
            array(
                'code' => 'JPY',
                'name' => 'Japanese Yen',
                'exchange_rate' => 172.18500000000000227373675443232059478759765625,
            ),
            59 =>
            array(
                'code' => 'KES',
                'name' => 'Kenyan Shilling',
                'exchange_rate' => 146.6100000000000136424205265939235687255859375,
            ),
            60 =>
            array(
                'code' => 'KGS',
                'name' => 'Kyrgyzstani Som',
                'exchange_rate' => 86.476799999999997226041159592568874359130859375,
            ),
            61 =>
            array(
                'code' => 'KHR',
                'name' => 'Cambodian Riel',
                'exchange_rate' => 6735.7200000000002546585164964199066162109375,
            ),
            62 =>
            array(
                'code' => 'KMF',
                'name' => 'Comorian Franc',
                'exchange_rate' => 615.8170000000000072759576141834259033203125,
            ),
            63 =>
            array(
                'code' => 'KRW',
                'name' => 'South Korean Won',
                'exchange_rate' => 1698.920000000000072759576141834259033203125,
            ),
            64 =>
            array(
                'code' => 'KYD',
                'name' => 'Cayman Islands Dollar',
                'exchange_rate' => 1.3614900000000000890310047907405532896518707275390625,
            ),
            65 =>
            array(
                'code' => 'KZT',
                'name' => 'Kazakhstani Tenge',
                'exchange_rate' => 302.26699999999999590727384202182292938232421875,
            ),
            66 =>
            array(
                'code' => 'LAK',
                'name' => 'Lao Kip',
                'exchange_rate' => 13389.079999999999927240423858165740966796875,
            ),
            67 =>
            array(
                'code' => 'LBP',
                'name' => 'Lebanese Pound',
                'exchange_rate' => 2504.3000000000001818989403545856475830078125,
            ),
            68 =>
            array(
                'code' => 'LKR',
                'name' => 'Sri Lankan Rupee',
                'exchange_rate' => 216.150000000000005684341886080801486968994140625,
            ),
            69 =>
            array(
                'code' => 'LRD',
                'name' => 'Liberian Dollar',
                'exchange_rate' => 153.573000000000007503331289626657962799072265625,
            ),
            70 =>
            array(
                'code' => 'LSL',
                'name' => 'Lesotho Loti',
                'exchange_rate' => 17.817299999999999471356204594485461711883544921875,
            ),
            71 =>
            array(
                'code' => 'LTL',
                'name' => 'Lithuanian Litas',
                'exchange_rate' => 4.32214000000000009293898983742110431194305419921875,
            ),
            72 =>
            array(
                'code' => 'LVL',
                'name' => 'Latvian Lats',
                'exchange_rate' => 0.8797509999999999497077851629001088440418243408203125,
            ),
            73 =>
            array(
                'code' => 'MAD',
                'name' => 'Moroccan Dirham',
                'exchange_rate' => 13.958800000000000096633812063373625278472900390625,
            ),
            74 =>
            array(
                'code' => 'MDL',
                'name' => 'Moldovan Leu',
                'exchange_rate' => 22.97070000000000078443918027915060520172119140625,
            ),
            75 =>
            array(
                'code' => 'MGA',
                'name' => 'Malagasy Ariary',
                'exchange_rate' => 4235.3199999999997089616954326629638671875,
            ),
            76 =>
            array(
                'code' => 'MKD',
                'name' => 'Macedonian Denar',
                'exchange_rate' => 76.839799999999996771293808706104755401611328125,
            ),
            77 =>
            array(
                'code' => 'MNT',
                'name' => 'Mongolian Tögrög',
                'exchange_rate' => 3074.53000000000020008883439004421234130859375,
            ),
            78 =>
            array(
                'code' => 'MOP',
                'name' => 'Macanese Pataca',
                'exchange_rate' => 13.254200000000000869704308570362627506256103515625,
            ),
            79 =>
            array(
                'code' => 'MRO',
                'name' => 'Mauritanian Ouguiya',
                'exchange_rate' => 482.76999999999998181010596454143524169921875,
            ),
            80 =>
            array(
                'code' => 'MUR',
                'name' => 'Mauritian Rupee',
                'exchange_rate' => 51.70270000000000010231815394945442676544189453125,
            ),
            81 =>
            array(
                'code' => 'MVR',
                'name' => 'Maldivian Rufiyaa',
                'exchange_rate' => 25.602599999999998914290699758566915988922119140625,
            ),
            82 =>
            array(
                'code' => 'MWK',
                'name' => 'Malawian Kwacha',
                'exchange_rate' => 655.058999999999969077180139720439910888671875,
            ),
            83 =>
            array(
                'code' => 'MXN',
                'name' => 'Mexican Peso',
                'exchange_rate' => 21.77380000000000137561073643155395984649658203125,
            ),
            84 =>
            array(
                'code' => 'MYR',
                'name' => 'Malaysian Ringgit',
                'exchange_rate' => 5.25656000000000034333424991928040981292724609375,
            ),
            85 =>
            array(
                'code' => 'MZN',
                'name' => 'Mozambican Metical',
                'exchange_rate' => 50.38839999999999719193510827608406543731689453125,
            ),
            86 =>
            array(
                'code' => 'NAD',
                'name' => 'Namibian Dollar',
                'exchange_rate' => 17.817699999999998539124135277234017848968505859375,
            ),
            87 =>
            array(
                'code' => 'NGN',
                'name' => 'Nigerian Naira',
                'exchange_rate' => 268.970000000000027284841053187847137451171875,
            ),
            88 =>
            array(
                'code' => 'NIO',
                'name' => 'Nicaraguan Córdoba',
                'exchange_rate' => 43.376800000000002910383045673370361328125,
            ),
            89 =>
            array(
                'code' => 'NOK',
                'name' => 'Norwegian Krone',
                'exchange_rate' => 10.2690000000000001278976924368180334568023681640625,
            ),
            90 =>
            array(
                'code' => 'NPR',
                'name' => 'Nepalese Rupee',
                'exchange_rate' => 163.025000000000005684341886080801486968994140625,
            ),
            91 =>
            array(
                'code' => 'NZD',
                'name' => 'New Zealand Dollar',
                'exchange_rate' => 1.9813199999999999700861508244997821748256683349609375,
            ),
            92 =>
            array(
                'code' => 'PAB',
                'name' => 'Panamanian Balboa',
                'exchange_rate' => 1.660250000000000003552713678800500929355621337890625,
            ),
            93 =>
            array(
                'code' => 'PEN',
                'name' => 'Peruvian NUEVO Sol',
                'exchange_rate' => 4.69545999999999974505726640927605330944061279296875,
            ),
            94 =>
            array(
                'code' => 'PGK',
                'name' => 'Papua New Guinean Kina',
                'exchange_rate' => 4.08457000000000025607960196794010698795318603515625,
            ),
            95 =>
            array(
                'code' => 'PHP',
                'name' => 'Philippine Peso',
                'exchange_rate' => 72.9001999999999981127984938211739063262939453125,
            ),
            96 =>
            array(
                'code' => 'PKR',
                'name' => 'Pakistani Rupee',
                'exchange_rate' => 168.02699999999998681232682429254055023193359375,
            ),
            97 =>
            array(
                'code' => 'PLN',
                'name' => 'Polish Złoty',
                'exchange_rate' => 5.2494800000000001460875864722765982151031494140625,
            ),
            98 =>
            array(
                'code' => 'PYG',
                'name' => 'Paraguayan Guaraní',
                'exchange_rate' => 7065.34000000000014551915228366851806640625,
            ),
            99 =>
            array(
                'code' => 'QAR',
                'name' => 'Qatari Riyal',
                'exchange_rate' => 6.0464999999999999857891452847979962825775146484375,
            ),
            100 =>
            array(
                'code' => 'RON',
                'name' => 'Romanian Leu',
                'exchange_rate' => 5.52981999999999995765165294869802892208099365234375,
            ),
            101 =>
            array(
                'code' => 'RSD',
                'name' => 'Serbian Dinar',
                'exchange_rate' => 147.0670000000000072759576141834259033203125,
            ),
            102 =>
            array(
                'code' => 'RUB',
                'name' => 'Russian Ruble',
                'exchange_rate' => 60.33149999999999835154085303656756877899169921875,
            ),
            103 =>
            array(
                'code' => 'RWF',
                'name' => 'Rwandan Franc',
                'exchange_rate' => 1146.180000000000063664629124104976654052734375,
            ),
            104 =>
            array(
                'code' => 'SAR',
                'name' => 'Saudi Riyal',
                'exchange_rate' => 6.22698000000000018161472326028160750865936279296875,
            ),
            105 =>
            array(
                'code' => 'SBD',
                'name' => 'Solomon Islands Dollar',
                'exchange_rate' => 11.983000000000000540012479177676141262054443359375,
            ),
            106 =>
            array(
                'code' => 'SCR',
                'name' => 'Seychellois Rupee',
                'exchange_rate' => 20.989399999999999835154085303656756877899169921875,
            ),
            107 =>
            array(
                'code' => 'SEK',
                'name' => 'Swedish Krona',
                'exchange_rate' => 11.473800000000000665068000671453773975372314453125,
            ),
            108 =>
            array(
                'code' => 'SGD',
                'name' => 'Singapore Dollar',
                'exchange_rate' => 2.07777000000000011681322575896047055721282958984375,
            ),
            109 =>
            array(
                'code' => 'SHP',
                'name' => 'Saint Helenian Pound',
                'exchange_rate' => 1,
            ),
            110 =>
            array(
                'code' => 'SLL',
                'name' => 'Sierra Leonean Leone',
                'exchange_rate' => 7297.7200000000002546585164964199066162109375,
            ),
            111 =>
            array(
                'code' => 'SOS',
                'name' => 'Somali Shilling',
                'exchange_rate' => 1990.589999999999918145476840436458587646484375,
            ),
            112 =>
            array(
                'code' => 'SRD',
                'name' => 'Surinamese Dollar',
                'exchange_rate' => 5.43663999999999969503505781176500022411346435546875,
            ),
            113 =>
            array(
                'code' => 'STD',
                'name' => 'São Tomé and Príncipe Dobra',
                'exchange_rate' => 30745.02999999999883584678173065185546875,
            ),
            114 =>
            array(
                'code' => 'SVC',
                'name' => 'Salvadoran Colón',
                'exchange_rate' => 14.5269999999999992468247000942938029766082763671875,
            ),
            115 =>
            array(
                'code' => 'SZL',
                'name' => 'Swazi Lilangeni',
                'exchange_rate' => 17.820499999999999118927007657475769519805908203125,
            ),
            116 =>
            array(
                'code' => 'THB',
                'name' => 'Thai Baht',
                'exchange_rate' => 53.12469999999999714646037318743765354156494140625,
            ),
            117 =>
            array(
                'code' => 'TJS',
                'name' => 'Tajikistani Somoni',
                'exchange_rate' => 8.262119999999999464534994331188499927520751953125,
            ),
            118 =>
            array(
                'code' => 'TOP',
                'name' => 'Tongan Paʻanga',
                'exchange_rate' => 3.06599000000000021515234038815833628177642822265625,
            ),
            119 =>
            array(
                'code' => 'TRY',
                'name' => 'Turkish Lira',
                'exchange_rate' => 3.627619999999999844675357962842099368572235107421875,
            ),
            120 =>
            array(
                'code' => 'TTD',
                'name' => 'Trinidad and Tobago Dollar',
                'exchange_rate' => 10.528999999999999914734871708787977695465087890625,
            ),
            121 =>
            array(
                'code' => 'TWD',
                'name' => 'New Taiwan Dollar',
                'exchange_rate' => 49.7820999999999997953636921010911464691162109375,
            ),
            122 =>
            array(
                'code' => 'TZS',
                'name' => 'Tanzanian Shilling',
                'exchange_rate' => 2769.36000000000012732925824820995330810546875,
            ),
            123 =>
            array(
                'code' => 'UAH',
                'name' => 'Ukrainian Hryvnia',
                'exchange_rate' => 21.96170000000000044337866711430251598358154296875,
            ),
            124 =>
            array(
                'code' => 'UGX',
                'name' => 'Ugandan Shilling',
                'exchange_rate' => 4317.899999999999636202119290828704833984375,
            ),
            125 =>
            array(
                'code' => 'USD',
                'name' => 'United States Dollar',
                'exchange_rate' => 1.6606300000000000505195885125431232154369354248046875,
            ),
            126 =>
            array(
                'code' => 'UYU',
                'name' => 'Uruguayan Peso',
                'exchange_rate' => 39.6458999999999974761522025801241397857666015625,
            ),
            127 =>
            array(
                'code' => 'UZS',
                'name' => 'Uzbekistani Som',
                'exchange_rate' => 3888.1300000000001091393642127513885498046875,
            ),
            128 =>
            array(
                'code' => 'VEF',
                'name' => 'Venezuelan Bolívar',
                'exchange_rate' => 10.44800000000000039790393202565610408782958984375,
            ),
            129 =>
            array(
                'code' => 'VND',
                'name' => 'Vietnamese Đồng',
                'exchange_rate' => 35299.66000000000349245965480804443359375,
            ),
            130 =>
            array(
                'code' => 'VUV',
                'name' => 'Vanuatu Vatu',
                'exchange_rate' => 156.6399999999999863575794734060764312744140625,
            ),
            131 =>
            array(
                'code' => 'WST',
                'name' => 'Samoan Tala',
                'exchange_rate' => 3.823659999999999836717279322328977286815643310546875,
            ),
            132 =>
            array(
                'code' => 'XAF',
                'name' => 'Central African Cfa Franc',
                'exchange_rate' => 821.11400000000003274180926382541656494140625,
            ),
            133 =>
            array(
                'code' => 'XCD',
                'name' => 'East Caribbean Dollar',
                'exchange_rate' => 4.482630000000000336513039655983448028564453125,
            ),
            134 =>
            array(
                'code' => 'XOF',
                'name' => 'West African Cfa Franc',
                'exchange_rate' => 821.11400000000003274180926382541656494140625,
            ),
            135 =>
            array(
                'code' => 'XPF',
                'name' => 'Cfp Franc',
                'exchange_rate' => 149.381000000000000227373675443232059478759765625,
            ),
            136 =>
            array(
                'code' => 'YER',
                'name' => 'Yemeni Rial',
                'exchange_rate' => 356.7749999999999772626324556767940521240234375,
            ),
            137 =>
            array(
                'code' => 'ZAR',
                'name' => 'South African Rand',
                'exchange_rate' => 17.823699999999998766497810720466077327728271484375,
            ),
            138 =>
            array(
                'code' => 'ZMW',
                'name' => 'Zambian Kwacha',
                'exchange_rate' => 9.994730000000000558202373213134706020355224609375,
            ),
                )
        ;
        
        foreach ($stripe_currencies as $k => $currency) {
            $model=  Currencies::model()->find("t.code=:code", array(':code'=> $currency['code']));
            if (!$model) {
                $model= new Currencies();
                $model->code=$currency['code'];
                $model->name_en=$currency['name'];
                $model->name_es='';
            }
            $model->exchange_rate=$currency['exchange_rate'];
            $model->save();
            echo "Processing {$currency['code']}\n";
        }
        
//        print_r(Currencies::model()->count());
//        
//        die();
    }

    public function down() {
        echo "m140820_192854_currencies_data does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
