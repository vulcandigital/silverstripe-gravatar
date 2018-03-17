<?php

namespace Vulcan\Gravatar\Extensions;

use SilverStripe\ORM\DataExtension;

class MemberExtension extends DataExtension
{
    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param int    $size            Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $defaultImageSet Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $rating          Maximum rating (inclusive) [ g | pg | r | x ]
     * @param bool   $img             True to return a complete IMG tag False for just the URL
     * @param array  $attributes      Optional, additional key/value attributes to include in the IMG tag
     *
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    public function Avatar($size = 80, $defaultImageSet = 'identicon', $rating = 'g', $img = false, $attributes = [])
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($this->getOwner()->Email)));
        $url .= "?s=$size&d=$defaultImageSet&r=$rating";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($attributes as $key => $val) {
                $url .= ' ' . $key . '="' . $val . '"';
            }
            $url .= ' />';
        }
        return $url;
    }
}
