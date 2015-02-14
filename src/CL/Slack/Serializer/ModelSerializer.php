<?php

/*
 * This file is part of the Slack API library.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Serializer;

use CL\Slack\Model\AbstractModel;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ModelSerializer extends AbstractSerializer
{
    /**
     * @param AbstractModel $model
     *
     * @return array
     */
    public function serialize(AbstractModel $model)
    {
        $serializedModel = $this->serializer->serialize($model, 'json');
        if (!$serializedModel || !is_string($serializedModel)) {
            throw new \RuntimeException(sprintf(
                'Failed to serialize model; expected it to be a string, got: %s',
                var_export($serializedModel, true)
            ));
        }

        return json_decode($serializedModel, true);
    }

    /**
     * @param array  $model
     * @param string $modelClass
     *
     * @return AbstractModel
     */
    public function deserialize(array $model, $modelClass)
    {
        $modelObject = $this->serializer->deserialize(
            json_encode($model),
            $modelClass,
            'json'
        );

        if (!($modelObject instanceof AbstractModel)) {
            throw new \RuntimeException(sprintf(
                'The serializer expected the model data to be converted into an instance of "%s", got: %s',
                $modelClass,
                is_object($modelObject) ? 'instance of ' . get_class($modelObject) : gettype($modelObject)
            ));
        }

        return $modelObject;
    }
}
