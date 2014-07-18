<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Api\Method;

use CL\Slack\Api\Method\Response\UsersListResponse;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class UsersListMethod extends AbstractMethod
{
    /**
     * {@inheritdoc}
     */
    public function createResponse(array $data)
    {
        return new UsersListResponse($data);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAlias()
    {
        return MethodFactory::METHOD_USERS_LIST;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSlug()
    {
        return 'users.list';
    }
}
