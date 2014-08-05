<?php

namespace CL\Slack\Interaction;

use CL\Slack\Action\AbstractAction;
use CL\Slack\Action\ActionFactory;
use CL\Slack\Model\Member;
use CL\Slack\Resolvable;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Request
{
    use Resolvable;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $this->resolve($data);
    }

    /**
     * @return Member
     */
    public function getMember()
    {
        return $this->data['member'];
    }

    /**
     * @return AbstractAction
     */
    public function getAction()
    {
        return $this->data['action'];
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $actionFactory = new ActionFactory();

        $resolver->setRequired([
            'member' => ['\CL\Slack\Model\Member'],
            'action' => ['\CL\Slack\Interaction\Action\AbstractAction'],
        ]);

        $resolver->setNormalizers([
            'member' => function (Options $options, $value) {
                return new Member($value);
            },
            'action' => function (Options $options, $value) use ($actionFactory) {
                return $actionFactory->create($value);
            },
        ]);
    }
}
