<?php

use JeffersonGoncalves\Filament\QueueManagement\Support\Utils;

it('expands the serialized job command and log context into readable arrays', function () {
    $payload = json_decode('{"uuid":"f9a9db72-5390-45d3-97b0-a594a649f22a","displayName":"App\\\\Jobs\\\\PruneSatisRelease","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"data":{"commandName":"App\\\\Jobs\\\\PruneSatisRelease","command":"O:26:\"App\\\\Jobs\\\\PruneSatisRelease\":3:{s:10:\"publishDir\";s:13:\"\/tmp\/releases\";s:11:\"releaseName\";s:7:\"release\";s:5:\"delay\";O:25:\"Illuminate\\\\Support\\\\Carbon\":3:{s:4:\"date\";s:26:\"2026-10-06 10:32:23.634687\";s:13:\"timezone_type\";i:3;s:8:\"timezone\";s:17:\"America\/Sao_Paulo\";}}","batchId":null},"illuminate:log:context":{"data":[],"hidden":{"laravel_unique_job_cache_store":"s:8:\"database\";"}},"delay":600}', true);

    $decoded = Utils::decodePayload($payload);

    expect($decoded['uuid'])->toBe('f9a9db72-5390-45d3-97b0-a594a649f22a')
        ->and($decoded['maxTries'])->toBeNull()
        ->and($decoded['delay'])->toBe(600)
        ->and($decoded['data']['command'])->toBe([
            '__class' => 'App\\Jobs\\PruneSatisRelease',
            'publishDir' => '/tmp/releases',
            'releaseName' => 'release',
            'delay' => [
                '__class' => 'Illuminate\\Support\\Carbon',
                'date' => '2026-10-06 10:32:23.634687',
                'timezone_type' => 3,
                'timezone' => 'America/Sao_Paulo',
            ],
        ])
        ->and($decoded['illuminate:log:context']['hidden']['laravel_unique_job_cache_store'])->toBe('database');
});

it('strips visibility prefixes from protected and private properties', function () {
    $command = 'O:3:"Foo":2:{s:8:"'."\0*\0".'queue";s:5:"mails";s:7:"'."\0Foo\0".'id";i:7;}';

    expect(Utils::decodePayload($command))->toBe(['__class' => 'Foo', 'queue' => 'mails', 'id' => 7]);
});

it('keeps the raw serialized string when it contains a circular reference', function () {
    $object = new stdClass;
    $object->self = $object;
    $serialized = serialize($object);

    expect(Utils::decodePayload(['command' => $serialized]))->toBe(['command' => $serialized]);
});

it('still renders the payload when a decoded value cannot be represented in JSON', function () {
    expect(Utils::formatPayload(['uuid' => 'abc', 'command' => 'd:INF;'])->toHtml())
        ->toContain('&quot;uuid&quot;: &quot;abc&quot;')
        ->toContain('&quot;command&quot;: 0');
});

it('leaves non-serialized strings such as encrypted commands untouched', function () {
    expect(Utils::decodePayload('eyJpdiI6IjEyMyJ9'))->toBe('eyJpdiI6IjEyMyJ9')
        ->and(Utils::decodePayload('s:broken'))->toBe('s:broken')
        ->and(Utils::decodePayload('b:0;'))->toBeFalse();
});
