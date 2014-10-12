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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class MemberProfile extends AbstractModel
{
    /**
     * @return string The ID of this member.
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string|null The first name of the user, or null if there isn't one set
     */
    public function getFirstName()
    {
        return $this->data['first_name'];
    }

    /**
     * @return string|null The last name of the user, or null if there isn't one set
     */
    public function getLastName()
    {
        return $this->data['last_name'];
    }

    /**
     * @return string|null The real name of the user, or null if there isn't one set
     */
    public function getRealName()
    {
        return $this->data['real_name'];
    }

    /**
     * @return string|null The normalized real name of the user, or null if there isn't one set
     */
    public function getRealNameNormalized()
    {
        return $this->data['real_name_normalized'];
    }

    /**
     * @return string|null The email of the user, or null if there isn't one set
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return string The URL to a 24x24-sized web-viewable image (GIFs, JPEGs or PNGs).
     */
    public function getImage24()
    {
        return $this->data['image_24'];
    }

    /**
     * @return string The URL to a 32x32-sized web-viewable image (GIFs, JPEGs or PNGs).
     */
    public function getImage32()
    {
        return $this->data['image_32'];
    }

    /**
     * @return string The URL to a 48x48-sized web-viewable image (GIFs, JPEGs or PNGs).
     */
    public function getImage48()
    {
        return $this->data['image_48'];
    }

    /**
     * @return string The URL to a 72x72-sized web-viewable image (GIFs, JPEGs or PNGs).
     */
    public function getImage72()
    {
        return $this->data['image_72'];
    }

    /**
     * @return string The URL to a 192x192-sized web-viewable image (GIFs, JPEGs or PNGs).
     */
    public function getImage192()
    {
        return $this->data['image_192'];
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResolver(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'image_24',
            'image_32',
            'image_48',
            'image_72',
            'image_192',
        ]);
        $resolver->setOptional([
            'title',
            'first_name',
            'last_name',
            'real_name',
            'real_name_normalized',
            'email',
        ]);
        $resolver->setAllowedTypes([
            'image_24'             => ['string'],
            'image_32'             => ['string'],
            'image_48'             => ['string'],
            'image_72'             => ['string'],
            'image_192'            => ['string'],
            'title'                => ['string'],
            'first_name'           => ['string'],
            'last_name'            => ['string'],
            'real_name'            => ['string'],
            'real_name_normalized' => ['string'],
            'email'                => ['string'],
        ]);
    }
}
