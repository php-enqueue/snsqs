<?php

namespace Enqueue\SnsQs\Tests\Spec;

use Enqueue\Test\RetryTrait;
use Interop\Queue\Context;
use Interop\Queue\Spec\SendToAndReceiveNoWaitFromQueueSpec;

/**
 * @group functional
 * @retry 5
 */
class SqsSendToAndReceiveNoWaitFromQueueTest extends SendToAndReceiveNoWaitFromQueueSpec
{
    use RetryTrait;
    use SnsQsFactoryTrait;

    protected function tearDown()
    {
        parent::tearDown();

        $this->cleanUpSnsQs();
    }

    protected function createContext()
    {
        return $this->createSnsQsContext();
    }

    protected function createQueue(Context $context, $queueName)
    {
        return $this->createSnsQsQueue($queueName);
    }
}
