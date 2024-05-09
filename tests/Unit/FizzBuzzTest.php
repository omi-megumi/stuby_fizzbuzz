<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Collection;

class FizzBuzzTest extends TestCase
{
    /**
     * @return void //戻り値がない。
     */
    // 
    public function testFizzBuzz()
    {
        //assertEquals($val1, $val2)；$val1が$val2と等しい
        $this->assertEquals('1 2', $this->fizzBuzz(3, 5, 2));
        $this->assertEquals('1 2 F', $this->fizzBuzz(3, 5, 3));
        $this->assertEquals('1 2 F 4 B', $this->fizzBuzz(3, 5, 5));
        $this->assertEquals('1 2 F 4 B F 7 8 F B 11 F 13 14 FB', $this->fizzBuzz(3, 5, 15));
        $this->assertEquals(
            '1 2 3 4 F 6 B 8 9 F 11 12 13 B F 16 17 18 19 F B 22 23 24 F 26 27 B 29 F 31 32 33 34 FB 36 37 38 39 F 41 B 43 44 F 46 47 48 B F 51 52 53 54 F B 57 58 59 F',
            $this->fizzBuzz(5, 7, 60)
        ); // 5でfizz 7でbuzz
    }

    /**
     * fizz の倍数で F buzz の倍数で B
     * 公倍数の場合 FB とし、スペースでつなげる
     *
     * @param int $fizz
     * @param int $buzz
     * @param int $number
     * @return string
     */
    function fizzBuzz(int $fizz, int $buzz, int $number): string
    {
        // ここに書く！

        // 1から$numberまでの整数をコレクションとする。
        $numbers = collect()->range(1, $number);
        // mapで$numbersを更新し$resultに代入する。
        $result = $numbers->map(function($num) use($fizz, $buzz){
            $output = '';

            if ($num % $fizz === 0) {
                $output .= 'F';
            }

            if ($num % $buzz === 0) {
                $output .= 'B';
            }

            return ($output === '') ? "$num" : "$output";
        });

        // スペース区切りで連結。
        return $result->implode(' ');
    }
}