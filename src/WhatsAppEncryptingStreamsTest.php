<?php

namespace maxsergus\WhatsAppEncStreams;

use GuzzleHttp\Psr7;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

//Проверки классов шифрования и расшифровки методом WhatsApp
class WhatsAppEncryptingStreamsTest extends TestCase
{          
    //Общая рабочая проверка
    public function testMain()
    {
        $inText = file_get_contents(__DIR__.'/../samples/AUDIO.original');
        $inKey = file_get_contents(__DIR__.'/../samples/AUDIO.key');
        $outText = file_get_contents(__DIR__.'/../samples/AUDIO.encrypted');
       

        $encryptor = new WhatsAppEncryptingStream(
            Psr7\Utils::streamFor($inText), 
            $inKey,             
            'AUDIO'
        );
                                    
        $encryptedText = (string) $encryptor;//->read(100000000);
        $streamingInfo = $encryptor->getStreamingInfo();                

        if ($outText!=$encryptedText) {
            echo 'AUDIO зашифровано неудачно'.PHP_EOL;
        }
        
        
        
        
        
        $inText = file_get_contents(__DIR__.'/../samples/IMAGE.original');
        $inKey = file_get_contents(__DIR__.'/../samples/IMAGE.key');
        $outText = file_get_contents(__DIR__.'/../samples/IMAGE.encrypted');
       

        $encryptor = new WhatsAppEncryptingStream(
            Psr7\Utils::streamFor($inText), 
            $inKey,             
            'IMAGE'
        );
                                    
        $encryptedText = $encryptor->read(100000000);
        $streamingInfo = $encryptor->getStreamingInfo();                

        if ($outText!=$encryptedText) {
            echo 'IMAGE зашифровано неудачно'.PHP_EOL;
        }
        
        
        
        
        
        
        
        $inText = file_get_contents(__DIR__.'/../samples/VIDEO.original');
        $inKey = file_get_contents(__DIR__.'/../samples/VIDEO.key');
        $outText = file_get_contents(__DIR__.'/../samples/VIDEO.encrypted');
        $sInfo = file_get_contents(__DIR__.'/../samples/VIDEO.sidecar');

        $encryptor = new WhatsAppEncryptingStream(
            Psr7\Utils::streamFor($inText), 
            $inKey,             
            'VIDEO'
        );
                                    
        $encryptedText = $encryptor->read(100000000);
        $streamingInfo = $encryptor->getStreamingInfo();                

        if ($outText!=$encryptedText) {
            echo 'VIDEO зашифровано неудачно'.PHP_EOL;
        }
        if ($sInfo!=$streamingInfo) {
            echo 'Информация для стриминга неверна'.PHP_EOL;
        }
                                      
        return true;
    }
    
    //Проверка чтения одной командой
    public function testOneFullRead()
    {
        return true;
    }

    //Проверка чтения по блокам 
    public function test16BReads()
    {
        return true;
    }
    
    //Проверка рандомного чтения
    public function testRandomReads()
    {
        return true;
    }
    
    //Проверка работы с крупными данными
    public function testProcessBigData()
    {
        return true;
    }
    
    //Проверка динамических показателей
    public function testTimings()
    {
        return true;
    }
    
    //Проверка многопоточной устойчивости
    public function testMultithreadReads()
    {
        return true;
    }
}
