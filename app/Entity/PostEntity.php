<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?page=posts.singlePost&id=' . $this->id;
    }

    /**
     * getExcerpt
     * get an excerpt of the post with 200 characters
     * @return void
     */
    public function getExcerpt()
    {
        $html = '<p>' . substr($this->content, 0, 200) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}
