<?php

use PHPUnit\Framework\TestCase;
use Subscriber\Count;

class SubscriberCountParserTest extends TestCase
{
    /**
     * @covers \Subscriber\Count::parse
     * @test
     */
    public function subscriber_counts_can_parse_millions()
    {
        $subscribers = [
            '9M' => 9000000,
            '19M' => 19000000,
            '29M' => 29000000,
            '39M' => 39000000,
            '49M' => 49000000,
            '59M' => 59000000,
            '69M' => 69000000,
            '79M' => 79000000,
            '89M' => 89000000,
            '99M' => 99000000,
            '999M' => 999000000,
        ];

        foreach ($subscribers as $string => $int) {

            // Parse
            $result = Count::parse($string);

            // Assert
            $this->assertTrue($result === $int);
            $this->assertIsInt($result);
        }
    }

    /**
     * @covers \Subscriber\Count::parse
     * @test
     */
    public function subscriber_counts_can_parse_thousands()
    {
        $subscribers = [
            '1.9K' => 1900,
            '2.9K' => 2900,
            '3.9K' => 3900,
            '4.9K' => 4900,
            '5.9K' => 5900,
            '6.9K' => 6900,
            '7.9K' => 7900,
            '8.9K' => 8900,
            '9.9K' => 9900,
            '19K' => 19000,
            '29K' => 29000,
            '39K' => 39000,
            '49K' => 49000,
            '59K' => 59000,
            '69K' => 69000,
            '79K' => 79000,
            '89K' => 89000,
            '99K' => 99000,
            '109K' => 109000,
            '119K' => 119000,
            '129K' => 129000,
            '139K' => 139000,
            '149K' => 149000,
            '159K' => 159000,
            '169K' => 169000,
            '179K' => 179000,
            '189K' => 189000,
            '199K' => 199000,
            '299K' => 299000,
            '399K' => 399000,
            '499K' => 499000,
            '599K' => 599000,
            '699K' => 699000,
            '799K' => 799000,
            '899K' => 899000,
            '999K' => 999000,
        ];

        foreach ($subscribers as $string => $int) {

            // Parse
            $result = Count::parse($string);

            // Assert
            $this->assertTrue($result === $int);
            $this->assertIsInt($result);
        }
    }

    /**
     * @covers \Subscriber\Count::parse
     * @test
     */
    public function subscriber_counts_can_parse_below_a_thousand()
    {
        $subscribers = [
            '999' => 999,
            '899' => 899,
            '799' => 799,
            '699' => 699,
            '599' => 599,
            '499' => 499,
            '399' => 399,
            '299' => 299,
            '199' => 199,
            '99' => 99,
            '9' => 9,
        ];

        foreach ($subscribers as $string => $int) {

            // Parse
            $result = Count::parse($string);

            // Assert
            $this->assertTrue($result === $int);
            $this->assertTrue($result == $string);
            $this->assertIsInt($result);
        }
    }

    /**
     * @covers \Subscriber\Count::parse
     * @test
     */
    public function subscriber_counts_can_convert_old_string_format()
    {

        $subscribers = [
            '2' => 2,
            '198' => 198,
            '1907' => 1907,
            '88727' => 88727,
            '817001' => 817001,
            '8772270' => 8772270,
            '39507529' => 39507529,
            '592832556' => 592832556,
            '7025513210' => 7025513210,
            '81419130487' => 81419130487,
            '879086674765' => 879086674765,
            '1484272114567' => 1484272114567,
            '71787101409726' => 71787101409726
        ];

        foreach ($subscribers as $string => $int) {

            // Parse
            $result = Count::parse($string);

            // Assert
            $this->assertTrue($result === $int);
            $this->assertTrue($result == $string);
            $this->assertIsInt($result);
        }
    }

}