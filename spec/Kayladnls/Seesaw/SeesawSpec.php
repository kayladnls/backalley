<?php

namespace spec\Kayladnls\Seesaw;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SeesawSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kayladnls\Seesaw\Seesaw');
    }

    function it_can_add_a_named_route()
    {
        $this->addNamedRoute('JimBob', 'GET', 'url/jim/bob', function(){});

        $this->route('JimBob')->__toString()->shouldReturn('/url/jim/bob');
    }

    function it_can_add_a_parameterized_route()
    {
        $this->addNamedRoute('JimBob', 'GET', 'url/jim/bob/{id}', function(){});

        $this->route('JimBob:123')->__toString()->shouldReturn('/url/jim/bob/123');
    }

    function it_can_be_accessed_statically()
    {
        $this->addNamedRoute('JimBob', 'GET', 'url/jim/bob', function(){});

        $this::route('JimBob')->__toString()->shouldReturn('/url/jim/bob');
    }

    function it_can_set_a_base_url()
    {
        $this->setBaseUrl('http://yolo.com');

        $this->getBaseUrl()->shouldReturn('http://yolo.com');
    }

    function it_can_infer_a_route_name()
    {
        $this->addRoute('GET', '/add/new/route', function(){});

        $this->route('AddNewRoute')->__toString()->shouldReturn('/add/new/route');
    }
}
