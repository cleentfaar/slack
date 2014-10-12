<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Slack\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class Attachment extends AbstractModel
{
    /**
     * @param string $fallback Required text summary of the attachment that is shown by clients that understand attachments
     *                         but choose not to show them.
     */
    public function setFallback($fallback)
    {
        $this->data['fallback'] = $fallback;
    }

    /**
     * @return string Text summary of the attachment that is shown by clients that understand attachments
     *                but choose not to show them.
     */
    public function getFallback()
    {
        return $this->data['fallback'];
    }
    
    /**
     * @param string|null $preText Optional text that should appear above the formatted data.
     */
    public function setPreText($preText = null)
    {
        $this->data['pre_text'] = $preText;
    }

    /**
     * @return string|null Optional text that should appear above the formatted data.
     */
    public function getPreText()
    {
        return isset($this->data['pre_text']) ? $this->data['pre_text'] : null;
    }
    
    /**
     * @param string|null $text Optional text that should appear within the attachment.
     */
    public function setText($text = null)
    {
        $this->data['text'] = $text;
    }

    /**
     * @return string|null Optional text that should appear within the attachment.
     */
    public function getText()
    {
        return isset($this->data['text']) ? $this->data['text'] : null;
    }
    
    /**
     * @param string|null $color Can either be one of 'good', 'warning', 'danger', or any hex color code
     */
    public function setColor($color = null)
    {
        $this->data['color'] = $color;
    }

    /**
     * @return string|null Can either be one of 'good', 'warning', 'danger', or any hex color code
     */
    public function getColor()
    {
        return isset($this->data['color']) ? $this->data['color'] : null;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'fallback',
        ]);

        $resolver->setOptional([
            'text',
            'pretext',
            'color',
            'fields',
        ]);

        $resolver->setAllowedTypes([
            'fallback' => ['string'],
            'text'     => ['string'],
            'pretext'  => ['string'],
            'color'    => ['string'],
            'fields'   => ['array<\CL\Slack\Model\AttachmentField>'],
        ]);
        
        $resolver->setNormalizers([
            'color' => function (Options $options, $value) {
                if ($value !== null) {
                    $value = mb_strtolower($value);
                    if (!in_array($value, ['good', 'warning', 'danger'])) {
                        $value = '#' . ltrim($value, '#');
                    }
                }
                
                return $value;
            },
        ]);
    }
}
