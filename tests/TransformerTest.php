<?php

namespace Chapter\Tests;

use Chapter\Functions\Transformer;
use PHPUnit\Framework\TestCase;

class TransformerTest extends TestCase
{
    /** @var Transformer */
    private $transformer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->transformer = new Transformer();
    }

    public function test_uppercase()
    {
        $expected = 'HELLO WORLD';
        $result = $this->transformer->uppercase('Hello World');

        $this->assertEquals($expected, $result);
    }

    public function test_lowercase()
    {
        $expected = 'hello world';
        $result = $this->transformer->lowercase('Hello World');

        $this->assertEquals($expected, $result);
    }

    public function test_capitalize()
    {
        $expected = 'Hello world';
        $result = $this->transformer->capitalize('hello world', false);

        $this->assertEquals($expected, $result);

        $expected = 'Hello World';
        $result = $this->transformer->capitalize('hello world', true);

        $this->assertEquals($expected, $result);
    }

    public function test_snake_case()
    {
        $expected = 'hello_world';
        $result = $this->transformer->snakeCase('Hello world');

        $this->assertEquals($expected, $result);

        $result = $this->transformer->snakeCase('hello-World');

        $this->assertEquals($expected, $result);
    }

    public function test_camel_case()
    {
        $expected = 'helloWorld';
        $result = $this->transformer->camelCase('Hello world');

        $this->assertEquals($expected, $result);

        $result = $this->transformer->camelCase('hello-World');

        $this->assertEquals($expected, $result);

        $result = $this->transformer->camelCase('hello_World');

        $this->assertEquals($expected, $result);
    }

    public function test_pascal_case()
    {
        $expected = 'HelloWorld';
        $result = $this->transformer->pascalCase('helloWorld');

        $this->assertEquals($expected, $result);

        $result = $this->transformer->pascalCase('hello-World');

        $this->assertEquals($expected, $result);

        $result = $this->transformer->pascalCase('hello_World');

        $this->assertEquals($expected, $result);

        $result = $this->transformer->pascalCase('hello World');

        $this->assertEquals($expected, $result);
    }

    public function test_validate_email()
    {
        $result = $this->transformer->validateEmail('hello@world.com');

        $this->assertTrue($result);

        $result = $this->transformer->validateEmail('helloworld.com');

        $this->assertFalse($result);
    }

    public function test_concatenate()
    {
        $expected = 'hello@world';
        $result = $this->transformer->concatenate('@', 'hello', 'world');

        $this->assertEquals($expected, $result);
    }

    public function test_split()
    {
        $expected = ['hello', 'world'];
        $result = $this->transformer->split('@', 'hello@world');

        $this->assertEquals($expected, $result);
    }

    public function test_replace()
    {
        $expected = 'Hello World';
        $result = $this->transformer->replace('@', ' ','Hello@World');

        $this->assertEquals($expected, $result);
    }

    public function test_contains()
    {
        $result = $this->transformer->contains('Hello World', '{}');

        $this->assertFalse($result);

        $result = $this->transformer->contains('Hello{}World', '{}');

        $this->assertTrue($result);
    }
}
